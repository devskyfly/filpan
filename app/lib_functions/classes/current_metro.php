<?
class current_metro extends db_connection
{
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function current_metro($id)
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();
	$this->query="SELECT * FROM metro WHERE id=".$id;
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Вывод результата на сайт
	function show()
	{
	if($size=count($this->f_array))
	{
		$i=0;
		while (($this->f_array[$i]))
		{
	if(@$_COOKIE['filpan_access']=="go4server")
	{
	echo "<a href=\"http://www.filpan.ru/tools/current_metro/index.php?id=".$this->f_array[$i]['id']."\" class=\"table_gift_link\">Редактировать</a>";
	}
		$streets=explode (";",$this->f_array[$i]['streets']);
		$iterator=0;
		$text_streets.="<div style=\"margin-left:20px;padding:20px;color:#FF6600;\">";
		while($streets[$iterator])
		{
		$text_streets.=$streets[$iterator]."<br>";
		$iterator++;
		}
		$text_streets.="</div>";
		
		$text=str_replace("_***_", $this->f_array[$i]['metro'],$this->f_array[$i]['text']);
		$text=str_replace("_streets_", $text_streets,$text);
		echo $text;
		
		
		$i++;
		}
	}

	}
	
	
	function show_title()
	{
	$i=0;
	while ($this->f_array[$i])
	{
	return 	$text=str_replace("_***_", $this->f_array[$i]['metro'],$this->f_array[$i]['title']);
	$i++;
	}
	}
	
	function show_keywords()
	{
	$i=0;
	while ($this->f_array[$i])
	{
	return 	$text=str_replace("_***_", $this->f_array[$i]['metro'],$this->f_array[$i]['keywords']);
	$i++;
	}
	}
	function show_description()
	{
	$i=0;
	while ($this->f_array[$i])
	{
	return 	$text=str_replace("_***_", $this->f_array[$i]['metro'],$this->f_array[$i]['description']);
	$i++;
	}
	}
	
	function show_adm()
	{
	if(count($this->f_array))
	{
	
	
		$i=0;
		while ($this->f_array[$i])
		{
		echo '<input id="hidden_id" type="hidden" value="'.$this->f_array[$i]['id'].'">';
		echo '<input type="button" value="Сохранить" onclick="
		update_metro(
		$(\'#hidden_id\'),
		$(\'#metro_inf\'),
		$(\'#streets_inf\'),
		CKEDITOR.instances.text_inf,
		$(\'#meta_keywords_inf\'),
		$(\'#meta_descr_inf\'),
		$(\'#title_inf\')
		)">
		<input type="button" value="Сгенерировать все станции по данной" onclick="
		update_all_metro(
		CKEDITOR.instances.text_inf,
		$(\'#meta_keywords_inf\'),
		$(\'#meta_descr_inf\'),
		$(\'#title_inf\')
		)">
		<!--<input type="button" value="Копировать" onclick="window.location=\'http://www.filpan.ru/tools/copy_gift/index.php?id='.$this->f_array[$i]['id'].'\'">-->
		<input type="button" value="Вернуться к списку станций метро" onclick="window.location=\'http://www.filpan.ru/tools/metro/index.php\'">';
	
		
		echo '<div> Название станции:<br><textarea id="metro_inf" rows="5" cols="50">'.$this->f_array[$i]['metro'].'</textarea></div>';
		echo '<div >Названия улиц:<br><textarea id="streets_inf" rows="6" cols="50">'.$this->f_array[$i]['streets'].'</textarea></div>';
	    echo '<div >Дополнительный текст:<br><textarea id="text_inf" class="ckeditor" rows="6" cols="50">'.$this->f_array[$i]['text'].'</textarea></div>';
		echo '<div > Мета ключевые слова:<br><textarea id="meta_keywords_inf" rows="5" cols="50">'.$this->f_array[$i]['keywords'].'</textarea></div>';
		echo '<div > Мета описание:<br><textarea id="meta_descr_inf" rows="5" cols="50">'.$this->f_array[$i]['description'].'</textarea></div>';
		echo '<div > Заголовок страницы:<br><textarea id="title_inf" rows="5" cols="50">'.$this->f_array[$i]['title'].'</textarea></div>';

		
		$i++;
		}

	}
	
	}
	
}
?>