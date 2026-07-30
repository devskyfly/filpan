<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementSvoystvo = new ElementSvoystva();
$Massiv = array();

foreach ($_REQUEST as $key => $value) {

    $pos = strpos($key, 'input_');
    if ($pos !== false) {
        $ElementSvoystvo->izmenitSvoystvo(str_replace('input_', '', $key), $value);
    }
}

//
$ElementSvoystvo->izmenitSvoystvo("tip_svoystva", "1");
//

$ElementSvoystvo->sozdat();
echo $ElementSvoystvo->poluchitSvoystvo('id');
?>