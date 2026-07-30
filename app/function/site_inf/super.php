
<?
require_once("adm/tpl/db.php");
require_once("adm/tpl/variables.php");
?>
       
<?
$select=mysql_query("SELECT * FROM $sodraz WHERE super=\"1\" ORDER BY id DESC LIMIT 0, $listl");
$number = mysql_num_rows($select);

$sel=mysql_query("SELECT * FROM $uslsodraz WHERE super=\"1\" ORDER BY id DESC LIMIT 0, $listl");
$numbb = mysql_num_rows($sel);


	$nnumb=$number+$numbb;
if ($nnumb>0) 
{
//Добавляем суперпредложения по товарам
	while ($Row=mysql_fetch_row($select))
	{ 
	$ww=$Row[13];
	$Row[4]=str_replace("\n\n","\n",$Row[4]);
	$Row[4]=substr($Row[4],0,104);
    
		$MoneyType = 2;
			$f = fopen("adm/tpl/kurs.txt", "r");
			while (!feof($f)) {
				$st=fgets($f,1000);
				list($kurs,$rasr)=split("##",$st);
				$cen=10*ceil($Row[6]*$kurs/10);
			}	
			fclose($f);
		
//Добавляем суперпредложения по товарам
?><br><?
		echo "<div class='right_super'><div class='right_super_text'>
		<a href=find.php?view=1&id=$Row[0]&raz=$Row[1] >
		<img src=img/$Row[8] hspace='5' width='100' border='0' alt='".iconv("windows-1251", "UTF-8",$Row[3])."'></a>
		<br>
		<a  href=find.php?view=1&id=$Row[0]&raz=$Row[1] class='right_super_gipertext'>
		<b>".iconv("windows-1251", "UTF-8",$Row[3])."</b>
		</a>
		<br><span style=\"font-weight:bold;\">
        ".iconv("windows-1251", "UTF-8",$Row[4])." </span>
		...<br><br>
		Цена: <b class='right_cena'>
		".iconv("windows-1251", "UTF-8",$cen)."
		руб.</b><br>
     	<br>
		<span style='cursor:pointer' onClick=\"MM_openBrWindow('mag.php?act=put&hid=$Row[0]','1','width=320,height=150')\">Купить&nbsp</span>
		<a
		
		 href=# onClick=\"MM_openBrWindow('mag.php?act=put&hid=$Row[0]','1','width=320,height=150')\"><img src=\"images/korz.gif\" border=0>
		<br><br>
		</div><div>
		<img src='images/okantovka/right_part/smoth-bottom-left.gif'>
		</div></div>
		<br>";
	}
//Добавляем суперпредложения по услугам
	while ($Ro=mysql_fetch_row($sel))
	{ 
	$www=$Ro[13];
    	
   
		echo "<div class='right_super'><div class='right_super_text'>
		<b><a href=uslfind.php?view=1&id=$Ro[0]&raz=$Ro[1]&usl=1 >
		<img src=img/$Ro[8] hspace=5 width='100' border=0 alt='".iconv("windows-1251", "UTF-8",$Ro[3])."'></a></b>
		<br>
        <a href=uslfind.php?view=1&id=$Ro[0]&raz=$Ro[1]&usl=1 class='right_super_gipertext'>
		<b>"
		.iconv("windows-1251", "UTF-8",$Ro[3]).
		"</b></a>
		<br><br>
        Цена: <b class='right_cena'>".iconv("windows-1251", "UTF-8",$Ro[6])." руб</b>
		<br><br>
		<span style='cursor:pointer' onClick=\"MM_openBrWindow('mag.php?act=put&hid=$Ro[0]&usl=1','1','width=320,height=150')\">Купить&nbsp</span>
		<a href=# onClick=\"MM_openBrWindow('mag.php?act=put&hid=$Ro[0]&usl=1','1','width=320,height=150')\"><img src=\"images/korz.gif\" border=0></a>
		<br><br>
		</div><div>
		<img src='images/okantovka/right_part/smoth-bottom-left.gif'>
		</div></div>
		<br>";
		
?>
		
	<br>
    
<?
	}
}
?>


	
