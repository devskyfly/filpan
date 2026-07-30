<?php
$_ROOT=$_SERVER['DOCUMENT_ROOT'].'/filpannext/';
$_TIP_VYGRUZKI=$_ROOT.'PanelUpravleniya/Variables/tip_vygruzki.txt';
file_put_contents($_TIP_VYGRUZKI,$_POST['TipVygruzki']);echo 1;