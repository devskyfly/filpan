<?php

/*
 * send-feedback.php
 * Совместимо с PHP 5.6
 */

header('Content-Type: application/json; charset=UTF-8');

/*
 * Часовой пояс нужен для правильного сброса суточного лимита.
 */
date_default_timezone_set('Europe/Moscow');

/*
 * Настройки.
 */
$recipient = 'filpan@yandex.ru';
$senderEmail = 'no-reply@filpan.ru';
$senderName = 'Сайт filpan.ru';

/*
 * Максимальное общее количество успешно отправленных писем в сутки.
 */
$dailyEmailLimit = 30;

/*
 * Файл счётчика.
 *
 * Желательно хранить его вне публичной директории сайта.
 * Директория должна быть доступна PHP для записи.
 *
 * Если этот PHP-файл находится в public_html, данный путь создаст
 * storage уровнем выше public_html.
 */
$counterFile = __DIR__
    . '/feedback-email-counter.json';


/**
 * Возвращает JSON-ответ и завершает выполнение.
 */
function sendJson($success, $message, $statusCode)
{
    http_response_code($statusCode);

    echo json_encode(
        array(
            'success' => (bool) $success,
            'message' => $message
        ),
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    );

    exit;
}


/**
 * Безопасное получение POST-поля.
 */
function getPostValue($fieldName)
{
    if (!isset($_POST[$fieldName])) {
        return '';
    }

    if (is_array($_POST[$fieldName])) {
        return '';
    }

    return trim((string) $_POST[$fieldName]);
}


/**
 * Удаляет переводы строк из значений,
 * которые используются в почтовых заголовках.
 */
function cleanHeaderValue($value)
{
    return str_replace(
        array("\r", "\n"),
        ' ',
        $value
    );
}


/**
 * Проверяет суточный лимит и резервирует одну отправку.
 *
 * Формат файла:
 *
 * {
 *     "date": "2026-08-03",
 *     "count": 5
 * }
 */
function reserveDailyEmailSlot($counterFile, $dailyLimit)
{
    $directory = dirname($counterFile);

    if (!is_dir($directory)) {
        if (!mkdir($directory, 0755, true) && !is_dir($directory)) {
            throw new Exception(
                'Не удалось создать директорию счётчика.'
            );
        }
    }

    $fileHandle = fopen($counterFile, 'c+');

    if ($fileHandle === false) {
        throw new Exception(
            'Не удалось открыть файл счётчика.'
        );
    }

    $isLocked = false;

    try {
        /*
         * Блокируем файл от параллельных запросов.
         */
        if (!flock($fileHandle, LOCK_EX)) {
            throw new Exception(
                'Не удалось заблокировать файл счётчика.'
            );
        }

        $isLocked = true;

        rewind($fileHandle);

        $contents = stream_get_contents($fileHandle);
        $today = date('Y-m-d');

        $counterData = array(
            'date' => $today,
            'count' => 0
        );

        if ($contents !== false && trim($contents) !== '') {
            $decodedData = json_decode($contents, true);

            if (
                is_array($decodedData)
                && isset($decodedData['date'])
                && isset($decodedData['count'])
            ) {
                $counterData['date'] =
                    (string) $decodedData['date'];

                $counterData['count'] = max(
                    0,
                    (int) $decodedData['count']
                );
            }
        }

        /*
         * Если наступил новый день, обнуляем счётчик.
         */
        if ($counterData['date'] !== $today) {
            $counterData = array(
                'date' => $today,
                'count' => 0
            );
        }

        /*
         * Лимит уже достигнут.
         */
        if ($counterData['count'] >= $dailyLimit) {
            return false;
        }

        /*
         * Резервируем одно письмо до вызова mail().
         */
        $counterData['count']++;

        $json = json_encode(
            $counterData,
            JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
            | JSON_PRETTY_PRINT
        );

        if ($json === false) {
            throw new Exception(
                'Не удалось сформировать JSON счётчика.'
            );
        }

        rewind($fileHandle);

        if (!ftruncate($fileHandle, 0)) {
            throw new Exception(
                'Не удалось очистить файл счётчика.'
            );
        }

        $writtenBytes = fwrite($fileHandle, $json);

        if ($writtenBytes === false) {
            throw new Exception(
                'Не удалось записать файл счётчика.'
            );
        }

        fflush($fileHandle);

        return true;
    } finally {
        if ($isLocked) {
            flock($fileHandle, LOCK_UN);
        }

        fclose($fileHandle);
    }
}


/**
 * Возвращает зарезервированную отправку,
 * если mail() завершилась ошибкой.
 */
function releaseDailyEmailSlot($counterFile)
{
    $fileHandle = fopen($counterFile, 'c+');

    if ($fileHandle === false) {
        return false;
    }

    $isLocked = false;

    try {
        if (!flock($fileHandle, LOCK_EX)) {
            return false;
        }

        $isLocked = true;

        rewind($fileHandle);

        $contents = stream_get_contents($fileHandle);

        if ($contents === false || trim($contents) === '') {
            return false;
        }

        $counterData = json_decode($contents, true);
        $today = date('Y-m-d');

        if (
            !is_array($counterData)
            || !isset($counterData['date'])
            || !isset($counterData['count'])
            || $counterData['date'] !== $today
        ) {
            return false;
        }

        $counterData['count'] = max(
            0,
            (int) $counterData['count'] - 1
        );

        $json = json_encode(
            $counterData,
            JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
            | JSON_PRETTY_PRINT
        );

        if ($json === false) {
            return false;
        }

        rewind($fileHandle);

        if (!ftruncate($fileHandle, 0)) {
            return false;
        }

        if (fwrite($fileHandle, $json) === false) {
            return false;
        }

        fflush($fileHandle);

        return true;
    } finally {
        if ($isLocked) {
            flock($fileHandle, LOCK_UN);
        }

        fclose($fileHandle);
    }
}


/*
 * Разрешаем только POST-запросы.
 */
if (
    !isset($_SERVER['REQUEST_METHOD'])
    || $_SERVER['REQUEST_METHOD'] !== 'POST'
) {
    sendJson(
        false,
        'Метод запроса не поддерживается.',
        405
    );
}


/*
 * Получаем данные формы.
 */
$website = getPostValue('website');
$formType = getPostValue('form_type');
$name = getPostValue('name');
$phone = getPostValue('phone');
$email = getPostValue('email');
$comment = getPostValue('comment');


/*
 * Honeypot-защита.
 *
 * Обычный пользователь это поле не видит.
 * Если оно заполнено, вероятнее всего форму отправил бот.
 */
if ($website !== '') {
    sendJson(
        true,
        'Спасибо! Ваша заявка успешно отправлена.',
        200
    );
}


/*
 * Проверяем тип формы и обязательные поля.
 */
if ($formType !== 'callback' && $formType !== 'message') {
    sendJson(
        false,
        'Неизвестный тип формы.',
        422
    );
}

if ($name === '') {
    sendJson(
        false,
        'Заполните имя.',
        422
    );
}

if ($formType === 'callback' && $phone === '') {
    sendJson(
        false,
        'Заполните телефон.',
        422
    );
}

if ($formType === 'message' && ($email === '' || $comment === '')) {
    sendJson(
        false,
        'Заполните почту и комментарий.',
        422
    );
}


/*
 * Проверяем длину полей.
 *
 * mb_strlen() обычно доступна на хостингах.
 */
if (function_exists('mb_strlen')) {
    $nameLength = mb_strlen($name, 'UTF-8');
    $phoneLength = mb_strlen($phone, 'UTF-8');
    $emailLength = mb_strlen($email, 'UTF-8');
    $commentLength = mb_strlen($comment, 'UTF-8');
} else {
    $nameLength = strlen($name);
    $phoneLength = strlen($phone);
    $emailLength = strlen($email);
    $commentLength = strlen($comment);
}

if ($nameLength > 100) {
    sendJson(
        false,
        'Имя слишком длинное.',
        422
    );
}

if ($phoneLength > 30) {
    sendJson(
        false,
        'Телефон указан некорректно.',
        422
    );
}

if ($emailLength > 150) {
    sendJson(
        false,
        'Почта указана некорректно.',
        422
    );
}

if (
    $formType === 'message'
    && !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    sendJson(
        false,
        'Укажите корректный адрес почты.',
        422
    );
}

if ($commentLength > 2000) {
    sendJson(
        false,
        'Комментарий слишком длинный.',
        422
    );
}


/*
 * Очищаем данные для почтовых заголовков.
 */
$cleanName = cleanHeaderValue($name);
$cleanPhone = cleanHeaderValue($phone);
$cleanEmail = cleanHeaderValue($email);

$remoteAddress = isset($_SERVER['REMOTE_ADDR'])
    ? $_SERVER['REMOTE_ADDR']
    : 'не определён';


/*
 * Проверяем суточный лимит и резервируем отправку.
 */
try {
    $emailSlotReserved = reserveDailyEmailSlot(
        $counterFile,
        $dailyEmailLimit
    );
} catch (Exception $exception) {
    error_log(
        'Ошибка файлового счётчика: '
        . $exception->getMessage()
    );

    sendJson(
        false,
        'Сервис временно недоступен. Попробуйте позднее.',
        500
    );
}

if (!$emailSlotReserved) {
    error_log(
        'Превышен суточный лимит писем формы filpan.ru. IP: '
        . $remoteAddress
    );

    sendJson(
        false,
        'На сегодня достигнут лимит отправки сообщений. '
        . 'Попробуйте завтра.',
        429
    );
}


/*
 * Формируем тему письма.
 */
$subjectText = $formType === 'callback'
    ? 'Заказ звонка с сайта filpan.ru'
    : 'Сообщение с сайта filpan.ru';

$encodedSubject = '=?UTF-8?B?'
    . base64_encode($subjectText)
    . '?=';


/*
 * Формируем тело письма.
 */
$messageLines = array(
    'Имя: ' . $cleanName
);

if ($formType === 'callback') {
    $messageLines[] = 'Телефон: ' . $cleanPhone;
} else {
    $messageLines[] = 'Почта: ' . $cleanEmail;
    $messageLines[] = 'Комментарий: ' . $comment;
}

$message = implode("\r\n", $messageLines);


/*
 * Формируем заголовки.
 *
 * Адрес отправителя должен принадлежать домену сайта.
 */
$encodedSenderName = '=?UTF-8?B?'
    . base64_encode($senderName)
    . '?=';

$headers = array(
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'Content-Transfer-Encoding: 8bit',
    'From: '
    . $encodedSenderName
    . ' <'
    . $senderEmail
    . '>',
    'X-Mailer: PHP/' . PHP_VERSION
);

if ($formType === 'message') {
    $headers[] = 'Reply-To: ' . $cleanEmail;
}


/*
 * Отправляем письмо.
 */
$isSent = mail(
    $recipient,
    $encodedSubject,
    $message,
    implode("\r\n", $headers)
);


/*
 * Если письмо не отправилось, возвращаем слот счётчика.
 */
if (!$isSent) {
    $slotReleased = releaseDailyEmailSlot($counterFile);

    if (!$slotReleased) {
        error_log(
            'Не удалось вернуть слот суточного счётчика.'
        );
    }

    error_log(
        'Ошибка отправки формы filpan.ru: '
        . 'mail() вернула false. IP: '
        . $remoteAddress
    );

    sendJson(
        false,
        'Письмо не отправлено. Попробуйте позже.',
        500
    );
}


/*
 * Успешный ответ.
 */
sendJson(
    true,
    'Спасибо! Ваша заявка успешно отправлена.',
    200
);