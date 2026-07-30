<div class="ModulSredneyKolonki">

    <?
    $MassivRoditeleyElementaMenu = array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());
    ?>

    <div class="RightSidebarElementTovara">

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


        <div class="CartElementTovara" id="CartData" <? if ($ObsheeKolichestvo == 0) {
            echo 'style="display:none;"';
        } ?>>
            <div class="CartElementTovaraText"><span id="KolichestvoTovarov"><?= $ObsheeKolichestvo; ?></span> товара(ов)</div>
            <div class="CartElementTovaraPrice"><span id="ObschayaSumma"><?= $VsegokOplate; ?></span> руб.</div>
            <div class="callbackElementTovara" id="KorzinaElementTovara">
                <span class="text_cart_top_button">Оформить заказ</span>
            </div>
        </div>

        <div style="text-align:center">
            <a class="lightbox-40161040460336 callbackElementTovara orange_link">Напишите нам</a>
        </div>
        <div style="text-align:center">
            <a class="lightbox-40151877212348 callbackElementTovara orange_link">Закажите звонок</a>
        </div>
    </div>

    <!-- Имя товара -->
    <div class="titlePRD"><? echo sprintf('<h1 class="name_tovar" itemprop="name">%s</h1><br>', str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('nazvanie'))); ?></div>
    <!-- Хлебные крохи -->
    <div class="pathhrefs">
        <?
        foreach ($MassivRoditeleyElementaMenu as $key => $value) {
            if ($value != '') {
                $ElementMenuRoditel = new ElementMenu();
                $ElementMenuRoditel->poluchit($value);
                if ($ElementMenuRoditel->poluchitSvoystvo('roditel') != 0) {
                    echo sprintf('<a href="%s" class="path_href">%s</a> / ', $_WEB_ROOT_HREF . $ElementMenuRoditel->poluchitSvoystvo('ssilka'), $ElementMenuRoditel->poluchitSvoystvo('nazvanie'));
                }
            }
        }
        echo sprintf('<a href="%s" class="path_href">%s</a>', $_WEB_ROOT_HREF . $TekushiyElementMenu->poluchitSvoystvo('ssilka'), $TekushiyElementMenu->poluchitSvoystvo('nazvanie'));
        if ($User->VxodVAdminku()) {
            echo sprintf('<br><br><a target="_blank" href="%s" class="path_href">Редактировать</a>', $_WEB_ROOT_ADMIN_HREF . 'TovarUsluga/index.php?id=' . $ElementTovara->poluchitSvoystvo('id'));
        } ?>
    </div>
    <div>
        <?
        $KartrigiDlyaPrintera = new SoputstvuyushieTovariIUslugi();
        $MassivKriteriev = array();
        $MassivKriteriev['id_tovara_uslugi'] = $id_tovara;
        //$MassivKriteriev['podtip'] = 8;
        $KartrigiDlyaPrintera->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
        $KartrigiDlyaPrintera->poluchitPoKriteriyu($MassivKriteriev);
        if ($KartrigiDlyaPrintera->poluchitKolichestvoElementovMassivaInformacii()) { ?>
            <div class="KartrigiDlyaPrintera">
                <? while ($KartrigiDlyaPrintera->poluchitSleduyushiy()) {
                    $ElementTovarov = new ElementTovarovUslug();
                    $ElementTovarov->poluchit($KartrigiDlyaPrintera->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);

                    $KartridgDlyaPrinteraRez = "";

                    $main_link = "";

                    foreach ($VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[8] as $key => $val) {
                        $KartridgDlyaPrintera = new SoputstvuyushieTovariIUslugi();
                        $MassivKriteriev = array();
                        $MassivKriteriev['id_tovara_uslugi'] = $ElementTovarov->poluchitSvoystvo('id');
                        $MassivKriteriev['podtip'] = $val;
                        $KartridgDlyaPrintera->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
                        $KartridgDlyaPrintera->poluchitPoKriteriyu($MassivKriteriev);

                        if ($KartridgDlyaPrintera->poluchitKolichestvoElementovMassivaInformacii()) {
                            while ($KartridgDlyaPrintera->poluchitSleduyushiy()) {
                                $ElementTovarovKartridgDlyaPrintera = new ElementTovarovUslug();

                                $ElementTovarovKartridgDlyaPrintera->poluchit($KartridgDlyaPrintera->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);


                                if ($ElementTovarovKartridgDlyaPrintera->poluchitSvoystvo('podtip') == 5) {
                                    $main_link = $ElementTovarovKartridgDlyaPrintera->poluchitSvoystvo('ssilka');
                                }

                                $KartridgDlyaPrinteraRez .= '<div class="KartridgDlyaPrinteraGlavniyDiv">';

                                //ССЫЛКА
                                $KartridgDlyaPrinteraRez .= '<div class="KartridgDlyaPrinteraDiv KartridgDlyaPrinteraDivName">
                                    <a href="' . $ElementTovarovKartridgDlyaPrintera->poluchitSvoystvo('ssilka') . '" class="KartridgDlyaPrinteraTextKartochkiTovara">' . $_PODVIDI_TOVAROV_USLUG_TEXT[$val] . '</a>  
                                </div>';

                                $Cena = ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarovKartridgDlyaPrintera->poluchitSvoystvo('cena'), $ElementTovarovKartridgDlyaPrintera->poluchitSvoystvo('valuta'));

                                if ($ElementTovara->poluchitSvoystvo('tolko_samovivoz') == 1) {
                                    $nalichie = '<div class="ElementiContenta naliche_block">
                                        <span class="TextKartochkiTovara" style="color: #FF0000;"> Только самовывоз</span>	
                                    </div>';
                                } elseif ($ElementTovara->poluchitSvoystvo('vnalichii') == 1) {
                                    $nalichie = '<div class="ElementiContenta naliche_block">
                                        <span class="TextKartochkiTovara" style="color: #75BA00;"> есть в наличии</span>	
                                    </div>';
                                } elseif ($ElementTovara->poluchitSvoystvo('nazakaz') == 1) {
                                    $nalichie = '<div class="ElementiContenta naliche_block">
                                        <span class="TextKartochkiTovara"> на заказ</span>	
                                    </div>';
                                } else {
                                    $nalichie = '<div class="ElementiContenta naliche_block">
                                        <span class="TextKartochkiTovara"> на заказ</span>	
                                    </div>';
                                }

                                $KartridgDlyaPrinteraRez .= '
                                <div class="KartridgDlyaPrinteraDiv KartridgDlyaPrinteraDivCount">
                                    <div class="KartridgDlyaPrinteraAddcount minus_add">-</div>
                                    <input type="text" value="1" class="KartridgDlyaPrinteraStrokaVvodaKolichestvo">
                                    <div class="KartridgDlyaPrinteraAddcount pluse_add">+</div>
                                </div>
                                
                                <div class="KartridgDlyaPrinteraDiv KartridgDlyaPrinteraDivCena">
                                    <div class="cena_count" itemprop="price" content="' . $Cena . '">' . $Cena . ' <span itemprop="priceCurrency" content="RUB">руб.</span></div>
                                </div>    
                                
                                <div class="KartridgDlyaPrinteraDiv KartridgDlyaPrinteraDivKupit">
                                    <div class="KartridgDlyaPrinteraAddToCart KorzinaKupit ">
                                        <img src="/filpannext/FilpanDesign/PageImages/big_cart.png" class="KartridgDlyaPrinteraAddToCartIcon">
                                        <span class="KartridgDlyaPrinteraAddToCartText">В корзину</span>
                                    </div>  
                                    
                                    <input type="hidden" value="' . $ElementTovarovKartridgDlyaPrintera->poluchitSvoystvo('id') . '">
                                </div>
                                                                
                                <div class="KartridgDlyaPrinteraDiv KartridgDlyaPrinteraDivNalichie">
                                    ' . $nalichie . '
                                </div>';

                                $KartridgDlyaPrinteraRez .= '</div>';
                            }
                        }
                    } ?>

                    <div class="KartridgDlyaPrintera">
                        <div class="KartridgDlyaPrinteraKartinka">

                            <? if ($main_link): ?>
                                <a href="<?= $_WEB_ROOT_HREF . $main_link; ?>">
                                    <img src="<?= $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'); ?>"
                                         alt="<?= str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')); ?>">
                                </a>
                            <? else: ?>
                                <img src="<?= $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'); ?>"
                                     alt="<?= str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')); ?>">
                            <? endif; ?>

                        </div>
                        <div class="KartridgDlyaPrinteraInfo">
                            <div class="KartridgDlyaPrinteraName">
                                <? if ($main_link): ?>
                                    <a href="<?= $_WEB_ROOT_IMG . $main_link; ?>"><?= mb_substr(str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), 0, 100); ?></a>
                                <? else: ?>
                                    <div class="KartridgDlyaPrinteraNameLink"><?= mb_substr(str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), 0, 100); ?></div>
                                <? endif; ?>
                            </div>
                            <?= $KartridgDlyaPrinteraRez; ?>
                        </div>
                    </div>
                <? } ?>
            </div>
        <? } ?>
    </div>
    <!-- Правый верхний блок -->
    <div class="rightTopTovar">
        <div class="dostavka_i_oplata">
            <!-- <center> -->
            <div class="bloker_info_timework">
                <!-- БЛОК ИФНФОРМАЦИИ  -->
                <div class="info_timework_block">
                    <!-- ЗАГОЛОВОК -->
                    <div class="info_time_title" id="show_b4">
                        <img src="/filpannext/FilpanDesign/PageImages/icon_prod_1.png" class="info_time_icon_1">
                        <span class="info_time_text_title">Время работы</span>
                    </div>
                    <!-- ИНФОРМАЦИЯ -->
                    <div class="info_information" id="cblock_b4">
                        ПН - ПТ с 9-00 до 18-00 <br>
                        СБТ с 11-00 до 15-00 <br>
                        ВСК - выходной <br>
                    </div>
                </div>
                <!-- БЛОК ИФНФОРМАЦИИ  -->
                <div class="info_timework_block">
                    <!-- ЗАГОЛОВОК -->
                    <div class="info_time_title" id="show_b1">
                        <img src="/filpannext/FilpanDesign/PageImages/icon_prod_2.png" class="info_time_icon_2">
                        <span class="info_time_text_title">Контакты</span>
                    </div>
                    <!-- ИНФОРМАЦИЯ -->
                    <div class="info_information" id="cblock_b1">
                        <div class="block_cont">
                            <div class="block_ico_con"><img src="/filpannext/FilpanDesign/PageImages/tell_gray.png"
                                                            class="con_tell"></div>
                            <a href="tel:+74959430773">
                                <div class="blcok_text_Con" style="color: rgb(144, 144, 144);">(495) 943-07-73</div>
                            </a>
                        </div>
                        <div class="block_cont">
                            <div class="block_ico_con"><img src="/filpannext/FilpanDesign/PageImages/tell_gray.png"
                                                            class="con_tell"></div>
                            <a href="tel:+74957760570">
                                <div class="blcok_text_Con" style="color: rgb(144, 144, 144);">(495) 776-05-70</div>
                            </a>
                        </div>
                        <div class="block_cont">
                            <div class="block_ico_con"><img src="/filpannext/FilpanDesign/PageImages/mail_gray.png"
                                                            class="con_mail"></div>
                            <a href="mailto:filpan@yandex.ru">
                                <div class="blcok_text_Con" style="color: rgb(144, 144, 144);">filpan@yandex.ru</div>
                            </a>
                        </div>
                        <div class="block_cont">
                            <div class="block_ico_con"><img src="/filpannext/FilpanDesign/PageImages/skype_gray.png"
                                                            class="con_skype"></div>
                            <a href="tel:jarosss333">
                                <div class="blcok_text_Con" style="color: rgb(144, 144, 144);">jarosss333</div>
                            </a>
                        </div>
                        <a href="/kontakti.php" target="_blank" class="more_link_cont_prod">подробнее</a>
                    </div>
                </div>
                <!-- БЛОК ИФНФОРМАЦИИ  -->
                <div class="info_timework_block" id="show_b2">
                    <!-- ЗАГОЛОВОК -->
                    <div class="info_time_title">
                        <img src="/filpannext/FilpanDesign/PageImages/icon_prod_3.png" class="info_time_icon_3">
                        <span class="info_time_text_title">Оплата товара</span>
                    </div>
                    <!-- ИНФОРМАЦИЯ -->
                    <div class="info_information" id="cblock_b2">
                        • Наличный платеж <br>
                        • Безналичный платеж <br>
                        <a href="/oplata.php" target="_blank" class="more_link_cont_prod">подробнее</a>
                    </div>
                </div>
                <!-- БЛОК ИФНФОРМАЦИИ  -->
                <div class="info_timework_block" id="show_b3">
                    <!-- ЗАГОЛОВОК -->
                    <div class="info_time_title">
                        <img src="/filpannext/FilpanDesign/PageImages/icon_prod_4.png" class="info_time_icon_4">
                        <span class="info_time_text_title">Доставка товара</span>
                    </div>
                    <!-- ИНФОРМАЦИЯ -->
                    <div class="info_information" id="cblock_b3">
                        • Самовывоз <br>
                        • Доставка курьером <br>
                        <a href="/dostavka.php" target="_blank" class="more_link_cont_prod">подробнее</a>
                    </div>
                </div>
            </div>
            <!-- </center> -->
        </div>
        <!-- ВНИМАНИЕ -->
        <div class="VneshniyVidTovara ProstoyText">
            Уважаемые покупатели! Производитель оставляет за собой право изменять характеристики товара, внешний вид
            упаковки и комплектность без предварительного уведомления. Товары, услуги и цены, размещенные на сайте, не
            являются публичной офертой.
        </div>
        <div class="VneshniyVidTovara ProstoyText">
            Уважаемые покупатели!
            Цена действительна при заказе в интернет-магазине. В розничных магазинах и заказе по телефону цена может
            быть другой. Стоимость доставки может ваьироваться от веса товара, удаленности от метро, как в большую, так
            и в меньшую сторону.
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.butons_params').click(function () {
            $('.butons_params').attr("class", "butons_params");
            $(this).attr("class", "butons_params active_button_param");
            var kratkoeOpisanie = $('#kratkoeOpisanie');
            var polnoeOpisanie = $('#polnoeOpisanie');
            var harakteristiki = $('#harakteristiki');
            var otzivy = $('#otzivy');
            var SoputstvuyushieTovariIUslugi = $('.SoputstvuyushieTovariIUslugi');
            var id_click = $(this).attr("id");
            if (id_click == "btab-1") {
                SoputstvuyushieTovariIUslugi.insertAfter(kratkoeOpisanie);
                polnoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                harakteristiki.insertAfter(polnoeOpisanie);
                otzivy.insertAfter(harakteristiki);
            }
            if (id_click == "btab-2") {
                SoputstvuyushieTovariIUslugi.insertAfter(polnoeOpisanie);
                kratkoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                harakteristiki.insertAfter(kratkoeOpisanie);
                otzivy.insertAfter(harakteristiki);
            }
            if (id_click == "btab-3") {
                SoputstvuyushieTovariIUslugi.insertAfter(harakteristiki);
                kratkoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                polnoeOpisanie.insertAfter(kratkoeOpisanie);
                otzivy.insertAfter(polnoeOpisanie);
            }
            if (id_click == "btab-4") {
                SoputstvuyushieTovariIUslugi.insertAfter(otzivy);
                kratkoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                polnoeOpisanie.insertAfter(kratkoeOpisanie);
                harakteristiki.insertAfter(polnoeOpisanie);
            }
        });
    });
</script>
<div class="LevoeObsheeOknoKartochkaTovara">
    <div class="ContentElementiLevoeObsheeOknoKartochkaTovara">
        <!-- ПЕРЕКЛЮЧАТЕЛИ -->
        <div id="btab-1" class="butons_params active_button_param">Краткое описание</div>
        <div id="btab-2" class="butons_params">Полное описание</div>
        <div id="btab-3" class="butons_params">Характеристики</div>
        <div id="btab-4" class="butons_params">Отзывы</div>
        <div class="block_param_and_rew">
            <!-- БЛОК КРАТКОЕ ОПИСАНИЕ -->
            <div class="block_param new" id="kratkoeOpisanie">
                <!--<div class="minidescrBloker">-->
                <div class="description_block" itemprop="description">
                    <? echo sprintf('<p> %s </p>', str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('opisanie'))); ?>
                </div>
                <!--<div class="hideMiniDesc">Свернуть текст</div>
            </div>
            <div class="showMiniDesc">Развернуть текст</div>-->
            </div>
            <!-- БЛОК СОПУТСТВУЮЩИХ ТОВАРОВ -->
            <div class="SoputstvuyushieTovariIUslugi">
                <?
                $SoputstvuyushieTovari = new SoputstvuyushieTovariIUslugi();
                $MassivKriteriev = array();
                $MassivKriteriev['id_tovara_uslugi'] = $id_tovara;
                $MassivKriteriev['tip'] = $_VIDI_TOVAROV_USLUG['tovar'];
                //print_r($MassivKriteriev);
                $SoputstvuyushieTovari->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
                $SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
                if ($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii()) { ?>
                    <div class="SoputstvuyushieTovari">
                        <span class="ZagolovokSoputstvuyushieTovari">Сопутствующие товары</span>
                        <div class="ObshiySpisokSoputstvuushixTovarov">
                            <div class="carousel shadow">
                                <div class="carousel-button-left" id="left_sop_tovar">
                                    <a href="#" id="res_image_left"></a>
                                </div>
                                <div class="carousel-button-right" id="right_sop_tovar">
                                    <a href="#" id="res_image_right"></a>
                                </div>
                                <div class="carousel-wrapper">
                                    <div class="carousel-items">
                                        <? while ($SoputstvuyushieTovari->poluchitSleduyushiy()) {
                                            $ElementTovarov = new ElementTovarovUslug();
                                            $ElementTovarov->poluchit($SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);
                                            echo sprintf('
                                                <div class="carousel-block">
                                                    <div class="SoputstvuyushiyTovarElement">
                                                        <div class="block_sop_tovar_informer">
                                                            <div>
                                                                <a href="%s"><img src="%s" class="KartinkaTovaraSoputstvuyushiyTovarElement" alt="%s"></a>
                                                            </div>	
                                                            <div class="ElementiContentaSoputstvuyushiyTovarElement">
                                                                <a href="%s" class="SsilkaNaSoputstvushiyTovar">%s</a>
                                                            </div>
                                                            <div class="ElementiContentaSoputstvuyushiyTovarElement" id="price_blocker">
                                                                <span class="Cena" id="new_sop_price"> %s руб.</span>	
                                                            </div>
                                                            <div class="ElementiContentaSoputstvuyushiyTovarElement">
                                                            </div>	
                                                        </div>	
                                                        <div class="DivContentSoputstvuyushiyTovarElement" id="bottom_sop_tovar">
                                                            <span class="ProstoyText"></span>
                                                            <input type="text" value="1" class="StrokaVvodaKolichestvo" id="val_gold">	
                                                            <div class="button_add_to_cart" id="goldcolor">
                                                                <img src="/filpannext/FilpanDesign/PageImages/add_to_cart_button_icon.png" class="add_to_cart_icon_sop_2" >
                                                                <span class="add_to_cart_text_button_sop_2">купить</span>
                                                            </div>
                                                            <input type="hidden" value="%s">
                                                        </div>	
                                                    </div>
                                                </div>', $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'), str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), mb_substr(str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), 0, 100) . '...', ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'), $ElementTovarov->poluchitSvoystvo('valuta')), $_WEB_ROOT, $ElementTovarov->poluchitSvoystvo('id'));
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
                <?
                $SoputstvuyushieTovari = new SoputstvuyushieTovariIUslugi();
                $MassivKriteriev = array();
                $MassivKriteriev['id_tovara_uslugi'] = $id_tovara;
                $MassivKriteriev['tip'] = $_VIDI_TOVAROV_USLUG['usluga'];
                $SoputstvuyushieTovari->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
                $SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
                if ($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii()) { ?>
                    <div class="SoputstvuyushieTovari">
                        <span class="ZagolovokSoputstvuyushieTovari">Сопутствующие услуги</span>
                        <div class="ObshiySpisokSoputstvuushixTovarov">
                            <div class="carousel shadow">
                                <div class="carousel-button-left" id="left_sop_tovar"><a href="#"
                                                                                         id="res_image_left"></a>
                                </div>
                                <div class="carousel-button-right" id="right_sop_tovar"><a href="#"
                                                                                           id="res_image_right"></a>
                                </div>
                                <div class="carousel-wrapper">
                                    <div class="carousel-items">
                                        <? while ($SoputstvuyushieTovari->poluchitSleduyushiy()) {
                                            $ElementTovarov = new ElementTovarovUslug();
                                            $ElementTovarov->poluchit($SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);
                                            echo sprintf('
                                            <div class="carousel-block">
                                                <div class="SoputstvuyushiyTovarElement">
                                                    <div class="block_sop_tovar_informer">
                                                        <div>
                                                            <a href="%s"><img src="%s" class="KartinkaTovaraSoputstvuyushiyTovarElement" alt="%s"></a>
                                                        </div>	
                                                        <div class="ElementiContentaSoputstvuyushiyTovarElement">
                                                            <a href="%s" class="SsilkaNaSoputstvushiyTovar">%s</a>
                                                        </div>
                                                        <div class="ElementiContentaSoputstvuyushiyTovarElement" id="price_blocker">
                                                            <span class="Cena" id="new_sop_price"> %s руб.</span>	
                                                        </div>
                                                        <div class="ElementiContentaSoputstvuyushiyTovarElement"></div>	
                                                    </div>
                                                    <div class="DivContentSoputstvuyushiyTovarElement" id="bottom_sop_tovar">
                                                        <span class="ProstoyText"></span>
                                                        <input type="text" value="1" class="StrokaVvodaKolichestvo" id="val_gold">	
                                                        <div class="button_add_to_cart" id="goldcolor">
                                                            <img src="/filpannext/FilpanDesign/PageImages/add_to_cart_button_icon.png" class="add_to_cart_icon_sop_2" >
                                                            <span class="add_to_cart_text_button_sop_2">купить</span>
                                                        </div>
                                                        <input type="hidden" value="%s">
                                                    </div>	
                                                </div>
                                            </div>', $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'), str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), mb_substr(str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), 0, 100) . '...', ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'), $ElementTovarov->poluchitSvoystvo('valuta')), $_WEB_ROOT, $ElementTovarov->poluchitSvoystvo('id'));
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <!-- БЛОК ПОЛНОЕ ОПИСАНИЕ -->
            <? $dopolnitelnoe_opisanie = str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('dopolnitelnoe_opisanie'));
            if (strlen($dopolnitelnoe_opisanie)) { ?>
                <div class="block_param new" id="polnoeOpisanie">
                    <? echo sprintf('<div class="DopolnitelnoeOpisanie TextContenta">%s</div>', $dopolnitelnoe_opisanie); ?>
                </div>
                <?
            } else { ?>
                <div class="block_param new" id="polnoeOpisanie">
                    <div class="header_cart_prod"></div>
                    <div class="DopolnitelnoeOpisanie TextContenta"></div>
                </div>
            <? } ?>
            <!-- БЛОК ХАРАКТЕРИСТИК -->
            <? if (mb_strlen($ElementTovara->poluchitSvoystvo('harakteristiki'))) { ?>
                <div class="block_param new" id="harakteristiki">
                    <? echo str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('harakteristiki')); ?>
                    <!-- <div class="param_line"><span class="name_param">Устройство</span><span class="param_informer">принтер</span></div>
                    <div class="param_line white_line"><span class="name_param">Технология печати	</span><span class="param_informer">лазерная</span></div>
                    <div class="param_line"><span class="name_param">Тип печати</span><span class="param_informer">черно-белая</span></div>
                    <div class="param_line white_line"><span class="name_param">Область применения</span><span class="param_informer">средний офис</span></div>
                    <div class="param_line"><span class="name_param">Максимальный формат</span><span class="param_informer">A4</span></div>
                    <div class="param_line white_line"><span class="name_param">Автоматическая двусторонняя печать</span><span class="param_informer">есть</span></div>
                    <div class="param_line"><span class="name_param">Максимальное разрешение для ч/б печати</span><span class="param_informer">1200x1200 dpi</span></div>
                    <div class="param_line white_line"><span class="name_param">Скорость печати</span><span class="param_informer">28 стр/мин (ч/б А4)</span></div> -->
                </div>
            <? } else { ?>
                <div class="block_param new" id="harakteristiki"></div>
            <? } ?>
            <!-- БЛОК ОТЗЫВЫ -->
            <div class="block_param new" id="otzivy"></div>
        </div>
    </div>
    <?
    //if(empty($ElementTovara->poluchitSvoystvo('textoviy_modul'))){
    echo sprintf('<div style ="padding:30px">%s</div>', $ElementTovara->poluchitSvoystvo('textoviy_modul'));
    //}
    ?>
</div>
</div>
</div>
