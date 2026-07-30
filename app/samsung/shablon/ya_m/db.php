<?
echo "Hellow";
		
		
			
				//podkluchaem bazu dannih
				   $podkl= mysql_connect('127.0.0.1','u3558310_filpan','filpan');
					mysql_query("SET NAMES 'cp1251'");
					mysql_query("SET CHARACTER SET 'cp1251'");
					if (!$podkl) {
					die('Could not connect: ' . mysql_error());
					}
										
				mysql_select_db ("u3558310_filpan") or die('Ne mogu otkrit bazu'); 

			
				
				$sql = sprintf("SELECT id,raz,idraz,nazv,descr,price,papka,pict,proiz FROM sodraz WHERE id=849 AND id=836");
				
				$result = mysql_query($sql);
				echo $result;
				
				$i=0;
				while ($row = mysql_fetch_assoc($result)) 
				{
				$input_array[$i]['id']=$row['id'];
				$input_array[$i]['raz']=$row['raz'];
				$input_array[$i]['idraz']=$row['idraz'];
				$input_array[$i]['nazv']=$row['nazv'];
				$input_array[$i]['descr']=$row['descr'];
				$input_array[$i]['price']=$row['price'];
				$input_array[$i]['papka']=$row['papka'];
				$input_array[$i]['pict']=$row['pict'];
				$input_array[$i]['proiz']=$row['proiz'];
				
				
				
				
				
				
									$sql = sprintf("SELECT rub FROM tprub WHERE id=".$input_array[$i]['id']."");
									$rub = mysql_query($sql);
									
									while ($row = mysql_fetch_assoc($rub)) 
									{
									$input_array[$i]['kategoriya']=$row['rub'];				
									}
									
									$sql = sprintf("SELECT rub FROM proiz WHERE idraz=1 AND idrub=".$input_array[$i]['raz']."");
									$proiz = mysql_query($sql);
									
									while ($row = mysql_fetch_assoc($proiz)) 
									{
									$input_array[$i]['proizvoditel']=$row['rub'];				
									}
				$i++;
				
				
				}
				
				
				if (!$handle = fopen("filpan.yml", "a")) {
        echo "Cannot open file filpan.yml";
        exit;
   }

   
   if (fwrite($handle, '<?xml version="1.0" encoding="windows-1251"?>
<!DOCTYPE yml_catalog SYSTEM "shops.dtd">
<yml_catalog date="2009-05-01 14:30">
<shop>
  <name>filpan.ru</name>
  <company>filpan.ru– копировальная техника</company>
  <url>http://filpan.ru/</url>

<currencies><currency id="RUR" rate="1"/><currency id="USD" rate="29"/></currencies>

<categories>
  <category id="1" parentId="0">Принтер</category>
  
</categories>

<offers>') === FALSE) {
       echo "Cannot write to file ";
       exit;
   }
   
   

				//print_r($input_array);
				$i=0;
				while($input_array[$i])
				{
				$unit[$i]='<offer id="'.$input_array[$i]['id'].'" available="true">
  <url>http://www.filpan.ru/find.php?view=1&amp;id='.$input_array[$i]['id'].'&amp;raz=1&amp;podr=1</url>
  <price>'.$input_array[$i]['price'].'</price>
  <currencyId>USD</currencyId>
  <categoryId>1</categoryId>
  <picture>http://www.filpan.ru/img/'.$input_array[$i]['pict'].'</picture>
  <delivery>false</delivery>
  <name>'.$input_array[$i]['nazv'].'</name>
  <description>'.$input_array[$i]['descr'].'</description>
  </offer>';
 
 
 
 
 
  
  if (fwrite($handle, $unit[$i]) === FALSE) {
       echo "Cannot write to file ($filename)";
       exit;
   }

  
  $i++;
				}
				
				if (fwrite($handle, ' </offers>
</shop>
</yml_catalog>') === FALSE) {
       echo "Cannot write to file ($filename)";
       exit;
   }
				 fclose($handle);
				//print_r($unit);
				
				
				
				mysql_close($podkl);
				
		
		

?>
		
