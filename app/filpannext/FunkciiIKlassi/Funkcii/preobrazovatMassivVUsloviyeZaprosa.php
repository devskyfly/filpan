<?function preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev)
{
$UsloviyaZaprosa='';
$iterator=0;
foreach($MassivKriteriyev as $key => $value)
{
if($iterator==0)
{
if(is_numeric($value))
{
$UsloviyaZaprosa.=' '.$key.'='.$value.' ';
}
else
{
$UsloviyaZaprosa.=' '.$key.' LIKE \''.$value.'\' ';
}
}
else
{
if(is_numeric($value))
{
$UsloviyaZaprosa.='AND '.$key.'='.$value.' ';
}
else
{
$UsloviyaZaprosa.='AND '.$key.' LIKE \''.$value.'\' ';
}
}

$iterator++;
}
return $UsloviyaZaprosa;
}
?>