<?
require("tpl/db.php");
require("tpl/variables.php");
$Ressear=array();
$Ressearch=array();

if (@$ud) {
	require("tpl/header_adm.php");
	echo "<tr><td align=center><br><br><a href=redpages.php?udt=1&id=$id>Действительно удалить?</a> <a href=adm.php?redpag>Отменить</a></td></tr></TABLE>";
	echo "</body></html>";
	exit;
}


if (@$udt) {
	//require("tpl/db.php");
	//require("tpl/variables.php");
	require("tpl/header_adm.php");

	$blok= mysql_query("DELETE FROM $pag WHERE id=\"$id\"");
	echo "<tr><td align=center><br><br>Запись удалена</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;

}

if (@$soddob) {	
	mysql_query("UPDATE $pag SET text=\"$soder\" WHERE id=\"$id\"");
	echo "<tr><td>";	
	$select=mysql_query("SELECT * FROM $pag WHERE id=\"$id\"");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			echo "<br><b>Страница сайта - $Row[1]</b>";
			echo "<table><tr><td>Текст</td></tr>";
			echo "<form action=adm.php?redpag method=POST>";
			echo "<input type=hidden name=id value=$Row[0]>";
			echo "<tr><td>";
			echo "<textarea name=soder rows=20 cols=90>$Row[3]</textarea></td></tr><tr><td colspan=2 align=center>";
			echo "<input type=submit name=soddob value=\"Добавить содержание\">";
			echo  "</form></td></tr></table>";
		}
	}
}

elseif (@$dobsod) {
	echo "<tr><td>";	
	$select=mysql_query("SELECT * FROM $pag WHERE id=\"$id\"");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			echo "<br><b>Страница сайта - $Row[1]</b>";
			echo "<table><tr><td>Текст</td></tr>";
			echo "<form action=adm.php?redpag method=POST>";
			echo "<input type=hidden name=id value=$Row[0]>";
			echo "<tr><td>";
			echo "<textarea name=soder rows=20 cols=90>$Row[3]</textarea></td></tr><tr><td colspan=2 align=center>";
			echo "<input type=submit name=soddob value=\"Добавить содержание\">";
			echo  "</form></td></tr></table>";
		}
	}
}

elseif (@$dob) {
	echo "<tr><td align=center><br>";

	if (@$rub && $ssil) {	
		$kk=0;
		//$select=mysql_query("SELECT * FROM $pag");
		mysql_query("INSERT INTO $pag VALUES('','$rub','$ssil','')");
		//echo mysql_errno().": ".mysql_error()."<br>";
		echo "Страница добавлена";				
	}
	else {
		echo "Не все поля заполнены";
	}
	$select=mysql_query("SELECT * FROM $pag");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			if ($Row[0]!=="") {
		//		$str="$Row[0]##$Row[1]##$Row[2]";
		//		$Ressear[]=$str;
		//	}
		//}
		//foreach (@$Ressear as $er=>$ee) {
		//	list($p,$v)=split("##",$ee);
			echo "<li> $Row[1] [ <a href=adm.php?redpag&dobsod=1&id=$Row[0]>Добавить содержание</a> ]<br>";
		}}
	}
	else {
		echo "Ничего не найдено пока<br><br>";
	}
	echo "<br><br>Страницы сайта";
	echo "<table><tr><td align=center>Страница</td><td align=center>Ссылка</td></tr>";
	echo "<form action=adm.php?redpag method=POST>";
	echo "<tr><td>";
	echo "<input type=text name=rub size=25></td><td><input type=text name=ssil size=25></td></tr><tr><td colspan=2 align=center>";
	echo "<input type=submit name=dob value=Добавить>";
	echo  "</form></td></tr></table>";
}
else {
	echo "<tr><td align=center><br><table><tr><td>";
	$r=0;
	$select=mysql_query("SELECT * FROM $pag");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			if ($Row[0]!=="") {
		//		$str="$Row[0]##$Row[1]##$Row[2]";
		//		$Ressear[]=$str;
		//	}
		//}
		//foreach (@$Ressear as $er=>$ee) {
		//	list($p,$v)=split("##",$ee);
			echo "<li> $Row[1] [ <a href=adm.php?redpag&dobsod=1&id=$Row[0]>Добавить содержание</a> ]<br>";
		}}
	}
	else {
		echo "Ничего не найдено пока<br><br>";
	}
	echo "</table>";
	echo "<br><br>Страницы сайта";
	echo "<table><tr><td align=center>Страница</td><td align=center>Ссылка</td></tr>";
	echo "<form action=adm.php?redpag method=POST>";
	echo "<tr><td>";
	echo "<input type=text name=rub size=25></td><td><input type=text name=ssil size=25></td></tr><tr><td colspan=2 align=center>";
	echo "<input type=submit name=dob value=Добавить>";
	echo  "</form></td></tr></table>";
}
echo "</td><tr>";
echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";
?>