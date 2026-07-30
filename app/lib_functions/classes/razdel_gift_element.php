<?
class razdel_gift_element extends db_connection
{
var $current_pos;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function razdel_gift_element($id)
	{
	$this->current_pos=$current;
	$this->db_connection();
	$this->query="SELECT * FROM tprub WHERE id=".$id;
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}
	
	
	function show_admin()
	{
	if (count($this->f_array))
	{
	
		$i=0;
		
		while ($this->f_array[$i])
		{
		echo '<input id="hidden_id" type="hidden" value="'.$this->f_array[$i]['id'].'">';
		echo '<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">';
    echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">
	    <input type="button" value="Сохранить" onclick="update_razdel()">
		<input type="button" value="Вернуться к списку разделов" onclick="window.location=\'http://www.filpan.ru/tools/edit_razdel_gifts/index.php\'">
		</div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Название раздела:<br>
		<textarea rows="4" cols="80" id="rub_inf">'.$this->f_array[$i]['rub'].'</textarea></div>';
		$i++;
		}
		
	}
	
	
	}
	}
	?>