<?
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";
$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
$link=mysql_select_db($database,$db);
$query="SELECT * FROM `statyi` ORDER BY date";
$result = mysql_query($query) or die("Invalid query: " . mysql_error());
print "<ul style=\"margin-left:10px;color:#000\">";
?>


<?
while ($row = mysql_fetch_assoc($result))
{print('<li>'.$row['date'].':  <br><a class="left_spisok" href=\'http://www.filpan.ru/spisokstatey.php?cmd=2&id='.$row['id'].'\'>'.$row['name_statyi'].'</a></li>');
}
print "</ul>";
?>
