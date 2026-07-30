<?

	print "\n</table>\n"; 
	
	
	

	if (count($_POST)<>0)
	{ 
	$_MassivDannix=array();
	$ind=0;
	foreach ($_POST as $element)
	{
	$ind=$ind+1;
	$_MassivDannix[$ind]=$element;
	//print $element."<br>";
	}
	$cikl=1;
	$ind=1;
	while($_MassivDannix[$ind]&&($cikl==1))
	{
	
	//print "Element №".$_MassivDannix[$ind];
	if($_MassivDannix[$ind]=='tovari')
	{
	
	//print "Da yest element tovari";

		while(($ind-$index_st)<=($_POST['kol_tovarov']*7))
		{
	//	echo "<div style=\"border: 1px solid black\">".$_MassivDannix[$ind+1]."<br>".$_MassivDannix[$ind+2]."<br>".$_MassivDannix[$ind+3]."<br>".$_MassivDannix[$ind+4]."<br>".$_MassivDannix[$ind+5]."<br>".$_MassivDannix[$ind+6]."<br>".$_MassivDannix[$ind+7]."</div>";
		$query = "UPDATE uslsodraz SET title=\"".$_MassivDannix[$ind+2]."\",nazv=\"".$_MassivDannix[$ind+3]."\",descr=\"".$_MassivDannix[$ind+4]."\",price=\"".$_MassivDannix[$ind+5]."\",local_del=\"".$_MassivDannix[$ind+6]."\",bid=\"".$_MassivDannix[$ind+7]."\" WHERE id=\"".$_MassivDannix[$ind+1]."\"";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());

		$ind=$ind+7;
		}
		$cikl=0;
		break;
	}
	$ind=$ind+1;
	}
	}
	
	$query = "SELECT * FROM uslsodraz  WHERE mark=1 ORDER BY raz";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());

	
   
    $i=0;
	print "<form action=\"adm.php?yandexmrk_usl\" method=\"post\">";
	print "\n <input type=\"hidden\" name=\"tovari\" value=\"tovari\">\n";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	$i=$i+1;
	print "\n<div style='border: 1px solid black;margin:2px 2px 2px 2px'>";
	

	print "\n <input type=\"hidden\" name=\"id_tovara_".$i."\" value=\"".$line["id"]."\">\n";
    
	print "<table>\n";  
			
			print "\t<tr>\n";print "\t\t<td rowspan=\"12\" colspan=\"1\"><img width=\"150\" height=\"150\" src=\"http://".$_SERVER['SERVER_NAME']."/img/".$line["pict"]."\"></td>\n<td> Заголовок</td>\n";print "\t</tr>\n";
			print "\t<tr>\n";print "\t\t<td> <textarea cols=\"70\" rows=\"1\" name=\"zagolovok_".$i."\">".$line["title"]."</textarea></td>\n";print "\t</tr>\n";
			print "\t<tr>\n";print "\t\t<td> Название</td>\n";print "\t</tr>\n";
            print "\t<tr>\n";print "\t\t<td> <textarea cols=\"70\" rows=\"1\" name=\"nazvaniye_".$i."\">".$line["nazv"]."</textarea></td>\n";print "\t</tr>\n";
			print "\t<tr>\n";print "\t\t<td> Описание позиции</td>\n";print "\t</tr>\n";
            print "\t<tr>\n";print "\t\t<td> <textarea cols=\"70\" rows=\"15\" name=\"opisaniye_".$i."\">".$line["descr"]."</textarea></td>\n";print "\t</tr>\n";
			print "\t<tr>\n";print "\t\t<td> Цена в рублях</td>\n";print "\t</tr>\n";
            print "\t<tr>\n";print "\t\t<td> <textarea cols=\"70\" rows=\"1\" name=\"cena_".$i."\">".$line["price"]."</textarea></td>\n";print "\t</tr>\n";
			print "\t<tr>\n";print "\t\t<td> Цена доставки</td>\n";print "\t</tr>\n";
            print "\t<tr>\n";print "\t\t<td> <textarea cols=\"70\" rows=\"1\" name=\"cena_dost".$i."\">".$line["local_del"]."</textarea></td>\n";print "\t</tr>\n";
			print "\t<tr>\n";print "\t\t<td> Цена клика</td>\n";print "\t</tr>\n";
            print "\t<tr>\n";print "\t\t<td> <textarea cols=\"70\" rows=\"1\" name=\"cena_click".$i."\">".$line["bid"]."</textarea></td>\n";print "\t</tr>\n";
			print "\t<tr>\n";print "\t\t<td><input type=\"submit\" value=\"Submit\" /></td>\n";print "\t</tr>\n";
     print "</table>\n"; 
	print "</div>";	 
    }
	print "\n <input type=\"hidden\" name=\"kol_tovarov\" value=\"".$i."\">\n";
	
	print "</form>";
   

    mysql_free_result($result);
	?>
