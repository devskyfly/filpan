<?php
require_once(__DIR__."/../FunkciiIKlassi/FailKonfiguracii.php");
$sql = "";

$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD oldprice FLOAT(10) AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);
$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD warranty_days CHAR(255) AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);
$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD period_of_validity_days CHAR(255) AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);
$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD market_sku CHAR(255) AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);
//$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD service_life_days CHAR(255) AFTER vendor;";
//$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD country_of_origin CHAR(255) AFTER vendor;";



