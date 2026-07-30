<?
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
$link=mysql_select_db($database,$db);



$query="UPDATE statyi SET title='".$_POST['title']."',html_title='".$_POST['html_title']."',descr='".$_POST['descr']."',keywords='".$_POST['keywords']."',name_statyi='".$_POST['name_statyi']."',date='".$_POST['date']."',text_statyi='".$_POST['text_statyi']."' WHERE id=".$_POST['id'];
$result = mysql_query($query) or die("Invalid query: " . mysql_error());

?>
