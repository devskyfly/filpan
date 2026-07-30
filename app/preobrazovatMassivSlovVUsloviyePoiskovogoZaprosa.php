<?function preobrazovatMassivSlovVUsloviyePoiskovogoZaprosa($MassivKriteriyev)
{

$KolichestvoElementov=count($MassivKriteriyev);
$StrokaZaprosa=' ';


for($iterator=0;$iterator<$KolichestvoElementov;$iterator++)
{
	if($KolichestvoElementov==1)
	{
$StrokaZaprosa.='( id=\''.$MassivKriteriyev[$iterator].'\' or LCASE(nazvanie) LIKE  CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\') and opisanie LIKE CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\'))';
	}
	elseif($iterator==0)
	{
$StrokaZaprosa.='( LCASE(nazvanie) LIKE CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\') and opisanie LIKE CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\')';
	}
	elseif($iterator==($KolichestvoElementov-1))
	{
$StrokaZaprosa.=' and LCASE(nazvanie) LIKE CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\') and opisanie LIKE CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\'))';
	}
	else
	{
		$StrokaZaprosa.=' and LCASE(nazvanie) LIKE CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\') and opisanie LIKE CONCAT(\'%\',LCASE(\''.$MassivKriteriyev[$iterator].'\'),\'%\')';
	}
}
//echo $StrokaZaprosa;



/*
for($iterator=0;$iterator<$KolichestvoElementov;$iterator++)
{
	if($KolichestvoElementov==1)
	{
$StrokaZaprosa.='( nazvanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\' AND opisanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\')';
	}
	elseif($iterator==0)
	{
$StrokaZaprosa.='( nazvanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\' AND opisanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\'';
	}
	elseif($iterator==($KolichestvoElementov-1))
	{
$StrokaZaprosa.=' AND nazvanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\' AND opisanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\')';
	}
	else
	{
		$StrokaZaprosa.=' AND nazvanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\' AND opisanie LIKE \'%'.$MassivKriteriyev[$iterator].'%\'';
	}
}
*/
return $StrokaZaprosa;
}
?>