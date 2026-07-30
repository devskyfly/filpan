<div class="ModulSredneyKolonki">

    <div id="rabocheeOkno">
        <div class="blockElementovRabochegoOkna">
            <? echo sprintf('<a class="SsilkaPerehodNaSayt" href="%s%s">Перейти на сайт</a>' . "\r\n", $_WEB_ROOT_HREF, $DannieZapolneniya['ssilka']); ?>

            <input type="button" value="Создать новый элемент" id="sozdatNoviyElement" class="knopka">

            <? if ($DannieZapolneniya["LastAddItem"]): ?>
                <div><? echo sprintf('Последняя созданная страница в этом разделе: <a href="%s">%s</a>', "/filpannext/PanelUpravleniya/TovarUsluga/index.php?id=" . $DannieZapolneniya["LastAddItem"]["id"], str_replace("_***_", $DannieZapolneniya["LastAddItem"]["kluchevoe_slovo"], $DannieZapolneniya["LastAddItem"]["nazvanie"])); ?></div>
            <? endif; ?>

        </div>
        <div class="blockElementovRabochegoOkna">
            <? if (!isset($_REQUEST['id']) || $_REQUEST['copy'] == 1): ?>
                <? $DannieZapolneniya['id'] = '';
                $DannieZapolneniya['ssilka'] = '' ?>
                <input type="button" value="Создать" id="sozdat" class="knopka">
            <? else: ?>
                <input type="button" value="Сохранить" id="sohranit" class="knopka">
                <input type="button" value="Копировать" id="kopirovat" class="knopka">
                <input type="button" value="Удалить" id="udalit" class="knopka">
            <? endif; ?>
        </div>
        <div class="blockElementovRabochegoOkna" class="poleVvodaDannixElementa">
            <div>
                <span>Родитель</span>
                <input type="text" readonly id="input_roditel" class="poleVvodaDannixElementa ObyazatelnoyePole"
                       value='<? echo $DannieZapolneniya['roditel'] ?>'>
            </div>
            <!-- <div>
			<span>Категория</span>
			<input type="text" id="input_kategoriya" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['kategoriya'] ?>'>
			</div>
			<div>
			<span>Раздел</span>
			<input type="text" id="input_raz" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['raz'] ?>'>
			</div>
			<div>
			<span>Подраздел</span>
			<input type="text" id="input_idraz" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['idraz'] ?>'>
			</div>
			<div>
			<span>Производитель</span>
			<input type="text" id="input_proiz" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['proiz'] ?>'>
			</div> -->
        </div>
        <div class="blockElementovRabochegoOkna">
            <table>
                <tr class="admin_heading">
					<td colspan="2">Основное:</td>
				</tr>
				
				<tr>
                    <td class="admin_row_name">ID</td>
                    <td class="admin_row_content">
						<input type="text" readonly id="input_id" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['id'] ?>'>
					</td>
                </tr>
				<tr>
                    <td class="admin_row_name">Ссылка</td>
                    <td class="admin_row_content">
						<textarea class='TextovoyePole BezCKEDITOR'><? echo $DannieZapolneniya['ssilka'] ?></textarea>
					</td>
                </tr>
				<tr>
                    <td class="admin_row_name">Название</td>
                    <td class="admin_row_content">
						<textarea class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['nazvanie'] ?></textarea>
					</td>
                </tr>
				<tr>
                    <td class="admin_row_name">Title</td>
                    <td class="admin_row_content">
						<textarea id="input_title" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['title'] ?></textarea>
					</td>
                </tr>
				<tr>
                    <td class="admin_row_name">Keywords</td>
                    <td class="admin_row_content">
						<textarea id="input_keywords" class='TextovoyePole BezCKEDITOR'><? echo $DannieZapolneniya['keywords'] ?></textarea>
					</td>
                </tr>
				<tr>
                    <td class="admin_row_name">Description</td>
                    <td class="admin_row_content">
						<textarea id="input_description" class='TextovoyePole BezCKEDITOR'><? echo $DannieZapolneniya['description'] ?></textarea>
					</td>
                </tr>
			</table>
		
			<div class="kontrentSvernut"><span>Раскрыть</span> текстовый модуль сверху</div>	
					
			<table style="display:none;">
				<tr class="admin_heading">
					<td colspan="2">Текст сверху:</td>
				</tr>
				<tr>
					<td colspan="2">
						<textarea id="input_text_sverhu"><? echo $DannieZapolneniya['text_sverhu'] ?></textarea>
					</td>
				</tr>
			</table>
			
			<div class="kontrentSvernut"><span>Раскрыть</span> текстовый модуль снизу</div>	
					
			<table style="display:none;">
				<tr class="admin_heading">
					<td colspan="2">Текст снизу:</td>
				</tr>
				<tr>
					<td colspan="2">
						<textarea id="input_text_snizu"><? echo $DannieZapolneniya['text_snizu'] ?></textarea>
					</td>
				</tr>
			</table>
			
			<table>
				<tr>
                    <td class="admin_row_name">Порядок вывода описания в подгруппах</td>
                    <td class="admin_row_content">
						<select id="pokaz_opisaniya" class="poleVvodaDannixElementa">
							<option value="show"<?=($_POKAZ_OPISANIYA=="show")?" selected":"";?>>Выводить</option>
							<option value="show_noindex"<?=($_POKAZ_OPISANIYA=="show_noindex")?" selected":"";?>>Выводить в noindex</option>
							<option value="not_show"<?=($_POKAZ_OPISANIYA=="not_show")?" selected":"";?>>Не выводить</option>
						</select>
					</td>
                </tr>
				<tr>
                    <td class="admin_row_name">Порядок вывода описания в карточке товара</td>
                    <td class="admin_row_content">
						<select id="pokaz_opisaniya" class="poleVvodaDannixElementa">
							<option value="show"<?=($_POKAZ_OPISANIYA_KARTOCHKA=="show")?" selected":"";?>>Выводить</option>
							<option value="show_noindex"<?=($_POKAZ_OPISANIYA_KARTOCHKA=="show_noindex")?" selected":"";?>>Выводить в noindex</option>
							<option value="not_show"<?=($_POKAZ_OPISANIYA_KARTOCHKA=="not_show")?" selected":"";?>>Не выводить</option>
						</select>
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
								$Ssilki = $ElementMenu->poluchitSsilki();
								while ($Ssilki->poluchitSleduyushiy()) {
									$ElementiStroki = $Ssilki->_TekushiyElement;
									if ($Ssilki->_TekushiyElement['osnovnaya'] == 1) {
										$checked = ' checked';
									} else {
										$checked = '';
									} ?>
									<tr class="strokaTabliciSsilok">
										<td>
											<input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input
													type="text" class="redaktiruemayaSsilkaVTablice poleVvodaDannixElementa"
													value='<? echo $ElementiStroki['ssilka'] ?>'>
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
			
			<table>
				<tr class="admin_heading">
					<td colspan="2">Очередность вывода элементов в разделе</td>
				</tr>
				
				<?for($i=1;$i<=10;$i++):?>
				<tr>
                    <td class="admin_row_name">№<?=$i?></td>
                    <td class="admin_row_content">
						<input type="text" id="input_ochered_vyvoda_<?=$i?>" class="polePriorityGoods poleVvodaDannixElementa"
                           value="<?= isset($DannieZapolneniya["PriorityGoods"][$i]["id"]) ? $DannieZapolneniya["PriorityGoods"][$i]["id"] : ""; ?>">
						<?= isset($DannieZapolneniya["PriorityGoods"][$i]["nazvanie"]) ? "<span style='padding-left: 10px;'>" . $DannieZapolneniya["PriorityGoods"][$i]["nazvanie"] . "</span>" : "<span style='padding-left: 10px;'></span>"; ?>
					</td>
                </tr>
				<?endfor;?>	
			</table>
        </div>
    </div>
</div>