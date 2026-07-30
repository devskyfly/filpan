<?
$StatyiVLevomMenu=new Statyi();
$ElementVidStatyi=new ElementVidStatyi();
$ElementVidStatyi->poluchit($MassivKriterievDliyaSpiska['vid_statyi_id']);
$StatyiVLevomMenu->poluchitPoKriteriyu($MassivKriterievDliyaSpiska);
/*echo sprintf('<div class="ContentLevayaKolonka">
<span class="ZagolovokContentLevayaKolonka TextZagolovokContentLevayaKolonkaSredniyDiv">%s</span>',$ElementVidStatyi->poluchitSvoystvo('nazvaniye_dliya_polzovateliya'));
echo '<ul class="SpisokSsilok">';
while($StatyiVLevomMenu->poluchitSleduyushiy())
{
echo sprintf('<li><a href="%s%s">%s</a></li>',$_WEB_ROOT_HREF,$StatyiVLevomMenu->_TekushiyElement['ssilka'],$StatyiVLevomMenu->_TekushiyElement['nazvaniye_statyi']);
}
echo '</ul>';
echo sprintf('</div>');		*/

if($ElementVidStatyi->poluchitSvoystvo('variant_otobrageniya')==$_VARIANT_OTOBRAGENIYA_STATEY['statyi_metro'])
			{

			if($StatyiVLevomMenu->poluchitKolichestvoElementovMassivaInformacii())
{
echo '<div style="padding:10px;border:1px solid #EFEFEF;color:#FF6600;font-family: arial,helvetica,tahoma,verdana,sans-serif;font-size: 14px;font-weight:bold;text-align:center;"><strong>Мы производим заправку картриджей в любом районе Москвы.</strong></div>
<div style="padding:10px;border:1px solid #EFEFEF;color:#FF6600;font-family: arial,helvetica,tahoma,verdana,sans-serif;font-size: 14px;font-weight:bold;text-align:center;">Заправка картриджей в Москве по станциям метро:</div>';


					echo sprintf('<table class="TablicaTovarov">');
					//echo sprintf('<caption class="TextStolbecArticul">%s</caprion>',$ElementVidStatyi->poluchitSvoystvo('nazvaniye_dliya_polzovateliya'));
					$iterator=0;
						while($StatyiVLevomMenu->poluchitSleduyushiy())
						{
						$Silka1=$StatyiVLevomMenu->_TekushiyElement['ssilka'];
						$Nazvaniye1=$StatyiVLevomMenu->_TekushiyElement['nazvaniye_statyi'];
						if($StatyiVLevomMenu->poluchitSleduyushiy())
						{
						$Silka2=$StatyiVLevomMenu->_TekushiyElement['ssilka'];
						$Nazvaniye2=$StatyiVLevomMenu->_TekushiyElement['nazvaniye_statyi'];
						}
						else
						{
						$Silka2='';
						$Nazvaniye2='';
						}

						echo sprintf('<tr><td style="text-align:center;"><a class="SsilkaNazvanieVTablice" href="%s%s">%s</a></td><td style="text-align:center;"><a class="SsilkaNazvanieVTablice" href="%s%s">%s</a></td></tr>',
							$_WEB_ROOT_HREF,$Silka1,$Nazvaniye1,$_WEB_ROOT_HREF,$Silka2,$Nazvaniye2);
						}
					echo sprintf('</table>');

					echo '<div style="margin-top:20px;padding:10px;border:1px solid #EFEFEF;color:#89898A;font-family: arial,helvetica,tahoma,verdana,sans-serif;font-size: 12px;font-weight:bold;">Если Вам понадобилась <h1 style="display:inline;font-size: 12px">заправка картриджей в Москве</h1> - мы всегда готовы срочно выполнить заказ по заправке, наши механики готовы срочно, в течении двух часов выполнить заказ по заправке и настройке вашего печатного оборудования. Гарантируем  высокое качество печати вашей техники после заправки картриджей ваших принтеров.<p><strong>Компания Филпан имеет большой опыт по <a class="text_link" href="https://www.filpan.ru">заправке картриджей</a>, <a class="text_link" href="/remont-orgtehniki-v-moskve">ремонту принтеров</a>, факсов и копиров  (с 1992 года). Тонер, чернила и краска для принтеров позволят вам существенно снизить затраты на расходные материалы.</strong> <br>Мы используем только высококачественный тонер LG, что обеспечивает высокое качество печати и многократное использование одного и того же картриджа. <br><b>Работы ведутся в специально оборудованной лаборатории высококвалифицированными специалистами на профессиональном оборудовании, что позволяет достигать стопроцентного качества печати на заправленных и восстановленных нами картриджах.</b></p><p><strong>Так же мы предлагаем ремонт Вашей оргтехники.</strong><br><br><a class="text_link" href="/remont-orgtehniki-v-moskve">Профессиональный ремонт принтеров</a> – это не просто замена поврежденных деталей оборудования, но и применение профилактических и технических мер для предотвращения подобных неисправностей в дальнейшем. По этому - ремонт оргтехники, производимый нашими специалистами, начинается с  точной диагностики, выявляя слабые места. Это позволяет нам сделать качественный ремонт и  гарантировать Вам отсутствие поломок в дальнейшем. И, конечно, мы используем при каждом виде ремонта только качественные запчасти и расходные материалы.</p></div>';
				}
				else
				{
				echo '<div class="TextoviyModulSverhu">Раздел пуст</div>';
				}	

			}
			else
			{
				if($StatyiVLevomMenu->poluchitKolichestvoElementovMassivaInformacii())
				{	echo sprintf('<table class="TablicaTovarov">');
					echo sprintf('<caption class="TextStolbecArticul">%s</caprion>',$ElementVidStatyi->poluchitSvoystvo('nazvaniye_dliya_polzovateliya'));
					$iterator=0;
						while($StatyiVLevomMenu->poluchitSleduyushiy())
						{
						$iterator++;
						echo sprintf('<tr><td class="StolbecPoridkoviyNomer TextStolbecArticul">%s</td><td><a class="SsilkaNazvanieVTablice" href="%s%s">%s</a></td></tr>',$iterator,$_WEB_ROOT_HREF,$StatyiVLevomMenu->_TekushiyElement['ssilka'],$StatyiVLevomMenu->_TekushiyElement['nazvaniye_statyi']);
						}
					echo sprintf('</table>');
				}
				else
				{
				echo '<div class="TextoviyModulSverhu">Раздел пуст</div>';
				}	
			}





?>