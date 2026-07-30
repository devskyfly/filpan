<?
//if($_POST['AJAX']==1)
//{
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");
//}
$user=new user();


if($_GET['send_mail']==1)
{
$user->show_blank();
}
else
{
$user->show_korzina();
}
?>

