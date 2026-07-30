<?function preobrazovatMassivVUsloviyeILIZaprosa($Pole,$MassivKriteriyev)
{
$UsloviyaZaprosa='';
$iterator=0;
foreach($MassivKriteriyev as $key => $value)
{
if($iterator==0)
{
if(is_numeric($value))
{
$UsloviyaZaprosa.=' '.$Pole.'='.$value.' ';
}
else
{
$UsloviyaZaprosa.=' '.$Pole.' LIKE \''.$value.'\' ';
}
}
else
{
if(is_numeric($value))
{
$UsloviyaZaprosa.='OR '.$Pole.'='.$value.' ';
}
else
{
$UsloviyaZaprosa.='OR '.$Pole.' LIKE \''.$value.'\' ';
}
}

$iterator++;
}
return $UsloviyaZaprosa;
}
?>