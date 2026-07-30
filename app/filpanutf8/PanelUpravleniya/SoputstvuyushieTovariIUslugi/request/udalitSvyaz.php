<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$id=$_REQUEST['id'];
$id_soput=$_REQUEST['id_soput'];

$ElementSoputstvuyushyiTovarIUslugi=new ElementSoputstvuyushyiTovarIUslugi();

$MassivKriteriev=array();
$MassivKriteriev['id_tovara_uslugi']=$id;
$MassivKriteriev['id_soputstvuyushego_tovara_uslugi']=$id_soput;

$ElementSoputstvuyushyiTovarIUslugi->poluchitPoKriteriyu($MassivKriteriev);

$ElementSoputstvuyushyiTovarIUslugi->udalit();


$ElementSoputstvuyushyiTovarIUslugi=new ElementSoputstvuyushyiTovarIUslugi();

$MassivKriteriev=array();
$MassivKriteriev['id_tovara_uslugi']=$id_soput;
$MassivKriteriev['id_soputstvuyushego_tovara_uslugi']=$id;

$ElementSoputstvuyushyiTovarIUslugi->poluchitPoKriteriyu($MassivKriteriev);

$ElementSoputstvuyushyiTovarIUslugi->udalit();

?>