<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");

//print_r($_POST);
if ($_POST['komanda']=="udaleniye")
{
$user=new user;
$user->delite_gift($_POST['id']);
}
?>