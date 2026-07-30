<?
class nashi_partnery_statyi extends db_connection
{
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function nashi_partnery_statyi()
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();
	$this->query="SELECT * FROM nashi_partnery_statyi ORDER BY ord ASC";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Вывод результата на сайт
	function show_statyi_adm()
	{
	if(count($this->f_array))
	{
	
	echo "<table style=\"width:100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
		$i=0;
		while ($this->f_array[$i])
		{
		echo "<tr>\n";
		echo "<td style=\"text-align:center;border:solid 1px black;width:160px;\" >";
		echo $this->f_array[$i]['date'];
		echo "</td>";
		echo "<td style=\"border:solid 1px black;\" >";
		echo "<a class=\"simpl_link\" href=\"http://www.filpan.ru/tools/nashi_partnery_statya/index.php?id=".$this->f_array[$i]['id']."\">".$this->f_array[$i]['name_statyi']."</a>";
		echo "</td>";
		echo "<td style=\"border:solid 1px black;\" >";
		echo "<input type=\"button\" onclick=\"delite_index_statya(".$this->f_array[$i]['id'].",'http://www.filpan.ru/tools/nashi_partnery_statyi/index.php')\" value=\"Удалить\">";
		if($i==0)
		{
		
		echo "<input type=\"button\" value=\"_____\">";
		}
		else
		{
			echo "<input type=\"button\" onclick=\"shift_up(".$this->f_array[$i]['id'].",'http://www.filpan.ru/tools/nashi_partnery_statyi/index.php')\" value=\"Выше\">";
		}
		
		if(($max_size-1)==$i)
		{
			echo "<input type=\"button\" value=\"_____\">";
		}
		else
		{
		echo "<input type=\"button\" onclick=\"shift_down(".$this->f_array[$i]['id'].",'http://www.filpan.ru/tools/nashi_partnery_statyi/index.php')\" value=\"Ниже\">";
		}
		echo "</td>";
		
		echo "</tr>\n";
		$i++;
		}
		echo "</table>\n";
	}

	}
	
	
	function show()
	{
	
	
	
	
			$i=0;
				while ($this->f_array[$i])
				{
				echo "<div class=\"content-box\">
				<span class=\"content_box_title\">".$this->f_array[$i]['name_statyi']."</span>".
				$this->f_array[$i]['text_statyi']
				."
				</div>";
				$i++;
				}

	//echo "</div>";
	}
	
	function show_for_menu()
	{
	$i=0;
	echo '<ul style="margin-left:-30px;width:220px;list-style-type: circle;">';
	while (($this->f_array[$i]))
	{
	echo "<li><a class=\"menu_links_super_predl\" href=\"http://www.filpan.ru/statya.php?id=".$this->f_array[$i]['id']."\">".$this->f_array[$i]['date']."<br>".$this->f_array[$i]['name_statyi']."<br><br></a></li>\n";
	$i++;
	}
	echo '</ul>';
	
	}

	
	function shift_up($id)
	{
	$current_elem= new db_connection();
	$current_elem->query="SELECT   *  FROM nashi_partnery_statyi WHERE id=".$id." LIMIT 0,1";
	$current_elem->current_datebases();
	$current_elem->set_query();
	$current_elem->close_connection();
	
	$i=0;
	while ($current_elem->f_array[$i])
	{

	$current_id=$current_elem->f_array[$i]['id'];
	$current_ord=$current_elem->f_array[$i]['ord'];
	
	$sub_elem= new db_connection();
	$sub_elem->query="SELECT *  FROM nashi_partnery_statyi WHERE ord<".$current_elem->f_array[$i]['ord']." ORDER BY ord DESC LIMIT 0,1";
	
	$sub_elem->current_datebases();
	$sub_elem->set_query();
	$sub_elem->close_connection();
		
				$iterator=0;
				while ($sub_elem->f_array[$iterator])
				{
				$sub_id=$sub_elem->f_array[$i]['id'];
				$sub_ord=$sub_elem->f_array[$i]['ord'];
				break;
				$iterator++;
				}
	
	
	break;
	$i++;
	}
	
	$current_elem= new db_connection();
	$current_elem->query="UPDATE nashi_partnery_statyi Set ord=".$sub_ord." WHERE id=".$current_id;
	$current_elem->current_datebases();
	$current_elem->set_query();
	$current_elem->close_connection();
	
	
	$current_elem= new db_connection();
	$current_elem->query="UPDATE nashi_partnery_statyi Set ord=".$current_ord." WHERE id=".$sub_id;
	$current_elem->current_datebases();
	$current_elem->set_query();
	$current_elem->close_connection();
	}
	
	
	
	
	
	
	function shift_down($id)
	{
	$current_elem= new db_connection();
	$current_elem->query="SELECT  * FROM nashi_partnery_statyi WHERE id=".$id." LIMIT 0,1";
	$current_elem->current_datebases();
	$current_elem->set_query();
	$current_elem->close_connection();
	
	$i=0;
	while ($current_elem->f_array[$i])
	{
	
	$current_id=$current_elem->f_array[$i]['id'];
	$current_ord=$current_elem->f_array[$i]['ord'];
	
	$sub_elem= new db_connection();
	$sub_elem->query="SELECT   * FROM nashi_partnery_statyi WHERE ord>".$current_elem->f_array[$i]['ord']." ORDER BY ord ASC LIMIT 0,1";
	$sub_elem->current_datebases();
	$sub_elem->set_query();
	$sub_elem->close_connection();
	
				$iterator=0;
				while ($sub_elem->f_array[$iterator])
				{
				$sub_id=$sub_elem->f_array[$i]['id'];
				$sub_ord=$sub_elem->f_array[$i]['ord'];
					break;
				$iterator++;
				}
	
	
		break;
	$i++;
	}
	
	$current_elem= new db_connection();
	$current_elem->query="UPDATE nashi_partnery_statyi Set ord=".$sub_ord." WHERE id=".$current_id;
	$current_elem->current_datebases();
	$current_elem->set_query();
	$current_elem->close_connection();
	
	
	$current_elem= new db_connection();
	$current_elem->query="UPDATE nashi_partnery_statyi Set ord=".$current_ord." WHERE id=".$sub_id;
	$current_elem->current_datebases();
	$current_elem->set_query();
	$current_elem->close_connection();
	}
	
	function get_max_order()
	{
	$current_elem= new db_connection();
	$current_elem->query="SELECT MAX(ord) FROM nashi_partnery_statyi";
	$current_elem->current_datebases();
	$current_elem->set_query();
	$current_elem->close_connection();
	$iterator=0;
				while ($current_elem->f_array[$iterator])
				{
				return $current_elem->f_array[$iterator]['0'];
				}
	}

	
	
}
?>