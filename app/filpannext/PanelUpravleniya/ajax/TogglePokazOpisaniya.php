<?php
$_ROOT=$_SERVER['DOCUMENT_ROOT'].'/filpannext/';
$_POKAZ_OPISANIYA=$_ROOT.'PanelUpravleniya/Variables/pokaz_opisaniya.txt';
file_put_contents($_POKAZ_OPISANIYA,$_POST['PokazOpisaniya']);echo 1;