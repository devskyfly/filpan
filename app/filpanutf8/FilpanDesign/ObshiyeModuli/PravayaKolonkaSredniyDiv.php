<? if ($_REQUEST['input_uri'] != "index.php") {
    echo "<!--noindex-->";
}

$CartData=$User->PoluchitObshuyuSummuIKolichestvo();
$CartDataArr=explode('==',$CartData);
$ObsheeKolichestvo = $CartDataArr[0];
$VsegokOplate = $CartDataArr[1];
?>
    <script src="https://cdn.jotfor.ms/static/feedback2.js?3.2.207" type="text/javascript">
        new JotformFeedback({
            formId: '40161040460336',
            base: 'https://jotformeu.com/',
            windowTitle: 'Обратная связь',
            background: '#FFA500',
            fontColor: '#FFFFFF',
            type: false,
            height: 500,
            width: 700
        });
    </script>
    <script src="https://cdn.jotfor.ms/static/feedback2.js?3.2.193" type="text/javascript">
        new JotformFeedback({
            formId: '40151877212348',
            base: 'https://jotformeu.com/',
            windowTitle: 'Обратный звонок',
            background: '#FFA500',
            fontColor: '#FFFFFF',
            type: false,
            height: 350,
            width: 500
        });
    </script>

    <div class="top_cart_right" id="CartData" <? if ($ObsheeKolichestvo == 0) {
        echo 'style="display:none;"';
    } ?>>
        <div class="top_count_prod_cart"><span id="KolichestvoTovarov"><?= $ObsheeKolichestvo; ?></span> товара(ов)</div>
        <div class="top_price_cart"><span id="ObschayaSumma"><?= $VsegokOplate; ?></span> руб.</div>
        <div class="button_goto_cart" id="VashaKOrzina">
            <img src="/filpannext/FilpanDesign/PageImages/cart_go_to.png" class="right_block">
            <span class="text_cart_top_button">Оформить заказ</span>
        </div>
    </div>

    <!-- <a href="%skontakti.php" class="SuperPredlogeniye" target="_blank">Как проехать к нам в офис</a> -->
<? echo sprintf('<div class="top_right_block"><div></div>', $_WEB_ROOT_HREF) ?>
    <div><a class="lightbox-40161040460336 callback orange_link">Напишите нам</a></div>
    <div style="text-align:center"><a class="lightbox-40151877212348 orange_link callback">Закажите звонок</a>
    </div></div>
    <div id='SuperPredlogeniyaDiv'>
        <?
        $SuperPredlogeniya = new TovariUslugi();
        $SuperPredlogeniya->vibratPoliya('id,nazvanie,cena,picture,ssilka,kluchevoe_slovo,id,valuta');
        $SuperPredlogeniya->poluchitSuperPredlogeniya();
        ?>
        <span class="ZagolovokSuperPredlogeniya TextZagolovokSuperPredlogeniya">Суперпредложения:</span>
        <?
        $iterator = 0;
        while ($SuperPredlogeniya->poluchitSleduyushiy() && $iterator < 4) {
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
                <span class="ProstoyText"></span><span class="Cena_right_block"> %s руб.</span>
            </div>
            <div class="DivContentSuperPredlogeniye">
                <span class="ProstoyText"></span><input type="text" value="1" class="StrokaVvodaKolichestvo">
                <div class="button_add_to_cart KorzinaKupit">
                    <img src="%sFilpanDesign/PageImages/add_to_cart_button_icon.png" class="add_to_cart_icon">
                    <span class="add_to_cart_text_button">купить</span>
                </div>
                <input type="hidden" value="%s">
            </div>
            <img src="%sFilpanDesign/PageImages/UgolokSuperPredlogeniy.gif" class="UgolokSuperPredlogeniy">
        </div>', $_WEB_ROOT_HREF . $SuperPredlogeniya->_TekushiyElement['ssilka'], $_WEB_ROOT_IMG . $SuperPredlogeniya->_TekushiyElement['picture'], str_replace('_***_', $SuperPredlogeniya->_TekushiyElement['kluchevoe_slovo'], $SuperPredlogeniya->_TekushiyElement['nazvanie']), $_WEB_ROOT_HREF . $SuperPredlogeniya->_TekushiyElement['ssilka'], str_replace('_***_', $SuperPredlogeniya->_TekushiyElement['kluchevoe_slovo'], $SuperPredlogeniya->_TekushiyElement['nazvanie']), ElementTovarovUslug::poluchitCenuVRubliach($SuperPredlogeniya->_TekushiyElement['cena'], $SuperPredlogeniya->_TekushiyElement['valuta']), $_WEB_ROOT, $SuperPredlogeniya->_TekushiyElement['id'], $_WEB_ROOT);
            $iterator++;
        }
        ?>
    </div>
    <!-- <img src="%sFilpanDesign/PageImages/KorzinaKupit.gif" class="KorzinaKupit"> -->
<? if ($_REQUEST['input_uri'] != "index.php") {
    echo "<!--/noindex-->";
}
?>