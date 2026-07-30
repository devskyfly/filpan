<? 
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$id_tovara = $_REQUEST['id'];

function getSuitableCats($menu_id)
{
	global $SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH;
	$TekushiyElementMenu=new ElementMenu();
	$TekushiyElementMenu->poluchit($menu_id);
	$MassivRoditeleyElementovMenuDliyaSpiska=array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());
	array_push($MassivRoditeleyElementovMenuDliyaSpiska, $TekushiyElementMenu->poluchitSvoystvo('id'));
	
	//echo"<pre>";print_r($MassivRoditeleyElementovMenuDliyaSpiska);echo"</pre>";
		
	foreach($SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH as $key => $value)
	{
		foreach($value as $kkey=>$cat_id)
		{
			if(in_array($cat_id,$MassivRoditeleyElementovMenuDliyaSpiska))
			{
				return $key;
			}
		}
		//if(!empty(array_intersect($MassivRoditeleyElementovMenuDliyaSpiska, $value)))
		//{
		//	return $key;
		//}
	}
}

?>
<div class="SoputstvuyushieTovariIUslugiDlyaSoputstvuyushihTovarov">
    <?
    $ElementTovarovUslug = new ElementTovarovUslug();
    $ElementTovarovUslug->poluchit($id_tovara);
	
	$menu_id=$ElementTovarovUslug->poluchitSvoystvo('menu_id');
	
	$suitableCatMain=getSuitableCats($menu_id);

	//Перебор сопутствующих
	$SoputstvuyushieTovari=new SoputstvuyushieTovariIUslugi();
	$MassivKriteriev=array();
	$MassivKriteriev['id_tovara_uslugi']=$id_tovara;
	$SoputstvuyushieTovari->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
	$SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
	if($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii())
	{
		while($SoputstvuyushieTovari->poluchitSleduyushiy())
		{
			$ElementTovarovUslug=new ElementTovarovUslug();
			$ElementTovarovUslug->poluchit($SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);

			$menu_id=$ElementTovarovUslug->poluchitSvoystvo('menu_id');
			$suitableCat=getSuitableCats($menu_id);
			if(!in_array($suitableCat, $VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[$suitableCatMain]))
			{
				$suitableCat=0;
			}	
			$soputstvResult[$suitableCat][]=$SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi'];
		}
	}
		
	foreach ($VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[$suitableCatMain] as $key => $value){?>
        <div class="SoputstvuyushieTovari">
            <span class="ZagolovokSoputstvuyushieTovari"><?= $_PODVIDI_TOVAROV_USLUG_TEXT[$value]; ?></span>
			<div class="ObshiySpisokSoputstvuushixTovarov">
			<?
			if(isset($soputstvResult[$value]))
			{
				foreach ($soputstvResult[$value] as $elementKey => $elementId)
				{
					$ElementTovarov = new ElementTovarovUslug();
					$ElementTovarov->poluchit($elementId);
					echo sprintf('<div class="SoputstvuyushiyTovarElement">
							<div>
								<a href="%s"><img src="%s" class="KartinkaTovaraSoputstvuyushiyTovarElement" alt="%s"></a>
							</div>	
							<div class="ElementiContentaSoputstvuyushiyTovarElement">
								<a href="%s" class="SsilkaNaSoputstvushiyTovar">%s</a>
							</div>	
							<div class="ElementiContentaSoputstvuyushiyTovarElement">
								<span class="TextKartochkiTovara">Цена:</span><span class="Cena"> %s руб.</span>	
							</div>
							<input type="button" class="UdalitSvyaz OrangevayaKnopkaRezinovaya" value="Удалить связь"> 
							<input type="hidden" class="id_tovara" value="%s">
						</div>', $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'), $ElementTovarov->poluchitSvoystvo('nazvanie'), $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), mb_substr($ElementTovarov->poluchitSvoystvo('nazvanie'), 0, 100) . '...', ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'), $ElementTovarov->poluchitSvoystvo('valuta')), $ElementTovarov->poluchitSvoystvo('id'));
				}
			}
			?>	
			</div>				
		</div>	
	<?}
	
		if($soputstvResult[0])
		{?>
			<div class="SoputstvuyushieTovari">
				<span class="ZagolovokSoputstvuyushieTovari">Товары из других категорий</span>
				<div class="ObshiySpisokSoputstvuushixTovarov">
			<?
			foreach ($soputstvResult[0] as $elementKey => $elementId)
			{
				$ElementTovarov = new ElementTovarovUslug();
				$ElementTovarov->poluchit($elementId);
				echo sprintf('<div class="SoputstvuyushiyTovarElement">
						<div>
							<a href="%s"><img src="%s" class="KartinkaTovaraSoputstvuyushiyTovarElement" alt="%s"></a>
						</div>	
						<div class="ElementiContentaSoputstvuyushiyTovarElement">
							<a href="%s" class="SsilkaNaSoputstvushiyTovar">%s</a>
						</div>	
						<div class="ElementiContentaSoputstvuyushiyTovarElement">
							<span class="TextKartochkiTovara">Цена:</span><span class="Cena"> %s руб.</span>	
						</div>
						<input type="button" class="UdalitSvyaz OrangevayaKnopkaRezinovaya" value="Удалить связь"> 
						<input type="hidden" class="id_tovara" value="%s">
					</div>', $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'), $ElementTovarov->poluchitSvoystvo('nazvanie'), $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), mb_substr($ElementTovarov->poluchitSvoystvo('nazvanie'), 0, 100) . '...', ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'), $ElementTovarov->poluchitSvoystvo('valuta')), $ElementTovarov->poluchitSvoystvo('id'));
			}
			?>
				</div>
			</div>
		<?
		}
	?>
</div>
