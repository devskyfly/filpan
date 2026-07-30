<?
/*ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);*/

require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
require_once('array2xml.php');

$_WEB_ROOT_HREF = '/';
$_WEB_ROOT_IMG = '/img/';


/////
$market_categories = array(
    1 => Array("@attributes" => Array("id" => 1), "@value" => "Компьютерная техника"),
    10 => Array("@attributes" => Array("id" => 10, "parentId" => 1), "@value" => "Расходные материалы"),
    100 => Array("@attributes" => Array("id" => 100, "parentId" => 10), "@value" => "Картриджи"),
    101 => Array("@attributes" => Array("id" => 101, "parentId" => 10), "@value" => "Чернила, тонеры, фотобарабаны"),
    2 => Array("@attributes" => Array("id" => 2), "@value" => "Услуги"),
    20 => Array("@attributes" => Array("id" => 20, "parentId" => 2), "@value" => "Техническое обслуживание"),
    200 => Array("@attributes" => Array("id" => 200, "parentId" => 20), "@value" => "Заправка картриджей"),
    201 => Array("@attributes" => Array("id" => 201, "parentId" => 20), "@value" => "Компьютерной техники")
);

//3 - Заправка картриджей
//4 - Картриджи
//16 - Тонеры
//25 - Заправка принтеров
//52 - Ремонт принтеров

$sootvetstviya_categories = array(
    3 => array(2,20,200),
    4 => array(1,10,100),
    16 => array(1,10,101),
    25 => array(2),
    52 => array(2,20,201),
);
////

//$Categories = array(
//    1 => $market_categories[1],
//    2 => $market_categories[2]
//);

$InitInfo = array(//Для всего магазина
    'delivary_cost' => 390, 'delivary_days' => '1-3', //Для элемента
    'empty_delivary_cost' => 390, 'empty_delivary_days' => '1-3');


$SpisokTovarov = new TovariUslugi();
$SpisokTovarov->vibratPoliya('id,cena');
$MassivKriteriev = array();
$MassivKriteriev['market'] = 1;
$SpisokTovarov->poluchitPoKriteriyu($MassivKriteriev);

$OutPutArray = array();
$OutPutArray['shop'] = array('name' => 'Filpan', 'company' => '11-1037776', //'company'=>'Филпан',
    'url' => 'https://www.filpan.ru', 'currencies' => array(), 'categories' => array(), 'delivery-options' => array('option' => array('@attributes' => array('cost' => $InitInfo ['delivary_cost'], 'days' => $InitInfo ['delivary_days']))), 'offers' => array());


$OutPutArray['shop']['currencies']['currency'] = array('@attributes' => array('id' => "RUR", 'rate' => "1"));


$Offers = array();
$Categories=array();
$CategoriesIds = array();
$iterator = 0;
while ($SpisokTovarov->poluchitSleduyushiy()) {
    $iterator++;

    $ElementTovar = new ElementTovarovUslug();
    $ElementTovar->poluchit($SpisokTovarov->_TekushiyElement['id']);

    $ElementMenu = new ElementMenu();
    $ElementMenu->poluchit($ElementTovar->poluchitSvoystvo('menu_id'));

    $MassivRoditelskihElementov = array_reverse($ElementMenu->poluchitRoditelskiyeElementi());

    $PerviyElementMenu = new ElementMenu();
    //$PerviyElementMenu->vibratPoliya(array('id','name'));
    $PerviyElementMenu->poluchit($MassivRoditelskihElementov[1]);

    //
    $category_id=$PerviyElementMenu->poluchitSvoystvo('id');
    if (array_key_exists($category_id, $sootvetstviya_categories)) {
        $last_ind=count($sootvetstviya_categories[$category_id])-1;
        $category_id_new=$sootvetstviya_categories[$category_id][$last_ind];
    }
    //

    if (($ElementTovar->poluchitSvoystvo('local_del')) == 0) {
        $loacal_del_cost = $InitInfo['empty_delivary_cost'];
    } else {
        $loacal_del_cost = $ElementTovar->poluchitSvoystvo('local_del');
    }

    if (($ElementTovar->poluchitSvoystvo('local_del_days')) == '') {
        $loacal_del_days = $InitInfo['empty_delivary_days'];
    } else {
        $loacal_del_days = $ElementTovar->poluchitSvoystvo('local_del_days');
    }


    $available = $ElementTovar->poluchitSvoystvo('vnalichii') == 1 ? 'true' : 'false';
    //$available=$ElementTovar->poluchitSvoystvo('nazakaz')==1?'false':'true';

    //delete spaces fro, description
    $description=YandexString(mb_substr(str_replace('_***_', $ElementTovar->poluchitSvoystvo('kluchevoe_slovo'), strip_tags($ElementTovar->poluchitSvoystvo('opisanie'))), 0, 100, 'UTF-8'));
    $description=trim($description);
    $description =  preg_replace('/ {2,}/',' ',$description);
    $description = str_replace('	',' ',$description);

    $Offer = array('@attributes' => array(
        'id' => $iterator,
        'type' => "vendor.model",
        'available' => $available,
        'bid' => $ElementTovar->poluchitSvoystvo('bid'),//Размер ставки на остальных местах размещения (кроме карточки модели).
        'cbid' => $ElementTovar->poluchitSvoystvo('cbid'),//Размер ставки для карточки модели.
    ),
        'url' => YandexString($_WEB_ROOT_HREF . $ElementTovar->poluchitSvoystvo('ssilka')),
        'price' => ElementTovarovUslug::poluchitCenuVRubliach($ElementTovar->poluchitSvoystvo('cena'), $ElementTovar->poluchitSvoystvo('valuta')),
        'currencyId' => 'RUR',
        'categoryId' => $category_id_new,
        'picture' => $_WEB_ROOT_IMG . $ElementTovar->poluchitSvoystvo('picture'),
        'store' => "true",//Возможность купить товар в розничном магазине
        'pickup' => $ElementTovar->poluchitSvoystvo('samovivoz') == 1 ? 'true' : 'false',
        'delivery' => $ElementTovar->poluchitSvoystvo('dostavka') == 1 ? 'true' : 'false',//Возможность курьерской доставки соответствующего товара
        'delivery-options' => array('option' => array(array('@attributes' => array('cost' => $loacal_del_cost, 'days' => $loacal_del_days)))),
        'typePrefix' => $ElementTovar->poluchitSvoystvo('type_prefix'),
        'vendor' => $ElementTovar->poluchitSvoystvo('vendor'),
        'model' => $ElementTovar->poluchitSvoystvo('model'),
        //'name' => YandexString($ElementTovar->poluchitSvoystvo('nazvanie')),
        //vendorCode
        'description' => $description,
        //sales_notes
        //manufacturer_warranty
        //country_of_origin
        //barcode
        //cpa
        //rec
    );

    if ($ElementTovar->poluchitSvoystvo('dostavka') != 1) {
        unset($Offer['delivery-options']);
    }
    /** Элемент используется для отражения информации о
     * минимальной сумме заказа, минимальной партии товара, необходимости предоплаты (указание элемента обязательно);
     * вариантах оплаты, описания акций и распродаж (указание элемента необязательно).
     * */

    $Sales_Notes = array();


    if (($ElementTovar->poluchitSvoystvo('min_summ')) > 0) {
        $Sales_Notes[] = array('@value' => 'Доставка при заказе от ' . $ElementTovar->poluchitSvoystvo('min_summ') . ' рублей.');
    }
    if (($ElementTovar->poluchitSvoystvo('min_kol')) > 0) {
        $Sales_Notes[] = array('@value' => 'Минимальная партия при доставке ' . $ElementTovar->poluchitSvoystvo('min_kol') . ' шт.');
    }

    if (count($Sales_Notes) > 0) {
        $Offer['sales_notes'] = $Sales_Notes;
    }

    array_push($Offers, $Offer);

    if (!in_array($category_id, $CategoriesIds)) {
        array_push($CategoriesIds, $category_id);

        if (array_key_exists($category_id, $sootvetstviya_categories)) {

            foreach($sootvetstviya_categories[$category_id] as $key=>$val)
            {
                $category_id_new = $val;
                if (!in_array($category_id_new, $CategoriesIds)) {
                    array_push($CategoriesIds, $category_id_new);
                    $Categories[$category_id_new] = $market_categories[$category_id_new];
                }
            }
        } else {
            $Categories[$category_id] = array('@attributes' => array('id' => $category_id), '@value' => YandexString($PerviyElementMenu->poluchitSvoystvo('nazvanie')));
        }
    }
}

file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r($Categories, true));

ksort($Categories, SORT_STRING);

$OutPutArray['shop']['categories']['category'] = $Categories;
$OutPutArray['shop']['offers']['offer'] = $Offers;

$xml = Array2XML::createXML('yml_catalog', $OutPutArray);

$xmlResult = str_replace('<yml_catalog>', '<yml_catalog date="' . date('Y-m-d H:i') . '">', $xml->saveXML());

//echo $xmlResult;

file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/site_information/YMLNEW.xml', $xmlResult);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/YMLNEW.xml', $xmlResult);
echo "All good!";
?>