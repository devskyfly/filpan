<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />  
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /> 
<title>YANDEX_MARKET_EDITOR</title>
</head>
<body>
<?
include('db_func.php');
$handle = fopen($_SERVER['DOCUMENT_ROOT']."/adm/tpl/kurs.txt", "r");
							if ($handle) {
					   while (!feof($handle)) {
						   $kurs = fgets($handle, 4096);
							}
							}
$string="<?xml version=\"1.0\" encoding=\"windows-1251\"?>
<!DOCTYPE yml_catalog SYSTEM \"shops.dtd\">
<yml_catalog date=\"".date('Y-m-d')." ".date('H').":".date('i')."\">
<shop>
  <name>filpan.ru</name>
  <company>filpan.ru– копировальная техника</company>
  <url>http://filpan.ru/</url>

<currencies>
<currency id=\"RUR\" rate=\"1\"/>

</currencies>

<categories>
  <category id=\"3\" parentId=\"0\">Принтер</category>
  <category id=\"2\" parentId=\"0\">Копировальный аппарат</category>
  <category id=\"1\" parentId=\"0\">Картридж</category>
  <category id=\"7\" parentId=\"0\">Сканер</category>
  <category id=\"27\" parentId=\"0\">Чипы для картриджей</category>
<category id=\"8\" parentId=\"0\">Тонер</category>
		<category id=\"931\" parentId=\"1\">Заправка картриджей</category>
		<category id=\"932\" parentId=\"1\">Восстановка картриджей</category>
		<category id=\"934\" parentId=\"1\">Чипы обнуление</category>
		<category id=\"939\" parentId=\"1\">Прошивка принтеров</category>
</categories>

<local_delivery_cost>1000</local_delivery_cost>

<offers>";
		$spisok= new date_base;
		$katalog_spisok=array();
		$spisok->db_yandex_market_out_tovar(&$katalog_spisok,'sodraz');
		$i=0;
		
		while($katalog_spisok[$i])
		{
		
		$descr=strip_tags($katalog_spisok[$i]['descr']);
		//$descr=str_replace("<strong>", "",$katalog_spisok[$i]['descr']);
		//$descr=str_replace("</strong>", "",$descr);
		
		$cena=10*ceil($katalog_spisok[$i]['price']*$kurs/10);  
		$string=$string."<offer id=\"".$katalog_spisok[$i]['id']."\"   available=\"true\" bid=\"".$katalog_spisok[$i]['bid']."\">
  <url>http://www.filpan.ru/find.php?view=1&id=".$katalog_spisok[$i]['id']."&raz=".$katalog_spisok[$i]['raz']."</url>
  <price>".$cena."</price>
  <currencyId>RUR</currencyId>
  <categoryId>".$katalog_spisok[$i]['raz']."</categoryId>
  <picture>http://www.filpan.ru/img/".$katalog_spisok[$i]['pict']."</picture>
  <delivery>true</delivery>

    <local_delivery_cost>".$katalog_spisok[$i]['local_delivery']."</local_delivery_cost>
    
   <name>".$katalog_spisok[$i]['model']."</name>

   
  <description>".$descr."</description>
  </offer>";
		
		
		
		
		
		
		$i++;
		}
		unset($spisok);
		
		
	
		
		
		
		
		$spisok= new date_base;
		$katalog_spisok=array();
		$spisok->db_yandex_market_out_tovar(&$katalog_spisok,'uslsodraz');
		
		
		$i=0;
		
		while($katalog_spisok[$i])
		{
			$descr=strip_tags($katalog_spisok[$i]['descr']);
		//$descr=str_replace("<strong>", "",$katalog_spisok[$i]['descr']);
		//$descr=str_replace("</strong>", "",$descr);
		
		
		
		
		
		
		
		$id_new=999+$katalog_spisok[$i]['id'];
		$kategoriya=930+$katalog_spisok[$i]['raz'];
		$string=$string."<offer id=\"".$id_new."\"   available=\"true\" bid=\"".$katalog_spisok[$i]['bid']."\">
  <url>http://www.filpan.ru/uslfind.php?view=1&id=".$katalog_spisok[$i]['id']."&raz=".$katalog_spisok[$i]['raz']."&usl=1</url>
  <price>".$katalog_spisok[$i]['price']."</price>
  <currencyId>RUR</currencyId>
  
  <categoryId>".$kategoriya."</categoryId>
  <picture>http://www.filpan.ru/img/".$katalog_spisok[$i]['pict']."</picture>
  <delivery>true</delivery>
    <local_delivery_cost>".$katalog_spisok[$i]['local_delivery']."</local_delivery_cost>
    
   <name>".$katalog_spisok[$i]['model']."</name>

  <description>".$descr."</description>
  </offer>";
		
		$i++;
		}
		
		$string=$string."</offers>
		</shop>
		</yml_catalog>";
		
		unset($spisok);
		
		
	
$string=str_replace("&", "&amp;", $string);

   
   if (!$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/adm/yml/fill.yml', 'w')) {
        //echo "Cannot open file (filpan.yml)";
        exit;
   }
   else{

   if (fwrite($handle, $string) === FALSE) {
      // echo "Cannot write to file (filpan.yml)";
       exit;
   }

   //echo "Success, wrote  to file (filpan.yml)";

   fclose($handle);
 }  




		
?>
<H1>Список сформирован</H1>
</body>
</html>