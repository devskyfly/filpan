<?
class all_gifts extends db_connection
{

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function all_gifts()
	{
	$this->db_connection();
	$this->query="SELECT id, pict FROM sodraz";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

	function show_all()
	{
	$adress=array();
	$i=0;
	while ($this->f_array[$i])
				{
				//echo $i."http://www.filpan.ru/img/".$this->f_array[$i]['pict']."<br>";
				$text="http://www.filpan.ru/img/".$this->f_array[$i]['pict']."\r\n";
				$text2="http://www.filpan.ru/find.php?id=".$this->f_array[$i]['id']."&view=1\r\n";
				write_fl_a_pl("images.txt",$text);
				write_fl_a_pl("id.txt",$text2);
				/*while (!feof($handle)) {
				$buffer = fgets($handle, 2000);
				
				//$buffer=$buffer.$buffer;
				echo $buffer;
				//push($adress,$text);
				}*/
			
				$i++;
				}
				return $adress;
	}
}
?>