<?
set_time_limit (0);
$main_url='http://www.rumark.ru';

$index_page= file_get_contents($main_url );



$index_page_pattern='/<div class="heading">Каталог<\/div><div class="content">[\w|\W]{1,}\<img src="\/i\/infoBox_foot.jpg" width="209" height="8" \/\>/';
preg_match($index_page_pattern,$index_page,$index_page_answer);
//print_r($index_page_answer);

//$katalog_pattern="/<a href=\"([a-z|A-Z|а-я|А-я|\\s|\/]{1,})\" class=\"menuL1\">/";
$katalog_pattern="/<a href=\"([a-z|A-Z|а-я|А-я|\\s|\/]{1,})\" class=\"menuL1\"><span style=\"color:#1eb1d6\">&#187;<\/span>([\w|\W|^]*?)<\/a>/";
preg_match_all($katalog_pattern,$index_page_answer[0],$katalog_answer);


$schetchik_stranic=1345617653;


	for ($i=0;$i<count($katalog_answer[1]);$i++)
	{
	
	//if($schetchik_stranic>1345617663){break;}
	$url=$main_url.$katalog_answer[1][$i];
	
	$katalog_page= file_get_contents($url);
	
	
	$podkatalog_page_pattern='/<a href=\"([a-z|A-Z|а-я|А-я|\\s|\/]{1,}?)\" class=\"menuL2\"><span style=\"color:#ffb530\">&#187;<\/span>([\w|\W|^]*?)<\/a>/';
    preg_match_all($podkatalog_page_pattern,$katalog_page,$podkatalog_page_answer);
	
	//print_r($podkatalog_page_answer[1]);
	//print_r($podkatalog_page_answer[2]);
  

	for($iterator_podkatalogov=0;$iterator_podkatalogov<count($podkatalog_page_answer[1]);$iterator_podkatalogov++)
					{
	
				//if($schetchik_stranic>1345617663){break;}  
				$current_dir='folders/'.$katalog_answer[2][$i].$podkatalog_page_answer[2][$iterator_podkatalogov];
				mkdir($current_dir);
				$url=$main_url.$podkatalog_page_answer[1][$iterator_podkatalogov].'show=all';
				$katalog_page= file_get_contents($url);
	
	

				$katalog_page_pattern="/class=\"name\"><a href=\"([a-z|A-Z|а-я|А-я|0-9|\-|\_|\\s|\/]{1,})\">/";
				
				preg_match_all($katalog_page_pattern,$katalog_page,$element_url);


								for ($j=0;$j<count($element_url[1]);$j++)
								{
								//sleep(0.1);
								//if($schetchik_stranic>1345617663){break;}
								echo $schetchik_stranic."-".$element_url[1][$j]."<br>";
								$element_page_addres=$main_url.$element_url[1][$j];
								
								//Получение кода конечной страницы
								$element_page= file_get_contents($element_page_addres);
							
								
								//АДрес картинки
								$element_page_img_pattern="/<div class=\"photo\"><img src=\"([a-z|A-Z|а-я|А-я|0-9|\-|\_|\\s|\/|.]{1,})\" \/>/";
								preg_match_all($element_page_img_pattern,$element_page,$element_page_img);
								echo "<br>".$element_page_img[1][0];
								
								
								//Таблица
								$element_page_table_pattern="/<table id=\"properties\">[\w|\W|^]*?<\/table>/";
								preg_match_all($element_page_table_pattern,$element_page,$element_page_table);
								
								$vowels = array('<a href="http://rumark.ru/articles/iso.php" target="_blank">','</a>');
								$element_page_table[0][0]= str_replace($vowels, "", $element_page_table[0][0]);
								echo "<br>".$element_page_table[0][0];
								
								$element_page_price_pattern="/<span class=\"digits\">([\w|\W|^]*?)<\/span>/";
								preg_match_all($element_page_price_pattern,$element_page,$element_page_price);
								echo "<br>".$element_page_price[1][0];
								
								
								$element_page_descr_podhodit_pattern="/<div class=\"modeltext\">[\w|\W|^]*<h3>Подходит:<\/h3>[\w|\W|^]*<p>([\w|\W|^]*?)<\/p>[\w|\W|^]*<h3>Описание:<\/h3>[\w|\W|^]*<p>([\w|\W|^]*?)<\/p>[\w|\W|^]*<\/div>/";
								preg_match_all($element_page_descr_podhodit_pattern,$element_page,$element_page_descr_podhodit);
								echo "<br>".$element_page_descr_podhodit[1][0];
								echo "<br>".$element_page_descr_podhodit[2][0];
								
								
								$element_page_name_pattern="/<div class=\"modelnumbers\"><h2>([\w|\W|^]*?)<\/h2>/";
								preg_match_all($element_page_name_pattern,$element_page,$element_page_name);
								echo "<br>".$element_page_name[1][0];
								
								
								
								$element_page_title_pattern="/<title>([\w|\W|^]*?) - Rumark<\/title>/";
								preg_match_all($element_page_title_pattern,$element_page,$element_page_title);
								echo "<br>".$element_page_title[1][0];
								
								$element_page_keywords_pattern="/<meta name=\"keywords\" content=\"([\w|\W|^]*?)\" \/>/";
								preg_match_all($element_page_keywords_pattern,$element_page,$element_page_keywords);
								echo "<br>".$element_page_keywords[1][0];
								
								$element_page_description_pattern="/<meta name=\"description\" content=\"([\w|\W|^]*?)\" \/>/";
								preg_match_all($element_page_description_pattern,$element_page,$element_page_description);
								echo "<br>".$element_page_description[1][0];
								
								
								
								
								$text=sprintf("INSERT INTO sodraz (raz,idraz,nazv,descr,xcl,price,pict,proiz,title,db_description,db_keywords) 
								VALUES (_raz_,_podraz_,'%s','%s','%s','%s','%s',_proiz_,'%s','%s','%s')\r\n",$element_page_name[1][0],$element_page_descr_podhodit[2][0].'<br><br>Подходит:'.$element_page_descr_podhodit[1][0],$element_page_table[0][0],($element_page_price[1][0]/37.5),$schetchik_stranic.".jpg",$element_page_title[1][0],$element_page_description[1][0],$element_page_keywords[1][0]);
								
								
								
								
								
								
								$fl_name=$current_dir."/sql_request.txt";
								$ref=fopen($fl_name,'a');
								fwrite($ref,$text);
								fclose($ref);

								
								
								$handle = fopen("http://www.rumark.ru".$element_page_img[1][0], "r");
								if($handle)
								{
								
								$buffer="";
								while (!feof($handle)) {
									$buffer .= fgets($handle, 4096);
								 
								}
								fclose($handle);


								$ref1=fopen($current_dir."/".$schetchik_stranic.".jpg",'w+');
								fwrite($ref1, $buffer);
								fclose($ref1);
								}
								
								
								
								
								
								
								
								
								
								$schetchik_stranic++;
								}
					}

	}








?>