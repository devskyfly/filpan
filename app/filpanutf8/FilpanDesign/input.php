<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

$AdditionalParams = "";
//echo $_WEB_ROOT_HREF;
//echo $_REQUEST['input_uri'];
$NewRequest['input_uri'] = $_REQUEST['input_uri'];
//print_r($NewRequest['input_uri']);


if ($_SERVER['REQUEST_URI'] == '/uslfind.php?id=1&page=0&usl=1') {
    $NewRequest['input_uri'] = '/uslfind.php?id=1&usl=1';
    $_SERVER['REQUEST_URI'] = '/uslfind.php?id=1&usl=1';
}
/*
print_r($_SERVER['REQUEST_URI']);

$expr='/^\/uslfind\.php\?id=(\d+)&page=(\d+)&usl=(\d+)/';
preg_match_all($expr,$_SERVER['REQUEST_URI'],$out);
echo "<br>";
print_r($out);


uslfind.php?id=11&dopp=157&podc=106&usl=1
uslfind.php?id=11&podc=106&usl=1
uslfind.php?id=11&usl=1

find.php?id=1&dopp=3&podc=2
find.php?id=1&podc=2
find.php?id=1
*/


//exit;

if ($_REQUEST['input_uri'] == 'PoiskPoSaytu') {
//echo "PoiskPoSaytu<br>";
    $StrokaPoiska = $_REQUEST['StrokaPoiska'];
    require('PoiskPoSaytu.php');
} else {
    $NewRequest['input_uri'] = substr($_SERVER['REQUEST_URI'], 1);
    if (substr_count(substr($_SERVER['REQUEST_URI'], 1), '//page/')) {
        $URI = explode('/page/', substr($_SERVER['REQUEST_URI'], 1));
        $NewRequest['input_uri'] = $URI[0];
        $TekushayaPoziciyaStraniciSpiska = $URI[1];
    } else {
        if (substr_count(substr($_SERVER['REQUEST_URI'], 1), '/page/')) {
            $URI = explode('/page/', substr($_SERVER['REQUEST_URI'], 1));
            $NewRequest['input_uri'] = $URI[0];
            $TekushayaPoziciyaStraniciSpiska = $URI[1];
        }
    }


    if ($NewRequest['input_uri'] == '' || $_REQUEST['input_uri'] == "index.php") {
        $NoIndex = 0;
    }


    if ($NewRequest['input_uri'] == '') {
        $TablicaRoditel = $_VIDI_STRANIC['statya'];
        $_REQUEST['input_uri'] = 'index.php';
        $_SERVER['REQUEST_URI'] = '/index.php';
    } else {
        //echo "----".$NewRequest['input_uri'];


        $MassivRazdeleniya = explode("?_openstat", $NewRequest['input_uri']);
        if (count($MassivRazdeleniya) >= 2) {
            $NewRequest['input_uri'] = $MassivRazdeleniya[0];

        }

///statya.php?ymclid=234234&id=57

        $excludedArray = array('ymclid', 'yclid');
        $FormatedURL = URLParseForFilpan($NewRequest['input_uri'], $excludedArray);
        $NewRequest['input_uri'] = $FormatedURL['ClearedURL'];
        $AdditionalParams = $FormatedURL['AdditionalQuery'];

        /*$MassivRazdeleniya=explode("?ymclid",$NewRequest['input_uri']);
        if(count($MassivRazdeleniya)>=2)
        {
        $excludedArray=array('ymclid','yclid');
        $FormatedURL=URLParseForFilpan($NewRequest['input_uri'],$excludedArray);
        $NewRequest['input_uri']=$FormatedURL['ClearedURL'];
        $AdditionalParams=$FormatedURL['AdditionalQuery'];

        }


        $MassivRazdeleniya=explode("?yclid=",$NewRequest['input_uri']);
        if(count($MassivRazdeleniya)>=2)
        {

        $excludedArray=array('ymclid','yclid');
        $FormatedURL=URLParseForFilpan($NewRequest['input_uri'],$excludedArray);
        $NewRequest['input_uri']=$FormatedURL['ClearedURL'];
        $AdditionalParams=$FormatedURL['AdditionalQuery'];

        }*/


        /*$MassivRazdeleniya=explode("?ymclid",$NewRequest['input_uri']);
        if(count($MassivRazdeleniya)>=2)
        {
            $NewRequest['input_uri']=$MassivRazdeleniya[0];

        }


        $MassivRazdeleniya=explode("?yclid=",$NewRequest['input_uri']);
        if(count($MassivRazdeleniya)>=2)
        {

            $NewRequest['input_uri']=$MassivRazdeleniya[0];
            $AdditionalParams="?yclid=".$MassivRazdeleniya[1];

        }*/

        $User = new ElementUserLog();
        $Vxod = new VxodNaSayt($NewRequest, $User, $AdditionalParams);
        $Ssilka = $Vxod->poluchitSsilku();
        $TablicaRoditel = $Ssilka->poluchitSvoystvo('tablica_id');
    }

///
//$TablicaRoditel="testovyscript";
//    if ($TablicaRoditel == 'testovyscript') {
//        require('testovyscript.php');
//    }

    if ($TablicaRoditel == $_VIDI_STRANIC['filpan_new_menu']) {
        require('SpisokTovarov.php');
    } elseif ($TablicaRoditel == $_VIDI_STRANIC['filpan_tovari_uslugi']) {
        require('ElementTovara.php');
    } elseif ($TablicaRoditel == $_VIDI_STRANIC['spisok_statey']) {
        require('SpisokStatey.php');
    } elseif ($TablicaRoditel == $_VIDI_STRANIC['statya']) {
        require('Statya.php');
    } elseif ($TablicaRoditel == $_VIDI_STRANIC['kartrigi_dlya_printera']) {
        require('KartrigiDlyaPrintera.php');
    } else {
        echo "<pre>";print_r($_REQUEST); echo "</pre>";
    }
}
?>