<?function preobrazovatMassivVParametriInsertZaprosa($Massiv)
{
$UsloviyaZaprosa='';
$iterator=0;
$KolichestvoStrokMassiva=count($Massiv);
$StrokaParametrov='';
$StrokaZnacheniy='';
foreach($Massiv as $key => $value)
{
if($iterator==0)
{
	if(is_numeric($value))
	{
	$StrokaZnacheniy.='VALUES ('.$value;
	}
	else
	{
	$StrokaZnacheniy.='VALUES (\''.addslashes($value).'\' ';
	}
	
	$StrokaParametrov.='('.$key;
}
elseif($iterator==($KolichestvoStrokMassiva-1))
{
	if(is_numeric($value))
	{
	$StrokaZnacheniy.=', '.$value.') ';
	}
	else
	{
	$StrokaZnacheniy.=', \''.addslashes($value).'\') ';
	}
	
	$StrokaParametrov.=', '.$key.') ';
}
else
{
	if(is_numeric($value))
	{
	$StrokaZnacheniy.=', '.$value;
	}
	else
	{
	$StrokaZnacheniy.=', \''.addslashes($value).'\' ';
	}
	
	$StrokaParametrov.=', '.$key;
}
$iterator++;
}
return $StrokaParametrov.$StrokaZnacheniy;
}
?>