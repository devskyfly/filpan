<?php

use PHPMailer\PHPMailer\PHPMailer;

/*
 * Тестовая отправка письма через SMTP REG.RU.
 * Совместимо с PHP 5.6.
 *
 * Запуск:
 * php app/feedback/send-test-email.php
 */

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit("Скрипт можно запускать только из командной строки.\n");
}

require_once __DIR__ . '/vendor/autoload.php';

function getTestMailEnvironmentValue($name, $defaultValue)
{
    $value = getenv($name);

    if ($value === false || trim($value) === '') {
        return $defaultValue;
    }

    return trim($value);
}

$smtpHost = getTestMailEnvironmentValue(
    'SMTP_HOST',
    'mail.hosting.reg.ru'
);
$smtpPort = (int) getTestMailEnvironmentValue('SMTP_PORT', '587');
$smtpEncryption = strtolower(
    getTestMailEnvironmentValue('SMTP_ENCRYPTION', 'tls')
);
$smtpUsername = getTestMailEnvironmentValue('SMTP_USERNAME', 'no-reply@filpan.ru');
$smtpPassword = getTestMailEnvironmentValue('SMTP_PASSWORD', 'qwF-5Gi-9rZ-Gd9');
$senderEmail = getTestMailEnvironmentValue(
    'SMTP_FROM_EMAIL',
    $smtpUsername
);
$senderName = getTestMailEnvironmentValue(
    'SMTP_FROM_NAME',
    'Сайт filpan.ru'
);

$recipient = 'devskyfly@gmail.com';

if (
    $smtpUsername === ''
    || $smtpPassword === ''
    || !filter_var($senderEmail, FILTER_VALIDATE_EMAIL)
    || $smtpPort < 1
    || $smtpPort > 65535
    || !in_array($smtpEncryption, array('tls', 'ssl'), true)
) {
    fwrite(
        STDERR,
        "Не заданы или некорректны SMTP-параметры. "
        . "Проверьте SMTP_USERNAME, SMTP_PASSWORD, "
        . "SMTP_FROM_EMAIL, SMTP_PORT и SMTP_ENCRYPTION.\n"
    );
    exit(1);
}

$mailer = new PHPMailer(true);

try {
    $mailer->isSMTP();
    $mailer->Host = $smtpHost;
    $mailer->Port = $smtpPort;
    $mailer->SMTPAuth = true;
    $mailer->Username = $smtpUsername;
    $mailer->Password = $smtpPassword;
    $mailer->SMTPSecure = $smtpEncryption;
    $mailer->Timeout = 30;

    $mailer->CharSet = 'UTF-8';
    $mailer->Encoding = 'base64';
    $mailer->isHTML(false);

    $mailer->setFrom($senderEmail, $senderName);
    $mailer->addAddress($recipient);
    $mailer->Subject = 'Тест SMTP с сайта filpan.ru';
    $mailer->Body = "Это тестовое письмо с сайта filpan.ru.\r\n"
        . 'Дата отправки: '
        . date('Y-m-d H:i:s T');

    $mailer->send();

    echo 'Письмо успешно отправлено на ' . $recipient . ".\n";
    exit(0);
} catch (Exception $exception) {
    fwrite(
        STDERR,
        'Ошибка отправки: ' . $exception->getMessage() . "\n"
    );
    exit(1);
}
