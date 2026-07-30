<?
require($_SERVER['DOCUMENT_ROOT']."/function/site_inf/back_link.php");
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";

$link = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_select_db($database, $link) or die("Не могу выбрать базу");


$query="UPDATE sodraz SET nazv='".iconv("UTF-8","windows-1251", $_POST['nazv'])."', descr='".iconv("UTF-8","windows-1251",$_POST['descr'])."',xcl='".iconv("UTF-8","windows-1251",$_POST['xcl'])."',pict='".iconv("UTF-8","windows-1251",$_POST['pict'])."',pict1='".iconv("UTF-8","windows-1251",$_POST['pict1'])."',super='".iconv("UTF-8","windows-1251",$_POST['super'])."',mark='".iconv("UTF-8","windows-1251",$_POST['mark'])."',local_del='".iconv("UTF-8","windows-1251",$_POST['local_del'])."',bid='".iconv("UTF-8","windows-1251",$_POST['bid'])."',price='".iconv("UTF-8","windows-1251",$_POST['price'])."',soptov='".iconv("UTF-8","windows-1251",$_POST['soptov'])."',sopuslugi='".iconv("UTF-8","windows-1251",$_POST['sopuslugi'])."',db_description='".iconv("UTF-8","windows-1251",$_POST['db_description'])."',db_keywords='".iconv("UTF-8","windows-1251",$_POST['db_keywords'])."' WHERE id='".$_POST['id']."'";


$result = mysql_query($query);
select_unit($_POST['id'],'sodraz');
if($result){
echo "Позиция сохранена";
}
else
{
echo "Ошибка!!!";
}
?>