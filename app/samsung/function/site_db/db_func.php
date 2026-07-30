<?
		class date_base
		{
			public $out_inform;/*это массив выходящих данных доступных по ключам
			соответствующим названиям столбцов таблицы бд*/
			private $podkl;//это ссылка на подключение к базам
			
				function __construct() 
				{
				//podkluchaem bazu dannih
				   $this->podkl= mysql_connect('127.0.0.1','u3558310_filpan','filpan');
					mysql_query("SET NAMES 'cp1251'");
					mysql_query("SET CHARACTER SET 'cp1251'");
					if (!$this->podkl) {
					die('Could not connect: ' . mysql_error());
					}
										
				mysql_select_db ("u3558310_filpan") or die('Ne mogu otkrit bazu'); 

				}
	
				
				function db_katalog(&$input_array)
				{
				$sql = sprintf("SELECT id,name,razdel_name FROM katalog");
				
				$result = mysql_query($sql);
				
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				$input_array[$i]['razdel_name']=iconv("windows-1251", "UTF-8",$row['razdel_name']);
				$i++;
				}
				}
				
				
				function title_razdel($razdel, &$input_array)
				{
				//echo $razdel;
				$razdel_f=iconv( "UTF-8","windows-1251",$razdel);
				$sql = sprintf("SELECT id,name FROM katalog WHERE razdel_name='".$razdel_f."'");
				//echo $sql;
				$result = mysql_query($sql);
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				//$input_array[$i]['razdel_name']=iconv("windows-1251", "UTF-8",$row['razdel_name']);
				$i++;
				}
				}
				
				function title_podrazdel($razdel,$podrazdel, &$input_array)
				{
				$razdel_f=iconv( "UTF-8","windows-1251",$razdel);
				$podrazdel_f=iconv( "UTF-8","windows-1251",$podrazdel);
				$sql = sprintf("SELECT id,name FROM ".$razdel_f." WHERE podrazdel_name='".$podrazdel_f."'");
				//echo $sql;
				$result = mysql_query($sql);
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				//$input_array[$i]['razdel_name']=iconv("windows-1251", "UTF-8",$row['razdel_name']);
				$i++;
				}
				}
				
				
				function title_podpunkt($podrazdel,$podpunkt, &$input_array)
				{
				$podrazdel.='_podpunkt';
				$podpunkt_f=iconv( "UTF-8","windows-1251",$podrazdel);
				$sql = sprintf("SELECT id,text_podpunkt FROM ".$podpunkt_f." WHERE id_podpunkt=".$podpunkt."");
				//echo $sql;
				$result = mysql_query($sql);
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['text_podpunkt']=iconv("windows-1251", "UTF-8",$row['text_podpunkt']);
				//$input_array[$i]['razdel_name']=iconv("windows-1251", "UTF-8",$row['razdel_name']);
				$i++;
				}
				}
				
				
				function title_proizvoditel($podrazdel,$proizvoditel, &$input_array)
				{
				$podrazdel.='_proizvoditel';
				$podpunkt_f=iconv( "UTF-8","windows-1251",$podrazdel);
				$sql = sprintf("SELECT id,text_podpunkt FROM ".$podpunkt_f." WHERE id_podpunkt=".$proizvoditel."");
				//echo $sql;
				$result = mysql_query($sql);
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['text_podpunkt']=iconv("windows-1251", "UTF-8",$row['text_podpunkt']);
				//$input_array[$i]['razdel_name']=iconv("windows-1251", "UTF-8",$row['razdel_name']);
				$i++;
				}
				}
				
				function title_tovar($podrazdel,$id, &$input_array)
				{
				$podrazdel_f=iconv( "UTF-8","windows-1251",$podrazdel);
				$sql = sprintf("SELECT id,name FROM ".$podrazdel_f." WHERE id=".$id."");
				//echo $sql;
				$result = mysql_query($sql);
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				//$input_array[$i]['razdel_name']=iconv("windows-1251", "UTF-8",$row['razdel_name']);
				$i++;
				}
				}
				
				
				
	
	
				function db_razdel(&$input_array,$razdel)
				{
				$sql = sprintf("SELECT id,name,podrazdel_name FROM ".$razdel);
				
				$result = mysql_query($sql);
				
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				$input_array[$i]['podrazdel_name']=iconv("windows-1251", "UTF-8",$row['podrazdel_name']);
				$i++;
				}
				}
	
	
				function db_funkcionalnost(&$input_array,$podrazdel_name)
				{
				$podrazdel_name_funkcionalnost=$podrazdel_name.'_funkcionalnost';
				//echo $podrazdel_name_funkcionalnost."<br>";
				$sql = sprintf("SELECT id,id_podpunkt,text_podpunkt FROM ".$podrazdel_name_funkcionalnost);
				
				$result = mysql_query($sql);
				
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['id_podpunkt']=iconv("windows-1251", "UTF-8",$row['id_podpunkt']);
				$input_array[$i]['text_podpunkt']=iconv("windows-1251", "UTF-8",$row['text_podpunkt']);
				$i++;
				}
				}
	
				
	
				function db_podpunkt(&$input_array,$podrazdel_name)
				{
				$podrazdel_name_podpunkt=$podrazdel_name.'_podpunkt';
				$sql = sprintf("SELECT id,id_podpunkt,text_podpunkt FROM ".$podrazdel_name_podpunkt);
				
				$result = mysql_query($sql);
				
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['id_podpunkt']=iconv("windows-1251", "UTF-8",$row['id_podpunkt']);
				$input_array[$i]['text_podpunkt']=iconv("windows-1251", "UTF-8",$row['text_podpunkt']);
				$i++;
				}
				}
	
				
				function db_proizvoditel(&$input_array,$podrazdel_name)
				{
				$podrazdel_name_proizvoditel=$podrazdel_name.'_proizvoditel';
				$sql = sprintf("SELECT id,id_podpunkt,text_podpunkt FROM ".$podrazdel_name_proizvoditel);
				
				$result = mysql_query($sql);
				
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['id_podpunkt']=iconv("windows-1251", "UTF-8",$row['id_podpunkt']);
				$input_array[$i]['text_podpunkt']=iconv("windows-1251", "UTF-8",$row['text_podpunkt']);
				$i++;
				}
				}
				
				
				function db_podrazdel(&$input_array)
				{
				
				$numargs = func_num_args();
				
				switch ($numargs) {
								case 2:
									
									$podrazdel_name=func_get_arg (1);
									
									$sql = sprintf("SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$podrazdel_name);
									break;
								case 3:
									
									$podrazdel_name=func_get_arg (1);
									$podpunkt=func_get_arg (2);
									
									$sql = sprintf("SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$podrazdel_name." WHERE id_podrazdela=".$podpunkt);
									break;
								case 4:
									$podrazdel_name=func_get_arg (1);
									$podpunkt=func_get_arg (2);
									$proizvoditel=func_get_arg (3);
									$sql = sprintf("SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$podrazdel_name." WHERE id_podrazdela=".$podpunkt." AND proizvoditel=".$proizvoditel);
									break;
								case 5:
									$podrazdel_name=func_get_arg (1);
									$podpunkt=func_get_arg (2);
									$proizvoditel=func_get_arg (3);
									$funkcionalnost=func_get_arg (4);
									$sql = sprintf("SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$podrazdel_name." WHERE id_podrazdela=".$podpunkt." AND funcionalnost=".$funkcionalnost );
									break;
									
							}

				$result = mysql_query($sql);
				if(!$result){echo "Po zaprosu net nichego";return(0);}
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['id_podrazdela']=iconv("windows-1251", "UTF-8",$row['id_podrazdela']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				$input_array[$i]['opisaniye']= iconv("windows-1251", "UTF-8",$row['opisaniye']);
				$input_array[$i]['excell_text']=iconv("windows-1251", "UTF-8",$row['excell_text']);
				$input_array[$i]['price']=iconv("windows-1251", "UTF-8",$row['price']);
				$input_array[$i]['picture']= iconv("windows-1251", "UTF-8",$row['picture']);
				$input_array[$i]['proizvoditel']=iconv("windows-1251", "UTF-8",$row['proizvoditel']);
				$input_array[$i]['funckcionalnost']=iconv("windows-1251", "UTF-8",$row['funcionalnost']);
				$input_array[$i]['title']=iconv("windows-1251", "UTF-8",$row['title']);
				$input_array[$i]['super']=iconv("windows-1251", "UTF-8",$row['super']);
				$i++;
				}
				}
				
				
				function db_podrazdel_po_proizvoditel(&$input_array,$podrazdel,$proizvoditel)
				{
				$sql = sprintf("SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$podrazdel." WHERE proizvoditel=".$proizvoditel );
				
				$result = mysql_query($sql);
				if(!$result){echo "Po zaprosu net nichego";return(0);}
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['id_podrazdela']=iconv("windows-1251", "UTF-8",$row['id_podrazdela']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				$input_array[$i]['opisaniye']= iconv("windows-1251", "UTF-8",$row['opisaniye']);
				$input_array[$i]['excell_text']=iconv("windows-1251", "UTF-8",$row['excell_text']);
				$input_array[$i]['price']=iconv("windows-1251", "UTF-8",$row['price']);
				$input_array[$i]['picture']= iconv("windows-1251", "UTF-8",$row['picture']);
				$input_array[$i]['proizvoditel']=iconv("windows-1251", "UTF-8",$row['proizvoditel']);
				$input_array[$i]['funckcionalnost']=iconv("windows-1251", "UTF-8",$row['funcionalnost']);
				$input_array[$i]['title']=iconv("windows-1251", "UTF-8",$row['title']);
				$input_array[$i]['super']=iconv("windows-1251", "UTF-8",$row['super']);
				$i++;
				}
				}
				
				function db_poisk_tovara(&$input_array,$razdel,$podrazdel,$id)
				{
				$sql = sprintf("SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$podrazdel." WHERE  id=".$id);
				
				$result = mysql_query($sql);
				
				//echo '<br>result= '.$result.'<br>';
				//echo 'podrazdel= '.$podrazdel.'<br>';
				//echo 'id= '.$id.'<br>';
				if(!$result){echo "Po zaprosu net nichego";return(0);}
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['razdel']=$razdel;
				//echo $razdel;
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['id_podrazdela']=iconv("windows-1251", "UTF-8",$row['id_podrazdela']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				$input_array[$i]['opisaniye']= iconv("windows-1251", "UTF-8",$row['opisaniye']);
				$input_array[$i]['excell_text']=iconv("windows-1251", "UTF-8",$row['excell_text']);
				$input_array[$i]['price']=iconv("windows-1251", "UTF-8",$row['price']);
				$input_array[$i]['picture']= iconv("windows-1251", "UTF-8",$row['picture']);
				$input_array[$i]['proizvoditel']=iconv("windows-1251", "UTF-8",$row['proizvoditel']);
				$input_array[$i]['funckcionalnost']=iconv("windows-1251", "UTF-8",$row['funcionalnost']);
				$input_array[$i]['title']=iconv("windows-1251", "UTF-8",$row['title']);
				$input_array[$i]['super']=iconv("windows-1251", "UTF-8",$row['super']);
				$i++;
				}
				}			
				
				function db_poisk_super_tovara(&$input_array,$podrazdel)
				{
				$sql = sprintf("SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$podrazdel." WHERE  super=1");
				
				$result = mysql_query($sql);
				
				
				if(!$result){echo "Po zaprosu net nichego";return(0);}
				$i=0;
				while ($row = mysql_fetch_assoc($result)) {
				$input_array[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
				$input_array[$i]['id_podrazdela']=iconv("windows-1251", "UTF-8",$row['id_podrazdela']);
				$input_array[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				$input_array[$i]['opisaniye']= iconv("windows-1251", "UTF-8",$row['opisaniye']);
				$input_array[$i]['excell_text']=iconv("windows-1251", "UTF-8",$row['excell_text']);
				$input_array[$i]['price']=iconv("windows-1251", "UTF-8",$row['price']);
				$input_array[$i]['picture']= iconv("windows-1251", "UTF-8",$row['picture']);
				$input_array[$i]['proizvoditel']=iconv("windows-1251", "UTF-8",$row['proizvoditel']);
				$input_array[$i]['funckcionalnost']=iconv("windows-1251", "UTF-8",$row['funcionalnost']);
				$input_array[$i]['title']=iconv("windows-1251", "UTF-8",$row['title']);
				$input_array[$i]['super']=iconv("windows-1251", "UTF-8",$row['super']);
				$i++;
				}
				}
				
				function db_vvod_v_korzinu($input_array,$session)
				{

				$kurs=new file;
				$kurs_val=$kurs-> get_kurs();
				unset($kurs);
				$today = getdate();
				$date=$today['mday'].'.'.$today['mon'].'.'.$today['year'];
				$name=iconv("UTF-8", "windows-1251",$input_array[0]['name']);
				$opisaniye=iconv("UTF-8", "windows-1251",$input_array[0]['opisaniye']);
				$excell_text=iconv("UTF-8", "windows-1251",$input_array[0]['excell_text']);
				$price=iconv("UTF-8", "windows-1251",$input_array[0]['price']);
				$picture=iconv("UTF-8", "windows-1251",$input_array[0]['picture']);
				$session_f=$session;
				$name_f=mysql_real_escape_string($name);
				$opisaniye_f=mysql_real_escape_string($opisaniye);
				$excell_text_f=mysql_real_escape_string($excell_text);
				
				if($input_array[0]['razdel']=='razdel_2'){$price_f=mysql_real_escape_string($kurs_val*$price);}
				else{$price_f=mysql_real_escape_string($price);}
				
				$picture_f=mysql_real_escape_string($picture);
				$date_f=mysql_real_escape_string($date);
				$sql = sprintf("INSERT INTO korzina(session_id,name,opisaniye,excell_text,price,picture,date,kol_vo) VALUES('%s','%s','%s','%s','%s','%s','%s','%s')",$session_f,$name_f,$opisaniye_f,$excell_text_f,$price_f,$picture_f,$date_f,1);
				
				$result = mysql_query($sql);
				
				
				if(!$result){return(0);}
				else{return(1);};
				}
				
				
				function db_vvod_v_korzinu_dobavim_1($id_korz,$kol_vo)
				{			
				$kol=$kol_vo+1;
				$sql = sprintf("UPDATE korzina SET kol_vo='%s' WHERE id=%s",$kol,$id_korz);
				//echo $sql;
				
				$result = mysql_query($sql);
				//echo $result;
				
				
				if(!$result){return(0);}
				else{return(1);};
				}
				
				
				
				function db_poisk_v_korzine($session,$input_array,&$kol_vo,&$id_korz)
				{
				//$session_f=$session;
				
				//$name=iconv("UTF-8", "windows-1251",$input_array[0]['name']);
				
				$name=iconv("UTF-8", "windows-1251",$input_array[0]['name']);
				$session_f=iconv("UTF-8", "windows-1251",$session);
				$name_f=mysql_real_escape_string($name);
				//echo $name_f;
				echo '<BR>';
				//echo $session_f;
				$sql = sprintf("SELECT id,kol_vo FROM korzina WHERE name='".$name_f."' AND  session_id='".$session_f."'");
				//echo $sql;
				$resultt = mysql_query($sql);
				//echo '<BR>';
				//echo $resultt;
				//echo '<BR>';
				//echo mysql_result($resultt,1);
				//echo '<BR>';
				
				//$i=0;
				//while ($row = mysql_fetch_assoc($resultt)) {
				//echo $row['id'];
				//echo '<BR>';
				//}
				
				$row = mysql_fetch_assoc($resultt);
				
				if($row['id'])
				{
				$kol_vo=$row['kol_vo'];
				$id_korz=$row['id'];
				//echo '<BR>';
				//echo 'YES';
				return(1);}
				else{
				//echo '<BR>';
				//echo 'NO';
				return(0);
				};
				}
				
	
				
				function db_korzina($session,&$f_row)
				{
				
				$sql = sprintf("SELECT id,name,price,kol_vo FROM korzina WHERE session_id='".$session."'");
				$result = mysql_query($sql);
				
				
				echo "<form method='post' action='sod_korzini.php?pereschet=1'><table class='table_find'>";
				echo "<caption>Корзина</caption>"; 
				$i=0;
				echo '<tr class=find>';
				echo '<td class=find>Название</td>';
				echo '<td class=find>Цена</td>';
				echo '<td class=find>Кол-во</td>';
				echo '<td class=find>Сумма</td>';
				echo '<td class=find>Удалить</td>';
				echo '</tr>';
				while ($row = mysql_fetch_assoc($result)) {
				echo '<tr class=find>';
				$f_row[$i]['id']=$row['id'];
				echo '<td class=find>'.iconv("windows-1251", "UTF-8",$row['name']).'</td>';
				$f_row[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
				echo '<td class=find>'.iconv("windows-1251", "UTF-8",$row['price']).' руб.</td>';
				$f_row[$i]['price']=iconv("windows-1251", "UTF-8",$row['price']);
				echo '<td class=find width=40><input style="border:1px;border-style:solid;background-color:#D4D0C8;" type=\'text\' bground=#E0E6E9 name=new_kol[] value='.iconv("windows-1251", "UTF-8",$row['kol_vo']).'></td>';
				$f_row[$i]['kol_vo']=iconv("windows-1251", "UTF-8",$row['kol_vo']);
				echo '<td class=find>'.$row['kol_vo']*$row['price'].'</td>';
				echo '<td class=find> <input type=checkbox value='.$i.' name=del[]></td>';
				echo '</tr>';
				
				$i++;
				}
				
				echo '</table><input  type="hidden" name="pereschet" value="1"><input type="submit" value="Пересчитать">
				<input type="button" value="Отправить заказ" onClick="window.open(\'http://www.samsung.filpan.ru/send.php\', \'Посылка письма\')"> 
				</form>';
				
				}

				
				function db_korzina_pereschet(&$f_row,$new_kol,$del)
				{
				
				$korzina=$f_row;
				//print_r($korzina);
				$f_row=array();
				
				$i=0;
				$j=0;
				$k=0;
				
				
				while ($korzina[$i]) {
						if(isset($del)){
									if(($i!=$del[$j])){
									
									
									$k++;
									}
									else
									{$sql = sprintf("DELETE FROM korzina WHERE id=%s",$korzina[$i]['id']);
									$result = mysql_query($sql);
									$j++;
									}
						}
						else{
						$str_kol=strval($new_kol[$i]);
						$str_korz=strval($korzina[$i]['id']);
						
						 $sql = sprintf("UPDATE korzina SET kol_vo='%s' WHERE id=%s",$str_kol,$str_korz);
						$result = mysql_query($sql);
						 
						
						$k++;
						}
				$i++;
				}
				
				
				
				
				}
				
				
				
				function db_search(&$search_spisok,$good,$field,$table,$razdel)
				{
				$sql = "SELECT id,id_podrazdela,name,opisaniye,excell_text,price,picture,proizvoditel,funcionalnost,title FROM ".$table." WHERE ".$field." LIKE '%". str_replace(" ", "%' AND ".$field." LIKE '%", $good). "%'";
				//echo $sql.'<br>';
				$result = mysql_query($sql);
				$i=count($search_spisok);
				
						while ($row = mysql_fetch_assoc($result)) 
						{
						
						$search_spisok[$i]['razdel']=$razdel;
						$search_spisok[$i]['podrazdel']=$table;
						$search_spisok[$i]['id']= iconv("windows-1251", "UTF-8",$row['id']);
						$search_spisok[$i]['id_podrazdela']=iconv("windows-1251", "UTF-8",$row['id_podrazdela']);
						$search_spisok[$i]['name']=iconv("windows-1251", "UTF-8",$row['name']);
						$search_spisok[$i]['opisaniye']= iconv("windows-1251", "UTF-8",$row['opisaniye']);
						$search_spisok[$i]['excell_text']=iconv("windows-1251", "UTF-8",$row['excell_text']);
						if($razdel=='razdel_2'){
						$kurs=new file;
						$kurs_val=$kurs-> get_kurs();
						unset($kurs);
						$search_spisok[$i]['price']=$kurs_val*iconv("windows-1251", "UTF-8",$row['price']);
						
						}
						else
						{
						$search_spisok[$i]['price']=iconv("windows-1251", "UTF-8",$row['price']);
						}
						$search_spisok[$i]['picture']= iconv("windows-1251", "UTF-8",$row['picture']);
						$search_spisok[$i]['proizvoditel']=iconv("windows-1251", "UTF-8",$row['proizvoditel']);
						$search_spisok[$i]['funckcionalnost']=iconv("windows-1251", "UTF-8",$row['funcionalnost']);
						$search_spisok[$i]['title']=iconv("windows-1251", "UTF-8",$row['title']);
						$search_spisok[$i]['super']=iconv("windows-1251", "UTF-8",$row['super']);
						
						
						$i++;
						}
				
				}
				
				function dostavka_db()
				{

				echo '<BR>';
				$i=1;
				for ($j=1;$j<=4;$j++){
				echo $sql="INSERT INTO razdel_".$i."_podrazdel_".$j."_dostavka (id_podpunkt,text_podpunkt,price) VALUES(1,'По городу',0)";
				echo '<BR>';
				echo $result = mysql_query($sql);
				echo '<BR>';
				echo $sql="INSERT INTO razdel_".$i."_podrazdel_".$j."_dostavka (id_podpunkt,text_podpunkt,price) VALUES(1,'От',0)";
				echo '<BR>';
				echo $result = mysql_query($sql);
				echo '<BR>';
				}
				$i=2;
				for ($j=1;$j<=9;$j++){
				echo $sql="INSERT INTO razdel_".$i."_podrazdel_".$j."_dostavka (id_podpunkt,text_podpunkt,price) VALUES(1,'По городу',0)";
				echo '<BR>';
				echo $result = mysql_query($sql);
				echo '<BR>';
				echo $sql="INSERT INTO razdel_".$i."_podrazdel_".$j."_dostavka (id_podpunkt,text_podpunkt,price) VALUES(1,'От',0)";
				echo '<BR>';
				echo $result = mysql_query($sql);
				echo '<BR>';
				}
				}
				
				
				
				function __destruct()
				{
				mysql_close($this->podkl);
				}
		}

?>
