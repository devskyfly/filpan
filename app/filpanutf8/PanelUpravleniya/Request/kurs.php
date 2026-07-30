<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$KursValut=New ElementSpiska('filpan_new_kursi_valut');
		$MassivKriteriev=array();
		$MassivKriteriev['id']=1;
		$KursValut->poluchitPoKriteriyu($MassivKriteriev);
		$KursValut->izmenitSvoystvo('kurs',$_REQUEST['kurs']);
		$KursValut->sohranit();
?>