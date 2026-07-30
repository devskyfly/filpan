<?
require("tpl/db.php");
require("tpl/variables.php");
$Ressear=array();
$Ressearch=array();
echo "<tr><td><br>";

if (@$udpr) {
	if (@$usl){
		$pp=mysql_query("UPDATE $uslsodraz SET super=\"0\" WHERE id=\"$id\"");
	}
	else {
		$pp=mysql_query("UPDATE $sodraz SET super=\"0\" WHERE id=\"$id\"");
	}
	echo "Из суперпредложений удалено";
}

elseif (@$ismpr) {
	$ImgDir="../img";
	$naz=str_replace('"',"'",$naz);
	if (!$File_size) {$File_size=0;}
	if (file_exists(@$File)) {
		if ($File_size <=$MaxPictSize) {
			if (@$usl){
				$select=mysql_query("SELECT pict FROM $uslsodraz WHERE id=\"$id\"");
			}
			else {
				$select=mysql_query("SELECT pict FROM $sodraz WHERE id=\"$id\"");	
			}
			while ($Row=mysql_fetch_row($select)){
				$picw=$Row[0];
				list($per,$rasr)=split("\.",$picw);
			}
			list($p,$ras)=split("\.",$File_name);
			$ras=strtolower($ras);
			$File_name=$per.".".$ras;	
			$pic=$File_name;		
			Copy($File,"$ImgDir/".basename($File_name));			
		}
		else {
			echo "Картинка слишком большая. Более 250Кб, поэтому на сервер помещена не будет.<br><br>";
		}	
	}
	if (!$File1_size) {$File1_size=0;}
	if (file_exists(@$File1)) {
		if ($File1_size <=$MaxPictSize) {
			if (@$usl){
				$select=mysql_query("SELECT pict1 FROM $sodraz WHERE id=\"$id\"");
			}
			else {
				$select=mysql_query("SELECT pict1 FROM $sodraz WHERE id=\"$id\"");
			}	
			while ($Row=mysql_fetch_row($select)){
				$picw1=$Row[0];
				list($per1,$rasr1)=split("\.",$picw);
			}
			list($p,$ras)=split("\.",$File1_name);
			$ras=strtolower($ras);
			$File1_name=$per1."_over".".".$ras;	
			$pic1=$File1_name;		
			Copy($File1,"$ImgDir/".basename($File1_name));			
		}
		else {
			echo "Картинка слишком большая. Более 250Кб, поэтому на сервер помещена не будет.<br><br>";
		}	
	}
	if (@$usl) {
		if (@$pic && $pic1) {
			$pp=mysql_query("UPDATE $uslsodraz SET nazv=\"$naz\", descr=\"$info\", price=\"$price\", xcl=\"$xcl\", pict=\"$pic\", pict1=\"$pic1\" WHERE id=\"$id\"");
		}
		else {
			$pp=mysql_query("UPDATE $uslsodraz SET nazv=\"$naz\", descr=\"$info\", price=\"$price\", xcl=\"$xcl\" WHERE id=\"$id\"");			
		}
		if (@$super) {
			$pp=mysql_query("UPDATE $uslsodraz SET super=\"1\" WHERE id=\"$id\"");		
		}
	}
	else {
		if (@$pic && $pic1) {
			$pp=mysql_query("UPDATE $sodraz SET nazv=\"$naz\", descr=\"$info\", price=\"$price\", xcl=\"$xcl\", pict=\"$pic\", pict1=\"$pic1\" WHERE id=\"$id\"");
		}
		else {
			$pp=mysql_query("UPDATE $sodraz SET nazv=\"$naz\", descr=\"$info\", price=\"$price\", xcl=\"$xcl\" WHERE id=\"$id\"");			
		}
		if (@$super) {
			$pp=mysql_query("UPDATE $sodraz SET super=\"1\" WHERE id=\"$id\"");		
		}
	}	

	echo "Информация обновлена";
}

else {
	$nn=0;
	if (!@$page) {$page=0;}
	$lim=$page*$listl;
	$select=mysql_query("SELECT * FROM $sodraz WHERE super=\"1\" ORDER BY id DESC LIMIT $lim, $listl");
	$number = mysql_num_rows($select);
	$sel=mysql_query("SELECT * FROM $uslsodraz WHERE super=\"1\" ORDER BY id DESC LIMIT $lim, $listl");
	$numbb = mysql_num_rows($sel);
	$nnumb=$number+$numbb;
	if ($nnumb>0) {
		while ($Row=mysql_fetch_row($select)){
			$nn++;	
			echo "<table><tr><td width=20%>";
			echo "<form action=adm.php?redsup method=POST enctype=multipart/form-data>";
			echo "<input type=hidden name=id value=$Row[0]>";
			if ($Row[8]) {
				echo "<a href=# onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image$nn','','../img/$Row[9]','1')\"><img src=../img/$Row[8] hspace=5 width=150 border=0 name=Image$nn></a></td><td>";
			}
			else {
				echo "&nbsp;</td><td>";
			}
			echo "Название<br><input type=text name=naz size=80 value=\"$Row[3]\"><br>";
			echo "Описание<br><textarea rows=10 cols=80 name=info>$Row[4]</textarea><br>";
			echo "Таблица<br><textarea rows=10 cols=80 name=xcl>$Row[5]</textarea><br>";
			echo "Цена<br><input type=text name=price size=10 value=\"$Row[6]\"><br>";
			echo "Картинка 1<br><input type=file name=File size=50><br>";
			echo "Картинка 2<br><input type=file name=File1 size=50><br>";
			echo "<input type=submit name=ismpr value=\"Редактировать\">";
			echo "<input type=submit name=udpr value=\"Удалить из суперпредложений\">";
			echo "</form>";
			echo "</td></tr></table><hr>";			
		}
		while ($Ro=mysql_fetch_row($sel)){
			$nn++;	
			echo "<table><tr><td width=20%>";
			echo "<form action=adm.php?redsup method=POST enctype=multipart/form-data>";
			echo "<input type=hidden name=id value=$Ro[0]>";
			echo "<input type=hidden name=usl value=1>";
			if ($Ro[8]) {
				echo "<a href=# onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image$nn','','../img/$Ro[9]','1')\"><img src=../img/$Ro[8] hspace=5 width=150 border=0 name=Image$nn></a></td><td>";
			}
			else {
				echo "&nbsp;</td><td>";
			}
			echo "Название<br><input type=text name=naz size=80 value=\"$Ro[3]\"><br>";
			echo "Описание<br><textarea rows=10 cols=80 name=info>$Ro[4]</textarea><br>";
			echo "Таблица<br><textarea rows=10 cols=80 name=xcl>$Ro[5]</textarea><br>";
			echo "Цена<br><input type=text name=price size=10 value=\"$Ro[6]\"><br>";
			echo "Картинка 1<br><input type=file name=File size=50><br>";
			echo "Картинка 2<br><input type=file name=File1 size=50><br>";
			echo "<input type=submit name=ismpr value=\"Редактировать\">";
			echo "<input type=submit name=udpr value=\"Удалить из суперпредложений\">";
			echo "</form>";
			echo "</td></tr></table><hr>";			
		}		
		$select=mysql_query("SELECT count(*) FROM $sodraz WHERE super=\"1\"");		
		while ($Row=mysql_fetch_row($select)){
			$numbe=$Row[0];
		}

		$sel=mysql_query("SELECT count(*) FROM $uslsodraz WHERE super=\"1\"");
		while ($Ro=mysql_fetch_row($select)){
			$numb=$Ro[0];
		}
		
		$num=$numbe+$numb;

		$vsego=$num/$listl;
		$vseg=round($vsego);
		if ($vsego>$vseg) {
			$vs=$vseg+1;
		}
		else {$vs=$vseg;}
		echo "<center>";
		echo "<span class=text>";
		for ($i=0;$i<$vs;$i++) {
			if ($page==$i) {
				$p=$i+1;
				echo "$p | ";
			}
			else {
				if (@$msgn) {
					echo "<a href=adm.php?redsup&zap=1&page=$i>";
				}
				else {
					echo "<a href=adm.php?redsup&zap=1&page=$i>";
				}
				$p=$i+1;
				echo "$p<a> | ";
			}
		}
		echo "</span>";
	}
	else {
		echo "Никакой информации пока нет<br><br>";
	}
	
	
}


echo "</td><tr>";
echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";
?>