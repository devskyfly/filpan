<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$Menu=new Spisok('filpan_new_menu');
$Menu->vibratPoliya('id');
$Menu->poluchit();
$kolichestvoElementov=$Menu->poluchitKolichestvoElementovMassivaInformacii();

$Massiv=$Menu->poluchitMassivInformacii();


for($iterator=0;$iterator<$kolichestvoElementov;$iterator++)
{
$ElementMenu=new ElementMenu();
$ElementMenu->poluchit($Massiv[$iterator]['id']);
$Ssilka=$ElementMenu->poluchitOsnovnuyuSsilku($_STRANICI_SAYTA['filpan_new_menu']);
$ElementMenu->izmenitSvoystvo('ssilka',$Ssilka);
$ElementMenu->sohranit();
}

?>