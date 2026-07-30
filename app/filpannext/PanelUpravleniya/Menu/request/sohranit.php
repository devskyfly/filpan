<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementMenu = new ElementMenu();

//
$PriorityGoodsObj = new PanelUpravleniyaMenuPriorityGoods();
$PriorityGoods = array();
//

$ElementMenu->poluchit($_REQUEST['input_id']);
$Massiv = array();

$dannyedlyapoiska = "";

foreach ($_REQUEST as $key => $value) {

    $ocheredvyvodapos = strpos($key, 'input_ochered_vyvoda_');
    if ($ocheredvyvodapos !== false) {
        $PriorityGoods[str_replace('input_ochered_vyvoda_', '', $key)] = $value;
    } else {
        $pos = strpos($key, 'input_');
        if ($pos !== false) {

            $ElementMenu->izmenitSvoystvo(str_replace('input_', '', $key), $value);
        }
    }
}

//
if ($PriorityGoods) {
    $PriorityGoodsObj->SavePriorityGoods($_REQUEST["input_id"], $PriorityGoods);
}
//

$ElementMenu->sohranit();
// sleep(0.5);
// menuVFail();
?>