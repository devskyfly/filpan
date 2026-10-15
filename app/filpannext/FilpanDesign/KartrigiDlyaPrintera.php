<?
$time_start = microtime(1);
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

?>
    <!DOCTYPE html>
    <html>
    <head>
        <? echo sprintf('<link rel="shortcut icon" href="%sFilpanDesign/PageImages/favicon.ico" type="image/x-icon">', $_WEB_ROOT); ?>
        <? echo sprintf('<meta name="keywords" content="%s"/>' . "\r\n", $keywords) ?>
        <? echo sprintf('<meta name="description" content="%s"/>' . "\r\n", $description) ?>

        <?echo sprintf('<meta property="og:title" content="%s"/>'."\r\n",$title)?>
        <?echo sprintf('<meta property="og:description" content="%s"/>'."\r\n",$description)?>
        <?echo sprintf('<meta property="og:url" content="%s">'."\r\n",request_url())?>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0"/>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        <? require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FilpanDesign/GeoTag.php"); ?>
        <? echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>' . "\r\n", $_WEB_ROOT); ?>
        <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>' . "\r\n", $_WEB_ROOT); ?>
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
                    var countPRD =$(this).prev().val();
                    countPRD++;
                    $(this).prev().val(countPRD);
                });
                $('.minus_add').click(function () {
                    var countPRD = $(this).next().val();
                    countPRD--;
                    $(this).next().val(countPRD);

                });
            });
        </script>
        <? echo sprintf('<link rel="stylesheet" type="text/css" href="%sFilpanDesign/style.css">' . "\r\n", $_WEB_ROOT); ?>
        <title>
            <? echo $title; ?>
        </title>

    </head>
    <body itemscope itemtype="https://schema.org/Product">
    <a href="https://api.whatsapp.com/send?phone=79151634182" target="_blank" title="Написать в Whatsapp" rel="noopener noreferrer">
        <div class="whatsapp-button"><i class="fa fa-whatsapp"></i></div>
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
                <? require('SrednayaKolonkaSredniyDivKartrigiDlyaPrintera.php'); ?>
                <? require('ObshiyeModuli/FeedbackModalScript.php'); ?>
            </div>
        </div>

    </div>
    <div id='NigniyDiv'>
        <? require('ObshiyeModuli/NigniyDiv.php'); ?>
    </div>

    <div id='Korzina'>
        <? //require('ObshiyeModuli/Korzina.php');?>
    </div>

    <? require('ObshiyeModuli/FormModalWindow.php'); ?>


    <div id="FonZatemneniyaKorzini2"></div>
    </body>
    </html>
<?
$time_end = microtime(1);
$time = $time_end - $time_start;
//echo $time;
?>