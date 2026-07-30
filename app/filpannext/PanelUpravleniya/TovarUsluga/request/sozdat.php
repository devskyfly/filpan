<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementTovarovUslug = new ElementTovarovUslug();
$svoystva = array();

foreach ($_REQUEST as $key => $value) {

    if ($key == 'input_id') {

    } else {

        $pos = strpos($key, 'input_');
        if ($pos !== false) {

            ////////
            if ($key == "input_kluchevoe_slovo") {
                $kluchevoe_slovo = $value;
            }
            if ($key == "input_nazvanie") {
                $nazvanie = $value;
            }
            if ($key == "input_description") {
                $opisanie = $value;
            }
            ////////

            $pos1 = strpos($key, 'input_svoystvo_');
            if ($pos1 !== false) {

                if (!empty($value) && $value != "-") {

                    $key = str_replace('input_svoystvo_', '', $key);

                    $svoystva[$key] = $value;
                }
            } else {
                $ElementTovarovUslug->izmenitSvoystvo(str_replace('input_', '', $key), $value);
            }
        }
    }
}

////////
if (strpos($nazvanie, "_***_") && !empty($kluchevoe_slovo)) {
    $nazvanie = trim(str_replace('_***_', $kluchevoe_slovo, $nazvanie));
}
if (strpos($opisanie, "_***_") && !empty($kluchevoe_slovo)) {
    $opisanie = trim(str_replace('_***_', $kluchevoe_slovo, $opisanie));
}

$dannyedlyapoiska = $nazvanie . " " . $opisanie;

$ElementTovarovUslug->izmenitSvoystvo("dannyedlyapoiska", $dannyedlyapoiska);
////////

$ElementTovarovUslug->sozdat();
$new_id=$ElementTovarovUslug->poluchitSvoystvo('id');

foreach ($svoystva as $key => $value) {
    $ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();
    $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_tovar', $new_id);
    $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_svoystvo', $key);
    $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_znacheniye', $value);
    $ElementSootvetstviyeTovarSvoystvoZnacheniye->sozdat();
}

echo $new_id;
?>