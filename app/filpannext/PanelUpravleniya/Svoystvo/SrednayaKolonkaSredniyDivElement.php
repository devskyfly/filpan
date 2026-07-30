<div class="ModulSredneyKolonki">

    <div id="rabocheeOkno">
        <div class="blockElementovRabochegoOkna">
            <? echo sprintf('<a class="SsilkaPerehodNaSayt" href="%s%s">Перейти на сайт</a>' . "\r\n", $_WEB_ROOT_HREF, $DannieZapolneniya['ssilka']); ?>

            <input type="button" value="Создать новый элемент" id="sozdatNoviyElement" class="knopka">

        </div>
        <div class="blockElementovRabochegoOkna">

            <? if (!isset($_REQUEST['id']) || $_REQUEST['copy'] == 1):
                $DannieZapolneniya['id'] = '';
                $DannieZapolneniya['znacheniya'] = array();
                ?>
                <input type="button" value="Создать" id="sozdat" class="knopka">
            <? else: ?>
                <input type="button" value="Сохранить" id="sohranit" class="knopka">
                <input type="button" value="Копировать" id="kopirovat" class="knopka">
                <input type="button" value="Удалить" id="udalit" class="knopka">
            <? endif; ?>
        </div>
        <div class="blockElementovRabochegoOkna">
            <div>
                <span>ID</span>
                <input type="text" id="input_id" class="poleVvodaDannixElementa"
                       value='<? echo $DannieZapolneniya['id'] ?>' readonly>
            </div>
        </div>
        <div class="blockElementovRabochegoOkna">
            <div>
                <span>Название</span>
                <textarea id="input_nazvaniye"
                          class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['nazvaniye'] ?></textarea>
            </div>
        </div>

        <div class="blockElementovRabochegoOkna">
            <div>
                <span>Сортировка</span>
                <input type="text" id="input_sortirovka" class="poleVvodaDannixElementa"
                       value='<? echo $DannieZapolneniya['sortirovka'] ?>'>
            </div>
        </div>

        <div class="blockElementovRabochegoOkna">
            <div style="padding-bottom: 10px;">Тип свойства</div>

            <select id="input_vid_svoystva" class="poleVvodaDannixElementa">
                <?
                $types = array(1 => "Список", 2 => "Строка", 3 => "Постоянное значение");
                foreach ($types as $key => $value) {
                    $selected = '';
                    if ($DannieZapolneniya['vid_svoystva'] == $key) {
                        $selected = 'selected';
                    } ?>
                    <option value="<?= $key ?>" <?= $selected ?> ><?= $value ?></option>
                <? } ?>
            </select>
        </div>

        <? if ($DannieZapolneniya['vid_svoystva'] == 1): ?>
            <div class="blockElementovRabochegoOkna">
                <div style="padding-bottom: 10px;">Значения свойства</div>
                <input type="button" value="Добавить" id="dobavitStrokuZnacheniy" class="knopka">
                <input type="button" value="Удалить" id="udalitStrokuZnacheniy" class="knopka">

                <table class="tablicaZnacheniy">
                    <?
                    if (!isset($_REQUEST['id'])) {
                        ?>
                        <tr class="strokaTabliciSsilok">
                            <td>
                                <input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input
                                        type="text" class="redaktiruemayaSsilkaVTablice" value=''>
                            </td>
                        </tr>
                        <?
                    } else {
                        $Znacheniya = $ElementSvoystvo->poluchitZnacheniyaSvoystva();
                        while ($Znacheniya->poluchitSleduyushiy()) {
                            $ElementiStroki = $Znacheniya->_TekushiyElement;
                            ?>
                            <tr class="strokaTabliciSsilok">
                                <td>
                                    <input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input
                                            type="text" class="redaktiruemayaSsilkaVTablice"
                                            value='<? echo $ElementiStroki['znacheniye'] ?>'>
                                </td>
                            </tr>
                            <?
                        }
                    }
                    ?>
                </table>
            </div>
        <? elseif ($DannieZapolneniya['vid_svoystva'] == 3): ?>
            <div class="blockElementovRabochegoOkna">
                <div style="padding-bottom: 10px;">Значение свойства</div>

                <table class="tablicaZnacheniy">
                    <?
                    if (!isset($_REQUEST['id'])) {
                        ?>
                        <tr class="strokaTabliciSsilok">
                            <td>
                                <input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input
                                        type="text" class="redaktiruemayaSsilkaVTablice" value=''>
                            </td>
                        </tr>
                        <?
                    } else {
                        $Znacheniya = $ElementSvoystvo->poluchitZnacheniyaSvoystva();
                        if ($Znacheniya->poluchitSleduyushiy()) {
                            $ElementiStroki = $Znacheniya->_TekushiyElement;
                            ?>
                            <tr class="strokaTabliciSsilok">
                                <td>
                                    <input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input
                                            type="text" class="redaktiruemayaSsilkaVTablice"
                                            value='<? echo $ElementiStroki['znacheniye'] ?>'>
                                </td>
                            </tr>
                            <?
                        }
                    }
                    ?>
                </table>
            </div>
        <? endif; ?>

        <? if (isset($_REQUEST['id'])): ?>
            <div class="blockElementovRabochegoOkna">
                <div style="padding-bottom: 10px;">Разделы свойства</div>
                <input type="button" value="Удалить" id="udalitStrokuKategoriy" class="knopka">

                <table class="tablicaKategoriy">
                    <?
                    $Kategorii = $ElementSvoystvo->poluchitKategoriiSvoystva();

                    if ($Kategorii->poluchitKolichestvoElementovMassivaInformacii() != 0) {
                        while ($Kategorii->poluchitSleduyushiy()) {
                            $Kategoriya = $Kategorii->_TekushiyElement;
                            $ElementMenu = new ElementMenu();
                            $ElementMenu->vibratPoliya("id,nazvanie");
                            $ElementMenu->poluchit($Kategoriya["kategoriya_svoystva"]);
                            $KatId = $ElementMenu->poluchitSvoystvo('id');
                            $KatName = $ElementMenu->poluchitSvoystvo('nazvanie');
                            ?>
                            <tr class="strokaTabliciSsilok">
                                <td>
                                    <input type="text" class="redaktiruemayaSsilkaVTablice"
                                           value='<?= $KatId . " " . $KatName; ?>' readonly>
                                </td>
                            </tr>
                            <?
                        }
                    } ?>
                </table>
            </div>
        <? endif; ?>
    </div>
</div>