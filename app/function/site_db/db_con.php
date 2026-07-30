<?
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//CLASS Db
class Db
{ 
public  $db;
public  $link;
//////////////////////////////////////////////////////////////////////////
	function __construct($hostname,$username,$password,$database)
	{
	$this->db = mysql_connect($hostname, $username, $password) OR DIE("Ќет соединени€ с базой");
	mysql_query("SET NAMES 'cp1251'");
	mysql_query("SET CHARACTER SET 'cp1251'");
	$this->link=mysql_select_db($database,$this->db) or DIE("Ќе могу соединитьс€ с базой");
	}
	
	function __destruct()
	{

	}
}
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//CLASS Query_result
class Query_result
{	
protected  $db_con;
var $result;
var $out_array;
//////////////////////////////////////////////////////////////////////////
	function __construct($query)
	{
	$this->db_con= new Db("127.0.0.1","u3558310_filpan","filpan","u3558310_filpan");
	$this->result = mysql_query($query,$this->db_con->db) or die("Invalid query: " . mysql_error());
	}
	
	function Out_array()
	{
	$i=0;
		while ($row = mysql_fetch_assoc($this->result))
		{
		echo $this->out_array[$i];
		$this->out_array[$i]=$row;
		$i=$i+1;
		}
	}
	function __destruct()
	{

	}
} 
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
//CLASS Dir
class Dir
{
var $dir;
var $files_array;
	
	function __construct($dir)
	{
	$this->dir= $_SERVER['DOCUMENT_ROOT'].$dir;	
	$this->dir_files_array=array();
	}
	
	function get_files_from_dir($dir)
	{
	echo $dir.'<br>';
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
				if(is_dir($dir.$file)&&($file != ".") && ($file != ".."))
				{
				echo "Nashel papku<br>";
				$this->get_files_from_dir($dir.$file);
				}
				elseif ((!is_dir($dir.$file))&&($file != ".") && ($file != ".."))
				{
				//	array_push($this->dir_files_array,$dir.'/'.$file);
					echo $dir.'/'.$file.'<br>';
				}
				else
				{
				}
				}
			closedir($dh);
			}
		}
	}
	function __destruct()
	{
	}
}
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////

// ќткрыть заведомо существующий каталог и начать считывать его содержимое


?>

<?
/* $element=new Query_result("SELECT * FROM inf_podrazdel where katalog=1 AND razdel=2");
$element->Out_array();
print_r($element->out_array);

$dir=new Dir('/techno/');
$dir->get_files_from_dir($_SERVER['DOCUMENT_ROOT'].'/techno'); */

?>
