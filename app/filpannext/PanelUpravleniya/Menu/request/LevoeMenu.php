<?
$Statyi=new VidiStatyi();
$Statyi->poluchit();

echo '<div class="ContentLevayaKolonkaSredniyDiv">
<span class="ZagolovokContentLevayaKolonkaSredniyDiv TextZagolovokContentLevayaKolonkaSredniyDiv">
Статьи
</span>';
echo '<ul class="SpisokSsilokMenu">';
while ($Statyi->poluchitSleduyushiy()) 
{
	echo sprintf('<li><a class="Neaktivnaya" href="%sStatyi/?id=%s">%s</a></li>',$_WEB_ROOT_ADMIN_HREF,$Statyi->_TekushiyElement['id'],$Statyi->_TekushiyElement['nazvaniye_dliya_polzovateliya']);
}
echo '</ul>';
echo '</div>';
?>