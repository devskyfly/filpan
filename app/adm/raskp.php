<?
require("tpl/db.php");
require("tpl/variables.php");
echo "<tr><td><br>";

function XMail( $from, $to, $subj, $text, $filename) {
	if (@$filename) {
		$f = fopen($filename,"rb"); 
	}
	$un = strtoupper(uniqid(time()));

	$subject=convert_cyr_string($subj,'w','k');
	$text=convert_cyr_string($text,'w','k').'</body></html>';

	$head = "From: $from\n"; 
	//$head .= "To: $to\n";
	$head .= "Subject: $subject\n"; 
	$head .= "X-Mailer: PHPMail Tool\n"; 
	$head .= "Reply-To: $from\n"; 
	$head .= "Mime-Version: 1.0\n"; 
	$head .= "Content-Type:multipart/mixed;"; 
	$head .= "boundary=\"----------".$un."\"\n\n"; 
	$zag = "------------".$un."\nContent-Type:text/html;\n"; 	
	$zag .= "Content-Transfer-Encoding: 7bit\n\n$text\n\n"; 
	if (@$filename) {
		$zag .= "------------".$un."\n"; 
		$zag .= "Content-Type: application/octet-stream;"; 
		$zag .= "name=\"".basename($filename)."\"\n"; 
		$zag .= "Content-Transfer-Encoding:base64\n"; 
		$zag .= "Content-Disposition:attachment;"; 
		$zag .= "filename=\"".basename($filename)."\"\n\n"; 
		$zag .= chunk_split(base64_encode(fread($f,filesize($filename))))."\n"; 
	}
	return @mail($to, $subject, $zag, $head); 
}

if (@$podtv) {
	$nn=''; $rrr='';	
	$RDir="tpl";
	if (@$vlozh) {
		list($osn,$raz)=split ("\.",$vlozh);
	}
	$select=mysql_query("SELECT em FROM $subsc WHERE tema=\"Проверка\" AND permission=\"1\"");
	$number = mysql_num_rows($select);
	if ($number>0) {
		while ($Row=mysql_fetch_row($select)){
			if (strpos($Row[0],"@")!=false){
				$nn++;
				$recipient=$Row[0];
				$from="soniuk@mail.ru";
				$subjec='Коммерческое предложение от кадрового агентства "Профессионал"';
				if (@$vlozh) {	$rrr="$RDir/$vlozh";}	
				else {$rrr='';}
				$text1='<html><head></head><body>';
				$text1.=$text;
				$text1.='<br><br>=========================================================<br><br>';	
				$text1.="Если Вы хотите отписаться от данной рассылки, щелкните по следующей ссылке <a href=http://www.tay-hosting.ru/design/var4/subscribe.php?em=$recipient&remem=1&tema=$tema>http://www.tay-hosting.ru/design/var4/unsubscribe.php?em=$recipient&remem=1</a><br>";

				XMail($from,$recipient,$subjec,$text1,$rrr);
			}
		}
		echo "Отправлено $nn писем из $nn";
	}
	//MYSQL_CLOSE();
	echo "</body></html>";
	exit;
}

if (@$ism) {
	require("tpl/zakformkp.txt");
	exit;
}

if (@$zak) {

	$nn=''; $rrr='';	$kk=''; 
	@mkdir($RDir,777);
	$RDir="tpl";
	if (file_exists(@$File)) {
		$vlozh=basename($File_name);		
		list($osn,$raz)=split ("\.",$vlozh);
		Copy($File,"$RDir/".basename($File_name));	
	}

	$select=mysql_query("SELECT em FROM $subsc WHERE tema=\"Проверка\" AND permission=\"1\"");
	$number = mysql_num_rows($select);
	if ($number>0) {	
		while ($Row=mysql_fetch_row($select)){
			if (strpos($Row[0],"@")!=false){$nn++;}
		}
		$text=str_replace("\n","<br>",$text);
		$answer="Производится рассылка по теме - Коммерческое предложение<br><br>";
		$answer.="Текст рассылки:<br>".$text."<br><br>";
		if (@$vlozh) {
			$answer.="Вложенный файл - $vlozh<br><br>";
		}
		$answer.="По данной теме найдено $nn e-mail";
		echo "$answer";
		$text=str_replace('"','',$text);
		echo "<form method=POST action=adm.php?raskp>";
		if (@$vlozh) {
			echo "<input type=hidden name=vlozh value=\"$vlozh\">";
		}
		echo "<input type=hidden name=text value=\"$text\">";
		echo "<input type=submit name=podtv value=\"Начать рассылку\">&nbsp;<input type=submit name=ism value=Изменить>";
		echo "</form>";
	}
	else {
		echo "По этой теме никто не подписался";
	}
}
else {
	require("tpl/zakformkp.txt");
}
MYSQL_CLOSE();
?>
</body>
</html>
