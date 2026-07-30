<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementSvoystvo = new ElementSvoystva();
$ElementSvoystvo->poluchit($_REQUEST['input_id']);
$Massiv = array();

foreach ($_REQUEST as $key => $value) {

    $pos = strpos($key, 'input_');

    if ($pos !== false) {

        if ($key == "input_kategoriya") {

            $ElementKategoriyaSvoystva = new ElementSvoystva();
            $ElementKategoriyaSvoystva->poluchit($_REQUEST['input_id']);
            $ElementKategoriyaSvoystva->udalitKategoriiSvoystva();

            $value = json_decode($value);

            foreach ($value as $p=>$v) {
                $ElementKategoriyaSvoystva = new ElementSvoystva();
                $ElementKategoriyaSvoystva->poluchit($_REQUEST['input_id']);
                $ElementKategoriyaSvoystva->dobavitKategoriyuSvoystva($v);
            }
        }
        else
        {
                    $ElementSvoystvo->izmenitSvoystvo(str_replace('input_', '', $key), $value);
        }
    }
}
//
$ElementSvoystvo->izmenitSvoystvo("tip_svoystva", "1");
//

$ElementSvoystvo->sohranit();
?>