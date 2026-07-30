<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementSvoystvo=new ElementSvoystva();
$ElementSvoystvo->poluchit($_REQUEST['input_id']);
$ElementSvoystvo->udalit();
?>