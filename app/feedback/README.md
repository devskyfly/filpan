# Отправка писем формы обратной связи

Обработчик использует PHPMailer и отправляет письма через авторизованный SMTP.
Он совместим с PHP 5.6.

## Установка зависимости

```bash
composer install --working-dir=app/feedback --no-dev --optimize-autoloader
```

## Настройка

Создайте существующий ящик на домене `filpan.ru` и задайте переменные:

```dotenv
SMTP_HOST=mail.hosting.reg.ru
SMTP_PORT=587
SMTP_ENCRYPTION=tls
SMTP_USERNAME=no-reply@filpan.ru
SMTP_PASSWORD=replace-with-mailbox-password
SMTP_FROM_EMAIL=no-reply@filpan.ru
SMTP_FROM_NAME=Сайт filpan.ru
FEEDBACK_RECIPIENT=filpan@yandex.ru
```

`env/.env` уже отслеживается Git, поэтому реальный `SMTP_PASSWORD` туда
добавлять нельзя. Передайте секрет через окружение сервера, CI/CD или механизм
секретов хостинга. На хостинге без Docker задайте те же переменные в панели
управления или конфигурации веб-сервера.
