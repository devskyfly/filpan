<?
function select_unit($id_unit,$unit_type)
{

$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
$link=mysql_select_db($database,$db);


$query="SELECT id,soptov,sopuslugi FROM $unit_type WHERE id=$id_unit";

$result = mysql_query($query) or die("Invalid query: " . mysql_error());

while ($row = mysql_fetch_array($result))
{

$tov_array=explode(";",$row['soptov']);
$usl_array=explode(";",$row['sopuslugi']); 
}

$array_ind=0;
while ($tov_array[$array_ind]&&$tov_array[$array_ind]!='')
{
select_sub_unit($tov_array[$array_ind],$id_unit,'sodraz',$unit_type);

$array_ind=$array_ind+1;
}

$array_ind=0;
while ($usl_array[$array_ind]&&$usl_array[$array_ind]!='')
{
select_sub_unit($usl_array[$array_ind],$id_unit,'uslsodraz',$unit_type);
$array_ind=$array_ind+1;
}
}


function select_sub_unit($id_unit,$id_relative,$unit_type,$relative_type)
{

$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
$link=mysql_select_db($database,$db);


$query="SELECT id,soptov,sopuslugi FROM $unit_type WHERE id=$id_unit";

$result = mysql_query($query) or die("Invalid query: " . mysql_error());


while ($row = mysql_fetch_array($result))
{
$tov_str=$row['soptov'];
$tov_array=explode(";",$row['soptov']);

$usl_str=$row['sopuslugi'];
$usl_array=explode(";",$row['sopuslugi']); 

}

$tovar_enable=false;
$usluga_enable=false;

if ($relative_type=='sodraz'){
	$array_ind=0;
	while ($tov_array[$array_ind]&&($tov_array[$array_ind]!=''))
	{
	if($tov_array[$array_ind]==$id_relative)
	{
	$tovar_enable=true;
	}
	$array_ind=$array_ind+1;
	}
	
	if($tovar_enable==false)
	{
	$result = mysql_query(add_element($tov_str,$id_unit,$id_relative,$unit_type,$relative_type));
	}
}
elseif($relative_type=='uslsodraz')
{
	$array_ind=0;
	while ($usl_array[$array_ind]&&($usl_array[$array_ind]!=''))
	{
	if($usl_array[$array_ind]==$id_relative)
	{
	$usluga_enable=true;
	}
	$array_ind=$array_ind+1;
	}
	
	if($usluga_enable==false)
	{
	$result = mysql_query(add_element($usl_str,$id_unit,$id_relative,$unit_type,$relative_type));  
	}
}
}

function add_element($elemet,$id_unit,$id_relative,$unit_type,$relative_type)
{
 $len=strlen($elemet); 
 if($elemet[($len-1)]==';'||$len==0)
 {
 $newtext=$elemet.$id_relative.';';
 if ($relative_type=='sodraz')
 {
 $query="UPDATE $unit_type SET soptov='$newtext'  WHERE id=$id_unit";
 }
 elseif($relative_type=='uslsodraz')
 {
 $query="UPDATE $unit_type SET sopuslugi='$newtext'  WHERE id=$id_unit";
 }
 }
 else
 {
 $newtext=';'.$elemet.$id_relative.';';
 if ($relative_type=='sodraz')
 {
 $query="UPDATE $unit_type SET soptov='$newtext'  WHERE id=$id_unit";
 }
 elseif($relative_type=='uslsodraz')
 {
 $query="UPDATE $unit_type SET sopuslugi='$newtext'  WHERE id=$id_unit";
 }
 }
 return $query;
}
?>
