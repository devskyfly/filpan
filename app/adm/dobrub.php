<?
$Ressear=array();
$Ressearch=array();
$Ressear1=array();
$Ressearch1=array();
$Ressear2=array();
$Ressearch2=array();

$r=0;

if (@$ud) {
	require("tpl/header_adm.txt");
	echo "<tr><td align=center><br><br><a href=dobrub.php?udt=1&coll=$coll>Действительно удалить?</a> <a href=adm.php?dr>Отменить</a></td></tr></TABLE>";
	echo "</body></html>";
	exit;
}


if (@$udt) {
	require("tpl/db.php");
	require("tpl/header_adm.txt");
	require("tpl/variables.php");

	$coll=str_replace("*","&",$coll);
	$coll=str_replace("_"," ",$coll);

	mysql_query("DELETE FROM $rubriki WHERE id=\"$coll\"");

	echo "<tr><td align=center><br><br>$naz1</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;
}

if (@$dob) {
	echo "<tr><td align=center><br><table><tr><td>";
	$kk=0;
	if (@$koll!='-1' && @$tm) {	
		$select=mysql_query("SELECT subrub FROM $rubriki WHERE idrub=\"$koll\"");
		$number = mysql_num_rows($select);
		if ($number>0) {
			while ($Row=mysql_fetch_row($select)){
				if ($Row[0]==$tm) {$kk++;}			
			}
			if ($kk>0) {
				echo "$naz24<br>";
			}
			else {
				mysql_query("INSERT INTO $rubriki VALUES('','$koll','$tm')");
				echo "$naz3";
			}
		}
		else {
			while ($Row=mysql_fetch_row($select)){
				if ($Row[0]=='') {
					$gh=$Row[0];
					mysql_query("UPDATE $rubriki SET subrub=\"$tm\" WHERE idrub=\"$koll\"");
					echo "$naz3";
				}
				else {
					if ($Row[0]==$tm) {$kk++;}
				}
			}
			if ($kk>0) {
				echo "$naz24<br>";
			}
			else {
				if (@$gh!=='') {
					mysql_query("INSERT INTO $rubriki VALUES('','$koll','$tm')");
					echo "$naz3";
				}
			}
		}	
	}
	else {
		echo "$naz4";
	}
	require ("tpl/dop.php");
}
else {
	echo "<tr><td align=center><br><table><tr><td>";
	require ("tpl/dop.php");
}
echo "</td><tr>";
echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";
?>