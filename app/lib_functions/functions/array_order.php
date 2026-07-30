<?
function array_order($ar)
{
$size=count($ar);
echo '<br>Размер:'.$size."<br>";


for ($outside_iterator=0;$outside_iterator<$size-1;$outside_iterator++)
{
		for ($iterator=0;$iterator<($size-1);$iterator++)
		{
			
			if($ar[$iterator]['size']<$ar[$iterator+1]['size'])
			{
			$previos_value=$ar[$iterator+1];
			$ar[$iterator+1]=$ar[$iterator];
			$ar[$iterator]=$previos_value;
			}
			
		}
}

$out_array=array();

for ($iterator=0;$iterator<$size;$iterator++)
{
if($ar[$iterator]['size']!=1)
{
$out_array[$iterator]=$ar[$iterator];
}
else
{
break;
}

}
		


return $out_array;
}
?>