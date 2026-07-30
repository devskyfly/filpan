
<?
require_once('Menu.php');
// $DIV[0]['n']="<div class='ContentLevayaKolonkaSredniyDiv'><span class='ZagolovokContentLevayaKolonkaSredniyDiv TextZagolovokContentLevayaKolonkaSredniyDiv'>%s</span>";
// $DIV[0]['k']="</div>";
// $UL[1]['n']="<ul class='SpisokSsilokMenu'>\r\n";
// $UL[1]['k']="</ul>\r\n";
// $UL[2]['n']="<ul class='SpisokSsilokMenu'>\r\n";
// $UL[2]['k']="</ul>\r\n";
// $LI[1]['n']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Neaktivnaya'>%s</a></li>\r\n";
// $LI[1]['n_aktivnay']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Aktivnay'>%s</a></li>\r\n";
// $LI[2]['n']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Neaktivnaya'>%s</a></li>\r\n";
// $LI[2]['n_aktivnay']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Aktivnay'>%s</a></li>\r\n";
// $IerarhicheskiySpisok=new Menu();
// $IerarhicheskiySpisok->_DIV=$DIV;
// $IerarhicheskiySpisok->_UL=$UL;
// $IerarhicheskiySpisok->_LI=$LI;
// $IerarhicheskiySpisok->_KolichestvoOpisannixUrovneyVlogennosti=2;
// $IerarhicheskiySpisok->vibratPoliya('title,ssilka');
// $IerarhicheskiySpisok->vivestiDerevom($id);
?>	


<?if($NoIndex==1)
{
echo "<noindex>";
}?>
<?
$StatyiVLevomMenu=new Statyi();
$MassivKriteriev=array();
$MassivKriteriev['vid_statyi_id']=107;
$StatyiVLevomMenu->poluchitPoKriteriyu($MassivKriteriev);
$iteratorNoIndex=1;
while($StatyiVLevomMenu->poluchitSleduyushiy())
{



if($iteratorNoIndex!=3)
 	{
 			
 
 
echo 
sprintf('
<div class="ContentLevayaKolonka">
<span class="ZagolovokContentLevayaKolonka TextZagolovokContentLevayaKolonkaSredniyDiv">%s</span>
%s
</div>',$StatyiVLevomMenu->_TekushiyElement['nazvaniye_statyi'],$StatyiVLevomMenu->_TekushiyElement['text_statyi']);
	}

$iteratorNoIndex++;
}
?>




<?
$StatyiVLevomMenu=new Statyi();

$VidStatyi=new ElementVidStatyi();

$MassivKriteriev=array();
$MassivKriteriev['vid_statyi_id']=109;

$VidStatyi->poluchit($MassivKriteriev['vid_statyi_id']);
$StatyiVLevomMenu->poluchitPoKriteriyu($MassivKriteriev);
echo sprintf('<div class="ContentLevayaKolonka">
<span class="ZagolovokContentLevayaKolonka TextZagolovokContentLevayaKolonkaSredniyDiv">%s</span>',$VidStatyi->poluchitSvoystvo('nazvaniye_dliya_polzovateliya'));
echo '<ul class="SpisokSsilok">';

while($StatyiVLevomMenu->poluchitSleduyushiy())
{
echo sprintf('<li><a href="%s%s">%s</a></li>',$_WEB_ROOT_HREF,$StatyiVLevomMenu->_TekushiyElement['ssilka'],$StatyiVLevomMenu->_TekushiyElement['nazvaniye_statyi']);
}
echo '</ul>';
echo sprintf('<a class="SsilkaNazvanieVTablice" href="%s%s">Смотрите также...</a>',$_WEB_ROOT_HREF,$VidStatyi->poluchitSvoystvo('ssilka'));
echo sprintf('</div>');
?>



<?
$StatyiVLevomMenu=new Statyi();

$VidStatyi=new ElementVidStatyi();

$MassivKriteriev=array();
$MassivKriteriev['vid_statyi_id']=110;

$VidStatyi->poluchit($MassivKriteriev['vid_statyi_id']);
$StatyiVLevomMenu->poluchitPoKriteriyu($MassivKriteriev);
echo sprintf('<div class="ContentLevayaKolonka">
<span class="ZagolovokContentLevayaKolonka TextZagolovokContentLevayaKolonkaSredniyDiv">%s</span>',$VidStatyi->poluchitSvoystvo('nazvaniye_dliya_polzovateliya'));
echo '<ul class="SpisokSsilok">';

while($StatyiVLevomMenu->poluchitSleduyushiy())
{
echo sprintf('<li><a href="%s%s">%s</a></li>',$_WEB_ROOT_HREF,$StatyiVLevomMenu->_TekushiyElement['ssilka'],$StatyiVLevomMenu->_TekushiyElement['nazvaniye_statyi']);
}
echo '</ul>';

echo sprintf('<a class="SsilkaNazvanieVTablice" href="%s%s">Смотрите также...</a>',$_WEB_ROOT_HREF,$VidStatyi->poluchitSvoystvo('ssilka'));
echo sprintf('</div>');

if($NoIndex==1)
{
echo "</noindex>";
}
?>
