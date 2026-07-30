<div class="ModulSredneyKolonki" itemscope itemtype="https://schema.org/Offer">

    <?
    $Status = '';
    if ($ElementTovara->poluchitSvoystvo('market')) {
        $Status .= 'M';
    }
    if ($ElementTovara->poluchitSvoystvo('nazakaz')) {
        $Status .= 'Z';
    }
    if ($ElementTovara->poluchitSvoystvo('vnalichii')) {
        $Status .= 'V';
    }

    if (count($Status)) {
        $YandexMarket = "<span class='YandexMarketStatus'>$Status</span>";
    }
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
            <div class="CartElementTovaraText"><span id="KolichestvoTovarov"><?= $ObsheeKolichestvo; ?></span>
                товара(ов)
            </div>
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
    <div class="titlePRD"><? echo sprintf('%s<h1 class="name_tovar" itemprop="name">%s</h1><br>', $YandexMarket, str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('nazvanie'))); ?></div>
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

    <!-- Левый верхний блок  -->
    <div class="leftTopTovar">

        <? //$_SHOW_IMAGES=1;?>

        <? if ($_SHOW_IMAGES == '1'): $image_style = ' style="padding: 25px 15px 25px 76px;"' ?>
            <div class="marker_Blokers">
                <?
                if ($ElementTovara->poluchitSvoystvo('vid_kartinka_1') == "-" || $ElementTovara->poluchitSvoystvo('vid_kartinka_1') == "") {
                } else {
                    echo sprintf('<img src="/filpannext/FilpanDesign/Tovar_Usluga_Img/%s"  id="marker-a">', $ElementTovara->poluchitSvoystvo('vid_kartinka_1'));
                }
                ?>

                <?
                if ($ElementTovara->poluchitSvoystvo('vid_kartinka_2') == "-" || $ElementTovara->poluchitSvoystvo('vid_kartinka_2') == "") {
                } else {
                    echo sprintf('<img src="/filpannext/FilpanDesign/Tovar_Usluga_Img/%s"  id="marker-r">', $ElementTovara->poluchitSvoystvo('vid_kartinka_2'));
                }
                ?>

                <!--<img src="/filpannext/FilpanDesign/PageImages/marker-a.png" id="marker-a">
                <img src="/filpannext/FilpanDesign/PageImages/marker-r.png" id="marker-r">-->
            </div>
        <? endif; ?>
        <div class="video_bloker">
            <img src="/filpannext/FilpanDesign/PageImages/video-icon.png" id="videoIcon">
            <div class="wathvideo">Как заправить ?</div>
        </div>

        <!--<div class="sovmesimiyBloker">Совместимые</div>-->
        <!-- Картинка -->
        <div class="image_block" <?= $image_style ?>>
            <? echo sprintf('<img src="%s" alt="%s" class="KartinkaTovara" itemprop="image">', $_WEB_ROOT_IMG . $ElementTovara->poluchitSvoystvo('picture'), str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('nazvanie')));

            //Если $ElementTovara->poluchitSvoystvo('vid_kartinka_1')=="-", ничего не выводить
            // echo $_WEB_ROOT_DESIGN_IMG.$ElementTovara->poluchitSvoystvo('vid_kartinka_1');
            // В папке /filpannext/FilpanDesign/new_images/' создать файлы
            //'img1_1.png';'img1_2.png';'img1_3.png';
            // echo $_WEB_ROOT_DESIGN_IMG.$ElementTovara->poluchitSvoystvo('vid_kartinka_2');
            // В папке /filpannext/FilpanDesign/new_images/' создать файлы
            //'img2_1.png';'img2_2.png';'img2_3.png';
            ?>
        </div>
    </div>

    <!-- Центральный верхний блок -->
    <div class="centerTopTovar">

        <!-- код товара-->
        <div class="code_tovar"><? echo sprintf('<div class="ElementiContenta"id="kod_tovara"> <span class="TextKartochkiTovara">Код товара: № %s </span> </div>', $ElementTovara->poluchitSvoystvo('id')); ?></div>

        <?
        $Cena = ElementTovarovUslug::poluchitCenuVRubliach($ElementTovara->poluchitSvoystvo('cena'), $ElementTovara->poluchitSvoystvo('valuta'));

        if ($ElementTovara->poluchitSvoystvo('tolko_samovivoz') == 1) {
            echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="Cena" style="color: #FF0000;"> Только самовывоз</span>	
	</div>');
        }
        if ($ElementTovara->poluchitSvoystvo('vnalichii') == 1) {
            echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="TextKartochkiTovara">Наличие:</span><span class="Cena" style="color: #75BA00;"> есть в наличии</span>	
	</div>');
        } elseif ($ElementTovara->poluchitSvoystvo('nazakaz') == 1) {
            echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="TextKartochkiTovara">Наличие:</span><span class="na_zakaz"> на заказ<br>(уточняйте у менеджера)</span>	
	</div>');
        } else {
            echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="TextKartochkiTovara">Наличие:</span><span class="na_zakaz"> на заказ<br>(уточняйте у менеджера)</span>	
	</div>');
        }
        ?>

        <? echo sprintf('
		<!-- ЦЕНА -->	
		<div class="ElementiContenta" id="price_block">
			<div class="cena_title">Цена:</div>
			<div class="cena_count" itemprop="price" content="%s">%s <span itemprop="priceCurrency" content="RUB">руб.</span></div>
		</div>

		<!-- КНОПКА КУПИТЬ -->	
		<div class="DivContentSuperPredlogeniye" id="block_buy_prod">
			<input type="text" value="1" class="StrokaVvodaKolichestvo_big StrokaVvodaKolichestvo">
			<div class="counts_buttons">
				<div class="addcount pluse_add">+</div>
				<div class="addcount minus_add">-</div>
			</div>	
			<div class="button_add_to_cart_big KorzinaKupit ">
				<img src="%sFilpanDesign/PageImages/big_cart.png" class="add_to_cart_icon_big">
				<span class="add_to_cart_text_button_big">Добавить в корзину</span>
				<span class="add_to_cart_text_button_big_small_res">В корзину</span>
			</div>

			<input type="hidden" value="%s">
		</div>
		', $Cena, $Cena, $_WEB_ROOT, $ElementTovara->poluchitSvoystvo('id'), $_WEB_ROOT_HREF, $_WEB_ROOT, $_WEB_ROOT_HREF, $_WEB_ROOT, $_WEB_ROOT, str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('nazvanie')), str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('opisanie')));
        ?>

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
            быть другой. Стоимость доставки может варьироваться от веса товара, удаленности от метро, как в большую, так
            и в меньшую сторону.
        </div>
    </div>

</div>

<div class="LevoeObsheeOknoKartochkaTovara">
    <div class="ContentElementiLevoeObsheeOknoKartochkaTovara">

        <!-- ПЕРЕКЛЮЧАТЕЛИ -->
        <div id="btab-1" class="butons_params active_button_param">Характеристики</div>
        <div id="btab-2" class="butons_params">Краткое описание</div>
        <div id="btab-3" class="butons_params">Полное описание</div>
        <div id="btab-4" class="butons_params">Отзывы</div>

        <div class="block_param_and_rew">

            <!-- БЛОК ХАРАКТЕРИСТИК -->
            <div class="block_param new" id="harakteristiki">
                    <span class="ZagolovokOpisanie">Характеристики</span>
                    <?foreach ($propsValues as $propName => $propValue) :?>
                        <div>
                            <span><?= $propName ?>:</span>
                            <span><?= $propValue ?></span>
                        </div>
                    <?endforeach;?>
            <? if (mb_strlen($ElementTovara->poluchitSvoystvo('harakteristiki'))) { ?>
                    <?echo str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('harakteristiki')); ?>
            <? } ?>
            </div>
		
            <!-- БЛОК КРАТКОЕ ОПИСАНИЕ --> 
            <div class="block_param new" id="kratkoeOpisanie">
                <!--<div class="minidescrBloker">-->
                <div class="description_block" itemprop="description">
                    <span class="ZagolovokOpisanie">Краткое описание</span>
					<?if ($_POKAZ_OPISANIYA!="not_show"){?>
						<?if($_POKAZ_OPISANIYA=="show_noindex"):?>
							<noindex>
						<?endif;?>
						
						<? echo sprintf('<p> %s </p>', str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('opisanie'))); ?>
						
						<?if($_POKAZ_OPISANIYA=="show_noindex"):?>
							</noindex>
						<?endif;?>
					<?}?>
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
                                                            
                                                            <div class="button_add_to_cart KorzinaKupit" id="goldcolor">
                                                                <img src="/filpannext/FilpanDesign/PageImages/add_to_cart_button_icon.png" class="add_to_cart_icon_sop_2" >
                                                                <span class="add_to_cart_text_button_sop_2">купить</span>
                                                            </div>
                                                            
                                                            <input type="hidden" value="%s">
                                                        </div>	
                                                    </div>
                                                </div>', $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'), str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), mb_substr(str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), 0, 100) . '...', ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'), $ElementTovarov->poluchitSvoystvo('valuta')), $ElementTovarov->poluchitSvoystvo('id'));
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
                                                                        
                                                        <div class="button_add_to_cart KorzinaKupit" id="goldcolor">
                                                            <img src="/filpannext/FilpanDesign/PageImages/add_to_cart_button_icon.png" class="add_to_cart_icon_sop_2" >
                                                            <span class="add_to_cart_text_button_sop_2">купить</span>
                                                        </div>
                                                                        
                                                        <input type="hidden" value="%s">
                                                    </div>	
                                                </div>
                                            </div>', $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'), str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), $_WEB_ROOT_HREF . $ElementTovarov->poluchitSvoystvo('ssilka'), mb_substr(str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovarov->poluchitSvoystvo('nazvanie')), 0, 100) . '...', ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'), $ElementTovarov->poluchitSvoystvo('valuta')), $ElementTovarov->poluchitSvoystvo('id'));
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>

            <!-- БЛОК ПОЛНОЕ ОПИСАНИЕ -->
            <? $dopolnitelnoe_opisanie = str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('dopolnitelnoe_opisanie'));?>
            <div class="block_param new" id="polnoeOpisanie">
                <span class="ZagolovokOpisanie">Полное описание</span>
				<?if ($_POKAZ_OPISANIYA_KARTOCHKA!="not_show"){?>
					<?if($_POKAZ_OPISANIYA_KARTOCHKA=="show_noindex"):?>
					<noindex>
					<?endif;?>	
					
						<? echo sprintf('<div class="DopolnitelnoeOpisanie TextContenta">%s</div>', $dopolnitelnoe_opisanie); ?>
						
					<?if($_POKAZ_OPISANIYA_KARTOCHKA=="show_noindex"):?>
					</noindex>
					<?endif;?>	
				<?}?>
            </div>
				
            <!-- БЛОК ОТЗЫВЫ -->
            <div class="block_param new" id="otzivy">
                <span class="ZagolovokOpisanie">Отзывы</span>
            </div>
        </div>

        <?
        //if(empty($ElementTovara->poluchitSvoystvo('textoviy_modul'))){
        echo sprintf('<div style ="padding:30px">%s</div>', $ElementTovara->poluchitSvoystvo('textoviy_modul'));
        //}
        ?>
    </div>
</div>
