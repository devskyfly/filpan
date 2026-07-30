<?
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
$link=mysql_select_db($database,$db);



$query="SELECT * FROM `statyi`";
$result = mysql_query($query) or die("Invalid query: " . mysql_error());
$num_rows = mysql_num_rows($result);
 while ($row = mysql_fetch_assoc($result))
 {
 
 echo "<div style=\"border:1px solid black;width:1000px;padding-left:15px;padding-top:15px;margin-bottom:15px\">";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"id_".$row['id']."\">";
 echo $row['id'];
 echo "</textarea></div>";
 echo "Title который отображается в заглавии страницы:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"title_".$row['id']."\">";
 echo $row['title'];
 echo "</textarea></div>";
 echo "html_title который записан в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"html_title_".$row['id']."\">";
 echo $row['html_title'];
 echo "</textarea></div>";
 echo "description в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"descr_".$row['id']."\">";
 echo $row['descr'];
 echo "</textarea></div>";
 echo "keywords в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"keywords_".$row['id']."\">";
 echo $row['keywords'];
 echo "</textarea></div>";
 echo "Название статьи:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"name_statyi_".$row['id']."\">";
 echo $row['name_statyi'];
 echo "</textarea></div>";
 echo "Текущая дата:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"date_".$row['id']."\">";
 echo $row['date'];
 echo "</textarea></div>";
 echo "Содержание статьи:";
 echo "<div><textarea rows=\"50\" cols=\"100\" id=\"text_statyi_".$row['id']."\">";
 echo $row['text_statyi'];
 echo "</textarea></div>";
 print "<div><input type=\"submit\" value=\"Обновить\" \r\n onclick=\"update_statya(document.getElementById('id_".$row['id']."').value,\r\ndocument.getElementById('title_".$row['id']."').value,\r\n document.getElementById('html_title_".$row['id']."').value,\r\n document.getElementById('descr_".$row['id']."').value,\r\n document.getElementById('keywords_".$row['id']."').value,\r\n document.getElementById('name_statyi_".$row['id']."').value,\r\n document.getElementById('date_".$row['id']."').value,\r\n document.getElementById('text_statyi_".$row['id']."').value);reload_page() \"></div>";
 print "<div><input type=\"submit\" value=\"Удалить статью\" \r\n onclick=\"delete_statya(document.getElementById('id_".$row['id']."').value);reload_page() \"></div>";
 echo "</div>";
 }
 echo "<div style=\"border:1px solid green;width:1000px;padding-left:15px;padding-top:15px;margin-bottom:15px\">";
 echo "Добавить новую статью<br>";
 echo "Title который отображается в заглавии страницы:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"title_insert\">";
 echo "</textarea></div>";
 echo "html_title который записан в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"html_title_insert\">";
 echo "</textarea></div>";
 echo "description в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"descr_insert\">";
 echo "</textarea></div>";
 echo "keywords в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"keywords_insert\">";
 echo "</textarea></div>";
 echo "Название статьи:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"name_statyi_insert\">";
 echo "</textarea></div>";
 echo "Текущая дата:";
 echo "<div><textarea rows=\"1\" cols=\"10\" id=\"date_insert\">";
 echo date( 'Y-m-d',time( ));
 echo "</textarea></div>";
 echo "Содержание статьи:";
 echo "<div><textarea rows=\"50\" cols=\"100\" id=\"text_statyi_insert\">";
 echo "</textarea></div>";
 print "<div><input type=\"submit\" value=\"Добавить\" \r\n onclick=\"add_new_statya(document.getElementById('title_insert').value,\r\n document.getElementById('html_title_insert').value,\r\n document.getElementById('descr_insert').value,\r\n document.getElementById('keywords_insert').value,\r\n document.getElementById('name_statyi_insert').value,\r\n document.getElementById('date_insert').value,\r\n document.getElementById('text_statyi_insert').value);reload_page()\"></div>";
 echo "</div>";

 ?>