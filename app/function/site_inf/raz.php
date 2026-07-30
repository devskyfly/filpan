<?
$Ressear=array();
$Ressearch=array();
require_once("adm/tpl/db.php");
require_once("adm/tpl/variables.php");

if (@$sub) {
	$select=mysql_query("SELECT id,rub FROM $razdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			echo "<div  style=\"border-bottom: dotted 1px black;\" ><img src=images/left_part/bullet.gif hspace=5>&nbsp;<a class='left_spisok' href=find.php?sub=1&id=$Row[0] id='left_text'>".iconv("windows-1251", "UTF-8",$Row[1])."</a></div><br>";
			if ($id==$Row[0]) {	
			okantonka_top('Nezakr','100%',17,15);
				podpunk($id,$Row[1],$podc,$dopf,$id,$sodraz,$proiz);
			okantonka_bottom('Nezakr',17,15);
			}		
		}
	}
	else {
		echo "$naz26";
	}
}
else {
	$select=mysql_query("SELECT id,rub FROM $razdels");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			echo "<div  style=\"border-bottom: dotted 1px black;\" ><img src=images/left_part/bullet.gif hspace=5>&nbsp;<a class='left_spisok' href=find.php?sub=1&id=$Row[0] id='left_text'>".iconv("windows-1251", "UTF-8",$Row[1])."</a></div><br>";	
			//podpunkt($Row[0],$Row[1]);		
		}
	}
	else {
		echo "$naz26";
	}
}

function podpunk ($rr,$p,$podc,$dopf,$id,$sodraz,$proiz){
	global $subraz;
	global $idraz;
	$sel=mysql_query("SELECT id,rub FROM $subraz WHERE idrub=\"$rr\" AND idraz=\"1\"");
	while ($Ro=mysql_fetch_row($sel)){

		echo "&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td rowspan=2><a class='left_spisok' href=find.php?sub=1&id=$rr&podc=$Ro[0] id='left_text'>".iconv("windows-1251", "UTF-8",$Ro[1])."</a></td></tr><tr><td></td></tr></table>";
		
		
if ($podc!=0)
	$sql = "select distinct proiz.id, proiz.rub from $proiz inner join $sodraz on ($proiz.id = $sodraz.proiz) where $proiz.idrub = $id and $proiz.idraz = 1 and $sodraz.idraz = $podc";
else
	$sql = "select distinct proiz.id, proiz.rub from $proiz inner join $sodraz on ($proiz.id = $sodraz.proiz) where $proiz.idrub = $id and $proiz.idraz = 1";
$select=mysql_query($sql);
if (mysql_num_rows($select) > 0){
if($Ro[0]==$podc)
		{
		echo '&nbsp&nbsp';
	okantonka_top('Nezakr','100%',17,15);
while ($Row=mysql_fetch_row($select))
{
	if (@$dopf) 
	{
		if (@$podc) 
		{
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td style=\"border-bottom: dotted 2px black;\" rowspan=2><a class='left_spisok_2' href=find.php?sub=1&id=$id&dopp=$Row[0]&dopf=$dopf&podc=$podc class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table>";
		}
		else 
		{	
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td  style=\"border-bottom: dotted 2px black;\"  rowspan=2><a class='left_spisok_2' href=find.php?sub=1&id=$id&dopp=$Row[0]&dopf=$dopf class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table>";
		}	
	}
	else 
	{	
		if (@$podc) 
		{
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td  style=\"border-bottom: dotted 2px black;\"  rowspan=2><a class='left_spisok_2' href=find.php?sub=1&id=$id&dopp=$Row[0]&podc=$podc class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table>";	
		}
		else 
		{
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp<table><tr><td ><img src=images/left_part/bullet.gif hspace=5>&nbsp;</td><td  style=\"border-bottom: dotted 2px black;\"  rowspan=2><a class='left_spisok_2' href=find.php?sub=1&id=$id&dopp=$Row[0] class=text>".iconv("windows-1251", "UTF-8",$Row[1])."</a></td></tr><tr><td></td></tr></table>";	
		}
		}		
	}
	okantonka_bottom('Nezakr',17,15);
}

}
	}
}
?>