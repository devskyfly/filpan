<?
set_time_limit(0);
if($_GET['pwd']=="seoopt")
{
setcookie("password","fillll",time()+3600*24,"/", "filpan.ru");
}
if($_GET['pwd']=="fillll")
{
setcookie("password","fillll",time()+3600*24*365,"/", "filpan.ru");
}
setcookie("Welcome","go4server",time()+3600*24*365,"/", "filpan.ru");
//echo @$_COOKIE['Welcome'];
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/all_gifts.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/all_uslugi.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<Title>
Все товары и услуги
</Title>
</head> 
<body style="background-color:LightGrey;">
<?
if ($_COOKIE['password']!='fillll')
{
?>
<form name="input" action="all.php" method="get">
Password: <input type="password" name="pwd">
<input type="submit" value="Войти">
</form>
<?
}
else
{
$gifts=new all_gifts();
$gifts->show_all();
$uslugi=new all_uslugi();
$uslugi->show_all();
}

?>