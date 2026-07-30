<?php
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
set_time_limit(0);
$Gifts=new TovariUslugi();
$Gifts->poluchit();

while($Gifts->poluchitSleduyushiy()){
    echo "<pre>";
        print_r($Gifts->_TekushiyElement['nazvanie']);
    echo "</pre>";

        $ElementTovarovUslugObj=new ElementTovarovUslug();
        $ElementTovarovUslugObj->poluchit($Gifts->_TekushiyElement['id']);
        $MenuEl=new ElementMenu();
        $MenuEl->poluchit($Gifts->_TekushiyElement['menu_id']);
        $ElementTovarovUslugObj->izmenitSvoystvo('vendor',$MenuEl->poluchitSvoystvo('nazvanie'));
        $ElementTovarovUslugObj->sohranit();
}