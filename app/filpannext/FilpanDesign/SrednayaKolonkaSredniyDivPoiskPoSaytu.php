<?
	$string=$_REQUEST['StrokaPoiska'];
	if(mb_strlen($string,'utf-8')==0)
	{
	echo sprintf('<div class="TextoviyModulSverhu"><p>Поиск по пустой строке невозможен.</p><p>Напишите свой запрос в строке поиска.</p></div>');	
	}
	elseif (mb_strlen($string,'utf-8')<3) {
		echo sprintf('<div class="TextoviyModulSverhu"><p>Вы ввели слишком мало символов для поиска.</p><p>Дополните свой запрос.</p></div>');	
	}
	else
	{

	$expr='/\w+/u';
	preg_match_all($expr,$string,$out);	
    //print_r($out);	
    $MassivOtveta=$out[0];
    //print_r($MassivOtveta);
   
//$zapros="select nazvanie from filpan_new_tovari_uslugi where nazvanie LIKE '%картридж%'";
//$zapros=iconv( "utf-8","cp1251",$zapros);
//$ZaprosNa=new ZaprosNaChteniye($zapros);

//print_r($ZaprosNa->poluchitOtvetNaZaprosAssociativniyMassiv());
//print_r($ZaprosNa->poluchitKolichestvoStrokOtvetaNaZapros());
			


			$SpisokTovarov=new TovariUslugi();
			$SpisokTovarov->vibratPoliya('nazvanie,cena,picture,kluchevoe_slovo,ssilka,id,valuta');
			$SpisokTovarov->uporyadochitPoVozrastaniyu('cena');		
			$SpisokTovarov->poluchitPoMassivuPoiska($MassivOtveta,$_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'],$TekushayaPoziciyaStraniciSpiska);		
			
			?>
			<?if($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii())
			{?>
			<table class="TablicaTovarov">
					<caption>
					<?
							echo "Результаты поиска по запросу: ".$_REQUEST['StrokaPoiska'];
					?>
					</caption>
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
							 
							<input type="text" value="1" class="StrokaVvodaKolichestvo">	

							<div class="buton_buy_catalog KorzinaKupit">
								<img src="%sFilpanDesign/PageImages/buy_catalog_icon.png" class="catalog_buy_icon">
								
							</div>
							<input type="hidden" value="%s">
						</td>
					</tr>',
					$SpisokTovarov->_TekushiyElement['id'],
					$_WEB_ROOT_HREF.$SpisokTovarov->_TekushiyElement['ssilka'],
					$_WEB_ROOT_IMG.$SpisokTovarov->_TekushiyElement['picture'],
					str_replace('_***_',$SpisokTovarov->_TekushiyElement['kluchevoe_slovo'],$SpisokTovarov->_TekushiyElement['nazvanie']),
					$_WEB_ROOT_HREF.$SpisokTovarov->_TekushiyElement['ssilka'],
					str_replace('_***_',$SpisokTovarov->_TekushiyElement['kluchevoe_slovo'],$SpisokTovarov->_TekushiyElement['nazvanie']),
					ElementTovarovUslug::poluchitCenuVRubliach($SpisokTovarov->_TekushiyElement['cena'],$SpisokTovarov->_TekushiyElement['valuta']),
					$_WEB_ROOT,
					$SpisokTovarov->_TekushiyElement['id']);
					}
					

				?></table>
				<?
				}
				else
				{
					echo sprintf('<div class="TextoviyModulSverhu"><p>Поиск не дал результатов.</p><p>Попробуйте изменить свой. запрос</p></div>');
				}
	}
				?>