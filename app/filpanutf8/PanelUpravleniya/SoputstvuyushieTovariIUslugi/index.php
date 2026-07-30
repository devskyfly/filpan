<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

$User = new ElementUserLog();

if ($User->VxodVAdminku()) {
    $User->ZaregistririvatAdmina();

} else {
    echo "<!DOCTYPE html>
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

    $id_menu = $_REQUEST['id'];
    $TekushayaStranica = $_REQUEST['page'];
    $TekushayaPoziciyaStraniciSpiska = $_REQUEST['page'];
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
	<? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <?
    require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/GlobalniyePeremennieJS.php");
    ?>
    <? echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script type="text/javascript" src="%sPanelUpravleniyaFunctions.js"></script>' . "\r\n", $_WEB_ROOT_ADMIN_HREF); ?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/ckeditor/ckeditor.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <? echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/AjexFileManager/ajex.js"></script>' . "\r\n", $_WEB_ROOT); ?>
    <script type="text/javascript">

        $(document).ready(function () {
                inicializaciyaSobitiy();
                nachalniyeSobitiyaMenuSoputstvuyushiyeTovari();
                //priIzmeneniyiInputTablici();
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

<div id='VerxniyDivSoputstvuyushieTovari'>
</div>


<div id='GlavniyDIV'>

    <div id=''>
        <?
        $ElementTovarov = new ElementTovarovUslug();
        $ElementTovarov->poluchit($_REQUEST['id']);
        $Nazvanie = $ElementTovarov->poluchitSvoystvo('nazvanie');
        //////
        if (strpos($Nazvanie, "_***_") && !empty($KluchevoeSlovo)) {
            $Nazvanie = str_replace('_***_', $KluchevoeSlovo, $Nazvanie);
        }
        //////
        echo sprintf('<div class="SoputstvuyushiyTovarElementDlyaSoputstvuyushih">
										<div><span class="TextKartochkiTovara">Текущий элемент:</span></div>
										<div>
											<img src="%s" class="KartinkaTovaraSoputstvuyushiyTovarElement" alt="%s">
										</div>	
										<div class="ElementiContentaSoputstvuyushiyTovarElement">
										<span class="SsilkaNaSoputstvushiyTovar">%s</span>
										</div>	
										<div class="ElementiContentaSoputstvuyushiyTovarElement">
										
										</div>
									</div>',

            $_WEB_ROOT_IMG . $ElementTovarov->poluchitSvoystvo('picture'), $Nazvanie, $Nazvanie); ?>
    </div>

    <div id='SredniyDiv'>

        <? echo sprintf('<input type="hidden" id="AktivniyElementMenu" value="%s">' . "\r\n", $id_menu); ?>
        <span class="raskritiyePlus">+</span>
        <span class="raskritiyeMinus">-</span>
        <div id='LevayaKolonkaSredniyDiv'>
            <div class='ContentLevayaKolonkaSredniyDiv'>
                <form id="FormaPiska"
                      action="/filpannext/PanelUpravleniya/SoputstvuyushieTovariIUslugi/index.php?id=%s">
                    <input name="StrokaPoiska" type="text" id="StrokaPoiskaVlevomMenu" value="<?=$_REQUEST['StrokaPoiska'];?>">
                    <? echo sprintf('<input name="id" type="hidden"  value="%s">', $_REQUEST['id']) ?>
                    <input type="submit" class="OrangevayaKnopkaRezinovaya" value="Найти">

                    <?if($DannieZapolneniya["podtip"]!=0):?>
                    <div style="padding: 3px;padding-bottom: 5px;">
                        <span class="OpisaniyeTextovogoPolya">Искать в:</span>
                        <select id='input_podtip' name="IskatSredi" class="poleVvodaDannixElementa">
                            <option value="0" selected>Везде</option>

                            <?
                            //echo $DannieZapolneniya["podtip"];
                            //echo"<pre>";print_r($VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[$DannieZapolneniya["podtip"]]);echo"</pre>";

                            foreach ($VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[$DannieZapolneniya["podtip"]] as $key => $value) {

                                $PoiskKatName = $_PODVIDI_TOVAROV_USLUG_TEXT[$value];

                                $selected = "";
                                if ($value == $_REQUEST['IskatSredi']) {
                                    $selected = "selected";
                                }

                                echo '<option value="' . $value . '" ' . $selected . '>' . $PoiskKatName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <?endif;?>
                </form>
            </div>
            <? require('../ObshiyeModuli/LevayaKolonkaSredniyDivDliyaSoputstvuyshixTovarov.php'); ?>
        </div>

        <div id="SrednayaKolonkaSredniyDivDlyaPaneliUpravleniya">
            <? require('SrednayaKolonkaSredniyDivElement.php'); ?>
        </div>
    </div>


    <div id='NigniyDiv'>
        <? require('../ObshiyeModuli/NigniyDiv.php'); ?>
    </div>

    <div id='Korzina'>
        <? //require('../ObshiyeModuli/Korzina.php');?>
    </div>
</div>
</body>
</html>


