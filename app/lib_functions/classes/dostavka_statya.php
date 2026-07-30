<?
class dostavka_statya extends db_connection
{
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function dostavka_statya($id)
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();
	$this->query="SELECT * FROM dostavka_statyi WHERE id=".$id;
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Вывод результата на сайт
	function show_adm()
	{
	if(count($this->f_array))
	{
	
	
		$i=0;
		while ($this->f_array[$i])
		{
		echo '<input id="hidden_id" type="hidden" value="'.$this->f_array[$i]['id'].'">';
		echo '<input type="button" value="Сохранить" onclick="
		update_index_statya(
		$(\'#hidden_id\'),
		$(\'#name_statyi_inf\'),
		$(\'#date_inf\'),
		CKEDITOR.instances.text_statyi_inf
		)">
		<!--<input type="button" value="Копировать" onclick="window.location=\'http://www.filpan.ru/tools/copy_gift/index.php?id='.$this->f_array[$i]['id'].'\'">-->
		<input type="button" value="Вернуться к списку статей" onclick="window.location=\'http://www.filpan.ru/tools/dostavka_statyi/index.php\'">';
	
		
		echo '<div> Название статьи:<br><textarea id="name_statyi_inf" rows="5" cols="50">'.$this->f_array[$i]['name_statyi'].'</textarea></div>';
		echo '<div > Текст статьи:<br><textarea id="text_statyi_inf" class="ckeditor"  rows="10" cols="80">'.$this->f_array[$i]['text_statyi'].'</textarea></div>';
		echo '<div > Дата ее написания:<br><textarea id="date_inf" rows="1" cols="10">'.$this->f_array[$i]['date'].'</textarea></div>';
		
		
		$i++;
		}

	}

	}
	
	
	function show_adm_copy()
	{
	if(count($this->f_array))
	{
	
	
		$i=0;
		while ($this->f_array[$i])
		{
		echo '<input id="hidden_id" type="hidden" value="'.$this->f_array[$i]['id'].'">';
		echo '<input type="button" value="Сохранить" onclick="
		update_statya(
		$(\'#hidden_id\'),
		$(\'#name_statyi_inf\'),
		$(\'#date_inf\'),
		$(\'#meta_keywords_inf\'),
		$(\'#meta_descr_inf\'),
		$(\'#title_inf\'),
		$(\'#html_title_inf\'),
		$(\'#text_statyi_inf\')
		)">
		<input type="button" value="Копировать" onclick="window.location=\'http://www.filpan.ru/tools/copy_gift/index.php?id='.$this->f_array[$i]['id'].'\'">
		
		<input type="button" value="Вернуться к списку статей" onclick="window.location=\'http://www.filpan.ru/tools/statyi/index.php\'">';
	
		
		echo '<div> Название статьи:<br><textarea id="name_statyi_inf" rows="5" cols="50">'.$this->f_array[$i]['name_statyi'].'</textarea></div>';
		echo '<div > Дата ее написания:<br><textarea id="date_inf" rows="1" cols="10">'.$this->f_array[$i]['date'].'</textarea></div>';
		echo '<div > Мета ключевые слова:<br><textarea id="meta_keywords_inf" rows="5" cols="50">'.$this->f_array[$i]['keywords'].'</textarea></div>';
		echo '<div > Мета описание:<br><textarea id="meta_descr_inf" rows="5" cols="50">'.$this->f_array[$i]['descr'].'</textarea></div>';
		echo '<div > Заголовок страницы:<br><textarea id="title_inf" rows="5" cols="50">'.$this->f_array[$i]['title'].'</textarea></div>';
		echo '<div > HTML заголовок страницы:<br><textarea id="html_title_inf" rows="5" cols="50">'.$this->f_array[$i]['html_title'].'</textarea></div>';
		echo '<div > Текст статьи:<br><textarea id="text_statyi_inf" rows="10" cols="80">'.$this->f_array[$i]['text_statyi'].'</textarea></div>';
		
		$i++;
		}

	}

	}
	
	
	function show()
	{
	if(count($this->f_array))
	{
		$i=0;
		while ($this->f_array[$i])
		{
			$ans=access($_COOKIE['filpan_access']);
		if($ans)
	{
	echo "<a href=\"http://www.filpan.ru/tools/statya/index.php?id=".$this->f_array[$i]['id']."\" class=\"table_gift_link\">Редактировать</a>";
	}
		
		echo $this->f_array[$i]['text_statyi'];
		
		$i++;
		}

	}

	}
	
	function show_title()
	{
	if(count($this->f_array))
	{
		$i=0;
		while ($this->f_array[$i])
		{
		
		return $this->f_array[$i]['title'];
		
		$i++;
		}

	}

	}
	
	function show_description()
	{
	if(count($this->f_array))
	{
		$i=0;
		while ($this->f_array[$i])
		{
		
		return $this->f_array[$i]['meta_descr'];
		
		$i++;
		}

	}

	}
	
	function show_keywords()
	{
	if(count($this->f_array))
	{
		$i=0;
		while ($this->f_array[$i])
		{
		
		return $this->f_array[$i]['meta_keywords'];
		
		$i++;
		}

	}

	}
	
	
	
	

	
	
	
}
?>