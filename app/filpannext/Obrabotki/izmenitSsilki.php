<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/FunkciiIKlassi/FailKonfiguracii.php");

$Ssilki=new Ssilki();
$Ssilki->vibratPoliya('id');
$Ssilki->poluchit();

$kolichestvo=$Ssilki->poluchitKolichestvoElementovMassivaInformacii();
$Massiv=$Ssilki->poluchitMassivInformacii();

for($iterator=0;$iterator<$kolichestvo;$iterator++)
{
$ElementSsilka =new ElementSsilka();
$ElementSsilka ->poluchit($Massiv[$iterator]['id']);

$ssilka=$ElementSsilka->poluchitSvoystvo('ssilka');
$ssilka=str_replace ( '/', '', $ssilka);
print_r('<br>'.$ssilka);
$ElementSsilka->izmenitSvoystvo('ssilka',$ssilka);
$ElementSsilka->sohranit();
}
?>