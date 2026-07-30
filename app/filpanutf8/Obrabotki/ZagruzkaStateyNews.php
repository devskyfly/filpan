<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$Statyi=new Spisok('news_table');

$Statyi->poluchit();

//$Ssilki=new Ssilki();

while($Statyi->poluchitSleduyushiy())
{
$id_tablici=109;

$Statya=new ElementStatya();
$Statya->izmenitSvoystvo('vid_statyi_id',$id_tablici);
$Statya->izmenitSvoystvo('nazvaniye_statyi',$Statyi->_TekushiyElement['name_statyi']);
$Statya->izmenitSvoystvo('text_statyi',$Statyi->_TekushiyElement['text_statyi']);
$Statya->izmenitSvoystvo('title',$Statyi->_TekushiyElement['title']);
$Statya->izmenitSvoystvo('keywords',$Statyi->_TekushiyElement['keywords']);
$Statya->izmenitSvoystvo('description',$Statyi->_TekushiyElement['descr']);
$Statya->izmenitSvoystvo('ssilka',"news/index.php?id=".$Statyi->_TekushiyElement['id']);


$Statya->sozdat();


$SsilkaOsnovnaya=new ElementSsilka();
$SsilkaOsnovnaya->izmenitSvoystvo('tablica_id',$_VIDI_STRANIC['statya']);
$SsilkaOsnovnaya->izmenitSvoystvo('id_tablici',$Statya->poluchitSvoystvo('id'));
$SsilkaOsnovnaya->izmenitSvoystvo('ssilka',"news/index.php?id=".$Statyi->_TekushiyElement['id']); 
$SsilkaOsnovnaya->izmenitSvoystvo('osnovnaya',1); 
$SsilkaOsnovnaya->sozdat();

}


?>