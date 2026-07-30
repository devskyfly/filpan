<?session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/require.php')?>
<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.0//EN""http://www.w3.org/TR/REC-html40/strict.dtd">
<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/require.php')?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru"> 
<head>
<link rel="icon" href="http://www.samsung.filpan.ru/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://www.samsung.filpan.ru/images/favicon.ico" type="image/x-icon"> 
<link rel="stylesheet" type="text/css" href="style_all.css" />  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="google-site-verification" content="MnR5AHYfpaZD5W4oWGAbaQtt7RhIOQ-pizgnQ2f7tMU" />
<META name="owner" content="www.samsung.filpan.ru">
<meta name="Robots" content="INDEX, FOLLOW">
<META name="publisher_name" content=www.filpan.ru>
<META name="publisher_location" content="RU">
<META name="home_url" content="http://www.samsung.filpan.ru">
<META http-equiv="Content-Language" content="ru">
<META name="title" content="FILPAN-Заправка картриджа, заправка картриджей, заправка картриджа в Москве, срочная заправка картриджа fipan филпан">
<meta name="keywords" content="Заправка картриджей, заправка картриджей с выездом, заправка картриджа в Москве, срочная заправка картриджа,заправка картриджа hp,заправка картриджа samsung,заправка картриджа xerox, заправка картриджа canon,предлагаем вам профессиональную заправку картриджей Hp, Canon, Samsung, Lexmark, Xerox, Epson заправку струйных картриджей, заправка картриджей копиры, ксероксы, копиры Canon, fipan, филпан, заправка картриджей Samsung, заправка картриджей Canon, заправка картриджей Brother, заправка картриджей Xerox, заправка картриджей hp, заправка картриджей Lexmark, заправка картриджей Kyocera, заправка картриджей Panasonic, заправка картриджей Sharp">
<meta name="description" content="Заправка картриджей, заправка картриджей с выездом, заправка картриджа в Москве, срочная заправка картриджа,заправка картриджа hp,заправка картриджа samsung,заправка картриджа xerox, заправка картриджа canon, копиры, ксероксы, копиры Canon, fipan, филпан">
<meta name="Copyright" content="FILPAN.RU, Copyright 2010">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">  
<title>Филпан - Копиры Canon
(Заправка картриджей - срочно! Выезд! ) 776 -05 -70 filpan
</title>

</head>
<body onBlur="window.close( )">
<? 
$db=new date_base;

$db->db_poisk_tovara(&$input_array_tovar,$razdel,$podrazdel,$id_tov);

if(!$db->db_poisk_v_korzine($_SESSION['id'],$input_array_tovar,&$kol_vo,&$id_korz))
{
if($db->db_vvod_v_korzinu($input_array_tovar,$_SESSION['id']))
{
?>
<div>
Товар добавлен в корзину<BR>
<img src="http://www.filpan.ru/images/index_img/TOP/korz.gif"  alt="text"></a>&nbsp;&nbsp;&nbsp;<a target='korazina' href="http://www.samsung.filpan.ru/sod_korzini.php">Ваша корзина</a>
<br> Закройте это окно
<div>
<?
}
else
{
?>
<div>
Товар не добавлен в корзину<br> Закройте это окно
<div>
<?
}
}
else
{

if($db->db_vvod_v_korzinu_dobavim_1($id_korz,$kol_vo))
{
?>
<div>
Товар добавлен в корзину<BR>
<img src="http://www.filpan.ru/images/index_img/TOP/korz.gif"  alt="text"></a>&nbsp;&nbsp;&nbsp;<a target='korzina' href="http://www.samsung.filpan.ru/sod_korzini.php">Ваша корзина</a>
<br> Закройте это окно
<div>
<?
}
else
{
?>
<div>
Товар не добавлен в корзину
<br> Закройте это окно
<div>
<?
}
}

?>

</body> 
</html>

