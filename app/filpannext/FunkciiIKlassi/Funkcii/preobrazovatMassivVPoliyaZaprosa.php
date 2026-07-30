<?function preobrazovatMassivVPoliyaZaprosa($Massiv)
{
$PoliyaZaprosa='';
$iterator=0;
$KolichestvoStrokMassiva=count($Massiv);

foreach($Massiv as $key => $value)
{
if($iterator==0)
{
$PoliyaZaprosa.=$value;
}
else
{
$PoliyaZaprosa.=','.$value;
}
$iterator++;
}
return $PoliyaZaprosa;
}
?>