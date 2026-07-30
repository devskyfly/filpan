<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");

if ($_POST['komanda']=="udaleniye")
{
$user=new user;
$user->delite_usl($_REQUEST['id']);
}



?>