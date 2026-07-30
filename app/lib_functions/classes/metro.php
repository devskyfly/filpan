<?
class metro extends db_connection
{
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function metro()
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();
	$this->query="SELECT * FROM metro ORDER BY metro";
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
	echo "	<div style=\"padding:10px;border:1px solid #EFEFEF;color:#FF6600;font-family: arial,helvetica,tahoma,verdana,sans-serif;font-size: 14px;font-weight:bold;text-align:center;\"><strong>Мы производим заправку картриджей в любом районе Москвы.</strong></div>
<div style=\"padding:10px;border:1px solid #EFEFEF;color:#FF6600;font-family: arial,helvetica,tahoma,verdana,sans-serif;font-size: 14px;font-weight:bold;text-align:center;\">Заправка картриджей в Москве по станциям метро:</div>";
	echo "<table class=\"gift_table\"  cellpadding=\"0\" cellspacing=\"0\"> \n";
	
		$i=0;
		while (($this->f_array[$i]))
		{
		echo "<tr>\n";
		echo "<td  style=\"border:1px solid #EFEFEF;width:50%;text-align:center\"><a class=\"menu_links_super_predl\" href=\"http://www.filpan.ru/current_metro.php?id=".$this->f_array[$i]['id']."\">";
		echo $this->f_array[$i]['metro'];
		echo "</a></td>";
		echo "<td  style=\"border:1px solid #EFEFEF;width:50%;text-align:center\"><a class=\"menu_links_super_predl\" href=\"http://www.filpan.ru/current_metro.php?id=".$this->f_array[$i+1]['id']."\">";
		echo $this->f_array[$i+1]['metro'];
		echo "</a></td>";
		echo "</tr>\n";
		$i++;
		$i++;
		}
		echo "</table>\n";
	}
echo "	<div style=\"margin-top:20px;padding:10px;border:1px solid #EFEFEF;color:#89898A;font-family: arial,helvetica,tahoma,verdana,sans-serif;font-size: 12px;font-weight:bold;\">Если Вам понадобилась <h1 style=\"display:inline;font-size: 12px\">заправка картриджей в Москве</h1> - мы всегда готовы срочно выполнить заказ по заправке, наши механики готовы срочно, в течении двух часов выполнить заказ по заправке и настройке вашего печатного оборудования. Гарантируем  высокое качество печати вашей техники после заправки картриджей ваших принтеров.<p><strong>Компания Филпан имеет большой опыт по <a class=\"text_link\" href=\"http://www.filpan.ru\">заправке картриджей</a>, <a class=\"text_link\" href=\"http://www.filpan.ru/uslfind.php?id=3&usl=1\">ремонту принтеров</a>, факсов и копиров  (с 1992 года). Тонер, чернила и краска для принтеров позволят вам существенно снизить затраты на расходные материалы.</strong> <br>Мы используем только высококачественный тонер LG, что обеспечивает высокое качество печати и многократное использование одного и того же картриджа. <br><b>Работы ведутся в специально оборудованной лаборатории высококвалифицированными специалистами на профессиональном оборудовании, что позволяет достигать стопроцентного качества печати на заправленных и восстановленных нами картриджах.</b></p><p><strong>Так же мы предлагаем ремонт Вашей оргтехники.</strong><br><br><a class=\"text_link\" href=\"http://www.filpan.ru/uslfind.php?id=3&usl=1\">Профессиональный ремонт принтеров</a> – это не просто замена поврежденных деталей оборудования, но и применение профилактических и технических мер для предотвращения подобных неисправностей в дальнейшем. По этому - ремонт оргтехники, производимый нашими специалистами, начинается с  точной диагностики, выявляя слабые места. Это позволяет нам сделать качественный ремонт и  гарантировать Вам отсутствие поломок в дальнейшем. И, конечно, мы используем при каждом виде ремонта только качественные запчасти и расходные материалы.</p></div>";
	}
	
	
	function show_adm()
	{
	if(count($this->f_array))
	{
	
	echo "<table style=\"width:100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
		$i=0;
		while ($this->f_array[$i])
		{
		echo "<tr>\n";
		echo "<td style=\"border:solid 1px black;\" >";
		echo "<a class=\"simpl_link\" href=\"http://www.filpan.ru/tools/current_metro/index.php?id=".$this->f_array[$i]['id']."\">".$this->f_array[$i]['metro']."</a>";
		echo "</td>";
		echo "<td style=\"border:solid 1px black;\" >";
		echo "<input type=\"button\" onclick=\"delite_metro(".$this->f_array[$i]['id'].")\" value=\"Удалить\">";
		echo "</td>";
		echo "</tr>\n";
		$i++;
		}
		echo "</table>\n";
	}
	}
	
}
?>