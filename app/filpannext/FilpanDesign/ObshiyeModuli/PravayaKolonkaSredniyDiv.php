<? if ($_REQUEST['input_uri'] != "index.php") {
    echo "<!--noindex-->";
}

$CartData=$User->PoluchitObshuyuSummuIKolichestvo();
$CartDataArr=explode('==',$CartData);
$ObsheeKolichestvo = $CartDataArr[0];
$VsegokOplate = $CartDataArr[1];
?>
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
    <div><a class="lightbox-40161040460336 callback orange_link js-open-feedback">Напишите нам</a></div>
    <div style="text-align:center"><a class="lightbox-40151877212348 orange_link callback js-open-feedback">Закажите звонок</a>
    </div></div>
<script>
    $(function () {
        var $modal = $('#feedbackModal');
        var $form = $('#feedbackForm');
        var $message = $('#feedbackMessage');
        var $submitButton = $form.find('[type="submit"]');
        var $lastFocusedElement = $();

        function openFeedbackModal() {
            $lastFocusedElement = $(document.activeElement);

            $modal
                .addClass('is-open')
                .attr('aria-hidden', 'false');

            $('body').addClass('feedback-modal-open');

            window.setTimeout(function () {
                $('#feedbackName').trigger('focus');
            }, 50);
        }

        function closeFeedbackModal() {
            $modal
                .removeClass('is-open')
                .attr('aria-hidden', 'true');

            $('body').removeClass('feedback-modal-open');

            if ($lastFocusedElement.length) {
                $lastFocusedElement.trigger('focus');
            }
        }

        // Открытие по кнопке.
        // Можно добавить класс js-open-feedback к любой кнопке или ссылке.
        $(document).on('click', '.js-open-feedback', function (event) {
            event.preventDefault();
            openFeedbackModal();
        });

        // Закрытие по крестику
        $(document).on('click', '.js-close-feedback', function () {
            closeFeedbackModal();
        });

        // Закрытие при клике на затемнённый фон
        $modal.on('click', '.feedback-modal__overlay', function () {
            closeFeedbackModal();
        });

        // Закрытие по Escape
        $(document).on('keydown', function (event) {
            if (event.key === 'Escape' && $modal.hasClass('is-open')) {
                closeFeedbackModal();
            }
        });

        $form.on('submit', function (event) {
            event.preventDefault();

            $message
                .removeClass('is-success is-error')
                .hide()
                .text('');

            $submitButton
                .prop('disabled', true)
                .text('Отправка...');

            $.ajax({
                url: '/feedback/executor.php',
                type: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                timeout: 15000
            })
                .done(function (response) {
                    if (response.success) {
                        $message
                            .addClass('is-success')
                            .text(response.message || 'Спасибо! Сообщение отправлено.')
                            .show();

                        $form[0].reset();

                        // При необходимости закрываем окно через 2 секунды
                        window.setTimeout(function () {
                            closeFeedbackModal();

                            $message
                                .removeClass('is-success is-error')
                                .hide()
                                .text('');
                        }, 2000);
                    } else {
                        $message
                            .addClass('is-error')
                            .text(response.message || 'Не удалось отправить сообщение.')
                            .show();
                    }
                })
                .fail(function (xhr) {
                    var errorMessage = 'Произошла ошибка. Попробуйте ещё раз.';

                    if (
                        xhr.responseJSON &&
                        xhr.responseJSON.message
                    ) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    $message
                        .addClass('is-error')
                        .text(errorMessage)
                        .show();
                })
                .always(function () {
                    $submitButton
                        .prop('disabled', false)
                        .text('Отправить');
                });
        });
    });
</script>
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
