<?
require("tpl/db.php");
require("tpl/variables.php");
$Ressear=array();
$Ressearch=array();
echo "<tr><td align=center><br><table><tr><td>";
	

if (@$ism) {
	$f = fopen("tpl/kurs.txt", "w+");
   	fwrite($f, $val.'##'.$val1);
   	fclose($f);
	echo "Курс изменен";
}

else {
	$r=0;
	$f = fopen("tpl/kurs.txt", "r");
	while (!feof($f)) {
		$st=fgets($f,1000);
		list($per,$rasr)=split("##",$st);
	}
	if ($per || $rasr) {
		echo "Курс наличного доллара $per $<br>";
		echo "Курс безналичного доллара $rasr $<br>";
	}
	else {
		echo "Ничего не было найдено";
	}
   	fclose($f);

	echo "</table>";
	echo "<br><br>Курс валют";
	echo "<form action=adm.php?redv method=POST>";
	echo "Курс наличного доллара <input type=text name=val size=15> $<br>";
	echo "Курс безналичного доллара <input type=text name=val1 size=15> $<br>";	
	echo "<input type=submit name=ism value=Изменить><br><br>";
	echo  "</form></td></tr></table>";
}
echo "</td><tr>";
echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";
?>