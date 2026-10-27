<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/../../feedback/vendor/autoload.php';

function getSmtpEnvironmentValue($name, $defaultValue)
{
    $value = getenv($name);

    if ($value === false || trim($value) === '') {
        return $defaultValue;
    }

    return trim($value);
}

function sendSiteSmtpMail($recipient, $subject, $htmlBody, $replyToEmail = null, $replyToName = '')
{
    $smtpHost = getSmtpEnvironmentValue('SMTP_HOST', 'mail.hosting.reg.ru');
    $smtpPort = (int) getSmtpEnvironmentValue('SMTP_PORT', '587');
    $smtpEncryption = strtolower(
        getSmtpEnvironmentValue('SMTP_ENCRYPTION', 'tls')
    );
    $smtpUsername = getSmtpEnvironmentValue('SMTP_USERNAME', 'no-reply@filpan.ru');
    $smtpPassword = getSmtpEnvironmentValue('SMTP_PASSWORD', 'qwF-5Gi-9rZ-Gd9');
    $senderEmail = getSmtpEnvironmentValue('SMTP_FROM_EMAIL', $smtpUsername);
    $senderName = getSmtpEnvironmentValue('SMTP_FROM_NAME', 'Сайт filpan.ru');

    if (
        $smtpHost === ''
        || $smtpUsername === ''
        || $smtpPassword === ''
        || !filter_var($senderEmail, FILTER_VALIDATE_EMAIL)
        || $smtpPort < 1
        || $smtpPort > 65535
        || !in_array($smtpEncryption, array('tls', 'ssl'), true)
    ) {
        throw new RuntimeException('Некорректные настройки SMTP.');
    }

    $mailer = new PHPMailer(true);
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
    $mailer->isHTML(true);
    $mailer->setFrom($senderEmail, $senderName);
    $mailer->addAddress($recipient);

    if ($replyToEmail !== null && $replyToEmail !== '') {
        $mailer->addReplyTo($replyToEmail, $replyToName);
    }

    $mailer->Subject = $subject;
    $mailer->Body = $htmlBody;
    $mailer->send();
}
