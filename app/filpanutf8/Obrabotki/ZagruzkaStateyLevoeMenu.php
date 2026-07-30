<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$Statyi=new Spisok('left_menu_statyi');

$Statyi->poluchit();

//$Ssilki=new Ssilki();

while($Statyi->poluchitSleduyushiy())
{
$Statya=new ElementStatya();
$Statya->izmenitSvoystvo('vid_statyi_id',107);
$Statya->izmenitSvoystvo('nazvaniye_statyi',$Statyi->_TekushiyElement['name_statyi']);
$Statya->izmenitSvoystvo('text_statyi',$Statyi->_TekushiyElement['text_statyi']);
$Statya->sozdat();
}


?>