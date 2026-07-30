<?
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
$link=mysql_select_db($database,$db);



$query="INSERT INTO inf_podrazdel (katalog,razdel,podrazdel,proiz,title,html_title,descr,keywords,name_statyi,date,text_statyi) VALUES('".$_POST['katalog']."','".$_POST['razdel']."','".$_POST['podrazdel']."','".$_POST['proiz']."','".$_POST['title']."','".$_POST['html_title']."','".$_POST['descr']."','".$_POST['keywords']."','".$_POST['name_statyi']."','".$_POST['date']."','".$_POST['text_statyi']."')";
$result = mysql_query($query) or die("Invalid query: " . mysql_error());
?>