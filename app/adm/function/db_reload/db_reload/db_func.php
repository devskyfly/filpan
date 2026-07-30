<?
interface i_date_base
{
   public function find_element(); 
   public function inf_view();
}

		class date_base
		{
			public $out_inform;/*это массив выходящих данных доступных по ключам
			соответствующим названиям столбцов таблицы бд*/
			private $link;//это ссылка на подключение к базам
			
				function __construct() 
				{
				//podkluchaem bazu dannih
				  $this->link = mysql_connect('127.0.0.1','u3558310_filpan','filpan');
				}
		
	function find_element()
	{
	$db=func_get_arg(0);
	$table=func_get_arg(1);
	$find=func_get_arg(2);

	mysql_select_db($db, $this->link);
	$tok = strtok($find, ",");
	$i=0;
	
		while ($tok !== false) 
		{
		   $find_r[$i]=$tok;
		   $i++;
		   $tok = strtok(",");
		}

	if(3==func_num_args())
		{
		$query = sprintf("SELECT $find FROM $table");
		}
	
	elseif(5==func_num_args())
		{
		$requirement_txt=func_get_arg(3);
		$requirement_val=func_get_arg(4);
		
		$requirement_txt=iconv( "UTF-8","windows-1251",$requirement_txt);
		$requirement_val=iconv( "UTF-8","windows-1251",$requirement_val);
		$query = sprintf("SELECT $find FROM $table WHERE $requirement_txt='$requirement_val'");
		}

		$result = mysql_query($query);

		$j=0;
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
		{
		
			for($i = 0; $i <= count($find_r)-1; $i++) 
			{
			$this->out_inform[$j][$find_r[$i]]=iconv("windows-1251", "UTF-8",$line[$find_r[$i]]);
			}
			
			$j++;
		}
	}
	
	function inf_view()
	{
	echo "<table border='1'>";
	//var_dump($this->out_inform);
	//print_r($this->out_inform);
	if(!is_null($this->out_inform))
	{
	foreach($this->out_inform as $stroka=>$array)
	{
	echo '<tr>';
	foreach($array as $key=>$znacheniye)
	{
	echo '<td width=300>'.$znacheniye.'</td>';
	}
	echo '</tr>';
	}
	echo '</table>';
	}
	else
	{echo "По данному запросу совпадений нет";}
	}
	
	
	
	function db_generate()
	{
	$sql = 'CREATE DATABASE db_mag';
		if (mysql_query($sql, $this->link)) {
		   echo "Database my_db created successfully\n";
		} else {
		   echo 'Error creating database: ' . mysql_error() . "\n";
		}
	}
	
	
	
	function &show_tables()
	{
		$sql = sprintf("SHOW TABLES FROM u3558310_filpan");
		$result = mysql_query($sql);
		if (!$result) {
		echo "DB Error, could not list tables\n";
		echo 'MySQL Error: ' . mysql_error();
		exit;
		}
	$i=0;
	$row_out=array();
	while ($row = mysql_fetch_row($result)) {
	$row_out[$i]=$row;
	$i++;
	}
	mysql_free_result($result);
	return $row_out;
	}
	
	
	function &table_describe($table_name)
	{

	$fields=&mysql_list_fields (u3558310_filpan,$table_name,$this->link);
	$columns = mysql_num_fields($fields);

	for ($i = 0; $i < $columns; $i++) {
		$row_out[$i][1]=mysql_field_name($fields, $i);
		$row_out[$i][2]=mysql_field_type($fields, $i);
		$row_out[$i][3]=mysql_field_len($fields, $i);	
	}
	return $row_out;
	}



	
	
	
	
	function __destruct() 
	{
		mysql_close($this->link);
	}
}

?>