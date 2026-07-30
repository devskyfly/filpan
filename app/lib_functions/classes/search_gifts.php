<?class search_gifts extends db_connection
{
var $kurs;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Конструктор
	function search_gifts($array)
	{
	$nextarray=$array;
	/*if (isset($array)) {$keyword = $array;}
	$keyword = trim($keyword);
	$keyword = stripslashes($keyword);
	$keyword = htmlspecialchars($keyword);
	$this->query = "SELECT * FROM sodraz WHERE nazv LIKE '%".strtoupper($keyword)."%'  UNION "."SELECT * FROM uslsodraz WHERE nazv LIKE '%".strtoupper($keyword)."%' "; */


$tample='/[A-Za-zА-Яа-я0-9]+/is';
$string= iconv ( 'UTF-8','Windows-1251', $array );
$tample= iconv ( 'UTF-8','Windows-1251', $tample );
if (preg_match_all($tample,$string,$p))
{
	$sepc_array=array();

	foreach ($p as $array)
	{
		$iterator=0;
		foreach ($array as $element)
		{
		//$sepc_array[$iterator]['element']=iconv ( 'Windows-1251','UTF-8', $element );
		$sepc_array[$iterator]['element']= $element;
		$sepc_array[$iterator]['size']=mb_strlen($element);
		$iterator++;
		}
	}

	//разбор строки ввода на отдельные слова
	$array=$sepc_array;

	$for_like=array();
	$for_full_text=array();

	$array_size=count($array);

	for( $iterator=0;$iterator<$array_size;$iterator++)
	{
			if (mb_strlen($array[$iterator]['element'])>4)
			//if (-1)
			{
			array_push($for_full_text,$array[$iterator]['element']);
			}
			else
			{
			array_push($for_like,$array[$iterator]['element']);
			}
	}

	$like_size=count($for_like);

	$query_part_like='';
	for($like_iterator=0;$like_iterator<$like_size;$like_iterator++)
	{
			if($like_iterator==($like_size-1))
			{
			$query_part_like=$query_part_like.'LCASE(nazv) LIKE \'%'.strtolower($for_like[$like_iterator]).'%\' ';
			}
			else
			{
			$query_part_like=$query_part_like.'LCASE(nazv) LIKE \'%'.strtolower($for_like[$like_iterator]).'%\' AND ';
			}
	}

	$full_size=count($for_full_text);


	$query_part_full='';
	for($full_iterator=0;$full_iterator<$full_size;$full_iterator++)
	{
			$query_part_full=$query_part_full.'+'.$for_full_text[$full_iterator].' ';
	}

	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();


	if(($like_size>0)&($full_size>0))
	{
	$this->query="SELECT DISTINCT  *, 1 AS gift FROM   (SELECT * FROM sodraz WHERE MATCH(nazv) AGAINST('".$query_part_full."' IN BOOLEAN MODE)) AS LK    WHERE ".$query_part_like." LIMIT 0,100
	UNION
	SELECT DISTINCT  *, 0 AS gift FROM   (SELECT * FROM uslsodraz WHERE MATCH(nazv) AGAINST('".$query_part_full."' IN BOOLEAN MODE)) AS LK    WHERE ".$query_part_like." LIMIT 0,100 ";
	//echo '<br>'.$this->query;
	}
	elseif($like_size==0)
	{
	$this->query="SELECT DISTINCT   *, 1 AS gift FROM sodraz WHERE MATCH(nazv) AGAINST('".$query_part_full."' IN BOOLEAN MODE) "." LIMIT 0,100
	UNION
	SELECT DISTINCT   *, 0 AS gift FROM uslsodraz WHERE MATCH(nazv) AGAINST('".$query_part_full."' IN BOOLEAN MODE) "." LIMIT 0,100";
	//echo '<br>'.$this->query;
	}
	elseif($full_size==0)
	{
	$this->query="SELECT DISTINCT  *, 1 AS gift  FROM sodraz   WHERE ".$query_part_like." LIMIT 0,100
	UNION
	SELECT DISTINCT  *, 0 AS gift    FROM   uslsodraz  WHERE ".$query_part_like." LIMIT 0,100 ";
	}




 //  echo "<br>$this->query";
	 /*
	echo  "<br>";
	echo  "<br>";
	echo  $like_size."<br>";
	echo  $full_size."<br>";

	print_r($for_full_text);
	print_r($for_like);	*/
	$this->current_datebases();
	$this->set_query();

	if(count($this->f_array)==0)
	{
	$this->lk_query($nextarray);
	$this->set_query();
	}
	$this->close_connection();

}
	}


	function lk_query($array)
	{
	$tample='/[A-Za-zА-Яа-я0-9]+/is';
$string= iconv ( 'UTF-8','Windows-1251', $array );
$tample= iconv ( 'UTF-8','Windows-1251', $tample );
if (preg_match_all($tample,$string,$p))
{
	$sepc_array=array();

	foreach ($p as $array)
	{
		$iterator=0;
		foreach ($array as $element)
		{
		//$sepc_array[$iterator]['element']=iconv ( 'Windows-1251','UTF-8', $element );
		$sepc_array[$iterator]['element']= $element;
		$sepc_array[$iterator]['size']=mb_strlen($element);
		$iterator++;
		}
	}

	//разбор строки ввода на отдельные слова
	$array=$sepc_array;

	$for_like=array();

	$array_size=count($array);

	for( $iterator=0;$iterator<$array_size;$iterator++)
	{
			array_push($for_like,$array[$iterator]['element']);
	}

	$like_size=count($for_like);

	$query_part_like='';
	for($like_iterator=0;$like_iterator<$like_size;$like_iterator++)
	{
			if($like_iterator==($like_size-1))
			{
			$query_part_like=$query_part_like.'LCASE(nazv) LIKE \'%'.strtolower($for_like[$like_iterator]).'%\' ';
			}
			else
			{
			$query_part_like=$query_part_like.'LCASE(nazv) LIKE \'%'.strtolower($for_like[$like_iterator]).'%\' AND ';
			}
	}
	}


	$this->query="SELECT DISTINCT  *, 1 AS gift  FROM sodraz   WHERE ".$query_part_like." LIMIT 0,100
	UNION
	SELECT DISTINCT  *, 0 AS gift    FROM   uslsodraz  WHERE ".$query_part_like." LIMIT 0,100 ";
	}


	function show()
	{
	//echo "<br>".count($this->f_array);
	if(count($this->f_array))
	{

	echo "<table class=\"gift_table\" cellpadding=\"0\" cellspacing=\"0\">\n";
			echo "<caption class=\"caption_gift_table\">\n";
			echo "Заголовок\n";
			echo "</caption>\n";
			$i=0;
	while ($this->f_array[$i])
				{

				if($this->f_array[$i]['gift'])
				{
				//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&view=1";
				$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='1');
				//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1";
				$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;
				echo "
				<tr>\n
				<td class=\"td_img_gift_table\" >
				<a href=\"#\" class=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  class=\"super_img_gift\"></a>
				</td>\n
				<td class=\"td_nazv_gift_table\"><a href=\"".$href."\" class=\"table_gift_link\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td class=\"td_buy_gift_table\">\n

				<table cellpadding=\"5\" cellspacing=\"1\" class=\"sub_table\">

				<tr>
				<td>Цена:
				</td>
				<td>".$new_price. " руб.
				</td>
				</tr>\n

				<tr>
				<td>Кол-во
				</td>
				<td><input id=\"kolichestvo_".$this->f_array[$i]['id']."\"  type=\"text\" size=\"2\" class=\"input_window\" value=\"1\">
				</td>
				</tr>\n

				<tr>
				<td colspan=\"2\">
				<div onclick=\"buy_gift(".$this->f_array[$i]['id'].","."'".$this->f_array[$i]['nazv']."'".
				",document.getElementById('"."kolichestvo_"
				.$this->f_array[$i]['id']."').value,"
				.$new_price.")\">Купить <img src=\"http://www.filpan.ru/images/right_content/korz.gif\" class=\"img_korzina\"></div>
				</td>
				</tr>\n

				</table>\n

				</td>
				</tr>\n";
				}
				else
				{
				//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&view=1&usl=1";
				$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='2');
				//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1&usl=1";
				echo "
				<tr>\n
				<td class=\"td_img_gift_table\" >
				<a href=\"#\" class=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"   class=\"super_img_gift\"></a>
				</td>\n
				<td class=\"td_nazv_gift_table\"><a href=\"$href\" class=\"table_gift_link\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td class=\"td_buy_gift_table\">\n

				<table cellpadding=\"5\" cellspacing=\"1\" class=\"sub_table\">

				<tr>
				<td>Цена:
				</td>
				<td>".$this->f_array[$i]['price']. " руб.
				</td>
				</tr>\n

				<tr>
				<td>Кол-во
				</td>
				<td><input id=\"kolichestvo_".$this->f_array[$i]['id']."\"  type=\"text\" size=\"2\" class=\"input_window\" value=\"1\">
				</td>
				</tr>\n

				<tr>
				<td colspan=\"2\">
				<div onclick=\"buy_usl(".$this->f_array[$i]['id'].","."'".$this->f_array[$i]['nazv']."'".
				",document.getElementById('"."kolichestvo_"
				.$this->f_array[$i]['id']."').value,"
				.$this->f_array[$i]['price'].")\">Купить <img src=\"http://www.filpan.ru/images/right_content/korz.gif\" class=\"img_korzina\"></div>
				</td>
				</tr>\n

				</table>\n

				</td>
				</tr>\n";
				}


				$i++;


				}
				echo "</table>\n";



	}
	}
	}


	?>