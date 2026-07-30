<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementTovarovUslug=new ElementTovarovUslug();
$ElementTovarovUslug->poluchit($_REQUEST['input_id']);

// if($ElementTovarovUslug->poluchitSvoystvo('tip')==$_VIDI_TOVAROV_USLUG['tovar'])
// {
// $KursValut=New ElementSpiska('filpan_new_kursi_valut');
// $MassivKriteriev=array();
// $MassivKriteriev['id']=1;
// $KursValut->poluchitPoKriteriyu($MassivKriteriev);
// $_REQUEST['input_cena']=floor($_REQUEST['input_cena']/$KursValut->poluchitSvoystvo('kurs')*100)/100;
// //echo $_REQUEST['input_cena'];
// }
// else
// {
// //echo $_REQUEST['input_cena'];
// }

$Massiv=array();
	foreach($_REQUEST as $key => $value)
	{
	$pos = strpos($key, 'input_');
		if($pos !==false)
		{
		$ElementTovarovUslug->izmenitSvoystvo(str_replace('input_','',$key),$value);
		//echo ":".$value.";";
		}
	}
	$ElementTovarovUslug->sohranit();
?>