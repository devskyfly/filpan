<?class menu_3level_usl extends menu_2level_usl
{


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function menu_3level_usl($table,$idrub,$id_sub_rub,$raz,$basetable)
	{
	$this->db_connection();
	//$this->query="select distinct proiz.id, proiz.rub from proiz inner join ".$basetable." on (proiz.id = ".$basetable.".proiz) where proiz.idrub = '$idrub' and proiz.idraz = '$raz' and ".$basetable.".idraz = '$id_sub_rub'";
	$this->query="SELECT * FROM proiz WHERE idrub=\"$idrub\" AND idraz=\"2\"";
	
	//echo $this->query."<br>\n";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Вывод результата на сайт
	function show($id_rub,$id_sub_rub,$proiz,&$way,$raz)
	{
	if (count($this->f_array))
	{
	echo "<ul class=\"menu_links\">\n";
		$i=0;
		while ($this->f_array[$i])
		{
		if($this->f_array[$i]['id']==$proiz)
		{
		echo "<li>\n";
		echo  '<a class="links_in_menu_selected" href="http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$id_rub.'&dopp='.$this->f_array[$i]['id'].'&podc='.$id_sub_rub.'&usl=1">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		}
		else
		{
		echo "<li>\n";
		echo  '<a class="links_in_menu" href="http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$id_rub.'&dopp='.$this->f_array[$i]['id'].'&podc='.$id_sub_rub.'&usl=1">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		}
		if($this->f_array[$i]['id']==$proiz)
		{
		$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$id_rub.'&dopp='.$this->f_array[$i]['id'].'&podc='.$id_sub_rub.'&usl=1"';
		$row['text']=$this->f_array[$i]['rub'];
		array_push($way,$row);
		
		}
		$i++;
		}
	echo '</ul>';
	}
	}
	
	
	function show_title($id_rub,$id_sub_rub,$proiz,&$way,&$proiz_link,$raz)
	{
	if (count($this->f_array))
	{

		$i=0;
		while ($this->f_array[$i])
		{
		
		if($this->f_array[$i]['id']==$proiz)
		{
		$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$id_rub.'&dopp='.$this->f_array[$i]['id'].'&podc='.$id_sub_rub.'&usl=1"';
		$row['text']=$this->f_array[$i]['rub'];
		array_push($way,$row);
		
		}
		$proiz_link.= '<a class="links_in_menu" href="http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$id_rub.'&dopp='.$this->f_array[$i]['id'].'&podc='.$id_sub_rub.'&usl=1">'.$this->f_array[$i]['rub']."</a>\n";
		$i++;
		}

	}
	}
	
	function show_admin($id_rub,$id_sub_rub,$proiz,&$way,$raz)
	{
	if (count($this->f_array))
	{
	echo "<ul class=\"menu_links\">\n";
		$i=0;
		while ($this->f_array[$i])
		{
		echo "<li>\n";
		//echo  '<a class="links_in_menu" href="#">'.$this->f_array[$i]['rub']."</a>\n";
		echo  '<a class="links_in_menu" href="http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$id_rub.'&dopp='.$this->f_array[$i]['id'].'&podc='.$id_sub_rub.'&usl=1">'.$this->f_array[$i]['rub']."</a>\n";
		echo "</li>\n";
		if($this->f_array[$i]['id']==$proiz)
		{
		$row['href']='"http://'.$_SERVER['SERVER_NAME'].'/uslfind.php?id='.$id_rub.'&dopp='.$this->f_array[$i]['id'].'&podc='.$id_sub_rub.'&usl=1"';
		$row['text']=$this->f_array[$i]['rub'];
		array_push($way,$row);
		
		}
		$i++;
		}
	echo '</ul>';
	}
	}
}
?>