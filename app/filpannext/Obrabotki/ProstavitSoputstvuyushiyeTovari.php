<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementIzStaroyBaziTovar=new ElementSpiska('sodraz');
$ElementIzStaroyBaziUsluga=new ElementSpiska('uslsodraz');

$Tovari=new TovariUslugi();
$Tovari->vibratPoliya('id,stariy_id,tip');
$Tovari->poluchit();


$SoputstvuyushieTovariIUslugi=new SoputstvuyushieTovariIUslugi();
$SoputstvuyushieTovariIUslugi->udalitVse();

while($Tovari->poluchitSleduyushiy())
{


	$Element=$Tovari->_TekushiyElement;
	//if($Element['id']!=52144){continue;}
	if($Element['tip']==2)
	{
	$MassivKriteriev=array();
	$MassivKriteriev['id']=$Element['stariy_id'];
	$ElementIzStaroyBaziTovar->poluchitPoKriteriyu($MassivKriteriev);
	echo "<br>".$ElementIzStaroyBaziTovar->poluchitSvoystvo('nazv').'  id='.$ElementIzStaroyBaziTovar->poluchitSvoystvo('id');
	//print_r(explode(';', $ElementIzStaroyBaziTovar->poluchitSvoystvo('soptov')));
	//print_r(explode(';', $ElementIzStaroyBaziTovar->poluchitSvoystvo('sopuslugi')));

	$massivTovarov=explode(';', $ElementIzStaroyBaziTovar->poluchitSvoystvo('soptov'));
	print_r($massivTovarov);
	foreach ($massivTovarov as $key => $value) {
		
		if($value!='')
		{
			echo '<br>--'.$value;
			$Tovar=new ElementTovarovUslug();
			$MassivKriteriev=array();
			$MassivKriteriev['stariy_id']=$value;
			$MassivKriteriev['tip']=2;
			print_r($MassivKriteriev);
			$Tovar->poluchitPoKriteriyu($MassivKriteriev);
			if($Tovar->sushestvuet())
			{
				echo '<br>Element naydend';
			$ElementSoputstvuyushiyTovar=new ElementSoputstvuyushyiTovarIUslugi();
			$ElementSoputstvuyushiyTovar->sozdat($Element['id'],$Tovar->poluchitSvoystvo('id'));
			}
		}
	}

	$massivUslug=explode(';', $ElementIzStaroyBaziTovar->poluchitSvoystvo('sopuslugi'));
	print_r($massivUslug);
	foreach ($massivUslug as $key => $value) {
		
		if($value!='')
		{
			echo '<br>--'.$value;
			$Tovar=new ElementTovarovUslug();
			$MassivKriteriev=array();
			$MassivKriteriev['stariy_id']=$value;
			$MassivKriteriev['tip']=1;
			print_r($MassivKriteriev);
			$Tovar->poluchitPoKriteriyu($MassivKriteriev);
			if($Tovar->sushestvuet())
			{
				echo '<br>Element naydend';
			$ElementSoputstvuyushiyTovar=new ElementSoputstvuyushyiTovarIUslugi();
			$ElementSoputstvuyushiyTovar->sozdat($Element['id'],$Tovar->poluchitSvoystvo('id'));
			}
		}
	}

	}
	elseif ($Element['tip']==1) {

	//$massivUslug=explode(';', $ElementIzStaroyBaziUsluga->poluchitSvoystvo('sopuslugi'));
	$MassivKriteriev=array();
	$MassivKriteriev['id']=$Element['stariy_id'];
	$ElementIzStaroyBaziUsluga->poluchitPoKriteriyu($MassivKriteriev);
	echo "<br>".$ElementIzStaroyBaziUsluga->poluchitSvoystvo('nazv').' id='.$ElementIzStaroyBaziUsluga->poluchitSvoystvo('id');;
	$massivTovarov=explode(';', $ElementIzStaroyBaziUsluga->poluchitSvoystvo('soptov'));
	echo "<br>Massiv soputstvuyushix tovarov:<br>";print_r($massivTovarov);
	foreach ($massivTovarov as $key => $value) {
		if($value!='')
		{
			echo '<br>--'.$value;
			$Tovar=new ElementTovarovUslug($MassivKriteriev);
			$MassivKriteriev=array();
			$MassivKriteriev['stariy_id']=$value;
			$MassivKriteriev['tip']=2;
			print_r($MassivKriteriev);
			$Tovar->poluchitPoKriteriyu($MassivKriteriev);
			if($Tovar->sushestvuet())
			{
				echo '<br>Element naydend';
			$ElementSoputstvuyushiyTovar=new ElementSoputstvuyushyiTovarIUslugi();
			$ElementSoputstvuyushiyTovar->sozdat($Element['id'],$Tovar->poluchitSvoystvo('id'));
			}
		}
	}

	$massivUslug=explode(';', $ElementIzStaroyBaziUsluga->poluchitSvoystvo('sopuslugi'));
	echo "<br>Massiv soputstvuyushix uslug:<br>";print_r($massivUslug);
	foreach ($massivUslug as $key => $value) {
		if($value!='')
		{
			echo '<br>--'.$value;
			$Tovar=new ElementTovarovUslug();
			$MassivKriteriev=array();
			$MassivKriteriev['stariy_id']=$value;
			$MassivKriteriev['tip']=1;
			print_r($MassivKriteriev);
			$Tovar->poluchitPoKriteriyu($MassivKriteriev);
			if($Tovar->sushestvuet())
			{
				echo '<br>Element naydend';
			$ElementSoputstvuyushiyTovar=new ElementSoputstvuyushyiTovarIUslugi();
			$ElementSoputstvuyushiyTovar->sozdat($Element['id'],$Tovar->poluchitSvoystvo('id'));
			}
		}
	}
	}
	
}
?>