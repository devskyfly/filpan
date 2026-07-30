<?
require("tpl/db.php");
require("tpl/variables.php");
require($_SERVER['DOCUMENT_ROOT']."/function/site_inf/back_link.php");
$Ressear=array();
$Ressearch=array();


$f = fopen("tpl/kurs.txt", "r");
	while (!feof($f)) {
		$st=fgets($f,1000);
		list($per,$rasr)=split("##",$st);
	}

if (@$dobism) {
	//require("tpl/header_adm.php");
	$pp=mysql_query("UPDATE $razdels SET rub=\"$ism\" WHERE id=\"$id\"");
	echo "<tr><td align=center><br><br>Раздел отредактирован</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;
}
if (@$dobis) {
	//require("tpl/header_adm.php");
	$pp=mysql_query("UPDATE $subraz SET rub=\"$ism\" WHERE id=\"$id\"");
	echo "<tr><td align=center><br><br>Раздел отредактирован</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;
}
	

if (@$ud) {
	require("tpl/header_adm.php");
	echo "<tr><td align=center><br><br>";
	echo "<form action=adm.php?reds method=POST>";
	echo "<input type=hidden name=id value=\"$coll\">";
	$select=mysql_query("SELECT rub FROM $razdels WHERE id=\"$coll\"");
	while ($Row=mysql_fetch_row($select)){
		echo "<input type=text name=ism size=40 value=\"$Row[0]\">";
	}	
	echo "<input type=submit name=dobism value=Редактировать>";
	echo "</form><br><br>";
	echo "<a href=sodraz.php?udt=1&coll=$coll>Удалить?</a> <a href=adm.php?reds>Отменить</a></td></tr></TABLE>";
	echo "</body></html>";
	exit;
}


if (@$udt) {
	require("tpl/header_adm.php");
	$coll=str_replace("*","&",$coll);
	$coll=str_replace("_"," ",$coll);
	$blok= mysql_query("DELETE FROM $razdels WHERE id=\"$coll\"");
	echo "<tr><td align=center><br><br>Раздел удален</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;

}

if (@$udpod) {
	require("tpl/header_adm.php");
	echo "<tr><td align=center><br><br>";
	echo "<form action=adm.php?reds method=POST>";
	echo "<input type=hidden name=id value=\"$coll\">";
	$select=mysql_query("SELECT rub FROM $subraz WHERE id=\"$coll\"");
	while ($Row=mysql_fetch_row($select)){
		echo "<input type=text name=ism size=40 value=\"$Row[0]\">";
	}	
	echo "<input type=submit name=dobis value=Редактировать>";
	echo "</form><br><br>";
	echo "<a href=sodraz.php?udpodt=1=1&coll=$coll>Удалить?</a> <a href=adm.php?reds>Отменить</a></td></tr></TABLE>";
	echo "</body></html>";
	exit;
	//require("tpl/header_adm.php");
	//echo "<tr><td align=center><br><br><a href=sodraz.php?udpodt=1&coll=$coll>Действительно удалить?</a> <a href=adm.php?reds>Отменить</a></td></tr></TABLE>";
	//echo "</body></html>";
	//exit;
}


if (@$udpodt) {
	require("tpl/header_adm.php");
	$blok= mysql_query("DELETE FROM $subraz WHERE id=\"$coll\"");
	echo "<tr><td align=center><br><br>Подраздел удален</td></tr></TABLE>";
	echo "</TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	echo "</body></html>";
	exit;

}

if (@$dobpod) {
	echo "<tr><td align=center><br><table><tr><td>";
	if (@$kolls) {	
		$kk=0;
		$select=mysql_query("SELECT * FROM $subraz WHERE idrub=\"$podkoll\" AND rub=\"$kolls\"");
		$number = mysql_num_rows($select);
		if ($number==0) {
			mysql_query("INSERT INTO $subraz VALUES('','$podkoll','$kolls','1')");
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

	$select=mysql_query("SELECT * FROM $razdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			echo "<li> <a href=sodraz.php?ud=1&coll=$Row[0]>$Row[1]</a><br>";
			podpunkt($Row[0],$Row[1]);
		}
	}
	else {
		echo "Ничего не найдено пока<br><br>";
	}

	require("tpl/podrform.txt");
	echo "</td><tr>";
	echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";
	exit;
}


if (@$dob) {
	echo "<tr><td align=center><br><table><tr><td>";
	if (@$koll) {	
		$kk=0;
		$select=mysql_query("SELECT * FROM $razdels WHERE rub=\"$koll\"");
		$number = mysql_num_rows($select);
		if ($number==0) {
			mysql_query("INSERT INTO $razdels VALUES('','$koll')");
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

	$select=mysql_query("SELECT * FROM $razdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			$selec=mysql_query("SELECT * FROM $subraz WHERE idrub=\"$Row[0]\"");
			$numb = mysql_num_rows($selec);
			if ($numb>0) {
				echo "<li> <a href=sodraz.php?ud=1&coll=$Row[0]>$Row[1]</a><br>";
				podpunkt($Row[0],$Row[1]);
			}
			else {
				echo "<li> <a href=sodraz.php?ud=1&coll=$Row[0]>$Row[1]</a>&nbsp;&nbsp; [<a href=adm.php?reds&zap=1&id=$Row[0]>Добавить содержание в раздел</a>]<br>";
			}
			//echo "<li> <a href=sodraz.php?ud=1&coll=$Row[0]>$Row[1]</a>&nbsp;&nbsp; [<a href=adm.php?reds&zap=1&id=$Row[0]>Добавить содержание в раздел</a>]<br>";
			//echo "<li> <a href=sodraz.php?ud=1&coll=$Row[0]>$Row[1]</a><br>";
			//podpunkt($Row[0],$Row[1]);
		}
	}
	else {
		echo "Ничего не найдено пока<br><br>";
	}
	require("tpl/podrform.txt");
}


elseif (@$ismpr) {
	echo "<tr><td><br>";
	//echo "$id";
	$ImgDir="../img";
	$naz=str_replace('"',"'",$naz);
	if (strpos ($xcl,"\t")!==false) {
		$naz=str_replace('"',"'",$naz);		
		///$info=str_replace("\r\n","+++++",$info);
		$xcl=str_replace("\r\n","</td></tr><tr><td bgcolor=#FFFFFF class=text2>",$xcl);
		//$xcl=substr($xcl,0,-36);
		$xcl=str_replace("\t","</td><td bgcolor=#FFFFFF class=text2>",$xcl);	
	}
		
	if (!$File_size) {$File_size=0;}
	if (file_exists(@$File)) {
		if ($File_size <=$MaxPictSize) {
			$select=mysql_query("SELECT pict FROM $sodraz WHERE id=\"$id\"");	
			while ($Row=mysql_fetch_row($select)){
				$picw=$Row[0];
				list($per,$rasr)=split("\.",$picw);
			}
			list($p,$ras)=split("\.",$File_name);
			$ras=strtolower($ras);
			if (@$per!==""){
				$File_name=$per.".".$ras;	
			}
			else {
				$File_name=time().".".$ras;
			}
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
			$select=mysql_query("SELECT pict1 FROM $sodraz WHERE id=\"$id\"");	
			while ($Row1=mysql_fetch_row($select)){
				$picw1=$Row1[0];
				list($per1,$rasr1)=split("\.",$picw);
			}
			list($p1,$ras1)=split("\.",$File1_name);
			$ras1=strtolower($ras1);
			if (@$per1!==""){
				$File1_name=$per1.".".$ras;	
			}
			else {
				$File1_name=time().".".$ras;
			}
			$File1_name=$per1."_over".".".$ras1;	
			$pic1=$File1_name;		
			Copy($File1,"$ImgDir/".basename($File1_name));			
		}
		else {
			echo "Картинка слишком большая. Более 250Кб, поэтому на сервер помещена не будет.<br><br>";
		}	
	}
	$fun=join("-",$fun);
	
	if (@$pic && $pic1) {
		$pp=mysql_query("UPDATE $sodraz SET nazv=\"$naz\", descr=\"$info\", price=\"$price\", xcl=\"$xcl\", proiz=\"$pro\", func=\"$fun\", pict=\"$pic\", pict1=\"$pic1\", title=\"$titl\",local_del=\"$deliv_price\",bid=\"$bid\",sopuslugi=\"$msopuslugi\",soptov=\"$msoptov\",db_description=\"$db_description\",db_keywords=\"$db_keywords\" WHERE id=\"$id\"");
	}
	else {
		$pp=mysql_query("UPDATE $sodraz SET nazv=\"$naz\", descr=\"$info\", price=\"$price\", xcl=\"$xcl\", proiz=\"$pro\", func=\"$fun\", title=\"$titl\",local_del=\"$deliv_price\",bid=\"$bid\",sopuslugi=\"$msopuslugi\",soptov=\"$msoptov\",db_description=\"$db_description\",db_keywords=\"$db_keywords\" WHERE id=\"$id\"");			
	}
	if (@$super=="on") {
		$pp=mysql_query("UPDATE $sodraz SET super=\"1\" WHERE id=\"$id\"");		
	}
	else {
		$pp=mysql_query("UPDATE $sodraz SET super=\"0\" WHERE id=\"$id\"");
	}
	if (@$market=="on") {
		$ppp=mysql_query("UPDATE $sodraz SET mark=\"1\",local_del=\"$deliv_price\",bid=\"$bid\" WHERE id=\"$id\"");		
	}
	else {
		$ppp=mysql_query("UPDATE $sodraz SET mark=\"0\",local_del=\"$deliv_price\",bid=\"$bid\" WHERE id=\"$id\"");	
	}	
	//echo mysql_errno().": ".mysql_error()."<br>";
	select_unit($id,'sodraz');
	echo "Информация обновлена";
	require($_SERVER ['DOCUMENT_ROOT'].'/adm/yml/yml_modul.php');
}
elseif (@$udpr) {
	echo "<tr><td><br>";
	mysql_query("DELETE FROM $sodraz WHERE id=\"$id\"");	
	echo "Информация удалена";
}

elseif (@$dobpr) {
	echo "<tr><td><br>";
	$ImgDir="../img";
	@mkdir($ImgDir,777);

	if (@$naz && $info && $price) {
		$naz=str_replace('"',"'",$naz);
		//$info=str_replace("\n","+++++",$info);
		$xcl=str_replace("\r\n","</td></tr><tr><td bgcolor=#FFFFFF class=text2>",$xcl);
		//$xcl=substr($xcl,0,-36);
		$xcl=str_replace("\t","</td><td bgcolor=#FFFFFF class=text2>",$xcl);
		if (!$File_size) {$File_size=0;}
		if (file_exists(@$File)) {
			if ($File_size <=$MaxPictSize) {
				list($p,$ras)=split("\.",$File_name);
				$ras=strtolower($ras);
				$File_name=time().".".$ras;	
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
				list($p,$ras)=split("\.",$File1_name);
				$ras=strtolower($ras);
				$File1_name=time()."_over".".".$ras;	
				$pic1=$File1_name;		
				Copy($File1,"$ImgDir/".basename($File1_name));			
			}
			else {
				echo "Картинка слишком большая. Более 250Кб, поэтому на сервер помещена не будет.<br><br>";
			}	
		}
		if (@$super=='on') {$super=1;}
		else {$super='';}
		if (!@$subrub) {$subrub="";}
		$fun=join("-",$fun);		
		if (@$pic && $pic1) {
		if(@$market=='on'){
		echo "<br>1  ".$market;
			mysql_query("INSERT INTO $sodraz(id,raz,idraz,nazv,descr,xcl,price,papka,pict,pict1,super,proiz,func,val,dop,title,mark,local_del,bid,soptov,sopuslugi,db_description,db_keywords) VALUES('','$rub','$subrub','$naz','$info','$xcl','$price','$rub','$pic','$pic1','$super','$pro','$fun','1','','$titl','1','$deliv_price','$bid','$msopuslugi','$msoptov','$db_description','$db_keywords')");
			}
			else
			{
			echo "<br>2";
			
			$querty="INSERT INTO $sodraz(id,raz,idraz,nazv,descr,xcl,price,papka,pict,pict1,super,proiz,func,val,dop,title,mark,local_del,bid,soptov,sopuslugi,db_description,db_keywords) VALUES('','$rub','$subrub','$naz','$info','$xcl','$price','$rub','$pic','$pic1','$super','$pro','$fun','1','','$titl','0','$deliv_price','$bid','$msopuslugi','$msoptov','$db_description','$db_keywords')";
			//echo $querty;
			mysql_query($querty);
			
			}
			
		}
		else {
		if(@$market=='on'){
		echo "<br>3";
			mysql_query("INSERT INTO $sodraz(id,raz,idraz,nazv,descr,xcl,price,papka,pict,pict1,super,proiz,func,val,dop,title,mark,local_del,bid,soptov,sopuslugi,db_description,db_keywords) VALUES('','$rub','$subrub','$naz','$info','$xcl','$price','$rub','','','$super','$pro','$fun','1','','$titl','1','$deliv_price','$bid','$msopuslugi','$msoptov','$db_description','$db_keywords')");
			}
			else
			{
			echo "<br>4";
			$query="INSERT INTO $sodraz(id,raz,idraz,nazv,descr,xcl,price,papka,pict,pict1,super,proiz,func,val,dop,title,mark,local_del,bid,soptov,sopuslugi,db_description,db_keywords) VALUES('','$rub','$subrub','$naz','$info','$xcl','$price','$rub','','','$super','$pro','$fun','1','','$titl','0','$deliv_price','$bid','$msopuslugi','$msoptov','$db_description','$db_keywords')";
			
			//echo "<BR>Zapros:".$query."<BR>";
			mysql_query($query);
			}
		}
		//echo mysql_errno().": ".mysql_error()."<br>";		
		echo "Информация в базе";	
	}
	else {
		$dop=1;
		$fun=join("-",$fun);
		if (@$super=='on') {$super=1;}
		else {$super='';}
		echo "<hr>";
		require ("tpl/zakprform.txt");
		exit();
	}
}

elseif (@$zap) {
	echo "<tr><td><br>";
	$nn=0;
	if (!@$page) {$page=0;}
	$lim=$page*$listl;
	if (@$podc) {
		$select=mysql_query("SELECT * FROM $sodraz WHERE raz=\"$id\" AND idraz=\"$podc\" AND proiz=\"$proi\" ORDER BY id DESC LIMIT $lim, $listl");
	}
	else {
		$select=mysql_query("SELECT * FROM $sodraz WHERE raz=\"$id\" AND proiz=\"$proi\" ORDER BY id DESC LIMIT $lim, $listl");
	}
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			$nn++;	
			echo "<table><tr><td width=20%>";
			echo "<form action=adm.php?reds method=POST enctype=multipart/form-data>";
			echo "<input type=hidden name=id value=$Row[0]>";
			if ($Row[8]) {
				echo "<a href=# onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image$nn','','../img/$Row[9]','1')\"><img src=../img/$Row[8] hspace=5 width=150 border=0 name=Image$nn></a></td><td>";
			}
			else {
				echo "&nbsp;</td><td>";
			}
			echo "Заголовок <br><input type=text name=titl size=100 value=\"$Row[15]\"><br>";
			echo "Название<br><input type=text name=naz size=100 value=\"$Row[3]\"><br>";
			echo "Описание<br><textarea rows=10 cols=80 name=info>$Row[4]</textarea><br>";
			echo "Таблица<br><textarea rows=10 cols=80 name=xcl>$Row[5]</textarea><br>";
			echo "Сопутствующие товары<br><textarea rows=10 cols=40 name=msoptov>$Row[20]</textarea><br>";
			echo "Сопутствующие услуги<br><textarea rows=10 cols=40 name=msopuslugi>$Row[21]</textarea><br>";
			echo "Description<br><textarea rows=5 cols=40 name=db_description>$Row[22]</textarea><br>";
			echo "Keywords<br><textarea rows=5 cols=40 name=db_keywords>$Row[23]</textarea><br>";
			echo "Цена<br><input type=text name=price size=10 value=\"$Row[6]\">";
			echo "   ".(10*ceil($Row[6]*$per/10))." рубли<br>";
			echo "Картинка 1<br><input type=file name=File size=50><br>";
			echo "Картинка 2<br><input type=file name=File1 size=50><br>";
			if ($Row[10]==1) {
				echo "<input type=checkbox name=super CHECKED>Добавить в суперпредложения<br><br>";
			}
			else {
				echo "<input type=checkbox name=super>Добавить в суперпредложения<br><br>";
			}
			
			echo "<select name=pro>";
			echo "<OPTION VALUE='-1'>Выберите производителя</OPTION>";
			$sel=mysql_query("SELECT id,rub FROM $proiz WHERE idrub=\"$Row[1]\" AND idraz=\"1\"");
			$number = mysql_num_rows($sel);
			if ($number>0) {
				while ($Ro=mysql_fetch_row($sel)){
					if (@$Ro[1]!="") {
						if ($Ro[0]==$Row[11]) {
							echo "<option value=$Ro[0] SELECTED>$Ro[1]</option>";
						}
						else {
							echo "<option value=$Ro[0]>$Ro[1]</option>";
						}
					}
				}
			}
			else {
				echo "Ни одной рубрики не найдено<br><br>";
			}
			echo "</select><br>";
			echo "Выберите функциональность<br>";
			$kkk=0;
			$Fun=split("-",$Row[12]);
			$selec=mysql_query("SELECT id,rub FROM $func WHERE idrub=\"$Row[1]\" AND idraz=\"1\"");
			$number = mysql_num_rows($selec);
			if ($number>0) {				
				while ($Rw=mysql_fetch_row($selec)){
					//echo "$Rw[0]+++<br>";
					foreach ($Fun as $p=>$v) {
						//echo "$v---<br>";
						if (@$Rw[1]!="") {						
							if ($Rw[0]==$v) {
								$kkk++;								
								//echo "$v $Rw[0]===<br>";								
								//echo "<input type=checkbox name=fun[] value=\"$Rw[0]\" CHECKED>$Rw[1]<br>";
							}							
						}						
					}
					if (@$kkk>0) {
						$kkk=0;
						echo "<input type=checkbox name=fun[] value=\"$Rw[0]\" CHECKED>$Rw[1]<br>";
					}
					else {
						//echo "$kkk+++";
						echo "<input type=checkbox name=fun[] value=\"$Rw[0]\">$Rw[1]<br>";
					}													
				}				
			}
			else {
				echo "Ни одной рубрики не найдено<br><br>";
			}
			echo "</select><br>";
			if ($Row[16]==1) {
				echo "<input type=checkbox name=market CHECKED>Отметить для Маркета<br><br>";
				echo "Цена доставки<br><input type=text name=deliv_price size=10 value=\"$Row[17]\"><br>";
				echo "Цена щелчка<br><input type=text name=bid size=10 value=\"$Row[18]\"><br>";
			}
			else {
				echo "<input type=checkbox name=market>Отметить для Маркета<br><br>";
				echo "Цена доставки<br><input type=text name=deliv_price size=10 value=\"$Row[17]\"><br>";
				echo "Цена щелчка<br><input type=text name=bid size=10 value=\"$Row[18]\"><br>";
			}

			echo "<input type=submit name=ismpr value=\"Редактировать\">";
			echo "<input type=submit name=udpr value=\"Удалить\">";
			echo "</form>";
			echo "</td></tr></table><hr>";			
		}
		if (@$podc) {
			$select=mysql_query("SELECT count(*) FROM $sodraz WHERE raz=\"$id\" AND idraz=\"$podc\"");
		}
		else {
			$select=mysql_query("SELECT count(*) FROM $sodraz WHERE raz=\"$id\"");
		}
		while ($Row=mysql_fetch_row($select)){
			$numbe=$Row[0];
		}
		$vsego=$numbe/$listl;
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
				if (!@$podc) {$podc="";}
				if (@$msgn) {
					echo "<a href=adm.php?reds&zap=1&id=$id&podc=$podc&page=$i&proi=$proi>";
				}
				else {
					echo "<a href=adm.php?reds&zap=1&id=$id&podc=$podc&page=$i&proi=$proi>";
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
	
	echo "<center>";
	$select=mysql_query("SELECT rub FROM $razdels WHERE id=\"$id\"");
	while ($Row=mysql_fetch_row($select)){
		$nazz=$Row[0];
	}
	echo "<hr><h3>$nazz - Добавить новую информацию</h3>";
	echo "<table><tr><td>";
	echo "<form action=adm.php?reds method=POST enctype=multipart/form-data>";
	echo "<input type=hidden name=rub value=\"$id\">";
	if (@$podc) {
		echo "<input type=hidden name=subrub value=\"$podc\">";
	}
	echo "Заголовок </td><td><input type=text name=titl size=100></td></tr>";
	echo "<tr><td>Название</td><td> <input type=text name=naz size=100></td></tr>";
	echo "<tr><td colspan=2>Описание :<br> <textarea name=info cols=90 rows=15></textarea></td></tr>";
	echo "<tr><td colspan=2>Таблица (файл Exl) :<br> <textarea name=xcl cols=90 rows=5></textarea></td></tr>";
	echo "<tr><td>Сопутствующие товары</td><td><textarea rows=10 cols=40 name=msoptov></textarea></td></tr>";
	echo "<tr><td>Сопутствующие услуги</td><td><textarea rows=10 cols=40 name=msopuslugi></textarea></td></tr>";
	echo "<tr><td>Description</td><td><textarea rows=5 cols=40 name=db_description></textarea></td></tr>";
	echo "<tr><td>Keywords</td><td><textarea rows=5 cols=40 name=db_keywords></textarea></td></tr>";
	echo "<tr><td>Цена </td><td><input type=text name=price size=10></td></tr>";
	echo "<tr><td>Картинка 1</td><td><input type=file name=File size=50></td></tr>";
	echo "<tr><td>Картинка 2</td><td><input type=file name=File1 size=50></td></tr>";
	echo "<tr><td><input type=checkbox name=super>Добавить в суперпредложения</td></tr>";
	$select=mysql_query("SELECT id,rub FROM $proiz WHERE idrub=\"$id\" AND idraz=\"1\"");
	$number = mysql_num_rows($select);
	echo "<tr><td><select name=pro>";
	echo "<OPTION VALUE='-1'>Выберите производителя</OPTION>";
	if ($number>0) {
		while ($Ro=mysql_fetch_row($select)){
			if (@$Ro[1]!="") {
				if ($Ro[0]==$proi) {
					echo "<option value=$Ro[0] SELECTED>$Ro[1]</option>";
				}
				else {
					echo "<option value=$Ro[0]>$Ro[1]</option>";
				}
			}
		}
	}
	else {
		echo "Ни одной рубрики не найдено<br><br>";
	}
	echo "</select></td></tr>";
	$select=mysql_query("SELECT id,rub FROM $func WHERE idrub=\"$id\" AND idraz=\"1\"");
	$number = mysql_num_rows($select);
	echo "<tr><td>";
	echo "Выберите функциональность<br>";
	if ($number>0) {
		while ($Rw=mysql_fetch_row($select)){
			if (@$Rw[1]!="") {
				echo "<input type=checkbox name=fun[] value=\"$Rw[0]\">$Rw[1]<br>";
			}
		}
	}
	else {
		echo "Ни одной рубрики не найдено<br><br>";
	}
	echo "</td></tr>";
	echo "<tr><td>";
	echo "<br><input type=checkbox name=market >Отметить для Маркета<br><br>";
	echo "</td></tr>";
	echo "<tr><td>";
				echo "Цена доставки<br><input type=text name=deliv_price size=10><br>";
				echo "</td></tr>";
				echo "<tr><td>";
				echo "Цена щелчка<br><input type=text name=bid size=10><br>";
				echo "</td></tr>";
	echo "<tr><td colspan=2 align=center>";
	
	echo "<input type=submit name=dobpr value=\"Добавить\">";
	echo "</form>";
	echo "</td></tr></table>";
}

else {
	echo "<tr><td align=center><br><table><tr><td>";
	$r=0;
	$select=mysql_query("SELECT * FROM $razdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			$selec=mysql_query("SELECT * FROM $subraz WHERE idrub=\"$Row[0]\" AND idraz=\"1\"");
			$numb = mysql_num_rows($selec);
			if ($numb>0) {
				echo "<li> <a href=sodraz.php?ud=1&coll=$Row[0]>$Row[1]</a><br>";
				podpunkt($Row[0],$Row[1]);
			}
			else {
				echo "<li> <a href=sodraz.php?ud=1&coll=$Row[0]>$Row[1]</a>&nbsp;&nbsp; [<a href=adm.php?reds&zap=1&id=$Row[0]>Добавить содержание в раздел</a>]<br>";
			}
		}
	}
	else {
		echo "Ничего не найдено пока<br><br>";
	}
	echo "</table>";
	require("tpl/podrform.txt");

}

function podpunkt ($rr,$p){
	global $subraz;
	global $proiz;
	$sel=mysql_query("SELECT id,rub FROM $subraz WHERE idrub=\"$rr\" AND idraz=\"1\"");
	while ($Ro=mysql_fetch_row($sel)){
		echo "<dd> <a href=sodraz.php?udpod=1&coll=$Ro[0]>$Ro[1]</a><br>";
		echo "<ul>";
		$sel1=mysql_query("SELECT id,rub FROM $proiz WHERE idrub=\"$rr\" AND idraz=\"1\"");
		while ($Ro1=mysql_fetch_row($sel1)){
			echo "<dd><li>$Ro1[1]&nbsp;&nbsp; [<a href=adm.php?reds&zap=1&id=$rr&podc=$Ro[0]&proi=$Ro1[0]>Добавить содержание в раздел</a>]<br>";
		}
		echo "</ul>";
	}
}

echo "</td><tr>";
echo "</TABLE></TD></TR></TABLE></TR></TABLE></TR></TABLE>";

?>