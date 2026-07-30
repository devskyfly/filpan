<?
require("tpl/db.php");
require("tpl/variables.php");
$Ressear=array();
$Ressearch=array();

if (@$dobism) {
	//require("tpl/header_adm.php");
	$pp=mysql_query("UPDATE $func SET rub=\"$ism\" WHERE id=\"$id\"");
	echo "<tr><td align=center><br><br>Функциональность отредактирована</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;
}
	

if (@$ud) {
	require("tpl/header_adm.php");
	echo "<tr><td align=center><br><br>";
	echo "<form action=adm.php?redf method=POST>";
	echo "<input type=hidden name=id value=\"$coll\">";
	$select=mysql_query("SELECT rub FROM $func WHERE id=\"$coll\"");
	while ($Row=mysql_fetch_row($select)){
		echo "<input type=text name=ism size=40 value=\"$Row[0]\">";
	}	
	echo "<input type=submit name=dobism value=Редактировать>";
	echo "</form><br><br>";
	echo "<a href=func.php?udt=1&coll=$coll>Удалить?</a> <a href=adm.php?reds>Отменить</a></td></tr></TABLE>";
	echo "</body></html>";
	exit;
}


if (@$udt) {
	require("tpl/header_adm.php");
	$coll=str_replace("*","&",$coll);
	$coll=str_replace("_"," ",$coll);
	$blok= mysql_query("DELETE FROM $func WHERE id=\"$coll\"");
	echo "<tr><td align=center><br><br>Функциональность удалена</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;

}


if (@$dob) {
	echo "<tr><td align=center><br><table><tr><td>";
	if (@$koll) {	
		$kk=0;
		if (@$us) {
			$select=mysql_query("SELECT * FROM $func WHERE rub=\"$kolls\" AND idrub=\"$koll\" AND idraz=\"2\"");
		}
		else {
			$select=mysql_query("SELECT * FROM $func WHERE rub=\"$kolls\" AND idrub=\"$koll\" AND idraz=\"1\"");
		}
		$number = mysql_num_rows($select);
		if ($number==0) {
			if (@$us) {
				$idraz=2;
				mysql_query("INSERT INTO $func VALUES('','$koll','$kolls','2')");
			}
			else {
				$idraz=1;
				mysql_query("INSERT INTO $func VALUES('','$koll','$kolls','1')");
			}
			//echo mysql_errno().": ".mysql_error()."<br>";
			echo "Запись добавлена";
		}
		else {
			echo "Такой пункт уже есть";
		}
		
	}
	else {
		echo "Не все поля заполнены";
	}

	
	if (@$us) {
		$select=mysql_query("SELECT * FROM $uslrazdels");
	}
	else {
		$select=mysql_query("SELECT * FROM $razdels");
	}
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			$selec=mysql_query("SELECT * FROM $func WHERE idrub=\"$Row[0]\"");
			$numb = mysql_num_rows($selec);
			echo "<li>$Row[1]<br>";
			if ($numb>0) {				
				podpunkt($Row[0],$Row[1]);
			}			
		}
	}
	else {
		echo "Ничего не найдено пока<br><br>";
	}
	echo "</table><br>";
	require("tpl/funcform.txt");
}


else {
	echo "<tr><td align=center><br><table><tr><td>";
	$r=0;
	
	if (@$us) {
		$select=mysql_query("SELECT * FROM $uslrazdels");
	}
	else {
		$select=mysql_query("SELECT * FROM $razdels");
	}
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			if (@$us) {
				$idraz=2;
				$selec=mysql_query("SELECT * FROM $func WHERE idrub=\"$Row[0]\" AND idraz=\"2\"");
			}
			else {
				$idraz=1;
				$selec=mysql_query("SELECT * FROM $func WHERE idrub=\"$Row[0]\" AND idraz=\"1\"");
			}
			$numb = mysql_num_rows($selec);
			echo "<li>$Row[1]<br>";
			if ($numb>0) {				
				podpunkt($Row[0],$Row[1]);
			}
		}
	}	
	else {
		echo "Ничего не найдено пока<br><br>";
	}
	echo "</table><br>";
	require("tpl/funcform.txt");

}

function podpunkt ($rr,$p){
	global $func;
	global $idraz;
	$sel=mysql_query("SELECT id,rub FROM $func WHERE idrub=\"$rr\" AND idraz=\"$idraz\"");
	while ($Ro=mysql_fetch_row($sel)){
		echo "<dd> <a href=func.php?ud=1&coll=$Ro[0]>$Ro[1]</a><br>";
	}
}

echo "</td><tr>";
echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";
?>