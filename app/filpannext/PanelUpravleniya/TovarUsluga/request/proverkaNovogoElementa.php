<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$Spisok=new Ssilki();
$MassivKriteriev=array();
//$MassivKriteriev['tablica_id']=$_VIDI_STRANIC['filpan_tovari_uslugi'];
//$MassivKriteriev['id_tablici']=$_REQUEST['id'];
$MassivKriteriev['ssilka']=$_REQUEST['ssilka'];
$Spisok->poluchitPoKriteriyu($MassivKriteriev);
$KolichestvoNaydennixStrok=$Spisok->poluchitKolichestvoElementovMassivaInformacii();

if($KolichestvoNaydennixStrok>=1)
	{
	echo "0";
	}
else{
	echo "1";
	}

?>