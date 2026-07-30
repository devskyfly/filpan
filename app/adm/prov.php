<?
require("tpl/db.php");
require("tpl/variables.php");

if(@$ud) {	
	require("tpl"."/"."header_adm.txt");
	mysql_query("DELETE FROM $subsc WHERE id=\"$id\"");	
}
echo "<tr><td><br>";
if (@$provem) {
	if (@$em!="") {
		$result=mysql_query("SELECT email FROM $subsc WHERE thema=\"Проверка\" AND email=\"$em\"");
		@$number = mysql_num_rows($result);
		if ($number==0) {
			mysql_query("INSERT INTO $subsc VALUES('','Проверка','$em','$cont','1')");
			//echo mysql_errno().": ".mysql_error()."<br>";
			echo "E-mail в базе<br><br>";
		}
	}
}

$select=mysql_query("SELECT id,email FROM $subsc WHERE thema=\"Проверка\"");
@$number = mysql_num_rows($select);
if ($number>0) {
	while ($Row=mysql_fetch_row($select)){
		echo "<a href=prov.php?ud=1&id=$Row[0]>$Row[1]</a><br>";
	}
}
else {
	echo "<br>Никаких E-mail-ов пока нет";
}
?>
</td></tr><tr><td><br>
  <form method="post" action="adm.php?prov">
E-mail <input type=text size=30 name=em><br>
Контактное лицо <input type=text size=30 name=cont><br>
<input type=submit name=provem value="Добавить e-mail">
<input type=reset value="Очистить">
</form>
</td></tr></table>