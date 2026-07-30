<?
function fn_by_gift($id,$table,&$sub_usl_result,&$sub_utov_result)
{
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
$link=mysql_select_db($database,$db);

$query="SELECT * FROM `$table` WHERE id=$id";
$result = mysql_query($query) or die("Invalid query: " . mysql_error());

$num_rows = mysql_num_rows($result);

 while ($row = mysql_fetch_assoc($result)) 
    { 
	$ar_uslug=explode(";",$row['sopuslugi']);
	$sub_usl_result=find_sub_gifts($link,$ar_uslug,"uslsodraz");
	
	$ar_tov=explode(";",$row['soptov']);
	$sub_utov_result=find_sub_gifts($link,$ar_tov,"sodraz");	
    };
}

function find_sub_gifts($link,$ar_uslug,$table)
{	
	$out_array=array();
	$ind=0;
	foreach ($ar_uslug as $elem =>$val)
	{
	if ($val!="")
	{
	$sub_query="SELECT * FROM `$table` WHERE id=$val";
	//printf($sub_query.'<BR>');
	$sub_result = mysql_query($sub_query) or die("Invalid query: " . mysql_error());
		while ($sub_row = mysql_fetch_assoc($sub_result)) 
		{
		$out_array[$ind]=$sub_row;
		$ind=$ind+1;
		}
	}	
	
	}
	return $out_array;
}
?>
