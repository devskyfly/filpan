<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementMenu=new ElementMenu();
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
		$ElementMenu->izmenitSvoystvo(str_replace('input_','',$key),$value);
		}
	}
	}
	$ElementMenu->sozdat();
echo $ElementMenu->poluchitSvoystvo('id');
menuVFail();
?>