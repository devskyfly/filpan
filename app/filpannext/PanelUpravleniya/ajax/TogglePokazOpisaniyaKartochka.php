<?php
$_ROOT=$_SERVER['DOCUMENT_ROOT'].'/filpannext/';
$_POKAZ_OPISANIYA_KARTOCHKA=$_ROOT.'PanelUpravleniya/Variables/pokaz_opisaniya_kartochka.txt';
file_put_contents($_POKAZ_OPISANIYA_KARTOCHKA,$_POST['pokaz_opisaniya_kartochka']);echo 1;