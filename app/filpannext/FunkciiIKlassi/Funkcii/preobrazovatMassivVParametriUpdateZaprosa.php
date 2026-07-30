<?function preobrazovatMassivVParametriUpdateZaprosa($Massiv)
{
$UsloviyaZaprosa='';
$iterator=0;
$KolichestvoStrokMassiva=count($Massiv);
$StrokaZnacheniy='';
foreach($Massiv as $key => $value)
{
if($iterator==0)
{
	if(is_numeric($value))
	{
	$StrokaZnacheniy.='SET '.$key.'='.$value;
	}
	else
	{
	$StrokaZnacheniy.='SET '.$key.'=\''.addslashes($value).'\' ';
	}
}
elseif($iterator==($KolichestvoStrokMassiva-1))
{
	if(is_numeric($value))
	{
	$StrokaZnacheniy.=', '.$key.'='.$value;
	}
	else
	{
	$StrokaZnacheniy.=', '.$key.'=\''.addslashes($value).'\'';
	}
}
else
{
		if(is_numeric($value))
	{
	$StrokaZnacheniy.=', '.$key.'='.$value;
	}
	else
	{
	$StrokaZnacheniy.=', '.$key.'=\''.addslashes($value).'\' ';
	}
}
$iterator++;
}
return $StrokaZnacheniy;
}
?>