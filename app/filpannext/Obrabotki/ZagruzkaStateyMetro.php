<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$Statyi=new Spisok('metro');

$Statyi->poluchit();

//$Ssilki=new Ssilki();

while($Statyi->poluchitSleduyushiy())
{
$id_tablici=111;

$Statya=new ElementStatya();
$Statya->izmenitSvoystvo('vid_statyi_id',$id_tablici);
$Statya->izmenitSvoystvo('nazvaniye_statyi',$Statyi->_TekushiyElement['metro']);
$Statya->izmenitSvoystvo('text_statyi',$Statyi->_TekushiyElement['streets']);
$Statya->izmenitSvoystvo('dop_text_statyi',$Statyi->_TekushiyElement['text']);

$Statya->izmenitSvoystvo('title',$Statyi->_TekushiyElement['title']);
$Statya->izmenitSvoystvo('keywords',$Statyi->_TekushiyElement['keywords']);
$Statya->izmenitSvoystvo('description',$Statyi->_TekushiyElement['description']);
$Statya->izmenitSvoystvo('ssilka',"current_metro.php?id=".$Statyi->_TekushiyElement['id']);
$Statya->izmenitSvoystvo('variant_otobrageniya',$_VARIANT_OTOBRAGENIYA_STATYI['statya_metro']);
$Statya->sozdat();


$SsilkaOsnovnaya=new ElementSsilka();
$SsilkaOsnovnaya->izmenitSvoystvo('tablica_id',$_VIDI_STRANIC['statya']);
$SsilkaOsnovnaya->izmenitSvoystvo('id_tablici',$Statya->poluchitSvoystvo('id'));
$SsilkaOsnovnaya->izmenitSvoystvo('ssilka',"current_metro.php?id=".$Statyi->_TekushiyElement['id']); 
$SsilkaOsnovnaya->izmenitSvoystvo('osnovnaya',1); 
$SsilkaOsnovnaya->sozdat();

}


?>