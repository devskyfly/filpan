<?php
$_ROOT=$_SERVER['DOCUMENT_ROOT'].'/filpannext/';
$_SHOW_IMAGES=$_ROOT.'PanelUpravleniya/Variables/ShowImages.txt';
file_put_contents($_SHOW_IMAGES,$_POST['ShowImages']);