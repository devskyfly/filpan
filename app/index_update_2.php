<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

$user=new user();
$menu_uslugi=new menu_1level_usl("usltprub","uslsodraz");
$menu_tovari=new menu_1level("tprub","sodraz");
$spisok_statey= new statyi();
$spisok_news_statey= new news_statyi();

$title=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/index/default_title.txt");
$description=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/index/default_description.txt");
$keywords=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/index/default_keywords.txt");
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
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/user_browser.php");
?>

<?echo "<title>".$title."</title>\n";?>
</head> 
<body>
<div class="z_window_main" id="z_window_main">
</div>
<div class="z_window" id="z_window">
<?$user->show_korzina();?>
<input type="button" value="Закрыть" style="padding:5px;margin-right:10px;float:right;background-color:#FF6600;color:#FFFFFF;border-radius:10px;cursor:pointer;" id="close_window">
</div>
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
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/index_middle_content_update_2.php");
	?>
			
	</div>
	<div class="bottom">
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/bottom_content.php");
	?>
	</div>
</div>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require_js.php");?>
<script>$('document').ready(function(){button_element=$('#close_window');button_element.click(function(){hide_korzina()})});</script>
</body>