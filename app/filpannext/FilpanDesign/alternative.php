<?
//exit("I' am okay");
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

$AdditionalParams = "";
//echo $_WEB_ROOT_HREF;
//echo $_REQUEST['input_uri'];
$NewRequest['input_uri'] = $_REQUEST['input_uri'];

//echo $_REQUEST['input_uri'];
//echo "</br>";
//echo $_SERVER['REQUEST_URI'];
//echo "</br>";
//exit("I' am okay");


    $TablicaRoditel = $_VIDI_STRANIC['statya'];
    $_REQUEST['input_uri'] = 'index.php';
    $_SERVER['REQUEST_URI'] = '/index.php';

require('Statya.php');
?>