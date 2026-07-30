<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$Spisok=new Ssilki();
$MassivKriteriev=array();
$MassivKriteriev['ssilka']=$_REQUEST['ssilka'];
$Spisok->poluchitPoKriteriyu($MassivKriteriev);
$KolichestvoNaydennixStrok=$Spisok->poluchitKolichestvoElementovMassivaInformacii();
//echo "Kolichestvo:".$KolichestvoNaydennixStrok."---";
if($KolichestvoNaydennixStrok==1)
	{
		$SpisokTipovoy=new Ssilki();
		$MassivKriteriev=array();
		$MassivKriteriev['tablica_id']=$_VIDI_STRANIC['filpan_new_menu'];
		$MassivKriteriev['id_tablici']=$_REQUEST['id'];
		$MassivKriteriev['ssilka']=$_REQUEST['ssilka'];
		//echo "id=".$_REQUEST['id'];
		$SpisokTipovoy->poluchitPoKriteriyu($MassivKriteriev);
		$KolichestvoNaydennixStrokTipovoy=$SpisokTipovoy->poluchitKolichestvoElementovMassivaInformacii();
			if($KolichestvoNaydennixStrokTipovoy==1)
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
	}
	elseif($KolichestvoNaydennixStrok==0)
	{
	echo "1";
	//echo "id=".$_REQUEST['id'];
	}
else{
	echo "0";
	//echo "id=".$_REQUEST['id'];
	}

?>