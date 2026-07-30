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

echo '<div class="ContentLevayaKolonkaSredniyDiv">
<span class="ZagolovokContentLevayaKolonkaSredniyDiv TextZagolovokContentLevayaKolonkaSredniyDiv">
Маркет
</span>';
echo '<ul class="SpisokSsilokMenu">';
echo sprintf('<li><a class="Neaktivnaya" href="%sTovariIUslugiMarket/index.php">%s</a></li>',$_WEB_ROOT_ADMIN_HREF,'Маркет');
echo '</ul>';
echo '</div>';

echo '<div class="ContentLevayaKolonkaSredniyDiv">
<span class="ZagolovokContentLevayaKolonkaSredniyDiv TextZagolovokContentLevayaKolonkaSredniyDiv">
Свойства
</span>';
echo '<ul class="SpisokSsilokMenu">';
	echo sprintf('<li><a class="Neaktivnaya" href="%sSvoystva/index.php">%s</a></li>',$_WEB_ROOT_ADMIN_HREF,'Свойства');
echo '</ul>';
echo '</div>';
?>