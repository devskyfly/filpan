<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$User = new ElementUserLog();

if ($User->VxodVAdminku()) {
    $User->ZaregistririvatAdmina();
} else {
    echo "
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/>
    </head>
    <body>
        <form action=\"#\">
        Введите имя: <input type=text name=\"Admin\"><br>
        Введите пароль: <input type=text name=\"Password\"><br>
        <input type=submit value=\"GO!\">
        </form>
    </body>
<html>";
    exit();
}
$ElementSvoystvo = new ElementSvoystva();
if (isset($_REQUEST['id'])) {
    $ElementSvoystvo->poluchit($_REQUEST['id']);
    $title = $ElementSvoystvo->poluchitSvoystvo('title');
    $keywords = $ElementSvoystvo->poluchitSvoystvo('keywords');
    $description = $ElementSvoystvo->poluchitSvoystvo('description');
    $id = $_REQUEST['id'];
    $DannieZapolneniya = $ElementSvoystvo->poluchitMassivSvoystv();
} else {
    $id = -1;
    $title = "Создать новый элемент меню";
    $keywords = "Создать новый элемент меню";
    $description = "Создать новый элемент меню";
}

$id_menu = 0;

?>
<!DOCTYPE html>
<html>
<head>
    <? echo sprintf('<link rel="shortcut icon" href="%sPageImages/favicon.ico" type="image/x-icon">', $_WEB_ROOT); ?>
    <? echo sprintf('<meta name="keywords" content="%s"/>' . "\r\n", $keywords) ?>
    <? echo sprintf('<meta name="description" content="%s"/>' . "\r\n", $description) ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?
    require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/GlobalniyePeremennieJS.php");
    ?>
    <? echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script type="text/javascript" src="%sPanelUpravleniyaFunctions.js"></script>' . "\r\n", $_WEB_ROOT_ADMIN_HREF); ?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/ckeditor/ckeditor.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/AjexFileManager/ajex.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <script type="text/javascript">

        $(document).ready(function () {
                inicializaciyaSobitiy();
                nachalniyeSobitiyaPaneliUpravleniyaSvoystvo();
            }
        );
    </script>
    <? echo sprintf('<link rel="stylesheet" type="text/css" href="%s/style.css">' . "\r\n", $_WEB_ROOT_ADMIN_HREF); ?>

    <title>
        <? echo $title; ?>
    </title>
</head>
<body>
<div id="FonZatemneniyaKorzini"></div>
<div id='GlavniyDIV'>
    <div id='VerxniyDiv'>
        <? require('../ObshiyeModuli/VerxniyDiv.php'); ?>
    </div>
    <div id='SredniyDiv'>
        <? echo sprintf('<input type="hidden" id="AktivniyElementMenu" value="%s">' . "\r\n", -1); ?>
        <span class="raskritiyePlus">+</span>
        <span class="raskritiyeMinus">-</span>
        <div id='LevayaKolonkaSredniyDiv'>
            <? require('../ObshiyeModuli/LevayaKolonkaSredniyDiv.php'); ?>
            <? require('../ObshiyeModuli/LevoeMenu.php'); ?>
        </div>

        <div id="SrednayaKolonkaSredniyDivDlyaPaneliUpravleniya">
            <? require('SrednayaKolonkaSredniyDivElement.php'); ?>
        </div>
    </div>
</div>
</body>
</html>


