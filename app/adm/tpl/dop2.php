<?
//=============Добавление рубрик на странице админа===========
	echo "<form action=adm.php?catkat method=POST name=p>";
	$select=mysql_query("SELECT * FROM rubrics");
	$number = mysql_num_rows($select);
	if ($number>0) {
		echo "Раздел : ";
		echo "<SELECT NAME='koll' onChange=\"document.p.submit();\">";
		echo "<OPTION VALUE='-1'>Выберите раздел</OPTION>";
		while ($Row=mysql_fetch_row($select)){
			if ($Row[0]!=="") {
				$str="$Row[0]##$Row[1]";
				$Ressear[]=$str;
				$r++;
			}
		}
		if ($r==0) {
			echo "$naz7<br><br>";
		}

		$Ressearch=array_unique($Ressear);
		asort($Ressearch);
		foreach (@$Ressearch as $p=>$v) {
			list($ep,$ev)=split("##",$v);
			if ($ep==$koll) {
				echo "<option value='$ep' SELECTED>$ev</option>";
			}
			else {
				echo "<option value='$ep'>$ev</option>";
			}
		}
		echo "</select><br>";
	}
	else {
		echo "$naz11<br>"; 
	}
	if (@$koll) {
		if ($koll!='-1') {		
			$select1=mysql_query("SELECT id,title FROM subrub WHERE rub_id=\"$koll\"");
			$number = mysql_num_rows($select1);
			echo "Рубрика : ";
			echo "<SELECT NAME='tmarka' onChange=\"document.p.submit();\">";
			if ($number>0) {
				while ($Roww=mysql_fetch_row($select1)){
					$str1="$Roww[0]##$Roww[1]";
					$Ressear1[]=$str1; $r++;
				}
				$Ressearch1=array_unique($Ressear1);
				asort($Ressearch1);
				foreach (@$Ressearch1 as $ep1=>$ev1) {
					list($ep,$ev)=split("##",$ev1);
					if ($ep==$tmarka) {
						echo "<option value='$ep' SELECTED>$ev</option>";
					}
					else {
						echo "<option value='$ep'>$ev</option>";
					}
				}
			}
			else {
				echo "<br>$naz11<br><br>"; 
			}
		}
	}
	echo "</select><br>";
	$select2=mysql_query("SELECT id,title FROM subsub WHERE subrub_id=\"$tmarka\"");
	$number = mysql_num_rows($select2);
	if ($number>0) {
		if ($number>0) {
			while ($Roww=mysql_fetch_row($select2)){
				$str1="$Roww[0]##$Roww[1]";
				$Ressear2[]=$str1; $r++;
			}
			$Ressearch2=array_unique($Ressear2);
			asort($Ressearch2);
			foreach (@$Ressearch2 as $ep1=>$ev1) {
				list($ep,$ev)=split("##",$ev1);
				echo "<li> <a href=catkat.php?ud=1&coll=$ep>$ev</a><br>";
			}
		}
		echo "<br>";
	}
	else {
		echo "<br>$naz11<br><br>"; 
	}
	echo "<br><br><input type=text name=tm>";
	echo "<input type=submit name=zak value=Закачать><br><br>";

echo "</form></td><tr>";

//======================
?>