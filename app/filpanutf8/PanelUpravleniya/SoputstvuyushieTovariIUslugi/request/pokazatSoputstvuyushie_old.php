<?require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

								$id_tovara=$_REQUEST['id'];
								$SoputstvuyushieTovari=new SoputstvuyushieTovariIUslugi();
								$MassivKriteriev=array();
								$MassivKriteriev['id_tovara_uslugi']=$id_tovara;
								$MassivKriteriev['tip']=$_VIDI_TOVAROV_USLUG['tovar'];
								//print_r($MassivKriteriev);
								$SoputstvuyushieTovari->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
								$SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
								if($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii())
								{?>
					<div class="SoputstvuyushieTovariIUslugiDlyaSoputstvuyushihTovarov">
						<div class="SoputstvuyushieTovari">
						<span class="ZagolovokSoputstvuyushieTovari">Сопутствующие товары</span>
						<div class="ObshiySpisokSoputstvuushixTovarov">
							

								
									<?
								while($SoputstvuyushieTovari->poluchitSleduyushiy())
								{
									$ElementTovarov=new ElementTovarovUslug();
									$ElementTovarov->poluchit($SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);
									
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
									</div>',
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									$_WEB_ROOT_IMG.$ElementTovarov->poluchitSvoystvo('picture'),
									$ElementTovarov->poluchitSvoystvo('nazvanie'),
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									mb_substr($ElementTovarov->poluchitSvoystvo('nazvanie'),0,100).'...',
									ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'),$ElementTovarov->poluchitSvoystvo('valuta')),
									$ElementTovarov->poluchitSvoystvo('id'));	
										
								}?>
						</div>
						</div>	
						<?}?>
						<?
						$SoputstvuyushieTovari=new SoputstvuyushieTovariIUslugi();
						$MassivKriteriev=array();
						$MassivKriteriev['id_tovara_uslugi']=$id_tovara;
						$MassivKriteriev['tip']=$_VIDI_TOVAROV_USLUG['usluga'];
						$SoputstvuyushieTovari->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
						$SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
						if($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii())
						{
						?>
						<div class="SoputstvuyushieTovari">
						<span class="ZagolovokSoputstvuyushieTovari">Сопутствующие услуги</span>
						<div class="ObshiySpisokSoputstvuushixTovarov">
							

								
								<?
								while($SoputstvuyushieTovari->poluchitSleduyushiy())
								{

									$ElementTovarov=new ElementTovarovUslug();
									$ElementTovarov->poluchit($SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);
									
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
										<input type="button" class="UdalitSvyaz OrangevayaKnopkaRezinovaya"  value="Удалить связь"> 
										<input type="hidden" class="id_tovara" value="%s">
									</div>',
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									$_WEB_ROOT_IMG.$ElementTovarov->poluchitSvoystvo('picture'),
									$ElementTovarov->poluchitSvoystvo('nazvanie'),
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									mb_substr($ElementTovarov->poluchitSvoystvo('nazvanie'),0,100).'...',
									ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'),$ElementTovarov->poluchitSvoystvo('valuta')),
									$ElementTovarov->poluchitSvoystvo('id'));
										
								}?>
						</div>
						
						</div>
						<?}?>