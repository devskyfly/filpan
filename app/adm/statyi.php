 
<script type="text/javascript" src="http://www.filpan.ru/adm/statyi/jq.js"></script>

<script type="text/javascript" >
function add_new_statya(title_insert,html_title_insert,descr_insert,keywords_insert,name_statyi_insert,date_insert,text_statyi_insert)
{

   $.ajax({
   type:"POST",
   url: "http://www.filpan.ru/adm/statyi/ajax_add_statiya.php",
   data: "title="+title_insert+"&html_title="+html_title_insert+"&descr="+descr_insert+"&keywords="+keywords_insert+"&name_statyi="+name_statyi_insert+"&date="+date_insert+"&text_statyi="+text_statyi_insert,
    success: function(msg){
	
     reload_page();
   } 
   });
}

function update_statya(id,title_insert,html_title_insert,descr_insert,keywords_insert,name_statyi_insert,date_insert,text_statyi_insert)
{

  $.ajax({
   type:"POST",
   url: "http://www.filpan.ru/adm/statyi/ajax_update_statya.php",
   data: "id="+id+"&title="+title_insert+"&html_title="+html_title_insert+"&descr="+descr_insert+"&keywords="+keywords_insert+"&name_statyi="+name_statyi_insert+"&date="+date_insert+"&text_statyi="+text_statyi_insert,
    success: function(msg){
     reload_page();
   } 
   });
}

function delete_statya(id)
{ 
   $.ajax({
   type:"POST",
   url: "http://www.filpan.ru/adm/statyi/ajax_delete_statya.php",
   data: "id="+id,
   success: function(msg){
   reload_page();
   } 
   });
  
}

function reload_page()
{
/*var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	document.getElementById('all_window').innerHTML=xmlhttp.responseText;
    }
  }
  url="http://www.filpan.ru/adm/statyi.php?parametr=statyi&reload=1";
  xmlhttp.open("GET",url,true);
  xmlhttp.send();*/
var t=setTimeout("window.location.href='http://www.filpan.ru/adm/adm.php?parametr=statyi';window.location.reload();",100);




}

</script>

<?
if ($GET_['reload']==1)
{
statyi();
}
else
{
echo "<div id=\"all_window\">";
statyi();
echo "</div>";
}
function statyi()
{
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
$link=mysql_select_db($database,$db);



$query="SELECT * FROM `statyi` ORDER BY id";
$result = mysql_query($query) or die("Invalid query: " . mysql_error());
$num_rows = mysql_num_rows($result);
 while ($row = mysql_fetch_assoc($result))
 {
 
 echo "<div style=\"border:1px solid black;width:1000px;padding-left:15px;padding-top:15px;margin-bottom:15px\">";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"id_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['id']);
 echo "</textarea></div>";
 echo "Title который отображается в заглавии страницы:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"title_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['title']);
 echo "</textarea></div>";
 echo "html_title который записан в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"html_title_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['html_title']);
 echo "</textarea></div>";
 echo "description в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"descr_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['descr']);
 echo "</textarea></div>";
 echo "keywords в html коде:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"keywords_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['keywords']);
 echo "</textarea></div>";
 echo "Название статьи:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"name_statyi_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['name_statyi']);
 echo "</textarea></div>";
 echo "Текущая дата:";
 echo "<div><textarea rows=\"1\" cols=\"80\" id=\"date_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['date']);
 echo "</textarea></div>";
 echo "Содержание статьи:";
 echo "<div><textarea rows=\"50\" cols=\"100\" id=\"text_statyi_".$row['id']."\">";
 echo iconv("utf-8", "cp1251",$row['text_statyi']);
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

 }

 ?>
  <script>
 
 </script>