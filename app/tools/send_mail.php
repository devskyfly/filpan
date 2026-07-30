<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/read_fl.php");
if ($_REQUEST['komanda']=="send")
{
$user=new user();





$site_mail=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/mail.txt");
$title="Заказ";
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

$headers .= "From: Filpan <".$site_mail.">\r\n";
//$headers .= "Cc: ".$site_mail."\r\n";
//$headers .= "Bcc: ".$site_mail."\r\n";



$message="Уважаемый ".$_REQUEST['user_name'].",благодарим Вас за заказ в нашем магазине.<br> В ближайшее время наш менеджер свяжется с Вами для уточнения условий заказа.<br>";
$message.=$user->show_korzina_mail();	
$message.="<br><strong>Благодарим за покупку!</strong>";



if(mail($_REQUEST['user_mail'], $title, $message,$headers))
{

}

sleep(1);
	

/* Для отправки HTML-почты вы можете установить шапку Content-type. */
$site_mail=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/mail.txt");
$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

/* дополнительные шапки */
$headers .= "From:<".$site_mail.">\r\n";
//$headers .= "Cc: ".$site_mail."\r\n";
//$headers .= "Bcc: ".$site_mail."\r\n";


$title="Заказ";


$message=$user->show_korzina_mail();	
$message.="<br><br>Покупатель<br>";
$message.="<br>Имя - ".$_REQUEST['user_name'];
$message.="<br>E-mail - ".$_REQUEST['user_mail'];
$message.="<br>Телефон - ".$_REQUEST['user_phone'];
$message.="<br>Адрес - ".$_REQUEST['user_adres'];


if(mail($site_mail, $title, $message,$headers))
{
echo "<div style=\"margin-left:auto;margin-right:auto;width:300px;text-align:center\" class=\"text4\">
Заказ отправлен.<br><br>
Уважаемый ".$_REQUEST['user_name']."!<br><br>
На Вашу почту направлено письмо с параметрами заказа.<br><br>

Благодарим за покупку!</div>";
}	
	
	
	
	
	
	
	
}



?>