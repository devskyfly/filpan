<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '3500M');

if (!empty($_REQUEST["link"])) {
    $src = file_get_contents($_REQUEST["link"]);
    echo $src;
}

if (!empty($_POST["allitemsPrinters"])) {

    $allitems = json_decode($_POST["allitemsPrinters"], true);

    foreach ($allitems as $keyq => $data) {

        $ElementTovara = new ElementTovarovUslug();
        $MassivKriteriev=array();
        //$MassivKriteriev['menu_id'] = 290;
        $MassivKriteriev['kluchevoe_slovo'] = $data["kluchevoe_slovo"];

        $ElementTovara->poluchitPoKriteriyu($MassivKriteriev);
        //id добавленного товара
        $id_tovara = $ElementTovara->poluchitSvoystvo('id');

        foreach ($data["kartriges"] as $key => $value) {
            $ElementSoputstv = new TovariUslugi();
            $MassivKriteriev = array();
            $MassivKriteriev["menu_id"] = 297;
            $MassivKriteriev["kluchevoe_slovo"] = $value;

            $ElementSoputstv->poluchitPoKriteriyu($MassivKriteriev);

            if ($ElementSoputstv->poluchitKolichestvoElementovMassivaInformacii() != 0) {
                while ($ElementSoputstv->poluchitSleduyushiy()) {

                    $soputstv_id = $ElementSoputstv->_TekushiyElement["id"];

                    //Проверяем, не добавлен ли сопутствующий
                    $SoputstvuyushieTovari = new SoputstvuyushieTovariIUslugi();
                    $MassivKriterievSoputstv = array();
                    $MassivKriterievSoputstv['id_tovara_uslugi'] = $id_tovara;
                    $MassivKriterievSoputstv['id_soputstvuyushego_tovara_uslugi']=$soputstv_id;
                    $SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriterievSoputstv);

                    if ($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii() == 0) {
                        $ElementSoputstvuyushyiTovarIUslugi = new ElementSoputstvuyushyiTovarIUslugi();
                        $ElementSoputstvuyushyiTovarIUslugi->sozdat($id_tovara, $soputstv_id);
                    }
                }
            }
        }
    }
}

if (!empty($_POST["allitemsKartriges"])) {

    $allitems = json_decode($_POST["allitemsKartriges"], true);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r($allitems, true));

    foreach ($allitems as $key => $data) {

        //if($key>=2)continue;

        $ElementTovarovUslug = new ElementTovarovUslug();

        $keyword_data = explode(" ", $data["name"]);
        $keyword = $keyword_data[0];

        $new_element = Array(
            "opisanie" => "",
            "dopolnitelnoe_opisanie" => "",
            "textoviy_modul" => "",
            "harakteristiki" => "",
            "picture" => "",
            "kluchevoe_slovo" => $keyword,
            "pokazyvat" => 0,
            "id" => "",
            "vendor" => $_POST["vendor_name"],
            "cena" => 0,
            "menu_id" => 301,
            "hit_prodazh" => 0,
            "super" => 0,
            "vnalichii" => 0,
            "market" => 0,
            "nazakaz" => 0,
            "samovivoz" => 0,
            "dostavka" => 0,
            "kolichestvo_pokupok" => 0,
            "bid" => 0,
            "cbid" => 0,
            "local_del" => 0,
            "local_del_days" => "",
            "min_summ" => 0,
            "min_kol" => 0,
            "ref_1c" => "",
            "tip" => 4,
            "podtip" => 8,
            "vid_nomenkalturi" => 6,
            "valuta" => 1,
            "vid_kartinka_1" => "img1_1.png",
            "vid_kartinka_2" => "img2_1.png",
            "nazvanie" => $data["name"],
            "title" => $_POST["vendor_name"] . " " . $data["name"],
            "keywords" => $_POST["vendor_name"] . " " . $data["name"],
            "description" => $_POST["vendor_name"] . " " . $data["name"],
            "dannyedlyapoiska" => $_POST["vendor_name"] . " " . $data["name"],);

        foreach ($new_element as $key => $value) {
            $ElementTovarovUslug->izmenitSvoystvo($key, $value);
        }

        $ElementTovarovUslug->sozdat();
        $new_id = $ElementTovarovUslug->poluchitSvoystvo('id');

        $ElementTovarovUslug = new ElementTovarovUslug();
        $ElementTovarovUslug->poluchit($new_id);
        $new_link = get_chpu_url_new($_POST["vendor_name"] . " " . $data["name"], "");

        $ElementTovarovUslug->dobavitSsilku($new_link, 1);
    }
}

?>