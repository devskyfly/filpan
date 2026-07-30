<?
class katalog extends db_connection
{
var $current_pos;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function katalog()
	{
	$this->db_connection();
	$this->query="SELECT * FROM katalog";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}
	
	
	function show_select()
	{
	if (count($this->f_array))
	{


	echo "<select>\n";
		$i=0;
		
	
	
		echo '<option value="'."1".'">'.'Товары'."</option>\r\n";
	echo '<option value="'."2".'">'.'Услуги'."</option>\r\n";
	
		
		
	
	
		echo "<option value=\"-1\"  selected=\"selected\">-Пусто-</option>";
	
	echo '</select>';
	}
	
	}
	}
	?>