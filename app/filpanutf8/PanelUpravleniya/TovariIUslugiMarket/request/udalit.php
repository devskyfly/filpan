<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementMenu=new ElementMenu();
$ElementMenu->poluchit($_REQUEST['input_id']);
$ElementMenu->udalit();
menuVFail();
?>