<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementStatya=new ElementStatya();
$Massiv=array();

	foreach($_REQUEST as $key => $value)
	{

	if($key=='input_id')
	{
	
	}
	else
	{
	$pos = strpos($key, 'input_');
		if($pos !==false)
		{
		$ElementStatya->izmenitSvoystvo(str_replace('input_','',$key),$value);
		}
	}
	}
	$ElementStatya->sozdat();
echo $ElementStatya->poluchitSvoystvo('id');
?>