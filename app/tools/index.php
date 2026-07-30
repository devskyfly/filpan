<?
if($_GET['pwd']=="filpan_Random")
{
setcookie("filpan_access","yes",time()+3600*24*365,"/", "filpan.ru");
}

//echo @$_COOKIE['Welcome'];
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<style type="text/css">
.simpl_link
{
}

.simpl_link:visited
{ 
color:black;
}

.simpl_link:link
{ 
color:black;
}

.simpl_link:hover
{ 
color:black;
}

.simpl_link:active
{ 
color:black;
}
</style>

<Title>
Административная часть
</Title>
</head> 
<body style="background-color:LightGrey;">
<?
if ($_COOKIE['filpan_access']!='yes')
{
?>
<form name="input" action="index.php" method="get">
Password: <input type="password" name="pwd">
<input type="submit" value="Войти">
</form>
<?
}
else
{

?>

<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">
<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<ul>
<H3>НАПОЛНЕНИЕ САЙТА</H3>
<li>
<a class="simpl_link" href="edit_gifts/index.php">Редактирование товаров</a>
</li>
<li>
<a class="simpl_link" href="edit_uslugi/index.php">Редактирование услуг</a>
</li>
</ul>
</div>


<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<ul>
<H3>РЕДАКТИРОВАИЕ РАЗДЕЛОВ</H3>
<li>
<a class="simpl_link" href="edit_razdel_gifts/index.php">Редактирование разделов товары</a>
</li>
<li>
<a class="simpl_link" href="edit_razdel_uslugi/index.php">Редактирование разделов услуги</a>
</li>
</ul>
</div>

<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<ul>
<H3>ОТЧЕТЫ</H3>
<li>
<a class="simpl_link" href="market/index.php">Опубликовано в яндекс маркет</a>
</li>

</ul>
</div>

<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<ul>
<H3>СТАТЬИ</H3>
<li>
<a class="simpl_link" href="statyi_tov/index.php">Статьи по подразделам</a>
</li>
<li>
<a class="simpl_link" href="statyi/index.php">Свободные статьи</a>
</li>
<li>
<a class="simpl_link" href="index_statyi_free/index.php">Статьи индексной страницы сверху</a>
</li>
<li>
<a class="simpl_link" href="index_statyi/index.php">Статьи индексной страницы услуги</a>
</li>
<li>
<a class="simpl_link" href="index_statyi_gift/index.php">Статьи индексной страницы товары</a>
</li>
<li>
<a class="simpl_link" href="left_menu_statyi/index.php">Статьи в левом меню</a>
</li>
<li>
<a class="simpl_link" href="news_statyi/index.php">Статьи новостей</a>
</li>
<li>
<a class="simpl_link" href="oplata_statyi/index.php">Статьи на странице оплата</a>
</li>
<li>
<a class="simpl_link" href="dostavka_statyi/index.php">Статьи на странице доставка</a>
</li>
<li>
<a class="simpl_link" href="kontakti_statyi/index.php">Статьи на странице контакты</a>
</li>
<li>
<a class="simpl_link" href="garantiya_statyi/index.php">Статьи на странице гарантии</a>
</li>
<li>
<a class="simpl_link" href="vagno_statyi/index.php">Статьи на странице важно знать</a>
</li>
<li>
<a class="simpl_link" href="nashi_partnery_statyi/index.php">Наши партнеры</a>
</li>
</ul>
</div>

<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<ul>
<H3>МЕТРО</H3>
<li>
<a class="simpl_link" href="metro/index.php">Станции метро</a>
</li>
</ul>
</div>

</div>		
<?}?>
<?$yml=new yml_request();?>
<?$yml_usl=new yml_request_usl();?>
<?write_yml($yml,$yml_usl);?>
</body>


