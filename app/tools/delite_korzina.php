<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");
if ($_REQUEST['komanda']=="ochistit_korzinu")
{
$user=new user;
$user->clear_gifts();
$user->clear_usl();
echo "Корзина пуста";
}



?>