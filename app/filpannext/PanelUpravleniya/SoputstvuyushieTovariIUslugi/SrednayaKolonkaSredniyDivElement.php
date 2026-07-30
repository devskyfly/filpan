<div class="ModulSredneyKolonki">
    <?
    if (!isset($_REQUEST['StrokaPoiska']))
    {

    }
    else
    {
    $string = $_REQUEST['StrokaPoiska'];

    if (mb_strlen($string, 'utf-8') == 0) {
        echo sprintf('<div class="TextoviyModulSverhu"><p>Поиск по пустой строке невозможен.</p><p>Напишите свой запрос в строке поиска.</p></div>');
    } elseif (mb_strlen($string, 'utf-8') <= 2) {
        echo sprintf('<div class="TextoviyModulSverhu"><p>Вы ввели слишком мало символов для поиска.</p><p>Дополните свой запрос.</p></div>');
    } else {
        $expr = '/\w+/u';
        preg_match_all($expr, $string, $out);
        //print_r($out);
        $MassivOtveta = $out[0];
    }

    $MassivOtveta['IdElementa'] = $_REQUEST['id'];

    if (isset($_REQUEST['IskatSredi'])) {
        $MassivOtveta['IskatSredi'] = $_REQUEST['IskatSredi'];
    }

    ?>
    <div class="ModulSredneyKolonki">
        <?
        $SpisokTovarov = new TovariUslugi();
        $SpisokTovarov->vibratPoliya('nazvanie,cena,picture,ssilka,id,valuta,local_del,market,vnalichii,bid,kluchevoe_slovo');
        $SpisokTovarov->uporyadochitPoVozrastaniyu('cena');
        $SpisokTovarov->poluchitSoputstvueshiePoMassivuPoiska($MassivOtveta, $_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'], $TekushayaPoziciyaStraniciSpiska);
        if ($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii() != 0):?>
            <table class="TablicaTovarov">

                <tr>
                    <th class="TextNaimenovaniyStolbcov">Код</th>
                    <th class="TextNaimenovaniyStolbcov">Картинка</th>
                    <th class="TextNaimenovaniyStolbcov">Название</th>
                    <th class="TextNaimenovaniyStolbcov">Связан</th>
                </tr>
                <?
                while ($SpisokTovarov->poluchitSleduyushiy()) {

                    $SoputstvuyushiyeTovara = new SoputstvuyushieTovariIUslugi();
                    $MassivKriterievSopTovarov = array();
                    $MassivKriterievSopTovarov['id_tovara_uslugi'] = $id;
                    $MassivKriterievSopTovarov['id_soputstvuyushego_tovara_uslugi'] = $SpisokTovarov->_TekushiyElement['id'];
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
							</tr>', $SpisokTovarov->_TekushiyElement['id'], $SpisokTovarov->_TekushiyElement['id'], $_WEB_ROOT_ADMIN_HREF . 'TovarUsluga/index.php?id=' . $SpisokTovarov->_TekushiyElement['id'], $_WEB_ROOT_IMG . $SpisokTovarov->_TekushiyElement['picture'], $SpisokTovarov->_TekushiyElement['nazvanie'], $_WEB_ROOT_ADMIN_HREF . 'TovarUsluga/index.php?id=' . $SpisokTovarov->_TekushiyElement['id'], $SpisokTovarov->_TekushiyElement['nazvanie'],

                        BoolToChecked($SoputstvuyushiyeTovara->poluchitKolichestvoElementovMassivaInformacii()));
                }


                ?>
            </table>
        <? else: ?>
            <div>Ничего не найдено :(</div>
        <? endif; ?>
    </div>
</div>

</div>
<? } ?>

</div>