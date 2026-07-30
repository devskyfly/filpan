<?
			
			$MassivRoditeleyElementaMenu=array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());

			$TekushiyElementMenu->poluchitPodchinennieElementi();


			$SpisokTovarov=new TovariUslugi();
			$SpisokTovarov->vibratPoliya('nazvanie,cena,picture,ssilka,id,valuta');
			$SpisokTovarov->uporyadochitPoVozrastaniyu('cena');
			$MassivRoditeleyElementovMenuDliyaSpiska=$TekushiyElementMenu->poluchitPodchinennieElementi();
			array_push($MassivRoditeleyElementovMenuDliyaSpiska, $TekushiyElementMenu->poluchitSvoystvo('id'));
			//print_r($MassivRoditeleyElementovMenuDliyaSpiska);
			$SpisokTovarov->poluchitPoKriteriyuPoStranicam($MassivRoditeleyElementovMenuDliyaSpiska,$_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'],$TekushayaPoziciyaStraniciSpiska);		
			
			$TextSverhu=$TekushiyElementMenu->poluchitSvoystvo('text_sverhu');
			if($TextSverhu!=''&&$TekushayaPoziciyaStraniciSpiska==1)
			echo sprintf('
				<div class="TextoviyModulSverhu">
				%s
				</div>',
			$TextSverhu);
			?>
			<?if($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii())
			{?>




<div class="pathhrefs" style="margin-top:10px;margin-bottom: 10px;margin-left: 30px;"> 
 <?
 // foreach ($MassivRoditeleyElementaMenu as $key => $value) {
// 	if($value!='')
// 	{
// 	$ElementMenuRoditel=new ElementMenu();
// 	$ElementMenuRoditel->poluchit($value);
// 		if($ElementMenuRoditel->poluchitSvoystvo('roditel')!=0)
// 		{
// 		echo sprintf('<a href="%s" class="path_href">%s</a> / ',
// 		$_WEB_ROOT_HREF.$ElementMenuRoditel->poluchitSvoystvo('ssilka'),
// 		$ElementMenuRoditel->poluchitSvoystvo('nazvanie'));	
// 		}
// 	}
// }
// echo sprintf('<a href="%s" class="path_href">%s</a>',
// $_WEB_ROOT_HREF.$TekushiyElementMenu->poluchitSvoystvo('ssilka'),
// $TekushiyElementMenu->poluchitSvoystvo('nazvanie'));	
?>
</div> 





			<div class="header_catalog">
				<caption>
				<?
					 
							// echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a>',
							// $_WEB_ROOT_HREF.$TekushiyElementMenu->poluchitSvoystvo('ssilka'),
							// $TekushiyElementMenu->poluchitSvoystvo('nazvanie'));



							foreach ($MassivRoditeleyElementaMenu as $key => $value) {
							if($value!='')
							{
							$ElementMenuRoditel=new ElementMenu();
							$ElementMenuRoditel->poluchit($value);
								if($ElementMenuRoditel->poluchitSvoystvo('roditel')!=0)
								{
								echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a> / ',
								$_WEB_ROOT_HREF.$ElementMenuRoditel->poluchitSvoystvo('ssilka'),
								$ElementMenuRoditel->poluchitSvoystvo('nazvanie'));	
								}
							}
						}
						echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a>',
						$_WEB_ROOT_HREF.$TekushiyElementMenu->poluchitSvoystvo('ssilka'),
						$TekushiyElementMenu->poluchitSvoystvo('nazvanie'));	
				?>
				</caption>
			</div>


			<!-- <div class="filter_catalog">
				<div class="param_block_filter_1">
					<div class="caption_filter">Наличие:</div>
						<select class="selector_filter">
							<option>...</option>
							<option>Есть</option>
							<option>Нет</option>
						</select>
				</div>
				<div class="param_block_filter_2">
					<div class="caption_filter">Новинки:</div>
						<select class="selector_filter">
							<option>...</option>
							<option>С начала</option>
							<option>В конце</option>
						</select>	
				</div>
				<div class="param_block_filter_3">
					<div class="caption_filter">Производитель:</div>
						<select class="selector_filter">
							<option>...</option>
							<option>Производитель 1</option>
							<option>Производитель 2</option>
							<option>Производитель 3</option>
							<option>Производитель 4</option>
							<option>Производитель 5</option>
							<option>Производитель 6</option>
							<option>Производитель 7</option>
						</select>	
	
				</div>
				<div class="button_filter">применить фильтр</div>
			</div>
 -->

			<table class="TablicaTovarov">

						<tr style="background-color: whitesmoke;">
						<td class="StolbecArticul TextStolbecArticul"> 
							<center>Код товара:</center>
						</td>
						<td class="StolbecIzobrageniye TextStolbecArticul">
							<center>Фото:</center>
						</td>
						<td class="StolbecNazvaniye TextStolbecArticul">
							<center>Наименование:</center>
						</td>
						<td class="StolbecCena TextStolbecArticul">
							<center>Цена:</center>
						</td>
						<td class="StolbecCena TextStolbecArticul">
							<center>Купить:</center>
						</td>
						</tr>








					<?
					while($SpisokTovarov->poluchitSleduyushiy())
					{
					echo sprintf('


						<tr class="row_hower_table">
						<td class="StolbecArticul TextStolbecArticul">№ %s</td>
						<td class="StolbecIzobrageniye">
							<a href="%s">
									<img src="%s" class="KartinkaTabliciTovarov" alt="%s">
							</a>
						</td>
						<td class="StolbecNazvaniye">
								<a href="%s" class="SsilkaNazvanieVTablice href_colorize">
									%s
								</a>	
						</td>

						<td class="StolbecCena">
						<center>
							<div class="ElementiContenta">
							<span class="Cena new_price_catalog"> %s руб.</span>	
							</div>
						</center>
						</td>


						<td class="StolbecCena">
							 
							<div class="counter_CatPRD">
								<input type="text" value="1" class="StrokaVvodaKolichestvo">	
								<div class="buton_buy_catalog KorzinaKupit">
									<img src="%sFilpanDesign/PageImages/buy_catalog_icon.png" class="catalog_buy_icon" id="tovar_usluga_%s" name="tovar_usluga_%s">
								</div>
							</div>

							<input type="hidden" value="%s">
						</td>
					</tr>


					',
					$SpisokTovarov->_TekushiyElement['id'],
					$_WEB_ROOT_HREF.$SpisokTovarov->_TekushiyElement['ssilka'],
					$_WEB_ROOT_IMG.$SpisokTovarov->_TekushiyElement['picture'],
					$SpisokTovarov->_TekushiyElement['nazvanie'],
					$_WEB_ROOT_HREF.$SpisokTovarov->_TekushiyElement['ssilka'],
					$SpisokTovarov->_TekushiyElement['nazvanie'],
					ElementTovarovUslug::poluchitCenuVRubliach($SpisokTovarov->_TekushiyElement['cena'],$SpisokTovarov->_TekushiyElement['valuta']),
					$_WEB_ROOT,
					$SpisokTovarov->_TekushiyElement['id'],
					$SpisokTovarov->_TekushiyElement['id'],
					$SpisokTovarov->_TekushiyElement['id']);
					}
					

				?></table>	 
				<?
				}
				else
				{
					//echo sprintf('<div class="TextoviyModulSverhu">Раздел пуст</div>');
				}
				?>

				<div class="ModulSsilokNaStraniciTablici">
				<?
				$iterator=1;
				$KolochestvoSsilokDliyaPerehodaPoSpisku=$SpisokTovarov->poluchitKolichestvoSsilokDliyaPerehodaPoSpisku();
				while ( $iterator<= $KolochestvoSsilokDliyaPerehodaPoSpisku) {
					
					if($TekushayaPoziciyaStraniciSpiska==($iterator))
					{
						echo sprintf('<a href="%s%s/page/%s"><div class="TekushiyElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s</span>
							</div></a>',$_WEB_ROOT_HREF,$ChastSsilkiSpiska,$iterator,$iterator);

					}
					else
					{
						echo sprintf('<a href="%s%s/page/%s"><div class="ElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s<span></span>
							</div></a>',$_WEB_ROOT_HREF,$ChastSsilkiSpiska,$iterator,$iterator);

					}


					$iterator++;
				}
				?>
				</div>
				<?
				$TextSverhu=$TekushiyElementMenu->poluchitSvoystvo('text_snizu');
				if($TextSverhu!=''&&$TekushayaPoziciyaStraniciSpiska==1)
				echo sprintf('
					<div class="TextoviyModulSnizu">
					%s
					</div>',
				$TextSverhu);
				?>
