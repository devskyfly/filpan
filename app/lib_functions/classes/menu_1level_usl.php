<?
class menu_1level_usl extends db_connection
{
var $basetable;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function menu_1level_usl($table,$table2)
	{
	$this->basetable=$table2;
	$this->db_connection();
	$this->query="SELECT * FROM ".$table;
	//echo $this->query."<br>\n";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Вывод результата на сайт
	function show($id_rub,$id_sub_rub,$proiz,&$way,$raz,$usl)
	{
	if (count($this->f_array))
	{
	echo "<ul class=\"menu_links\">\n";
		$i=0;
		while ($this->f_array[$i])
		{
		if(($this->f_array[$i]['id']==$id_rub)&&($usl))
		{
		echo "<li>\n";
		echo  '<a class="links_in_menu_selected" href="http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$this->f_array[$i]['id'].'&usl=1">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		}
		else
		{
		echo "<li>\n";
		echo  '<a class="links_in_menu" href="http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$this->f_array[$i]['id'].'&usl=1">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		}
		
		if($usl)
		{
			if($this->f_array[$i]['id']==$id_rub)
			{
			$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$this->f_array[$i]['id'].'&usl=1"';
			$row['text']=$this->f_array[$i]['rub'];
			
			array_push($way,$row);
			
			$menu_uslugi=new menu_2level_usl("subtprub",$id_rub,$raz,$this->basetable);
			$menu_uslugi->show($id_rub,$id_sub_rub,$proiz,$way,$raz);
			}
		}
		$i++;
		}
		
	echo '</ul>';
	}
	}
	
	function show_title($id_rub,$id_sub_rub,$proiz,&$way,&$proiz_link,$raz,$usl)
	{
	if (count($this->f_array))
	{

		$i=0;
		while ($this->f_array[$i])
		{
		
		
		
		if($usl)
		{
			if($this->f_array[$i]['id']==$id_rub)
			{
			$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$this->f_array[$i]['id'].'&usl=1"';
			$row['text']=$this->f_array[$i]['rub'];
			
			array_push($way,$row);
			$menu_uslugi=new menu_2level_usl("subtprub",$id_rub,$raz,$this->basetable);
			$menu_uslugi->show_title($id_rub,$id_sub_rub,$proiz,$way,$proiz_link,$raz);
			}
		}
		$i++;
		}
		

	}
	//echo $id_rub;
	//print_r($usl);
	}
	
	
	
	
	
	function show_admin($id_rub,$id_sub_rub,$proiz,&$way,$raz,$usl)
	{
	if (count($this->f_array))
	{
	echo "<ul class=\"menu_links\">\n";
		$i=0;
		while ($this->f_array[$i])
		{
		echo "<li>\n";
		echo  '<a class="links_in_menu" href="http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$this->f_array[$i]['id'].'&usl=1">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		
		
		if($usl)
		{
			if($this->f_array[$i]['id']==$id_rub)
			{
			$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$this->f_array[$i]['id'].'&usl=1"';
			$row['text']=$this->f_array[$i]['rub'];
			
			array_push($way,$row);
			
			$menu_uslugi=new menu_2level_usl("subtprub",$id_rub,$raz,$this->basetable);
			$menu_uslugi->show($id_rub,$id_sub_rub,$proiz,$way,$raz);
			}
		}
		$i++;
		}
		
	echo '</ul>';
	}
	}
	
	
}
?>