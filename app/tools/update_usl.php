<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");
if ($_REQUEST['komanda']=="obnovit")
{
$user=new user;
$user->update_usl($_REQUEST['id'],$_REQUEST['kolichestvo']);
}



?>