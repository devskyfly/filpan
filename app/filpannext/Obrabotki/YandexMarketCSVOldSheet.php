<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
//$filename = $_SERVER['DOCUMENT_ROOT'].'/YandexMarketCSV.csv';
$filename = $_SERVER['DOCUMENT_ROOT'].'/site_information/yml.csv';
echo $filename;
$somecontent = $DliyaZapisi;

// Вначале давайте убедимся, что файл существует и доступен для записи.
if (is_writable($filename)) {

    // В нашем примере мы открываем $filename в режиме "дописать в конец".
    // Таким образом, смещение установлено в конец файла и
    // наш $somecontent допишется в конец при использовании fwrite().
    if (!$handle = fopen($filename, 'w+')) {
         echo "Не могу открыть файл ($filename)";
         exit;
    }




     $somecontent=  sprintf("id;type;bid;url;price;currencyId;category;picture;vendor;model;store;delivery;description;local_delivery_cost;available;pickup\r\n");
    //$somecontent= sprintf("%s;vendor.model;\"%s\";\"%s\";\"%s\";\"RUR\";\"%s\";\"%s\";\"%s\";\"%s\";true;\"%s\";\"%s\";\"%s\";true;true\r\n",
    if (fwrite($handle, $somecontent) === FALSE) {
    echo "Не могу произвести запись в файл ($filename)";
    exit;
    }

    $SpisokTovarov=new TovariUslugi();
    $SpisokTovarov->vibratPoliya('id,cena');
    $MassivKriteriev=array();
    $MassivKriteriev['market']=1;
    $SpisokTovarov->poluchitPoKriteriyu($MassivKriteriev);


    $iterator=1;
    while($SpisokTovarov->poluchitSleduyushiy())
    {

        $ElementTovar=new ElementTovarovUslug();
        $ElementTovar->poluchit($SpisokTovarov->_TekushiyElement['id']);

        $ElementMenu=new ElementMenu();
        $ElementMenu->poluchit($ElementTovar->poluchitSvoystvo('menu_id'));

        $MassivRoditelskihElementov=array_reverse($ElementMenu->poluchitRoditelskiyeElementi());

        $PerviyElementMenu=new ElementMenu();
        $PerviyElementMenu->poluchit($MassivRoditelskihElementov[1]);

       $somecontent= sprintf("%s;vendor.model;\"%s\";\"%s\";\"%s\";\"RUR\";\"%s\";\"%s\";\"%s\";\"%s\";true;\"%s\";\"%s\";\"%s\";true;true\r\n",
        $iterator,
        $ElementTovar->poluchitSvoystvo('bid'),
        $_WEB_ROOT_HREF.$ElementTovar->poluchitSvoystvo('ssilka'),
        ElementTovarovUslug::poluchitCenuVRubliach($ElementTovar->poluchitSvoystvo('cena'),$ElementTovar->poluchitSvoystvo('valuta')),//RUR
        YandexString($PerviyElementMenu->poluchitSvoystvo('nazvanie')),
        $_WEB_ROOT_IMG.$ElementTovar->poluchitSvoystvo('picture'),
        YandexString($ElementMenu->poluchitSvoystvo('nazvanie')),
        YandexString(str_replace('_***_',$ElementTovar->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovar->poluchitSvoystvo('nazvanie'))),
        $ElementTovar->poluchitSvoystvo('tolko_samovivoz')==1 ? "false" : "true",
        YandexString(str_replace('_***_',$ElementTovar->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovar->poluchitSvoystvo('opisanie'))),
        $ElementTovar->poluchitSvoystvo('local_del')
        );
        if (fwrite($handle, $somecontent) === FALSE) {
        echo "Не могу произвести запись в файл ($filename)";
        exit;
        }
        $iterator++;
    }


    // Записываем $somecontent в наш открытый файл.
   
    
    echo "Ура! Записали";
    
    fclose($handle);

} else {
    echo "Файл $filename недоступен для записи";
}
?>