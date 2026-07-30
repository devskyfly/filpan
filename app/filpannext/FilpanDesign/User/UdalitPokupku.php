<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

$User= new ElementUserLog();
$id=$_POST['id'];
$User->UdalitTovarIzKorzini($id);
?>