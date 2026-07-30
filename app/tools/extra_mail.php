<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/read_fl.php");
$site_mail=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/mail.txt");
$headers .= "From: Filpan <".$site_mail.">\r\n";

$message='Заказчик:'.$_REQUEST['FIO']."\r\n".'Телефон:'.$_REQUEST['tel_num']."\r\n".'Заказ:'.$_REQUEST['zakaz_txt'];


if(mail($site_mail, 'Экстра заказ', $message,$headers))
{

}

sleep(1);
?>