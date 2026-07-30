<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$User = new ElementUserLog();

$CartData = $User->PoluchitObshuyuSummuIKolichestvo();
$CartDataArr = explode('==', $CartData);
$ObsheeKolichestvo = $CartDataArr[0];
$VsegokOplate = $CartDataArr[1];

$MassivKriteriyev = array();
$MassivKriteriyev['ssilka'] = $_REQUEST['input_uri'];

$ElementTovara = new ElementTovarovUslug();

$ElementTovara->poluchitPoKriteriyu($MassivKriteriyev);

$TekushiyElementMenu = new ElementMenu();
$MassivKriteriyevMenu = array();
$MassivKriteriyevMenu['id'] = $ElementTovara->poluchitSvoystvo('menu_id');
$TekushiyElementMenu->poluchitPoKriteriyu($MassivKriteriyevMenu);

$id = $ElementTovara->poluchitSvoystvo('menu_id');
$id_tovara = $ElementTovara->poluchitSvoystvo('id');

$title = str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('title'));
$keywords = str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('keywords'));
$description = str_replace('_***_', $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('description'));
$picture = "https://www.filpan.ru".$_WEB_ROOT_IMG . $ElementTovara->poluchitSvoystvo('picture');

//Свойства товаров

$MassivRoditeleyElementaMenu = array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());

if (!empty($MassivRoditeleyElementaMenu)) {
    $UsloviyaZaprosa = preobrazovatMassivVINUsloviyeZaprosa($MassivRoditeleyElementaMenu, 'kategoriya_svoystva');
    $ZaprosNaChteniye = new ZaprosNaChteniye('SELECT k.id_svoystva FROM filpan_new_kategorii_svoystv k LEFT JOIN filpan_new_svoystva s ON (s.id = k.id_svoystva) WHERE ' . $UsloviyaZaprosa . ' order by sortirovka');
    if ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() > 0) {
        $MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
    }

//Получаем данные по свойству и значения
    $propsValues["Производитель принтера"] = $ElementTovara->poluchitSvoystvo('vendor');

    foreach ($MassivInformacii as $key => $svoystvo) {

        $ElementSvoystvo = new ElementSvoystva();

        $ElementSvoystvo->poluchit($svoystvo['id_svoystva']);

        //Не выводим свойства с постоянным значением
        //if ($ElementSvoystvo->poluchitSvoystvo('vid_svoystva') == 3) continue;

        $idSvoystva = $svoystvo['id_svoystva'];
        $nazvanieSvoystva = $ElementSvoystvo->poluchitSvoystvo('nazvaniye');
        $vidSvoystva = $ElementSvoystvo->poluchitSvoystvo('vid_svoystva');

        //Получаем постоянные значения свойств
        if ($vidSvoystva == 3) {
            $Znacheniya = $ElementSvoystvo->poluchitZnacheniyaSvoystva();

            if ($Znacheniya->poluchitSleduyushiy()) {
                $SootvetstviyeTovarSvoystvoZnacheniye = $Znacheniya->_TekushiyElement["znacheniye"];
            }
        } else {
            //Получаем значения динамических свойств
            $ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();
            $MassivKriteriev = array();
            $MassivKriteriev['id_tovar'] = $id_tovara;
            $MassivKriteriev['id_svoystvo'] = $idSvoystva;

            $ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitPoKriteriyu($MassivKriteriev);

            $SootvetstviyeTovarSvoystvoZnacheniye = $ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitSvoystvo('id_znacheniye');

            if ($vidSvoystva == 1) {
                $ZnacheniyaSvoystva = new ZnacheniyaSvoystv();
                $MassivKriteriev = array();
                $MassivKriteriev['id'] = $SootvetstviyeTovarSvoystvoZnacheniye;

                $ZnacheniyaSvoystva->poluchitPoKriteriyu($MassivKriteriev);
                if ($ZnacheniyaSvoystva->poluchitSleduyushiy()) {
                    $SootvetstviyeTovarSvoystvoZnacheniye=$ZnacheniyaSvoystva->_TekushiyElement["znacheniye"];
                }
            }
        }

        if($nazvanieSvoystva=="Ресурс")
        {
            $SootvetstviyeTovarSvoystvoZnacheniye.=" страниц(ы) при 5% заполнении";
        }

        if($SootvetstviyeTovarSvoystvoZnacheniye!="")
        {
            $propsValues[$nazvanieSvoystva] = $SootvetstviyeTovarSvoystvoZnacheniye;
        }
    }
}
?>
<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#">
<head>
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(84421966, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <? echo sprintf('<link rel="shortcut icon" href="%sFilpanDesign/PageImages/favicon.ico" type="image/x-icon">', $_WEB_ROOT); ?>
    <? echo sprintf('<meta name="keywords" content="%s"/>' . "\r\n", $keywords) ?>
    <? echo sprintf('<meta name="description" content="%s"/>' . "\r\n", $description) ?>

    <? echo sprintf('<meta property="og:title" content="%s"/>' . "\r\n", $title) ?>
    <? echo sprintf('<meta property="og:description" content="%s"/>' . "\r\n", $description) ?>
    <? echo sprintf('<meta property="og:url" content="%s">' . "\r\n", request_url()) ?>
    <? echo sprintf('<meta property="og:image" content="%s"/>' . "\r\n", $picture) ?>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <? require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FilpanDesign/GeoTag.php"); ?>
    <? echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-input-mask-phone-number.min.js"></script>'."\r\n",$_WEB_ROOT);?>
    <script src="https://serjopepper.github.io/kick_sovetnik/dist/index.min.js"></script>
    <!-- ЛАЙТБОКС -->
    <link rel="stylesheet" href="css/lightbox.css">
    <script src="js/lightbox.js"></script>
    <!-- ЛАЙТБОКС -->

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-61388795-1', 'auto');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-61388795-1']);
        _gaq.push(['_trackPageview']);
        setTimeout("_gaq.push(['_trackEvent', '15_seconds', 'read'])", 15000);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            inicializaciyaSobitiy();

            $('.pluse_add').click(function () {
                var countPRD = $('.StrokaVvodaKolichestvo_big').val();
                countPRD++;
                $('.StrokaVvodaKolichestvo_big').val(countPRD);
            });
            $('.minus_add').click(function () {
                var countPRD = $('.StrokaVvodaKolichestvo_big').val();
                countPRD--;
                $('.StrokaVvodaKolichestvo_big').val(countPRD);
            });

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
                    SoputstvuyushieTovariIUslugi.insertAfter(harakteristiki);
                    kratkoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                    polnoeOpisanie.insertAfter(kratkoeOpisanie);
                    otzivy.insertAfter(polnoeOpisanie);
                }
                if (id_click == "btab-2") {
                    SoputstvuyushieTovariIUslugi.insertAfter(kratkoeOpisanie);
                    polnoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                    harakteristiki.insertAfter(polnoeOpisanie);
                    otzivy.insertAfter(harakteristiki);
                }
                if (id_click == "btab-3") {
                    SoputstvuyushieTovariIUslugi.insertAfter(polnoeOpisanie);
                    kratkoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                    harakteristiki.insertAfter(kratkoeOpisanie);
                    otzivy.insertAfter(harakteristiki);
                }
                if (id_click == "btab-4") {
                    SoputstvuyushieTovariIUslugi.insertAfter(otzivy);
                    kratkoeOpisanie.insertAfter(SoputstvuyushieTovariIUslugi);
                    polnoeOpisanie.insertAfter(kratkoeOpisanie);
                    harakteristiki.insertAfter(polnoeOpisanie);
                }
            });

            $('.video_bloker').click(function () {
                $('.other_content').html('<iframe width="712" height="400" src="https://www.youtube.com/embed/JVUpX-aspJ4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
                $('.other_content').fadeIn(350);
                $('.zshader').fadeIn(350);
            });

            $('.zshader').click(function () {
                $('.next_bye').fadeOut(220);
                $('.other_content').fadeOut(220);
                $('.zshader').fadeOut(220);
            });

        });
    </script>

    <? echo sprintf('<link rel="stylesheet" type="text/css" href="%sFilpanDesign/style.css">' . "\r\n", $_WEB_ROOT); ?>
    <title>
        <? echo $title; ?>
    </title>

</head>
<body itemscope itemtype="https://schema.org/Product">
<a href="https://web.whatsapp.com/send?phone=79151634182" target="_blank" title="Написать в Whatsapp" rel="noopener noreferrer">
    <div class="whatsapp-button"><i class="fa fa-whatsapp"></i></div>
</a>
<a href="tg://resolve?domain=filpan_servise_centr" target="_blank" title="Написать в Telegram" rel="noopener noreferrer">
    <div class="telegram-button"><i class="fa fa-telegram"></i></div>
</a>
<div id="FonZatemneniyaKorzini"></div>
<div id='GlavniyDIV'>
    <div id='VerxniyDiv'>
        <? require('ObshiyeModuli/VerxniyDiv.php'); ?>
    </div>
    <div id='SredniyDiv'>
        <? echo sprintf('<input type="hidden" id="AktivniyElementMenu" value="%s">' . "\r\n", $id); ?>
        <span class="raskritiyePlus">+</span>
        <span class="raskritiyeMinus">-</span>
        <div id='LevayaKolonkaSredniyDiv'>
            <? require('ObshiyeModuli/LevayaKolonkaSredniyDiv.php'); ?>
        </div>

        <div id="SrednayaKolonkaSredniyDivDlyaTovara">
            <? require('SrednayaKolonkaSredniyDivElementTovara.php'); ?>
        </div>
    </div>

</div>
<div id='NigniyDiv'>
    <? require('ObshiyeModuli/NigniyDiv.php'); ?>
</div>

<div id='Korzina'>
    <? //require('ObshiyeModuli/Korzina.php');?>
</div>


<div id="FonZatemneniyaKorzini2"></div>
</body>
</html>
