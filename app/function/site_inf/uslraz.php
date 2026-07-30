<?
$Ressear=array();
$Ressearch=array();
require_once("adm/tpl/db.php");
require_once("adm/tpl/variables.php");

if (@$usl) {
	$select=mysql_query("SELECT id,rub FROM $uslrazdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			echo "<div  style=\"border-bottom: dotted 1px black;\" ><img src=images/left_part/bullet.gif hspace=5>&nbsp;<a class='left_spisok' href=uslfind.php?id=$Row[0]&usl=1 id='left_text'>".iconv("windows-1251", "UTF-8",$Row[1])."</a></div><br>";
			if ($id==$Row[0]) {	
			
			okantonka_top('Nezakr','100%',17,15);
				podpunkt($id,$Row[1]);
			okantonka_bottom('Nezakr',17,15);
				
	
			}
			
		}
	}
	else {
		echo "$naz26";
	}
}
else {
	$select=mysql_query("SELECT id,rub FROM $uslrazdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			echo "<div  style=\"border-bottom: dotted 1px black;\" ><img src=images/left_part/bullet.gif hspace=5>&nbsp;<a class='left_spisok' href=uslfind.php?id=$Row[0]&usl=1 id='left_text'>".iconv("windows-1251", "UTF-8",$Row[1])."</a></div><br>";		
		}
	}
	else {
		echo "$naz26";
	}
}

function podpunkt ($rr,$p){
	global $subraz;
	global $idraz;
	global $dopf;
	global $podc;
	global $proiz;
	global $id;
	
	if($id==1&&$podc==''&&$dopp=='')
	{
	//$dopp=27;
	$podc=27;
	}
	$sel=mysql_query("SELECT id,rub FROM $subraz WHERE idrub=\"$rr\" AND idraz=\"2\"");
	while ($Ro=mysql_fetch_row($sel)){
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp<img src=images/left_part/bullet.gif hspace=5>&nbsp;<a class='left_spisok' href=uslfind.php?id=$rr&podc=$Ro[0]&usl=1 id='left_text'>".iconv("windows-1251", "UTF-8",$Ro[1])."</a><br>";
		
		
		
		
		if($Ro[0]==$podc){
		okantonka_top('Nezakr','100%',17,15);
		
		

if($id==1&&!isset($podc)&&!isset($dopp))
{$select=mysql_query("SELECT id,rub FROM $proiz WHERE idrub=\"$id\" AND idraz=\"2\" AND proiz=\"18\"");}
else
{$select=mysql_query("SELECT id,rub FROM $proiz WHERE idrub=\"$id\" AND idraz=\"2\"");}
while ($Row=mysql_fetch_row($select))
{
	if (@$dopf) 
	{
		if (@$podc) 
		{
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td rowspan=2><a class='left_spisok_2' href=uslfind.php?usl=1&id=$id&dopp=$Row[0]&dopf=$dopf&podc=$podc class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table> ";
			
		}
		else 
		{	
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td rowspan=2><a class='left_spisok_2' href=uslfind.php?usl=1&id=$id&dopp=$Row[0]&dopf=$dopf class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table> ";
		}	
	}
	else 
	{
		if (@$podc) 
		{
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td rowspan=2><a class='left_spisok_2' href=uslfind.php?usl=1&id=$id&dopp=$Row[0]&podc=$podc class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table>";	
		}
		else 
		{
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td rowspan=2><a class='left_spisok_2' href=uslfind.php?usl=1&id=$id&dopp=$Row[0] class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table>";	
		}	
	}
}

okantonka_bottom('Nezakr',17,15);
	}
	}
}
?>