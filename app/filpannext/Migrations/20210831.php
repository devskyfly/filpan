<?php
require_once(__DIR__."/../FunkciiIKlassi/FailKonfiguracii.php");
$sql = "";

$sql = "ALTER TABLE filpan_new_tovari_uslugi ADD count INTEGER AFTER vendor;";
$request = new ZaprosNaIzmeneniye($sql);

