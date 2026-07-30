<?
class proiz_usl extends db_connection
{
var $current_pos;
var $rub;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function proiz_usl($current,$rub)
	{
	$this->current_pos=$current;
	$this->db_connection();
	$this->query="SELECT * FROM proiz WHERE idraz=2 AND idrub=".$rub;
	$this->rub=$rub;
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}
	
	
	function show()
	{
	if (count($this->f_array))
	{
	$position_number=$this->f_array[0]['id'];
	$selected=0;
	echo '<select>';
		$i=0;
		
		while ($this->f_array[$i])
		{
		if($this->f_array[$i]['id']==$this->current_pos)
		{
		$selected=1;
		echo '<option value="'.$this->f_array[$i]['id'].'"  selected="selected">'.$this->f_array[$i]['rub']."</option>\r\n";
		$position_number=$this->f_array[$i]['id'];
		}
		else
		{
		echo '<option value="'.$this->f_array[$i]['id'].'">'.$this->f_array[$i]['rub']."</option>\r\n";
		}
		$i++;
		}
			if($selected==0)
		{
		echo "<option value=\"-1\"  selected=\"selected\">-Пусто-</option>";
		}
	echo '</select>';
	}
else
	{
	echo '<select>';
	echo "<option value=\"-1\"  selected=\"selected\">-Пусто-</option>";
	echo '</select>';
	}
	return $position_number;
	}
	function show_like_table()
	{
	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
	$i=0;
		
		while ($this->f_array[$i])
		{
		echo '<tr>';
		echo '<td style="border:solid 1px black;"><div style="margin:10px;width:10px;height:10px;background-color:black;"></div></td><td style="border:solid 1px black;"><a href="http://www.filpan.ru/tools/edit_razdel_uslugi/update_proiz?id='.$this->f_array[$i]['id'].'" class="simpl_link">'.$this->f_array[$i]['rub']."</a></td><td style=\"border:solid 1px black;\"><input type=\"button\" value=\"Удалить\" onclick=\"delete_proiz(".$this->f_array[$i]['id'].")\"></td>\r\n";
		echo '</tr>';
		$i++;
		}
		
	echo "</table>";
	echo "<input type=\"button\" value=\"Добавить\" onClick=\"add_proiz(".$this->rub.")\">";
	}
	}
	?>