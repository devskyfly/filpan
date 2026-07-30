<?php

$link = mysql_connect("127.0.0.1","u3558310_kartmas","kartridge123") or die ("Ошибка");
mysql_select_db("u3558310_kartridge_master") or die ("error");

if($uyuty=1)
{

$time1=time();

function file_get_contents_curl($url) {
global $data;
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_FAILONERROR, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
$data = curl_exec($ch);

curl_close($ch);

return $data;
}

$count=0;

//input the manufacturer and start link
//$manufacturer=array(1=>"Brother", 2=>"Canon", 3=>"HP", 4=>"Kyocera", 5=>"Lexmark", 6=>"OKI", 7=>"Panasonic", 8=>"Pantum", 9=>"Samsung", 10=>"Sharp", 11=>"Xerox");

$manufacturer=array(1=>"Samsung", 2=>"Sharp", 3=>"Xerox");


for($i=1;$i<=count($manufacturer);$i++)
{

	$manuf=mb_strtolower($manufacturer[$i]);
	$start_link='http://www.makservice.ru/zapravka_kartridzhej_'.$manuf.'.html';
	//
	file_get_contents_curl($start_link);

	//name and link
	preg_match_all("/<a\s*href=\"(\/printer\/|\/kartridzh\/).+\">.*<\/a>/U",$data, $matches);

	foreach ($matches[0] as $p=>$v)
	{
	$temp=explode('<a href="',$v);
	$temp1=explode('">',$temp[1]);
	
	$name=str_replace("</a>","",$temp1[1]);
	
	//fix russian letters
	$err = array("С", "Т", "А", "Х", "Е", "&nbsp;");
	$fix = array("C", "T", "A", "X", "E", " ");
	$name = str_replace($err, $fix, $name);

	$temp1[0]=str_replace('" class="kwp',"",$temp1[0]);
	$link='http://www.makservice.ru'.$temp1[0];

	//image,text.
	file_get_contents_curl($link);

	//image
	preg_match_all("/<div\s*class=\"dimg\">.*<\/div>/Us",$data, $image_temp);
	$image_temp1=explode('<a href="',$image_temp[0][0]);
	$image_temp2=explode('"',$image_temp1[1]);
	$image='http://www.makservice.ru'.$image_temp2[0];

	//text
	preg_match_all("/<div\s*class=\"detext\">.*<\/div>/Us",$data, $text_temp);
	$text_temp1=str_replace('<div class="detext">',"",$text_temp[0][0]);
	$text=trim(str_replace('</div>',"",$text_temp1));

	//printers
	$pos = strpos($link, 'printer');
	if ($pos !== false) {
	$type='printer';  

	//soputstv
	preg_match_all("/<a\s*href=\"\/kartridzh\/.+\">.*<\/a>/Us",$data, $kart_for_print);

	$soputs='';
	foreach ($kart_for_print as $pp=>$vv)
	{
		foreach ($vv as $ppp=>$vvv)
		{
		$temp=explode('">',$vvv);
		$soputs=$soputs.str_replace("</a>","",$temp[1]).'<br>';
		}
	}

	$price='';
	$resource='';
	$color='';
	}

	//kartridzh
	else
	{
	$type='kartridzh';  
	//soputstv
	preg_match_all("/<a\s*href=\"\/printer\/.+\">.*<\/a>/Us",$data, $print_for_kart);

	$soputs='';
	foreach ($print_for_kart as $pp=>$vv)
	{
		foreach ($vv as $ppp=>$vvv)
		{
		$temp=explode('">',$vvv);
		$soputs=$soputs.str_replace("</a>","",$temp[1]).'<br>';
		}
	}

	//color and resource
	preg_match_all("/<div\s*class=\"prop\">.*<\/div>/Us",$data, $proporties);

	$color_temp=explode('</span>',$proporties[0][0]);
	$color=trim(str_replace('</div>',"",$color_temp[1]));

	$resource_temp=explode('</span>',$proporties[0][1]);
	$resource=trim(str_replace('</div>',"",$resource_temp[1]));

	//price
	preg_match_all("/<td\s*class=\"p\">.*<\/td>/Us",$data, $price_temp);
	$price_temp1=explode('<td class="p">',$price_temp[0][0]);
	$price_temp2=explode('<br>',$price_temp1[1]);
	$price=trim($price_temp2[0]);
	}
	
	//add manufacter to kartrige name
	$namess=mb_strtolower($name);
	$pos = strpos($namess, mb_strtolower($manufacturer[$i]));
	if ($pos === false) 
	{
	$name=$manufacturer[$i].' '.$name;
	}

	//upload image
	if($image=='http://www.makservice.ru')
	{
	$data=file_get_contents('http://www.makservice.ru/img/no_photo.jpg');
	}
	else
	{
	$data=file_get_contents($image);
	}
	
	$names=$name;

	//purple
	$pos = strpos($names, 'пурпурный');
	if ($pos !== false) 
	{
	$names=str_replace('пурпурный',"purple",$names);
	}
	//yellow
	$pos = strpos($names, 'желтый');
	if ($pos !== false) 
	{
	$names=str_replace('желтый',"yellow",$names);
	}
	//magenta
	$pos = strpos($names, 'красный');
	if ($pos !== false) 
	{
	$names=str_replace('красный',"magenta",$names);
	}
	//lightblue
	$pos = strpos($names, 'голубой');
	if ($pos !== false) 
	{
	$names=str_replace('голубой',"blue",$names);
	}
	//blue
	$pos = strpos($names, 'синий');
	if ($pos !== false) 
	{
	$names=str_replace('синий',"blue",$names);
	}
	//black
	$pos = strpos($names, 'черный');
	if ($pos !== false) 
	{
	$names=str_replace('черный',"black",$names);
	}
	
	$imagename=mb_strtolower(str_replace(' ',"-",$names)).'.jpg';
	$fh = fopen('kartridgeclub-item-images/'.$imagename, "w+");
	fwrite($fh, "$data");
	fclose($fh);
	
	//echo"$name==$imagename==$type==$price==$image==$color==$resource==$soputs==$text<br><br>";
	
	$name=iconv("UTF-8", "WINDOWS-1251", $name);
	$color=iconv("UTF-8", "WINDOWS-1251", $color);
	$resource=iconv("UTF-8", "WINDOWS-1251", $resource);
	$soputs=iconv("UTF-8", "WINDOWS-1251", $soputs);
	$text=iconv("UTF-8", "WINDOWS-1251", $text);

	$result=mysql_query("INSERT INTO `kartrige-club-base` (proizvod,name,type,price,image,color,resource,soputs,text) VALUES ('$manufacturer[$i]','$name','$type','$price','$imagename','$color','$resource','$soputs','$text')");
		if($result==true)
		{
		$count++;
		}
	}
}

$time2=time();
$time=$time2-$time1;

echo "Успешно скачано $count товаров за $time секунд";

}






$result=mysql_query("INSERT INTO `kartrige-club-base` (proizvod,name,type,price,image,color,resource,soputs,text) VALUES ('$manufacturer[$i]','$name','$type','$price','$imagename','$color','$resource','$soputs','1')");
		if($result==true)
		{
		$count++;
		}
	

?>