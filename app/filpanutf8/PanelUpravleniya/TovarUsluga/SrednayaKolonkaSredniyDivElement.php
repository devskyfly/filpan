<div class="ModulSredneyKolonki">
    <div id="rabocheeOkno">
        <div class="blockElementovRabochegoOkna">
            <?
            if ($DannieZapolneniya['pokazyvat'] == 1) {
                echo sprintf('<a class="SsilkaPerehodNaSayt" target="_blank" href="%s%s">Перейти на сайт</a>' . "\r\n", $_WEB_ROOT_HREF, $DannieZapolneniya['ssilka']);
            }
            ?>

            <input type="button" value="Создать новый элемент" id="sozdatNoviyElement" class="knopka">

        </div>
        <div class="blockElementovRabochegoOkna">
            <? if (!isset($_REQUEST['id']) || $_REQUEST['copy'] == 1): ?>
                <? $DannieZapolneniya['id'] = '';
                $DannieZapolneniya['ssilka'] = '' ?>
                <input type="button" value="Создать" id="sozdat" class="knopka">
                <div style="padding:10px">
                    <form action="upload.php" method="post" target="hiddenframe" enctype="multipart/form-data"
                          onsubmit="hideBtn();">

                        <input type="file" id="userfile" name="userfile" class="knopka" style="width: 250px;"/>

                        <input type="submit" name="upload" id="upload" class="knopka" value="Загрузить"/>

                    </form>
                </div>
            <? else: ?>
                <input type="button" value="Сохранить" id="sohranit" class="knopka">
                <input type="button" value="Копировать" id="kopirovat" class="knopka">
                <input type="button" value="Удалить" id="udalit" class="knopka">
                <div style="padding:10px">
                    <form action="upload.php" method="post" target="hiddenframe" enctype="multipart/form-data"
                          onsubmit="hideBtn();">

                        <input type="file" id="userfile" name="userfile" class="knopka" style="width: 250px;"/>

                        <input type="submit" name="upload" id="upload" class="knopka" value="Загрузить"/>

                    </form>
                </div>
            <? endif; ?>
        </div>
        <div class="blockElementovRabochegoOkna">
            <div class="block_kartinki">
                <img id="picture" src="<? echo $_WEB_ROOT_IMG . $DannieZapolneniya['picture']; ?>"
                     class="KartinkaTovara">
                <br>
                <input <?if(!isset($_REQUEST['copy'])):?>readonly<?endif;?> type="text" id="input_picture" class="poleVvodaDannixElementa"
                       value='<? echo $DannieZapolneniya['picture'] ?>'>
                <br>
                <div style="width:180px">
                    <iframe id="hiddenframe" name="hiddenframe" style="width:0px; height:0px; border:0px"></iframe>
                </div>

                <div>
                    <div>Ключевое слово</div>
                    <input type="text" id="input_kluchevoe_slovo" class="poleVvodaDannixElementa"
                           value='<? echo $DannieZapolneniya['kluchevoe_slovo'] ?>'>
                </div>

                <? if (!in_array("266", $MassivRoditeleyElementaMenu) && !in_array("291", $MassivRoditeleyElementaMenu)) { ?>
                    <div>
                        <div>Артикул поставщика</div>
                        <input type="text" id="input_art_postavshika" class="poleVvodaDannixElementa"
                               value='<? echo $DannieZapolneniya['art_postavshika'] ?>'>
                    </div>
                <? } else {
                    $skritKontent = 1;
                } ?>

                <div style="padding: 5px 0px 0px 0px;">
                    <? $checked = '';
                    if ($DannieZapolneniya['pokazyvat'] == 1) {
                        $checked = 'checked';
                    }
                    echo '<input type="checkbox" id="input_pokazyvat" ' . $checked . '><span class="padding">Показывать на сайте</span>';
                    ?>
                </div>

                <input type="submit" name="sgenerirovat_ssilku" id="sgenerirovat_ssilku"
                       class="knopka_sgenerirovat_ssilku" value="Сгенерировать ссылку">

            </div>
            <div style="margin-left:250px;">
                <table>
                    <tr class="admin_heading">
						<td colspan="2">SEO:</td>
					</tr>
					<tr>
                        <td class="admin_row_name">Добавить переменные</td>
                        <td class="admin_row_content">
							<input type="submit" id="peremennaya_keyword" class="knopka_sgenerirovat_ssilku" value="Ключевое слово">
							<input type="submit" id="peremennaya_imya" class="knopka_sgenerirovat_ssilku" value="Имя элемента">
							<input type="submit" id="peremennaya_imya_razdela" class="knopka_sgenerirovat_ssilku" value="Имя раздела">					
						</td>
                    </tr>
					<tr>
                        <td class="admin_row_name">ID</td>
                        <td class="admin_row_content">
							<input type="text" readonly id="input_id" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['id'] ?>'>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Ssilka</td>
                        <td class="admin_row_content">
							<textarea id="" readonly class='TextovoyePole'><? echo $DannieZapolneniya['ssilka'] ?></textarea>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Название</td>
                        <td class="admin_row_content">
							<textarea id="input_nazvanie" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole name_field'><? echo $DannieZapolneniya['nazvanie'] ?></textarea>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Реальное</td>
                        <td class="admin_row_content">
							<textarea id="nazvanie_real" class='TextovoyePole BezCKEDITOR' readonly><?= str_replace('_***_', $DannieZapolneniya['kluchevoe_slovo'], $DannieZapolneniya['nazvanie']); ?></textarea>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Title</td>
                        <td class="admin_row_content">
							<textarea id="input_title" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole seo_field'><? echo $DannieZapolneniya['title'] ?></textarea>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Keywords</td>
                        <td class="admin_row_content">
							<textarea id="input_keywords" class='TextovoyePole BezCKEDITOR seo_field'><? echo $DannieZapolneniya['keywords'] ?></textarea>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Description</td>
                        <td class="admin_row_content">
							<textarea id="input_description" class='TextovoyePole BezCKEDITOR seo_field'><? echo $DannieZapolneniya['description'] ?></textarea>
						</td>
                    </tr>
				</table>	
			</div>
				
				<table>
					<tr class="admin_heading">
						<td colspan="2">Основное:</td>
					</tr>
					<tr>
                        <td class="admin_row_name">Тип</td>
						<td class="admin_row_content">
							<select id='input_tip' class="poleVvodaDannixElementa">
								<?
								foreach ($_VIDI_TOVAROV_USLUG as $key => $value) {
									$selected = '';
									if ($value == $DannieZapolneniya['tip']) {
										$selected = 'selected';
									}
									echo '<option value="' . $value . '" ' . $selected . '>' . $_VIDI_TOVAROV_USLUG_TEXT[$key] . '</option>';
								}
								?>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Подтип</td>
						<td class="admin_row_content">
							<select id='input_podtip' class="poleVvodaDannixElementa">
								<?
								foreach ($_PODVIDI_TOVAROV_USLUG[$DannieZapolneniya['tip']] as $key => $value) {
									$selected = '';
									if ($value == $DannieZapolneniya['podtip']) {
										$selected = 'selected';
									}
									echo '<option value="' . $value . '" ' . $selected . '>' . $_PODVIDI_TOVAROV_USLUG_TEXT[$value] . '</option>';
								}
								?>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Вид номенклатуры</td>
						<td class="admin_row_content">
							<select id='input_vid_nomenkalturi' class="poleVvodaDannixElementa">
								<?
								$KolichestvoVidov = count($_VID_NOMENKLATURI);
								for ($iterator = 0; $iterator < $KolichestvoVidov; $iterator++) {
									$selected = '';
									if ($_VID_NOMENKLATURI[$iterator]['val'] == $DannieZapolneniya['vid_nomenkalturi']) {
										$selected = 'selected';
									}
									echo '<option value="' . $_VID_NOMENKLATURI[$iterator]['val'] . '" ' . $selected . '>' . $_VID_NOMENKLATURI[$iterator]['text'] . '</option>';
								}
								?>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Валюта</td>
						<td class="admin_row_content">
							<select id='input_valuta' class="poleVvodaDannixElementa">
								<?
								foreach ($_VALUTA as $key => $value) {
									$selected = '';
									if ($value == $DannieZapolneniya['valuta']) {
										$selected = 'selected';

										if ($DannieZapolneniya['valuta'] == $_VALUTA['dol']) {
											$cena = ElementTovarovUslug::poluchitCenuVDollarah($DannieZapolneniya['cena'], $DannieZapolneniya['valuta']);

										} elseif ($DannieZapolneniya['valuta'] == $_VALUTA['rub']) {
											$cena = ElementTovarovUslug::poluchitCenuVRubliach($DannieZapolneniya['cena'], $DannieZapolneniya['valuta']);

										}
									}
									echo '<option value="' . $value . '" ' . $selected . '>' . $_VALUTA_TEXT[$key] . '</option>';
								}
								?>
							</select>
						</td>
                    </tr>
					<tr>
                        <td class="admin_row_name">Первая картинка:</td>
						<td class="admin_row_content">
							<select id='input_vid_kartinka_1' class="poleVvodaDannixElementa">
								<?
								$KolichestvoVidov = count($_VID_KARTINKI_1);
								for ($iterator = 0; $iterator < $KolichestvoVidov; $iterator++) {
									$selected = '';
									if ($_VID_KARTINKI_1[$iterator]['val'] == $DannieZapolneniya['vid_kartinka_1']) {
										$selected = 'selected';
									}
									echo '<option value="' . $_VID_KARTINKI_1[$iterator]['val'] . '" ' . $selected . '>' . $_VID_KARTINKI_1[$iterator]['text'] . '</option>';
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="admin_row_name">Вторая картинка:</td>
						<td class="admin_row_content">
							<select id='input_vid_kartinka_2' class="poleVvodaDannixElementa">
								<?
								$KolichestvoVidov = count($_VID_KARTINKI_2);
								for ($iterator = 0; $iterator < $KolichestvoVidov; $iterator++) {
									$selected = '';
									if ($_VID_KARTINKI_2[$iterator]['val'] == $DannieZapolneniya['vid_kartinka_2']) {
										$selected = 'selected';
									}
									echo '<option value="' . $_VID_KARTINKI_2[$iterator]['val'] . '" ' . $selected . '>' . $_VID_KARTINKI_2[$iterator]['text'] . '</option>';
								}
								?>
							</select>
						</td>
					</tr>	
					<tr>
						<td class="admin_row_name">Цена в $</td>
						<td class="admin_row_content">
							<input type="text" id="cenaVDollarax" class="poleVvodaDannixElementa inputChislo" value="<?=ElementTovarovUslug::poluchitCenuVDollarah($DannieZapolneniya['cena'], $DannieZapolneniya['valuta']);?>">
						</td>
					</tr>	
					<tr>	
						<td class="admin_row_name">Цена в руб.</td>
						<td class="admin_row_content">
							<input type="text" id="cenaVRubliyah" class="poleVvodaDannixElementa inputChislo" value="<?=ElementTovarovUslug::poluchitCenuVRubliach($DannieZapolneniya['cena'], $DannieZapolneniya['valuta']);?>">
							<input type="hidden"  id="input_cena" class="poleVvodaDannixElementa" value="<?=$cena?>">
						</td>
					</tr>	
					<tr>
						<td class="admin_row_name">Родитель</td>
						<td class="admin_row_content">
							<input type="text" readonly id="input_menu_id"
                                   class="poleVvodaDannixElementa ObyazatelnoyePole"
                                   value='<? echo $DannieZapolneniya['menu_id'] ?>'>
						</td>
					</tr>
					<tr>
						<td class="admin_row_name">Количество покупок:</td>
						<td class="admin_row_content">
							<input type="text" id="input_kolichestvo_pokupok" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['kolichestvo_pokupok'] ?>">
						</td>
					</tr> 					
					<tr>
						<td class="admin_row_name">Хит продаж</td>
						<td class="admin_row_content">
							<input type="checkbox" id="input_hit_prodazh" <?=($DannieZapolneniya['hit_prodazh'] == 1)? 'checked' : ""?>>
						</td>
					</tr>
					<tr>
						<td class="admin_row_name">Суперпредложения</td>
						<td class="admin_row_content">
							<input type="checkbox" id="input_super" <?=($DannieZapolneniya['super'] == 1)? 'checked' : ""?>>
						</td>
					</tr>
					<tr>
						<td class="admin_row_name">В наличии</td>
						<td class="admin_row_content">
							<input type="checkbox" id="input_vnalichii" <?=($DannieZapolneniya['vnalichii'] == 1)? 'checked' : ""?>>
						</td>
					</tr>
					<tr>
						<td class="admin_row_name">Маркет</td>
						<td class="admin_row_content">
							<input type="checkbox" id="input_market" <?=($DannieZapolneniya['market'] == 1)? 'checked' : ""?>>
						</td>
					</tr>
                    <tr>
                        <td class="admin_row_name">Штрихкод</td>
                        <td class="admin_row_content">
                            <input type="text" id="input_barcode" class="poleVvodaDannixElementa" value="<?=$DannieZapolneniya['barcode']?>"
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Измерения</td>
                        <td class="admin_row_content">
                            <input type="text" id="input_dimensions" class="poleVvodaDannixElementa" value="<?=$DannieZapolneniya['dimensions']?>"
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_row_name">Вес</td>
                        <td class="admin_row_content">
                            <input type="text" id="input_weight" class="poleVvodaDannixElementa" value="<?=$DannieZapolneniya['weight']?>"
                        </td>
                    </tr>
<!--                    <tr>-->
<!--                        <td class="admin_row_name">Срок годности</td>-->
<!--                        <td class="admin_row_content">-->
<!--                            <input type="text" id="input_expiry" class="poleVvodaDannixElementa" value="--><?//=$DannieZapolneniya['expiry']?><!--"-->
<!--                        </td>-->
<!--                    </tr>-->
					<tr>
						<td class="admin_row_name">На заказ</td>
						<td class="admin_row_content">
							<input type="checkbox" id="input_nazakaz" <?=($DannieZapolneniya['nazakaz'] == 1)? 'checked' : ""?>>
						</td>
					</tr>
					<tr>
						<td class="admin_row_name">Самовывоз</td>
						<td class="admin_row_content">
							<input type="checkbox" id="input_samovivoz" <?=($DannieZapolneniya['samovivoz'] == 1)? 'checked' : ""?>>
						</td>
					</tr>
                    <tr>
						<td class="admin_row_name">Доставка</td>
						<td class="admin_row_content">
							<input type="checkbox" id="input_dostavka" <?=($DannieZapolneniya['dostavka'] == 1)? 'checked' : ""?>>
						</td>
					</tr>  
					<? if (isset($_REQUEST['id'])) { 
					//Сопутствующие тоары?>
						<tr>
							<td colspan="2" style="text-align:center;">
								<? echo sprintf('<a class="Aktivnay" target="_blank" href="%sSoputstvuyushieTovariIUslugi/?id=%s">Сопутствующие товары</a>', $_WEB_ROOT_ADMIN_HREF, $_REQUEST['id']) ?>
							</td>
						</tr>
					<?}?>					
				</table>
				
				<table>
					<tr class="admin_heading">
						<td colspan="2">Значения свойств:</td>
					</tr>
					
					<tr>
                        <td class="admin_row_name">Производитель</td>
						<td class="admin_row_content">
							<input type="text" id="input_vendor" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['vendor'] ?>'>
						</td>
                    </tr>
					
					<?
                    //Получаем родительские категории меню
                    $TekushiyElementMenu = new ElementMenu();
                    $TekushiyElementMenu->poluchit($id_menu);
                    //Получаем свойства для текущего раздела
                    $MassivInformacii = array();

                    if (!empty($MassivRoditeleyElementaMenu)) {
                        $UsloviyaZaprosa = preobrazovatMassivVINUsloviyeZaprosa($MassivRoditeleyElementaMenu, 'kategoriya_svoystva');

                        $ZaprosNaChteniye = new ZaprosNaChteniye('SELECT k.id_svoystva FROM filpan_new_kategorii_svoystv k LEFT JOIN filpan_new_svoystva s ON (s.id = k.id_svoystva) WHERE '.$UsloviyaZaprosa.' order by sortirovka');
                        if ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() > 0) {
                            $MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
                        }

                        //Получаем данные по свойству и значения
                        foreach ($MassivInformacii as $key => $svoystvo) {
                            $ElementSvoystvo = new ElementSvoystva();
                            $ElementSvoystvo->poluchit($svoystvo['id_svoystva']);
                            $idSvoystva = $svoystvo['id_svoystva'];

                             //Не выводим свойства с постоянным значением
                            if($ElementSvoystvo->poluchitSvoystvo('vid_svoystva')==3)continue;

                            $nazvanieSvoystva = $ElementSvoystvo->poluchitSvoystvo('nazvaniye');
                            $vidSvoystva = $ElementSvoystvo->poluchitSvoystvo('vid_svoystva');
                            $ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();
                            $MassivKriteriev = array();
                            $MassivKriteriev['id_tovar'] = $_REQUEST['id'];
                            $MassivKriteriev['id_svoystvo'] = $idSvoystva;
                            $ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitPoKriteriyu($MassivKriteriev);
                            $SootvetstviyeTovarSvoystvoZnacheniye = $ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitSvoystvo('id_znacheniye');

                            if (empty($SootvetstviyeTovarSvoystvoZnacheniye)) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            ?>
                            <tr>
                                <td class="admin_row_name"><?= $nazvanieSvoystva ?>:</td>

                                <?if($vidSvoystva==1):?>
								<td class="admin_row_content">
									<select id="input_svoystvo_<?= $idSvoystva ?>" class="poleVvodaDannixElementa">
										<option value="-" disabled <?= $selected; ?>>Выберите</option>
										<?
										$Znacheniya = $ElementSvoystvo->poluchitZnacheniyaSvoystva();
										while ($Znacheniya->poluchitSleduyushiy()) {
											$Znachenie = $Znacheniya->_TekushiyElement;

											$selected = "";
											if ($Znachenie['id'] == $SootvetstviyeTovarSvoystvoZnacheniye) {
												$selected = "selected";
											}

											echo '<option value="' . $Znachenie['id'] . '" ' . $selected . '>' . $Znachenie['znacheniye'] . '</option>';
										}
										?>
									</select>
								</td>
                                <?else:?>
								<td class="admin_row_content">
                                    <input type="text" class="poleVvodaDannixElementa inputChislo" id="input_svoystvo_<?= $idSvoystva ?>" value="<?=$SootvetstviyeTovarSvoystvoZnacheniye?>">
                                </td>
							   <?endif;?>
                            </tr>
                            <?
                        }
                    }
                    ?>
                </table>
				
				<div class="kontrentSvernut"><span>Раскрыть</span> второстепенные настройки</div>	
				
				<table style="display:none;">
					<tr class="admin_heading">
						<td colspan="2">Второстепенное:</td>
					</tr>
					<tr>
						<td class="admin_row_name">Стоимость клика:</td>
						<td class="admin_row_content">
							<input type="text" id="input_bid" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['bid'] ?>">
						</td>
					</tr>  	
					<tr>
						<td class="admin_row_name">Стоимость клика заказ с маркета:</td>
						<td class="admin_row_content">
							<input type="text" id="input_cbid" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['cbid'] ?>">
						</td>
					</tr>  	
					<tr>
						<td class="admin_row_name">Стоимость доставки:</td>
						<td class="admin_row_content">
							<input type="text" id="input_local_del" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['local_del'] ?>">
						</td>
					</tr>  	
					<tr>
						<td class="admin_row_name">Cрок достаки:</td>
						<td class="admin_row_content">
							<input type="text" id="input_local_del_days" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['local_del_days'] ?>">
						</td>
					</tr> 
					<tr>
						<td class="admin_row_name">Мин. сумма заказа:</td>
						<td class="admin_row_content">
							<input type="text" id="input_min_summ" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['min_summ'] ?>">
						</td>
					</tr>
					<tr>
						<td class="admin_row_name">Мин. количество в заказе:</td>
						<td class="admin_row_content">
							<input type="text" id="input_min_kol" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['min_kol'] ?>">
						</td>
					</tr> 	
					<tr>
						<td class="admin_row_name">Ссылка в 1С:</td>
						<td class="admin_row_content">
							<input type="text" id="input_ref_1c" class="poleVvodaDannixElementa" value="<? echo $DannieZapolneniya['ref_1c'] ?>">
						</td>
					</tr>					      
				</table>					

				<div class="kontrentSvernut"><span>Раскрыть</span> краткое описание</div>	
				
				<table style="display:none;">
					<tr class="admin_heading">
						<td colspan="2">Краткое описание</td>
					</tr>
					<tr>
						<td colspan="2">
							<textarea id="input_opisanie" class="seo_field"><? echo $DannieZapolneniya['opisanie'] ?></textarea>
						</td>
					</tr>
				</table>

				<div class="kontrentSvernut"><span>Раскрыть</span> полное описание</div>	
				
				<table style="display:none;">
					<tr class="admin_heading">
						<td colspan="2">Описание</td>
					</tr>
					<tr>
						<td colspan="2">
							<textarea id="input_dopolnitelnoe_opisanie" class="seo_field"><? echo $DannieZapolneniya['dopolnitelnoe_opisanie'] ?></textarea>
						</td>
					</tr>
				</table>

				<div class="kontrentSvernut"><span>Раскрыть</span> характеристики</div>	

				<table style="display:none;">
					<tr class="admin_heading">
						<td colspan="2">Характеристики</td>
					</tr>
					<tr>
						<td colspan="2">
							<textarea id="input_harakteristiki"><? echo $DannieZapolneniya['harakteristiki'] ?></textarea>
						</td>
					</tr>
				</table>
				
				<div class="kontrentSvernut"><span>Раскрыть</span> текстовый модуль</div>	
				
				<table style="display:none;">
					<tr class="admin_heading">
						<td colspan="2">Текстовый модуль</td>
					</tr>
					<tr>
						<td colspan="2">
							<textarea id="input_textoviy_modul" class="seo_field"><? echo $DannieZapolneniya['textoviy_modul'] ?></textarea>
						</td>
					</tr>
				</table>

				<table>
					<tr class="admin_heading">
						<td colspan="2">Ссылка</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="button" value="Добавить" id="dobavitStroku" class="knopka">
							<input type="button" value="Удалить" id="udalitStroku" class="knopka">

							<table class="tablicaSsilok">
								<?
								if (!isset($_REQUEST['id']) || $_REQUEST['copy'] == 1) {
									?>
									<tr class="strokaTabliciSsilok">
										<td>
											<input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input
													type="text" class="redaktiruemayaSsilkaVTablice" value=''>
										</td>
										<td>
											<input type="checkbox">
										</td>
									</tr>
									<?
								} else {
									//print_r($ElementTovarovUslug);
									$Ssilki = $ElementTovarovUslug->poluchitSsilki();
									//print_r($Ssilki);
									//print_r($Ssilki->poluchitMassivInformacii());
									while ($Ssilki->poluchitSleduyushiy()) {
										$ElementiStroki = $Ssilki->_TekushiyElement;
										if ($Ssilki->_TekushiyElement['osnovnaya'] == 1) {
											$checked = ' checked';
										} else {
											$checked = '';
										} ?>
										<tr class="strokaTabliciSsilok">
											<td>
												<input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki">
												<input type="text" class="redaktiruemayaSsilkaVTablice poleVvodaDannixElementa" value='<? echo $ElementiStroki['ssilka'] ?>'>
											</td>
											<td>
												<input type="checkbox" <? echo $checked ?>>
											</td>
										</tr>
										<?
									}
								} ?>
							</table>
						</td>
					</tr>
				</table>				
            </div>
            <?
            //Если в родителях категории есть "Картриджи для принтера", то показываем блок карточек
            if (in_array("266", $MassivRoditeleyElementaMenu)) {

                //Получаем связанные виртуальные карточки картриджей
                $KartochkiKartridzhey = new SoputstvuyushieTovariIUslugi();
                $MassivKriteriev = array();
                $MassivKriteriev['id_tovara_uslugi'] = $DannieZapolneniya['id'];
                $KartochkiKartridzhey->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
                $KartochkiKartridzhey->poluchitPoKriteriyu($MassivKriteriev);

                if ($KartochkiKartridzhey->poluchitKolichestvoElementovMassivaInformacii()) { ?>
                    <div class="KartrigiDlyaPrintera">
                        <? while ($KartochkiKartridzhey->poluchitSleduyushiy()) {

                            $KartochkaKartridzha = new ElementTovarovUslug();
                            $KartochkaKartridzha->poluchit($KartochkiKartridzhey->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);

                            $KartridgDlyaPrinteraRez = "";

                            foreach ($VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[8] as $key => $val) {

                                $SoputstvuyushieKartochkiKartridzha = new SoputstvuyushieTovariIUslugi();
                                $MassivKriteriev = array();
                                $MassivKriteriev['id_tovara_uslugi'] = $KartochkaKartridzha->poluchitSvoystvo('id');
                                $MassivKriteriev['podtip'] = $val;
                                $SoputstvuyushieKartochkiKartridzha->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
                                $SoputstvuyushieKartochkiKartridzha->poluchitPoKriteriyu($MassivKriteriev);

                                if ($SoputstvuyushieKartochkiKartridzha->poluchitKolichestvoElementovMassivaInformacii()) {

                                    while ($SoputstvuyushieKartochkiKartridzha->poluchitSleduyushiy()) {

                                        $ElementSoputstvuyushiyKartochkiKartridzha = new ElementTovarovUslug();

                                        $ElementSoputstvuyushiyKartochkiKartridzha->poluchit($SoputstvuyushieKartochkiKartridzha->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);

                                        $KartridgDlyaPrinteraRez .= '<div class="KartridgDlyaPrinteraGlavniyDiv">';

                                        //ССЫЛКА
                                        $KartridgDlyaPrinteraRez .= '<div class="KartridgDlyaPrinteraDiv KartridgDlyaPrinteraDivName">
                                            <a href="/filpannext/PanelUpravleniya/TovarUsluga/?id=' . $ElementSoputstvuyushiyKartochkiKartridzha->poluchitSvoystvo('id') . '" class="KartridgDlyaPrinteraTextKartochkiTovara" target="_blank"><b>' . $_PODVIDI_TOVAROV_USLUG_TEXT[$val] . '</b><br>' . $ElementSoputstvuyushiyKartochkiKartridzha->poluchitSvoystvo('nazvanie') . '</a>  
                                        </div>';

                                        $Cena = $ElementSoputstvuyushiyKartochkiKartridzha->poluchitCenuVRubliach($ElementSoputstvuyushiyKartochkiKartridzha->poluchitSvoystvo('cena'), $ElementSoputstvuyushiyKartochkiKartridzha->poluchitSvoystvo('valuta'));

                                        $KartridgDlyaPrinteraRez .= '
           
                                <div class="KartridgDlyaPrinteraDiv KartridgDlyaPrinteraDivCena">
                                    <div class="cena_count" itemprop="price" content="' . $Cena . '">' . $Cena . ' <span itemprop="priceCurrency" content="RUB">руб.</span></div>
                                </div>';

                                        $KartridgDlyaPrinteraRez .= '</div>';
                                    }
                                }
                            }
                            ?>

                            <div class="KartridgDlyaPrintera">
                                <div class="KartridgDlyaPrinteraKartinka">
                                    <a href="/filpannext/PanelUpravleniya/SoputstvuyushieTovariIUslugi/?id=<?= $KartochkaKartridzha->poluchitSvoystvo('id'); ?>"
                                       target="_blank">
                                        <img src="<?= $_WEB_ROOT_IMG . $KartochkaKartridzha->poluchitSvoystvo('picture'); ?>"
                                             alt="<?= str_replace('_***_', $KartochkaKartridzha->poluchitSvoystvo('kluchevoe_slovo'), $KartochkaKartridzha->poluchitSvoystvo('nazvanie')); ?>"></a>
                                </div>
                                <div class="KartridgDlyaPrinteraInfo">
                                    <div class="KartridgDlyaPrinteraName">
                                        <a href="/filpannext/PanelUpravleniya/SoputstvuyushieTovariIUslugi/?id=<?= $KartochkaKartridzha->poluchitSvoystvo('id'); ?>"
                                           target="_blank">
                                            <div class="KartridgDlyaPrinteraNameLink"><?= mb_substr(str_replace('_***_', $KartochkaKartridzha->poluchitSvoystvo('kluchevoe_slovo'), $KartochkaKartridzha->poluchitSvoystvo('nazvanie')), 0, 100); ?></div>
                                        </a>
                                    </div>
                                    <?= $KartridgDlyaPrinteraRez; ?>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                <? }
            }
            ?>
        </div>
    </div>