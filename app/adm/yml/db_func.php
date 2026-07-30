<?
		class date_base
		{
			public $out_inform;/*это массив выходящих данных доступных по ключам
			соответствующим названиям столбцов таблицы бд*/
			private $podkl;//это ссылка на подключение к базам
			
				function __construct() 
				{
				//podkluchaem bazu dannih
				   $this->podkl= mysql_connect('127.0.0.1','u3558310_filpan','filpan');
					mysql_query("SET NAMES 'cp1251'");
					mysql_query("SET CHARACTER SET 'cp1251'");
					if (!$this->podkl) {
					die('Could not connect: ' . mysql_error());
					}
										
				mysql_select_db ("u3558310_filpan") or die('Ne mogu otkrit bazu'); 

				}

				
				
				function db_yandex_market_out_tovar(&$input_array,$tov_usl)
				{
				
				
			   $sql = sprintf("SELECT id,bid,price,pict,local_del,nazv,descr,raz FROM ".$tov_usl." WHERE mark=1") ;
				
				$result = mysql_query($sql);
				
				if($result)
				{
				//echo 'Запрос выполнен';
							$i=0;
							while ($row = mysql_fetch_assoc($result)) {
							
							$input_array[$i]['id']=  $row['id'];
							$input_array[$i]['bid']=$row['bid'];
							$input_array[$i]['raz']=$row['raz'];
							$input_array[$i]['price']=$row['price'];
							$input_array[$i]['pict']=$row['pict'];
							$input_array[$i]['local_delivery']=$row['local_del'];
							$input_array[$i]['model']=$row['nazv'];
							$input_array[$i]['descr']=$row['descr'];

							$i++;
							}
				}
				else
				{
				echo 'Запрос не выполнен';
				}
				
				}
				
				function __destruct()
				{
				mysql_close($this->podkl);
				}
				}
				
				
				
		

?>
