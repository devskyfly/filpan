<?
class menu_1level extends db_connection
{
var $basetable;
var $current_folder;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function menu_1level($table,$table2)
	{
	$this->basetable=$table2;
	$this->db_connection();
	$this->query="SELECT * FROM ".$table." ORDER BY ord";
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
		if(($this->f_array[$i]['id']==$id_rub)&&(!$usl))
		{
		
		echo "<li>\n";
		echo  '<a class="links_in_menu_selected" href="http://'.$_SERVER['SERVER_NAME'].'/find.php?id='.$this->f_array[$i]['id'].'">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		
		}
		else
		{
		echo "<li>\n";
		echo  '<a class="links_in_menu" href="http://'.$_SERVER['SERVER_NAME'].'/find.php?id='.$this->f_array[$i]['id'].'">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		}
		if(!$usl)
		{
			if($this->f_array[$i]['id']==$id_rub)
			{
			$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/find.php?id='.$this->f_array[$i]['id'].'"';
			$row['text']=$this->f_array[$i]['rub'];
			
			array_push($way,$row);
			$menu_uslugi=new menu_2level("subtprub",$id_rub,$raz,$this->basetable);
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
	
		
		if(!$usl)
		{
			if($this->f_array[$i]['id']==$id_rub)
			{
			$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/find.php?id='.$this->f_array[$i]['id'].'"';
			$row['text']=$this->f_array[$i]['rub'];
			
			array_push($way,$row);
			$menu_uslugi=new menu_2level("subtprub",$id_rub,$raz,$this->basetable);
			$menu_uslugi->show_title($id_rub,$id_sub_rub,$proiz,$way,$proiz_link,$raz);
			}
			}
		$i++;
		}
	}
	//print_r($way);
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
		echo  '<a class="links_in_menu" href="http://'.$_SERVER['SERVER_NAME'].'/find.php?id='.$this->f_array[$i]['id'].'">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		
		if(!$usl)
		{
			if($this->f_array[$i]['id']==$id_rub)
			{
			$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/find.php?id='.$this->f_array[$i]['id'].'"';
			$row['text']=$this->f_array[$i]['rub'];
			
			array_push($way,$row);
			$menu_uslugi=new menu_2level("subtprub",$id_rub,$raz,$this->basetable);
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