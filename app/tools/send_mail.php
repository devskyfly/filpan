<?php
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/read_fl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/smtp_mailer.php");
if (isset($_REQUEST['komanda']) && $_REQUEST['komanda']=="send")
{
$user=new user();

$site_mail=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/mail.txt");
$title="Заказ";

$message="Уважаемый ".$_REQUEST['user_name'].",благодарим Вас за заказ в нашем магазине.<br> В ближайшее время наш менеджер свяжется с Вами для уточнения условий заказа.<br>";
$message.=$user->show_korzina_mail();	
$message.="<br><strong>Благодарим за покупку!</strong>";
$customerEmailSent = true;
$adminEmailSent = true;

try {
    sendSiteSmtpMail(
        $_REQUEST['user_mail'],
        $title,
        $message
    );
} catch (Exception $exception) {
    error_log('Order confirmation email failed: ' . $exception->getMessage());
    $customerEmailSent = false;
}

$adminMessage=$user->show_korzina_mail();
$adminMessage.="<br><br>Покупатель<br>";
$adminMessage.="<br>Имя - ".$_REQUEST['user_name'];
$adminMessage.="<br>E-mail - ".$_REQUEST['user_mail'];
$adminMessage.="<br>Телефон - ".$_REQUEST['user_phone'];
$adminMessage.="<br>Адрес - ".$_REQUEST['user_adres'];

try {
    sendSiteSmtpMail(
        $site_mail,
        $title,
        $adminMessage,
        $_REQUEST['user_mail'],
        $_REQUEST['user_name']
    );
} catch (Exception $exception) {
    error_log('Order notification email failed: ' . $exception->getMessage());
    $adminEmailSent = false;
}

if (!$customerEmailSent || !$adminEmailSent) {
    echo '<div style="margin-left:auto;margin-right:auto;width:300px;text-align:center" class="text4">'
        . 'Не удалось отправить заказ по электронной почте. Попробуйте позже или свяжитесь с нами.'
        . '</div>';
} else {
echo "<div style=\"margin-left:auto;margin-right:auto;width:300px;text-align:center\" class=\"text4\">
Заказ отправлен.<br><br>
Уважаемый ".$_REQUEST['user_name']."!<br><br>
На Вашу почту направлено письмо с параметрами заказа.<br><br>

Благодарим за покупку!</div>";
}
	
	
	
	
	
	
	
}



?>