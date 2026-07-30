<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
echo ElementTovarovUslug::poluchitCenuVDollarah($_REQUEST['cena'],$_REQUEST['valuta']);
?>