<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

$User= new ElementUserLog();

$id=$_POST['id'];
$kolichestvo=$_POST['kolichestvo'];
$User->DobavitNeskolkoTovarovVKorzinu($id,$kolichestvo);

$Tovar=new ElementTovarovUslug();
$Tovar->poluchit($id);
echo "В корзину добавлено: ".str_replace('_***_',$Tovar->poluchitSvoystvo('kluchevoe_slovo'),$Tovar->poluchitSvoystvo('nazvanie'))." - ".$kolichestvo."шт.";
?>