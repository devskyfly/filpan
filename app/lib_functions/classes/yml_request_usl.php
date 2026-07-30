<?
class yml_request_usl extends db_connection
{
var $kurs;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function yml_request_usl()
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();
	
	/*$this->query="SELECT * FROM sodraz
	LEFT JOIN tprub 
	ON sodraz.raz=tprub.id WHERE sodraz.mark=1 ORDER BY tprub.rub 
	
	";*/
	//$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	
	$this->query="SELECT  uslsodraz.word_key as word_key,uslsodraz.id as id, uslsodraz.nazv as model, uslsodraz.descr as descr ,uslsodraz.local_del as local_del, uslsodraz.pict as pict, uslsodraz.nazakaz as nazakaz, uslsodraz.price as price, uslsodraz.bid as bid, usltprub.rub as category, proiz.rub as vendor FROM uslsodraz,usltprub,proiz WHERE uslsodraz.mark=1 AND uslsodraz.raz=usltprub.id AND uslsodraz.proiz=proiz.id  ORDER BY usltprub.rub ";
	
	
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}
	
	
	
	function printlist()
	{

	echo "<div style=\"background-color:white;\"><table style=\"width:100%\" cellpadding=\"0\" cellspacing=\"0\">";
	$i=0;
		while ($this->f_array[$i])
		{	

		$href= "http://".$_SERVER['SERVER_NAME']."/tools/edit_usl/index.php?id=".$this->f_array[$i]['id'];
	
		echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a href=\"".$href."\" class=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['model']."\"   style=\"width:150px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a href=\"$href\" class=\"table_gift_link\">".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['model'])."</a></td>\n
				<td style=\"border:solid 1px black;\">".$this->f_array[$i]['price']."руб.</td>
				</tr>\n";
				$i++;
		}
		echo "</table></div>";
	}
	

}
?>