<?

$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";

$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_select_db($database, $db);
?>
