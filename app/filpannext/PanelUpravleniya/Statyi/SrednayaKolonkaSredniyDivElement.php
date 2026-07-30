<div class="ModulSredneyKolonki">
<?
$Statyi=new Statyi();


$MassivKriteriev=array();
$MassivKriteriev['vid_statyi_id']=$id;
$Statyi->poluchitPoKriteriyu($MassivKriteriev);
echo sprintf("<textarea id=\"input_vid_statyi_id\" class=\"TextovoyePole BezCKEDITOR ObyazatelnoyePole\" style=\"display:none\">%s</textarea>",$id);
?>
<div class="blockElementovRabochegoOkna">
			<input type="button" value="Создать новый элемент" id="sozdatNoviyElement"  class="knopka">	
			</div>
			<?
echo '<ul class="SpisokSsilokMenu">';
while ($Statyi->poluchitSleduyushiy()) 
{
	echo sprintf('<li><a class="Neaktivnaya" href="%sStatya/?id=%s">%s</li>',$_WEB_ROOT_ADMIN_HREF,$Statyi->_TekushiyElement['id'],$Statyi->_TekushiyElement['nazvaniye_statyi']);
}
echo '</ul>';
?>

</div>