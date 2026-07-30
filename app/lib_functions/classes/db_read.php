<?
class db_read extends db_connect
{

function db_read()
{
$this->db_connect();
}

function get_answer()
{
$result=mysql_query($this->query);
$num_rows=mysql_num_rows($result);
$this->answer=array();
	if($num_rows==0)
	{
	return 0;
	}
	
	$iterator=0;
	while($row=mysql_fetch_array($result))
		{
		$this->answer[$iterator]=$row;
		$size=count($this->answer[$iterator]);
		$keys=array_keys($this->answer[$iterator]);
			for ($assoc_array_iterator=0;$assoc_array_iterator<$size;$assoc_array_iterator++)
			{
			$this->answer[$iterator][$keys[$assoc_array_iterator]]=iconv( "cp1251","utf-8",$this->answer[$iterator][$keys[$assoc_array_iterator]]);
			}
		$iterator=$iterator+1;
		}
}
protected:
$answer;
}
?> 