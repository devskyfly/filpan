<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementStatya=new ElementStatya();
$ElementStatya->poluchit($_REQUEST['input_id']);
$Massiv=array();
	foreach($_REQUEST as $key => $value)
	{
	$pos = strpos($key, 'input_');
		if($pos !==false)
		{
		$ElementStatya->izmenitSvoystvo(str_replace('input_','',$key),$value);
		}
	}
	$ElementStatya->sohranit();
?>