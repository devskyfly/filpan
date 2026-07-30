<?	session_start();?>

<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.0//EN""http://www.w3.org/TR/REC-html40/strict.dtd">
<?	
	$parametr_array['razdel']=$razdel;
	$parametr_array['podrazdel']=$podrazdel;
	$parametr_array['podpunkt']=$podpunkt;
	$parametr_array['proizvoditel']=$proizvoditel;
	$parametr_array['funkcionalnost']=$funkcionalnost;
	//print_r($parametr_array);
?>
<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/require.php')?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru"> 
<head>
<link rel="icon" href="http://www.samsung.filpan.ru/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://www.samsung.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="google-site-verification" content="MnR5AHYfpaZD5W4oWGAbaQtt7RhIOQ-pizgnQ2f7tMU" />
<META name="owner" content="www.samsung.filpan.ru">
<meta name="Robots" content="INDEX, FOLLOW">
<META name="publisher_name" content=www.samsung.filpan.ru>
<META name="publisher_location" content="RU">
<META name="home_url" content="http://www.samsung.filpan.ru">
<META http-equiv="Content-Language" content="ru">
<META name="title" content="FILPAN-Заправка картриджа, заправка картриджей, заправка картриджа в Москве, срочная заправка картриджа fipan филпан">
<meta name="keywords" content="Заправка картриджей, заправка картриджей с выездом, заправка картриджа в Москве, срочная заправка картриджа,заправка картриджа hp,заправка картриджа samsung,заправка картриджа xerox, заправка картриджа canon,предлагаем вам профессиональную заправку картриджей Hp, Canon, Samsung, Lexmark, Xerox, Epson заправку струйных картриджей, заправка картриджей копиры, ксероксы, копиры Canon, fipan, филпан, заправка картриджей Samsung, заправка картриджей Canon, заправка картриджей Brother, заправка картриджей Xerox, заправка картриджей hp, заправка картриджей Lexmark, заправка картриджей Kyocera, заправка картриджей Panasonic, заправка картриджей Sharp">
<meta name="description" content="Заправка картриджей, заправка картриджей с выездом, заправка картриджа в Москве, срочная заправка картриджа,заправка картриджа hp,заправка картриджа samsung,заправка картриджа xerox, заправка картриджа canon, копиры, ксероксы, копиры Canon, fipan, филпан">
<meta name="Copyright" content="FILPAN.RU, Copyright 2010">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">  
<SCRIPT language='javascript'>
function pokupka()
{
window.open("http://www.samsung.filpan.ru/index.php", "Pokupka", "width=300,height=300,toolbar=0");
}
</SCRIPT>


<title>
<?require_once($_SERVER['DOCUMENT_ROOT'].'/shablon/title.php');?>
</title>





<link rel="stylesheet" type="text/css" href="style_all.css" />  
</head>
<body> 
<?

?>



<!--TOP PART-->
<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/shablon/top_part.php')?>
<!--CONTENT-->
<div id='content'>
<table border="0"   cellpadding="0" cellspacing="0" bgcolor="#F6F6F6">
  <tr>
    <td  width="20%" style="min-width:300px; vertical-align:top"><?php  require_once($_SERVER['DOCUMENT_ROOT'].'/shablon/left_part.php')?></td>
	<td valign="top" width="70%" style="min-width:600px"><?php  require_once($_SERVER['DOCUMENT_ROOT'].'/shablon/centr_part_search.php')?></td>
    <td valign="top" width="10%" style="min-width:200px"><?php  require_once($_SERVER['DOCUMENT_ROOT'].'/shablon/right_part.php')?></td>
  </tr>
</table>
</div>
<!--BOTTOM-->
<div id='bottom'>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shablon/bottom_part.php')?>
</div>
</body> 
</html>

