<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementTovarovUslug = new ElementTovarovUslug();
$ElementTovarovUslug->poluchit($_REQUEST['input_id']);


if ($DannieZapolneniya['tip'] == $_VIDI_TOVAROV_USLUG['tovar']) {
    echo '<input type="hidden" id="input_valuta" value="' . $DannieZapolneniya['valuta'] . '">';
} elseif ($DannieZapolneniya['tip'] == $_VIDI_TOVAROV_USLUG['usluga']) {
    echo '<input type="hidden" id="input_valuta" value="' . $DannieZapolneniya['valuta'] . '">';
}

//file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r($_REQUEST, true));

if ($_REQUEST['tip'] == $_VIDI_TOVAROV_USLUG['tovar']) {
    $KursValut = New ElementSpiska('filpan_new_kursi_valut');
    $MassivKriteriev = array();
    $MassivKriteriev['id'] = 1;
    $KursValut->poluchitPoKriteriyu($MassivKriteriev);
    //$_REQUEST['input_cena'] = floor($_REQUEST['input_cena'] / $KursValut->poluchitSvoystvo('kurs') * 100) / 100;
    $_REQUEST['input_cena'] = floor($_REQUEST['input_cena'] / $KursValut->poluchitSvoystvo('kurs'));
    $_REQUEST['valuta'] = $_VALUTA['dol'];
} elseif ($_REQUEST['tip'] == $_VIDI_TOVAROV_USLUG['usluga']) {
    $_REQUEST['valuta'] = $_VALUTA['rub'];
} else {
}

$SootvetstviyeTovarSvoystvoZnacheniye=new SootvetstviyeTovarSvoystvoZnacheniye();
$_MassivKriteriev = array();
$_MassivKriteriev['id_tovar'] = $_REQUEST['input_id'];
$SootvetstviyeTovarSvoystvoZnacheniye->udalitPoKriteriyu($_MassivKriteriev);

foreach ($_REQUEST as $key => $value) {
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

        $pos1 = strpos($key, 'input_svoystvo_');
        if ($pos1 !== false) {

            if (!empty($value) && $value!="-") {

                $key = str_replace('input_svoystvo_', '', $key);

                $ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_tovar', $_REQUEST['input_id']);
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_svoystvo', $key);
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_znacheniye', $value);
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->sozdat();
            }
        }
        else
        {
            $ElementTovarovUslug->izmenitSvoystvo(str_replace('input_', '', $key), $value);
        }

////////
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

$ElementTovarovUslug->sohranit();
?>
