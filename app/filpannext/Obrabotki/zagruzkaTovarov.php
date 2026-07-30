<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$Tovari=new Spisok('sodraz');

$TovariIzNovoyBazi=new TovariUslugi();
$TovariIzNovoyBazi->udalitVse();
$CeniIzNovoyBazi=new Ceni();
$CeniIzNovoyBazi->udalitVse();
$PicturesIzNovoyBazi=new Pictures();
$PicturesIzNovoyBazi->udalitVse();

$Ssilki=new Ssilki();
$MassivKriteriev=array();
$MassivKriteriev[tablica_id]=$_VIDI_STRANIC['filpan_tovari_uslugi'];
$Ssilki->udalitPoKriteriyu($MassivKriteriev);




$Tovari->poluchit();
$kolichestvoElementov=$Tovari->poluchitKolichestvoElementovMassivaInformacii();

$Massiv=$Tovari->poluchitMassivInformacii();


for($iterator=0;$iterator<$kolichestvoElementov;$iterator++)
//for($iterator=0;$iterator<2;$iterator++)
{

//echo '<br>'.$Massiv[$iterator]['nazv'];


$ElementMenu=new ElementMenu();
$MassivKriteriev=array();
$MassivKriteriev['raz']=$Massiv[$iterator]['raz'];
$MassivKriteriev['idraz']=$Massiv[$iterator]['idraz'];
$MassivKriteriev['proiz']=$Massiv[$iterator]['proiz'];


$ElementMenu->poluchitPoKriteriyu($MassivKriteriev);
$kategoriya=$ElementMenu->poluchitSvoystvo('id');
if($kategoriya)
{
echo '<br>'.$iterator.'::'.$Massiv[$iterator]['nazv'];
$ElementTovarovUslug=new ElementTovarovUslug();
$ElementTovarovUslug->izmenitSvoystvo('nazvanie',$Massiv[$iterator]['nazv']);

$ElementTovarovUslug->izmenitSvoystvo('raz',$Massiv[$iterator]['raz']);
$ElementTovarovUslug->izmenitSvoystvo('idraz',$Massiv[$iterator]['idraz']);
$ElementTovarovUslug->izmenitSvoystvo('proiz',$Massiv[$iterator]['proiz']);
$ElementTovarovUslug->izmenitSvoystvo('menu_id',$kategoriya);
$ElementTovarovUslug->izmenitSvoystvo('opisanie',UbratSpan($Massiv[$iterator]['descr']));
$ElementTovarovUslug->izmenitSvoystvo('dopolnitelnoe_opisanie',UbratSpan($Massiv[$iterator]['xcl']));
$ElementTovarovUslug->izmenitSvoystvo('title',$Massiv[$iterator]['title']);
$ElementTovarovUslug->izmenitSvoystvo('description',$Massiv[$iterator]['db_description']);
$ElementTovarovUslug->izmenitSvoystvo('keywords',$Massiv[$iterator]['db_keywords']);
$ElementTovarovUslug->izmenitSvoystvo('kluchevoe_slovo',$Massiv[$iterator]['word_key']);
$ElementTovarovUslug->izmenitSvoystvo('nazakaz',$Massiv[$iterator]['nazakaz']);
$ElementTovarovUslug->izmenitSvoystvo('vnalichii',$Massiv[$iterator]['vnalichii']);
$ElementTovarovUslug->izmenitSvoystvo('textoviy_modul',UbratSpan($Massiv[$iterator]['text_modul']));
$ElementTovarovUslug->izmenitSvoystvo('market',$Massiv[$iterator]['mark']);
$ElementTovarovUslug->izmenitSvoystvo('bid',$Massiv[$iterator]['bid']);
$ElementTovarovUslug->izmenitSvoystvo('local_del',$Massiv[$iterator]['local_del']);
$ElementTovarovUslug->izmenitSvoystvo('tip',$_VIDI_TOVAROV_USLUG['tovar']);
$ElementTovarovUslug->izmenitSvoystvo('ref_1c','');
$ElementTovarovUslug->izmenitSvoystvo('stariy_id',$Massiv[$iterator]['id']);
$ElementTovarovUslug->izmenitSvoystvo('ves',0);
$ElementTovarovUslug->izmenitSvoystvo('ostatok',0);
$ElementTovarovUslug->izmenitSvoystvo('super',$Massiv[$iterator]['super']);
$ElementTovarovUslug->izmenitSvoystvo('picture',$Massiv[$iterator]['pict']);
$ElementTovarovUslug->izmenitSvoystvo('cena',$Massiv[$iterator]['price']);
$ElementTovarovUslug->izmenitSvoystvo('valuta',$_VALUTA['dol']);
$ElementTovarovUslug->izmenitSvoystvo('ssilka',get_chpu_url($Massiv[$iterator]['id'],$Massiv[$iterator]['nazv'],$ElementTovarovUslug->poluchitSvoystvo('tip')));
$ElementTovarovUslug->sozdat();



$ElementCena=new ElementCena();
$id=$ElementTovarovUslug->poluchitSvoystvo('id');

$Locaciya=$_VIDI_LOCACIYA['ofise'];
$Kolichestvo=1;
$Valuta=$_VALUTA['dol'];
$Cena=$Massiv[$iterator]['price'];
$ElementCena->sozdat($id,$Locaciya,$Kolichestvo,$Valuta,$Cena);

$Picture=new ElementPicture();
$Picture->sozdat($id,$Massiv[$iterator]['pict'],1);


$id=$Massiv[$iterator]['id'];

$SsilkaOsnovnaya=new ElementSsilka();
$SsilkaOsnovnaya->izmenitSvoystvo('tablica_id',$_VIDI_STRANIC['filpan_tovari_uslugi']);
$SsilkaOsnovnaya->izmenitSvoystvo('id_tablici',$ElementTovarovUslug->poluchitSvoystvo('id'));
$SsilkaOsnovnaya->izmenitSvoystvo('ssilka',get_chpu_url($Massiv[$iterator]['id'],$Massiv[$iterator]['nazv'],$ElementTovarovUslug->poluchitSvoystvo('tip'))); 
$SsilkaOsnovnaya->izmenitSvoystvo('osnovnaya',1); 
$SsilkaOsnovnaya->sozdat();

$Ssilka=new ElementSsilka();
$Ssilka->izmenitSvoystvo('id_tablici',$ElementTovarovUslug->poluchitSvoystvo('id'));
$Ssilka->izmenitSvoystvo('tablica_id',$_VIDI_STRANIC['filpan_tovari_uslugi']);
$raz=$Massiv[$iterator]['raz'];
$idraz=$Massiv[$iterator]['idraz'];
$proiz=$Massiv[$iterator]['proiz'];
$href="find.php?id=".$id."&raz=".$raz."&podc=".$idraz."&dopp=".$proiz."&view=1&podr=1";
$Ssilka->izmenitSvoystvo('ssilka',$href); 
$Ssilka->izmenitSvoystvo('osnovnaya',0); 
$Ssilka->sozdat();




}
else
{
echo '<br>Категория не сущетвует:'.$iterator.'::'.$Massiv[$iterator]['nazv'];

}

}
?>