<?
class statya_tov extends db_connection
{
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function statya_tov($katalog,$raz,$podraz,$proiz)
	{
	if($katalog=='')
	{
	$katalog=-1;
	}
	if($raz=='')
	{
	$raz=-1;
	}
	if($podraz=='')
	{
	$podraz=-1;
	}
	if($proiz=='')
	{
	$proiz=-1;
	}
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();
	$this->query="SELECT * FROM inf_podrazdel WHERE katalog=$katalog AND razdel=$raz AND podrazdel=$podraz AND proiz=$proiz";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Вывод результата на сайт
	function show_text_admin()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		echo $this->f_array[$i]['text_statyi'];
		$i++;
		}
	//}

	}
	
	function show_title_admin()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['title']);
		echo $this->f_array[$i]['title'];
		$i++;
		}
	//}

	}
	
	function show_html_title_admin()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['html_title']);
		echo $this->f_array[$i]['html_title'];
		$i++;
		}
	//}

	}
	
	function show_descr_admin()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['descr']);
		echo $this->f_array[$i]['descr'];
		$i++;
		}
	//}

	}

		function show_keywords_admin()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['keywords']);
		echo $this->f_array[$i]['keywords'];
		$i++;
		}
	//}
	}

	
	function show_text()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{


		$i=0;
		while ($this->f_array[$i])
		{	if(mb_strlen($this->f_array[0]['text_statyi'])!=0)
	{
		echo '<div class="sub_rub_content">';
		echo $this->f_array[$i]['text_statyi'];
		echo '</div>';
		
		}
		$i++;
		}
	//}

	}
	
	function show_title()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['title']);
		return $this->f_array[$i]['title'];
		$i++;
		}
	//}

	}
	
	function show_html_title()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['html_title']);
		echo $this->f_array[$i]['html_title'];
		$i++;
		}
	//}

	}
	
	function show_descr()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['descr']);
		return $this->f_array[$i]['descr'];
		$i++;
		}
	//}

	}

		function show_keywords()
	{
	//echo $this->query;
	//if(count($this->f_array))
	//{
		$i=0;
		while ($this->f_array[$i])
		{
		//echo iconv( "utf-8","cp1251",$this->f_array[$i]['keywords']);
		return $this->f_array[$i]['keywords'];
		$i++;
		}
	//}
	}
	
	
	

	
	
	
}
?>