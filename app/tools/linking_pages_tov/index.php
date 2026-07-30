<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?



$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";

$link = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_select_db($database, $link) or die("Не могу выбрать базу");
$query="SELECT * FROM sodraz WHERE id='".$id."'";
$result = mysql_query($query);


?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<script src="jq.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Linking_pages</title>
</head> 

<script>
function Save_pos(){

   var id=document.getElementsByName("id");
   id=id[0].value;
   var nazv=document.getElementsByName("nazv");
   nazv=nazv[0].value;
   var descr=document.getElementsByName("descr");
   descr=descr[0].value;
   var xcl=document.getElementsByName("xcl");
   xcl=xcl[0].value;
   var pict=document.getElementsByName("pict");
   pict=pict[0].value;
   var pict1=document.getElementsByName("pict1");
   pict1=pict1[0].value;
   var superp=document.getElementsByName("super");
   if(superp[0].checked==true)
   {superp=1;}
   else
   {superp=0;}
   var mark=document.getElementsByName("mark");
   if(mark[0].checked==true)
   {mark=1;}
   else
   {mark=0;}
   var local_del=document.getElementsByName("local_del");
   local_del=local_del[0].value;
   var bid=document.getElementsByName("bid");
   bid=bid[0].value;
   var price=document.getElementsByName("price");
   price=price[0].value;
   var soptov=document.getElementsByName("soptov");
   soptov=soptov[0].value;
   var sopuslugi=document.getElementsByName("sopuslugi");
   sopuslugi=sopuslugi[0].value;
   var db_description=document.getElementsByName("db_description");
   db_description=db_description[0].value;
   var db_keywords=document.getElementsByName("db_keywords");
   db_keywords=db_keywords[0].value;
   
   
   $.ajax({
   type: "POST",
   url: "update.php",
   data: "id="+id+"&"+"nazv="+nazv+"&"+"descr="+descr+"&"+"xcl="+xcl+"&"+"pict="+pict+"&"+"pict1="+pict1+"&"+"super="+superp+"&"+"mark="+mark+"&"+"local_del="+local_del+"&"+"bid="+bid+"&"+"price="+price+"&"+"soptov="+soptov+"&"+"sopuslugi="+sopuslugi+"&"+"db_description="+db_description+"&"+"db_keywords="+db_keywords,
   success: function(msg){
     alert( msg );
   }
    
   })
   }
</script>
<body>
<?
while($row=mysql_fetch_assoc($result))
{
echo "<div   class=\"mainwindow\" style=\"clear:left;float:left;\">\n";
echo "<div>
<span>Название позиции</span>
<br>
<textarea name=\"id\" class=\"text_id\">".iconv("windows-1251", "UTF-8",$row['id'])."</textarea>
<br>
<textarea name=\"nazv\" class=\"text_nazv\">".iconv("windows-1251", "UTF-8",$row['nazv'])."</textarea>
</div>\n";

echo "<div>
<span>Карточка товара</span>
<br>
<textarea name=\"descr\" class=\"text_descr\">".iconv("windows-1251", "UTF-8",$row['descr'])."</textarea>
</div>\n";

echo "<div>
<span>Подробно</span>
<br>
<textarea name=\"xcl\" class=\"text_xcl\">".iconv("windows-1251", "UTF-8",$row['xcl'])."</textarea>
</div>
\n";
//Блок отображения картинок


echo "<div>
<div style=\"float:left\" class=\"picture_box\">
<span>Картинка №1</span>
<br>
<textarea name=\"pict\" class=\"text_pict\">".iconv("windows-1251", "UTF-8",$row['pict'])."</textarea>
<img class=\"pictures\" src=\"http://filpan.ru/img/".iconv("windows-1251", "UTF-8",$row['pict'])."\">
</div>\n";

echo "<div style=\"float:left\" class=\"picture_box\">
<span>Картинка №2</span>
<br>
<textarea name=\"pict1\" class=\"text_pict\">".iconv("windows-1251", "UTF-8",$row['pict1'])."</textarea>
<img class=\"pictures\" src=\"http://filpan.ru/img/".iconv("windows-1251", "UTF-8",$row['pict1'])."\">
</div>
</div>
\n";

//Блок отображения галочек

if($row['super']){$checked="checked=\"checked\"";}else{$checked="";};

echo "<div  style=\"clear:left;float:left;\" class=\"mainwindow\">


<div  style=\"float:left\"  class=\"sub_box\">
<div  class=\"box\">
<span>Суперпредложения</span>
<br>
<input name=\"super\" type=\"checkbox\"  ".$checked."\" />
</div>\n";

echo "<div  class=\"box\">
<span>Повесить на маркет</span>
<br>
<input name=\"mark\" type=\"checkbox\" name=\"market\" value=\"".$row['mark']."\" />
</div>\n";


echo "<div  class=\"box\">
<span>Стоимость доставки</span>
<br>
<textarea name=\"local_del\" class=\"text_local_del\">".$row['local_del']."</textarea>
</div>\n";

echo "<div  class=\"box\">
<span>Цена за клик</span>
<br>
<textarea name=\"bid\" class=\"text_bid\">".$row['bid']."</textarea>
</div>\n";


echo "<div  class=\"box\">
<span>Цена</span>
<br>
<textarea name=\"price\" class=\"text_price\">".$row['price']."</textarea>
</div>
</div>\n";

//Блок отображения description, keywords
echo "<div style=\"float:left;\"  class=\"sub_box\">
<div class=\"box\">
<span>
Сопутствующие товары</span>
<br>
<textarea name=\"soptov\" class=\"text_soptov\">".iconv("windows-1251", "UTF-8",$row['soptov'])."</textarea>
</div>\n";

echo "<div class=\"box\">
<span>Сопутствующие услуги</span>
<br>
<textarea name=\"sopuslugi\" class=\"text_sopuslugi\">".iconv("windows-1251", "UTF-8",$row['sopuslugi'])."</textarea>
</div>\n";

echo "<div class=\"box\">
<span>Description</span>
<br>
<textarea name=\"db_description\" class=\"text_db_description\">".iconv("windows-1251", "UTF-8",$row['db_description'])."</textarea>
</div>\n";

echo "<div class=\"box\">
<span>Keywords</span>
<br><textarea name=\"db_keywords\" class=\"text_db_keywords\">".iconv("windows-1251", "UTF-8",$row['db_keywords'])."</textarea>
</div>\n";

echo "</div>
</div>
<div style=\"float:left\">
<span name=\"save\" onclick=\"Save_pos()\">Сохранить</span>
</div>
</div>\n";
}
?>
</body>