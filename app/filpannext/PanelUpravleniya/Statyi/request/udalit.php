<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementStatya=new ElementStatya();
$ElementStatya->poluchit($_REQUEST['input_id']);
$ElementStatya->udalit();
menuVFail();
?>