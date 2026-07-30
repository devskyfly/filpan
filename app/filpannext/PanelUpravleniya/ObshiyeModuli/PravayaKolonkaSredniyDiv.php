		<div id='SuperPredlogeniyaDiv'>
						
					<?
					$SuperPredlogeniya=new TovariUslugi();
					$SuperPredlogeniya->vibratPoliya('id,nazvanie,cena,picture,ssilka,id,valuta');
					$SuperPredlogeniya->poluchitSuperPredlogeniya();
					?>
						<span class="ZagolovokSuperPredlogeniya TextZagolovokSuperPredlogeniya" >Суперпредложения:</span>
						<?

						while($SuperPredlogeniya->poluchitSleduyushiy())
							{
								echo sprintf('<div class="ContentSuperPredlogeniya">
									<div>
										<a href="%s">
											<img src="%s" class="KartinkaTovaraSuperPredlogeniya" alt="%s">
										</a>	
									</div>
									<div>
										<a href="%s" class="SuperPredlogeniye">
											%s
										</a>	
									</div>
									<div class="DivContentSuperPredlogeniye">
										<span class="ProstoyText">Цена:</span><span class="Cena"> %s руб.</span>
									</div>
									<div class="DivContentSuperPredlogeniye">
									<span class="ProstoyText">Кол-во:</span><input type="text" value="1" class="StrokaVvodaKolichestvo">	
									</div>
									<div class="DivContentSuperPredlogeniye">
										<img src="%sFilpanDesign/PageImages/KorzinaKupit.gif" class="KorzinaKupit">
										<input type="hidden" value="%s">
									</div>
									<img src="%sFilpanDesign/PageImages/UgolokSuperPredlogeniy.gif" class="UgolokSuperPredlogeniy">
								</div>',
								$_WEB_ROOT_HREF.$SuperPredlogeniya->_TekushiyElement['ssilka'],
								$_WEB_ROOT_IMG.$SuperPredlogeniya->_TekushiyElement['picture'],
								$SuperPredlogeniya->_TekushiyElement['nazvanie'],
								$_WEB_ROOT_HREF.$SuperPredlogeniya->_TekushiyElement['ssilka'],
								$SuperPredlogeniya->_TekushiyElement['nazvanie'],
								ElementTovarovUslug::poluchitCenuVRubliach($SuperPredlogeniya->_TekushiyElement['cena'],$SuperPredlogeniya->_TekushiyElement['valuta']),
								$_WEB_ROOT,
								$SuperPredlogeniya->_TekushiyElement['id'],
								$_WEB_ROOT);
							}
						?>	
					</div>