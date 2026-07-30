<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
echo ElementTovarovUslug::poluchitCenuVRubliach($_REQUEST['cena'],$_REQUEST['valuta']);
?>