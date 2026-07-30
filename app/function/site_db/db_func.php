<?

interface i_date_base
{
   public function find_element($db,$table,$find,$requirement_txt,$requirement_val); 
}



class date_base implements i_date_base{
public $out_inform;
public $link;
function __construct() {
      $this->link = mysql_connect('127.0.0.1','root','');
	mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
  }

  

function find_element($db,$table,$find,$requirement_txt,$requirement_val)
{

mysql_select_db($db, $this->link);
$tok = strtok($find, ",");
$i=0;
while ($tok !== false) 
{
   $find_r[$i]=$tok;
   $i++;
   $tok = strtok(",");
}



//echo $find_r[0],$find_r[1];
if(3==func_num_args())
{
$query = sprintf("SELECT $find FROM $table");
}
elseif(5==func_num_args())
{
$query = sprintf("SELECT $find FROM $table WHERE $requirement_txt='$requirement_val'");
}
//$query = sprintf("SELECT nazv FROM korzin WHERE dat='24.10.2005'");


$result = mysql_query($query);

	$j=0;
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
	{
	
	for($i = 0; $i <= count($find_r); $i++) 
	{
	
	 $this->out_inform[$j][$find_r[$i]]=$line[$find_r[$i]];
	 
	}
	$j++;
	}
}

function __destruct() 
{
	mysql_close($this->link);  
}
}

?>
