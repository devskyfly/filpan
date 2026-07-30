<?

$MassivRoditeleyElementaMenu = array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());

$TekushiyElementMenu->poluchitPodchinennieElementi();

$SpisokTovarov = new TovariUslugi();
$SpisokTovarov->vibratPoliya('nazvanie,cena,picture,kluchevoe_slovo,ssilka,id,valuta,kolichestvo_pokupok,hit_prodazh');
$SpisokTovarov->uporyadochitPoVozrastaniyu('cena');
$MassivRoditeleyElementovMenuDliyaSpiska = $TekushiyElementMenu->poluchitPodchinennieElementi();
array_push($MassivRoditeleyElementovMenuDliyaSpiska, $TekushiyElementMenu->poluchitSvoystvo('id'));
//print_r($MassivRoditeleyElementovMenuDliyaSpiska);
$SpisokTovarov->poluchitPoKriteriyuPoStranicam($MassivRoditeleyElementovMenuDliyaSpiska, $_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'], $TekushayaPoziciyaStraniciSpiska);

if ($_POKAZ_OPISANIYA!="not_show"){?>
	<?if($_POKAZ_OPISANIYA=="show_noindex"):?>
		<noindex>
	<?endif;
	$TextSverhu = $TekushiyElementMenu->poluchitSvoystvo('text_sverhu');
		if ($TextSverhu != '' && $TekushayaPoziciyaStraniciSpiska == 1) echo sprintf('
			<div class="TextoviyModulSverhu">
			%s
			</div>', $TextSverhu);
					
	if($_POKAZ_OPISANIYA=="show_noindex"):?>
		</noindex>
	<?endif;?>			
<?}?>
<? 
if ($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii()) {?>
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
                if ($value != '') {
                    $ElementMenuRoditel = new ElementMenu();
                    $ElementMenuRoditel->poluchit($value);
                    if ($ElementMenuRoditel->poluchitSvoystvo('roditel') != 0) {
                        echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a> / ', $_WEB_ROOT_HREF . $ElementMenuRoditel->poluchitSvoystvo('ssilka'), $ElementMenuRoditel->poluchitSvoystvo('nazvanie'));
                    }
                }
            }
            echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a>', $_WEB_ROOT_HREF . $TekushiyElementMenu->poluchitSvoystvo('ssilka'), $TekushiyElementMenu->poluchitSvoystvo('nazvanie'));
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
        while ($SpisokTovarov->poluchitSleduyushiy()) {

            if ($SpisokTovarov->_TekushiyElement['hit_prodazh'] == 1) {
                $hit_prodazh = '<div class="HitprodazhVTablice">Хит продаж!</div>';
            } else {
                $hit_prodazh = '';
            }
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
								</a>%s	
								<div class="KolichestvoPokupokVTablice">Продано %s шт.</div>
						</td>

						<td class="StolbecCena">
						<center>
							<div class="ElementiContenta">
							<span class="Cena new_price_catalog"> %s руб.</span>	
							</div>
						</center>
						</td>


						<td class="StolbecCena">
							 
							<input type="text" value="1" class="StrokaVvodaKolichestvo" id="input_tovar_%s">
								<div class="buton_buy_catalog KorzinaKupit">
								<img src="%sFilpanDesign/PageImages/buy_catalog_icon.png" class="catalog_buy_icon" id="tovar_usluga_%s" name="tovar_usluga_%s">
								
							</div>
							<input type="hidden" value="%s">
						</td>
					</tr>


					', 
					$SpisokTovarov->_TekushiyElement['id'], 
					$_WEB_ROOT_HREF . $SpisokTovarov->_TekushiyElement['ssilka'], 
					$_WEB_ROOT_IMG . $SpisokTovarov->_TekushiyElement['picture'], 
					str_replace('_***_', $SpisokTovarov->_TekushiyElement['kluchevoe_slovo'], 
					$SpisokTovarov->_TekushiyElement['nazvanie']), 
					$_WEB_ROOT_HREF . $SpisokTovarov->_TekushiyElement['ssilka'], 
					str_replace('_***_', $SpisokTovarov->_TekushiyElement['kluchevoe_slovo'], 
					$SpisokTovarov->_TekushiyElement['nazvanie']), 
					$hit_prodazh, $SpisokTovarov->_TekushiyElement['kolichestvo_pokupok'], ElementTovarovUslug::poluchitCenuVRubliach($SpisokTovarov->_TekushiyElement['cena'], 
					$SpisokTovarov->_TekushiyElement['valuta']), 
					$SpisokTovarov->_TekushiyElement['id'],
					$_WEB_ROOT,
					$SpisokTovarov->_TekushiyElement['id'],
					$SpisokTovarov->_TekushiyElement['id'],
					$SpisokTovarov->_TekushiyElement['id']);
        }?></table>
    <div>
        <div class="ElementSsilkaStraniciTabliciPokazatEscheDiv">
            <?
            $KolochestvoSsilokDliyaPerehodaPoSpisku = $SpisokTovarov->poluchitKolichestvoSsilokDliyaPerehodaPoSpisku();
            if ($KolochestvoSsilokDliyaPerehodaPoSpisku == 1 || $TekushayaPoziciyaStraniciSpiska == $KolochestvoSsilokDliyaPerehodaPoSpisku):?>
                <div id="pokazat_esche" class="ElementSsilkaStraniciTabliciPokazatEsche not_active">Все товары показаны!
                </div>
            <? else: ?>
                <div id="pokazat_esche" class="ElementSsilkaStraniciTabliciPokazatEsche">Показать ещё 20 товаров</div>
            <? endif; ?>
        </div><? if ($KolochestvoSsilokDliyaPerehodaPoSpisku > 1): ?>
            <div class="ElementSsilkaStraniciTabliciPokazatEscheDiv">
                <div id="pokazat_vse" class="ElementSsilkaStraniciTabliciPokazatEsche">Показать все</div>
            </div>
        <? endif; ?>
    </div>
<?
} else {
    echo sprintf('<div class="TextoviyModulSverhu emptySection">Раздел пуст</div>');
}
?>

<?if ($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii()):?>
<div class="ModulSsilokNaStraniciTablici">
    <?
    $iterator = 1;
    $KolochestvoSsilokDliyaPerehodaPoSpisku = $SpisokTovarov->poluchitKolichestvoSsilokDliyaPerehodaPoSpisku();
    while ($iterator <= $KolochestvoSsilokDliyaPerehodaPoSpisku) {
        if ($TekushayaPoziciyaStraniciSpiska == ($iterator)) {
            echo sprintf('<a href="%s%s/page/%s"><div class="TekushiyElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s</span>
							</div></a>', $_WEB_ROOT_HREF, $ChastSsilkiSpiska, $iterator, $iterator);
        } else {
            echo sprintf('<a href="%s%s/page/%s"><div class="ElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s<span></span>
							</div></a>', $_WEB_ROOT_HREF, $ChastSsilkiSpiska, $iterator, $iterator);

        }
        $iterator++;
    }
    ?>
</div>
<?endif;?>
<?
if ($_POKAZ_OPISANIYA!="not_show"){?>
	<?if($_POKAZ_OPISANIYA=="show_noindex"):?>
		<noindex>
	<?endif;			
		$TextSverhu = $TekushiyElementMenu->poluchitSvoystvo('text_snizu');
		if ($TextSverhu != '' && $TekushayaPoziciyaStraniciSpiska == 1) echo sprintf('
			<div class="TextoviyModulSnizu">
			%s
			</div>', $TextSverhu);
					
	if($_POKAZ_OPISANIYA=="show_noindex"):?>
		</noindex>
	<?endif;?>			
<?}?>
