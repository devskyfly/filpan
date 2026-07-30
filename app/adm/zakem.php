<?
require("tpl/db.php");
require("tpl/variables.php");
if (@$zak) { 
	if (@$text) {
		$Pr=split("\r\n",$text);
		$Rrr=array_unique($Pr);		
		mysql_query("DELETE FROM $subsc WHERE thema=\"Коммерческое предложение\"");	
		foreach ($Rrr as $p=>$v) {
			if ($v!=='') {
				list($em,$cont)=explode("##",$v);
				if ($em!=='' && strpos($em,"@")!==false) {
					mysql_query("INSERT INTO $subsc VALUES('','Коммерческое предложение','$em','$cont','1')");
					//echo mysql_errno().": ".mysql_error()."<br>";
				}
			}
		}
		$sb=1;
		//list($name,$pass)=split("-",$AdminPass);
		//require("tpl/header_adm.txt");
		echo "<tr><td><br>";
		echo "E-mailы в базе ";
	}
	else {
		$sb=1;
		//list($name,$pass)=split("-",$AdminPass);
		//require("tpl/header_adm.txt");
		//echo "<tr><td><br>";
		$dop=1; 
		require("tpl/zakformemail.txt");
		//require("tpl/footer.txt");
	}
}
else {
	echo "<tr><td><br>";
	require("tpl/zakformemail.txt");
}
MYSQL_CLOSE();
?>
</body>
</html>
