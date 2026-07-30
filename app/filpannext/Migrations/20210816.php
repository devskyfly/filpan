<?php
require_once(__DIR__."/../FunkciiIKlassi/FailKonfiguracii.php");
$sql = "";

$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD barcode CHAR(255) AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);

$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD weight FLOAT(10) AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);

$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD dimensions CHAR(255) AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);

//$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD expiry CHAR(255) AFTER vendor;";
//$request = new ZaprosNaIzmeneniye($sql);

$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD cpa INTEGER AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);

