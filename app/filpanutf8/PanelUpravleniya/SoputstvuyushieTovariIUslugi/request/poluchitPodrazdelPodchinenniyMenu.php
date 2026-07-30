<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

$menu_id=$_REQUEST['id_menu'];
$id=$_REQUEST['id'];


if(!isset($_REQUEST['stranica']))
{
$stranica=1;
}
else
{
$stranica=$_REQUEST['stranica'];
}


$TekushiyElementMenu=new ElementMenu();
$TekushiyElementMenu->poluchit($menu_id);
$MassivRoditeleyElementovMenuDliyaSpiska=$TekushiyElementMenu->poluchitPodchinennieElementi();
array_push($MassivRoditeleyElementovMenuDliyaSpiska, $TekushiyElementMenu->poluchitSvoystvo('id'));

$SpisokTovarov=new TovariUslugi();
			$SpisokTovarov->vibratPoliya('nazvanie,cena,picture,ssilka,id,valuta,local_del,market,vnalichii,bid,kluchevoe_slovo');
			$SpisokTovarov->uporyadochitPoVozrastaniyu('cena');
			//print_r($MassivRoditeleyElementovMenuDliyaSpiska);

			$SpisokTovarov->poluchitPoKriteriyuPoStranicam($MassivRoditeleyElementovMenuDliyaSpiska,$_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'],$stranica);
?>
			<?if($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii())
			{?>
			<table class="TablicaTovarov">
			
					<caption>
					<?
						foreach ($MassivRoditeleyElementaMenu as $key => $value) {
							if($value!='')
							{
								$ElementMenuRoditel=new ElementMenu();
								$ElementMenuRoditel->poluchit($value);
								if($ElementMenuRoditel->poluchitSvoystvo('roditel')!=0)
								{
								echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a> | ',
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
					<tr><th class="TextNaimenovaniyStolbcov">Код</th>
					<th class="TextNaimenovaniyStolbcov">Картинка</th>
					<th class="TextNaimenovaniyStolbcov">Название</th>
					<th class="TextNaimenovaniyStolbcov">Связан</th></tr>
					<?
						//<td class="StolbecCenaAdmin">					
						//	<input class="poleVvodaDannixStrokiKluchevoeSlovoTablici" id=\'input_kluchevoe_slovo\' type=\'text\' value=\'%s\'>	
						//</td>
					while($SpisokTovarov->poluchitSleduyushiy())
					{

						$SoputstvuyushiyeTovara=new SoputstvuyushieTovariIUslugi();
						$MassivKriterievSopTovarov=array();
						$MassivKriterievSopTovarov['id_tovara_uslugi']=$id;
						$MassivKriterievSopTovarov['id_soputstvuyushego_tovara_uslugi']=$SpisokTovarov->_TekushiyElement['id'];
						$SoputstvuyushiyeTovara->poluchitPoKriteriyu($MassivKriterievSopTovarov);

							echo sprintf('
								<tr>
								<td class="StolbecArticulAdmin TextStolbecArticul">№ %s <input id=\'input_id\' type=\'hidden\' value=\'%s\'></td>
								<td class="StolbecPoridkoviyNomerAdmin">
									<a href="%s">
											<img src="%s" class="StolbecIzobrageniyeAdmin" alt="%s">
									</a>
								</td>
								<td class="StolbecNazvaniyeAdmin">
										<a href="%s" class="SsilkaNazvanieVTablice">
											%s
										</a>	
								</td>
								
								<td class="StolbecCheckBoxAdmin">					
									<input class="soputstvuyushiyTovar" id=\'input_svyazan\' type=\'checkbox\' %s>	
								</td>
							</tr>',
							$SpisokTovarov->_TekushiyElement['id'],
							$SpisokTovarov->_TekushiyElement['id'],
							$_WEB_ROOT_ADMIN_HREF.'TovarUsluga/index.php?id='.$SpisokTovarov->_TekushiyElement['id'],
							$_WEB_ROOT_IMG.$SpisokTovarov->_TekushiyElement['picture'],
							$SpisokTovarov->_TekushiyElement['nazvanie'],
							$_WEB_ROOT_ADMIN_HREF.'TovarUsluga/index.php?id='.$SpisokTovarov->_TekushiyElement['id'],
							$SpisokTovarov->_TekushiyElement['nazvanie'],
							
							BoolToChecked($SoputstvuyushiyeTovara->poluchitKolichestvoElementovMassivaInformacii())
							);	
					}	
					

				?></table>
				<?
				}
else
				{
					echo sprintf('<div class="TextoviyModulSverhu">Раздел пуст</div>');
				}
				?>
				<div class="ModulSsilokNaStraniciTablici">
				<?
				$TekushayaPoziciyaStraniciSpiska=$stranica;
				$iterator=1;
				$KolochestvoSsilokDliyaPerehodaPoSpisku=$SpisokTovarov->poluchitKolichestvoSsilokDliyaPerehodaPoSpisku();
				while ( $iterator<= $KolochestvoSsilokDliyaPerehodaPoSpisku) {
					
					if($TekushayaPoziciyaStraniciSpiska==($iterator))
					{
						echo sprintf('<div class="TekushiyElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici" >%s<input type="hidden" class="stranica" value="%s"><input type="hidden" class="menu_id" value="%s">
</span>
							</div>',$iterator,$iterator,$menu_id);

					}
					else
					{
						echo sprintf('<div class="ElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici" >%s<input type="hidden" class="stranica" value="%s"><input type="hidden" class="menu_id" value="%s">
</span>
							</div>',$iterator,$iterator,$menu_id);

					}


					$iterator++;
				}
				?>
				
			</div>
