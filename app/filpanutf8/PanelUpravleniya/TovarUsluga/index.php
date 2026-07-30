<?
error_reporting(E_ERROR);

require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$User = new ElementUserLog();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
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

$MassivKriteriyev = array();
$MassivKriteriyev['ssilka'] = $_REQUEST['input_uri'];

$MassivRoditeleyElementaMenu=array();

if (isset($_REQUEST['id'])) {
    $ElementTovarovUslug = new ElementTovarovUslug();
    $ElementTovarovUslug->poluchit($_REQUEST['id']);

    $KluchevoeSlovo = $ElementTovarovUslug->poluchitSvoystvo('kluchevoe_slovo');
    $title = $ElementTovarovUslug->poluchitSvoystvo('title');
    //////
    if (strpos($title, "_***_") && !empty($KluchevoeSlovo)) {
        $title = str_replace('_***_', $KluchevoeSlovo, $title);
    }
    //////
    $keywords = $ElementTovarovUslug->poluchitSvoystvo('keywords');
    //////
    if (strpos($keywords, "_***_") && !empty($KluchevoeSlovo)) {
        $keywords = str_replace('_***_', $KluchevoeSlovo, $keywords);
    }
    //////
    $description = $ElementTovarovUslug->poluchitSvoystvo('description');
    //////
    if (strpos($description, "_***_") && !empty($KluchevoeSlovo)) {
        $description = str_replace('_***_', $KluchevoeSlovo, $description);
    }
    //////
    $id_menu = $ElementTovarovUslug->poluchitSvoystvo('menu_id');;

    //Получаем родительские категории меню
    $TekushiyElementMenu = new ElementMenu();
    $TekushiyElementMenu->poluchit($id_menu);
    $MassivRoditeleyElementaMenu = array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());
    array_push($MassivRoditeleyElementaMenu, $TekushiyElementMenu->poluchitSvoystvo('id'));

    $DannieZapolneniya = $ElementTovarovUslug->poluchitMassivSvoystv();
} else {
    $id_menu = -1;
    $title = "Создать новый элемент меню";
    $keywords = "Создать новый элемент меню";
    $description = "Создать новый элемент меню";
}


?>
<!DOCTYPE html>
<html>
<head>
    <? echo sprintf('<link rel="shortcut icon" href="%sPageImages/favicon.ico" type="image/x-icon">', $_WEB_ROOT); ?>
    <? echo sprintf('<meta name="keywords" content="%s"/>' . "\r\n", $keywords) ?>
    <? echo sprintf('<meta name="description" content="%s"/>' . "\r\n", $description) ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	
    <?require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/GlobalniyePeremennieJS.php");?>
	<? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script type="text/javascript" src="%sPanelUpravleniyaFunctions.js"></script>' . "\r\n", $_WEB_ROOT_ADMIN_HREF); ?>
    <? //echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/uploadify/jquery.uploadify.min.js"></script>'."\r\n",$_WEB_ROOT);?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/ckeditor/ckeditor.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/AjexFileManager/ajex.js"></script>' . "\r\n", $_WEB_ROOT); ?>

    <script type="text/javascript">
        function hideBtn() {

            $('#upload').hide();

            $('#res').html("Идет загрузка файла");

        }
        function handleResponse(mes) {
            $('#upload').show();
            if (mes.errors != null) {
                $('#res').html("Возникли ошибки во время загрузки файла: " + mes.errors);
            }
            else {
                //$('#res').html("Файл " + mes.name + " загружен");  
                $('#input_picture').val(mes.name);
                $('#picture').attr("src", WEB_ROOT_IMG + mes.name);
            }
        }
        $(document).ready(function () {
                inicializaciyaSobitiy();
                nachalniyeSobitiyaPaneliUpravleniyaElementTovarovUslug();


            }
        );
    </script>
    <? echo sprintf('<link rel="stylesheet" type="text/css" href="%s/style.css">' . "\r\n", $_WEB_ROOT_ADMIN_HREF); ?>
    <!-- <link rel="stylesheet" type="text/css" href="uploadify.css" /> -->

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
        <? echo sprintf('<input type="hidden" id="AktivniyElementMenu" value="%s">' . "\r\n", $id_menu); ?>
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


