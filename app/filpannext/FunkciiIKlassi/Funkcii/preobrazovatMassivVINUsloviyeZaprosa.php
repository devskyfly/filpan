<?function preobrazovatMassivVINUsloviyeZaprosa($MassivKriteriyev,$NazvaniyePoliya)
{
$UsloviyaZaprosa='';
$RazmerMassiva=count($MassivKriteriyev);


for($iterator=0;$iterator<$RazmerMassiva;$iterator++)
{	
	if($RazmerMassiva==1)
	{
		$UsloviyaZaprosa.='('.$MassivKriteriyev[$iterator].')';
	}
	elseif($iterator==0)
	{
		$UsloviyaZaprosa.='('.$MassivKriteriyev[$iterator];
	}
	elseif($iterator==($RazmerMassiva-1))
	{
		$UsloviyaZaprosa.=','.$MassivKriteriyev[$iterator].')';
	}
	
	else
	{
		$UsloviyaZaprosa.=','.$MassivKriteriyev[$iterator];
	}
}
return $NazvaniyePoliya.' IN '.$UsloviyaZaprosa;
}
?>