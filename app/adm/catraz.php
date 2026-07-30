<?
$Ressear=array();
$Ressearch=array();

if (@$ud) {
	require("tpl/header_adm.txt");
	echo "<tr><td align=center><br><br><a href=catraz.php?udt=1&coll=$coll>Действительно удалить?</a> <a href=adm.php?catraz>Отменить</a></td></tr></TABLE>";
	echo "</body></html>";
	exit;
}


if (@$udt) {
	require("tpl/db.php");
	require("tpl/variables.php");
	require("tpl/header_adm.txt");

	$coll=str_replace("*","&",$coll);
	$coll=str_replace("_"," ",$coll);
	$blok= mysql_query("DELETE FROM $razdels WHERE id=\"$coll\"");
	echo "<tr><td align=center><br><br>Раздел удален</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;

}

if (@$dob) {
	echo "<tr><td align=center><br>";

	if (@$koll) {	
		$kk=0;

		$select=mysql_query("SELECT rub FROM $razdels");
		$number = mysql_num_rows($select);
		if ($number>0) {
			while ($Row=mysql_fetch_row($select)){
				if ($Row[0]==$koll) {$kk++;}			
			}
			if ($kk>0) {
				echo "$naz24<br>";
			}
			else {
				mysql_query("INSERT INTO $razdels VALUES('','$koll')");
				echo "$naz25";
			}
		}
		else {
			mysql_query("INSERT INTO $razdels VALUES('','$koll')");
			echo "$naz25";
		}
	}
	else {
		echo "$naz26";
	}

	echo "<br><br>$naz27";
	echo "<form action=adm.php?catraz method=POST>";
	echo "<input type=text name=koll size=25><br>";
	echo "<input type=submit name=dob value=Добавить><br><br>";
	echo  "</form>";
}
else {
	echo "<tr><td align=center><br><table><tr><td>";
	$r=0;
	$select=mysql_query("SELECT id,rub FROM $razdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			if ($Row[0]!=="") {
				$str="$Row[0]##$Row[1]";
				$Ressear[]=$str;
				$r++;
			}
		}
		if ($r==0) {
			echo "$naz29<br><br>";
		}
		$Ressearch=array_unique($Ressear);
		asort($Ressearch);	
		foreach (@$Ressearch as $er=>$ee) {
			list($p,$v)=split("##",$ee);
			$v=str_replace(" ","_",$v);
			$v=str_replace("&","*",$v);
			echo "<li> <a href=catraz.php?ud=1&coll=$p>$v</a><br>";
		}
	}
	else {
		echo "$naz29<br><br>";
	}
	echo "</table>";
	echo "<br><br>$naz27";

	echo "<form action=adm.php?catraz method=POST>";
	echo "<input type=text name=koll size=25><br>";
	echo "<input type=submit name=dob value=Добавить><br><br>";
	echo  "</form>";
}
echo "</td><tr>";
echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";
?>