<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementStatya=new ElementStatya();
$ElementStatya->poluchit($_REQUEST['input_id']);
$ElementStatya->dobavitSsilku($_REQUEST['input_ssilka'],$_REQUEST['input_osnovnaya']);

?>