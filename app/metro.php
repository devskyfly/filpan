<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$menu_uslugi=new menu_1level_usl("usltprub","uslsodraz");
$menu_tovari=new menu_1level("tprub","sodraz");
$metro= new metro();
$spisok_statey= new statyi();
$spisok_news_statey= new news_statyi();
$title="Список обслуживаемых станций метро, где производится заправка картриджей";
$description='Заправка картриджей на станциях метро Москвы';
$keywords='Заправка картриджей рядом с метро';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="description"  <? echo "content=\"".$description."\""?> />
<meta name="keywords" <? echo "content=\"".$keywords."\""?> />
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/user_browser_find.php");
?>
<?echo "<title>".$title."</title>\n";?>
</head> 
<body>
<div class="container">
	<div class="header">
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/header_content.php");
	?>
	</div>
	<div class="content">
	
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/left_content.php");
	?>
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/right_content.php");
	?>
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/metro_middle_content.php");
	?>
			
	</div>
	<div class="bottom">
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/bottom_content.php");
	?>
	</div>
</div>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require_js.php");?>
</body>