<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");


$id=$_REQUEST['id'];
$id_soput=$_REQUEST['id_soput'];

$ElementSoputstvuyushyiTovarIUslugi=new ElementSoputstvuyushyiTovarIUslugi();
$ElementSoputstvuyushyiTovarIUslugi->sozdat($id,$id_soput);

?>