<?
class yml_request_1251 extends db_connection_1251
{
var $kurs;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function yml_request_1251()
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection_1251();
	
	/*$this->query="SELECT * FROM sodraz
	LEFT JOIN tprub 
	ON sodraz.raz=tprub.id WHERE sodraz.mark=1 ORDER BY tprub.rub 
	
	";*/
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	
		$this->query="SELECT  sodraz.word_key as word_key,sodraz.id as id, sodraz.nazv as model, sodraz.descr as descr ,sodraz.local_del as local_del, sodraz.pict as pict, sodraz.nazakaz as nazakaz,sodraz.price as price, sodraz.bid as bid, tprub.rub as category, proiz.rub as vendor FROM sodraz,tprub,proiz WHERE sodraz.mark=1 AND sodraz.raz=tprub.id AND sodraz.proiz=proiz.id  ORDER BY tprub.rub ";
	
	
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
        $new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;
		$href= "http://".$_SERVER['SERVER_NAME']."/tools/edit_gift/index.php?id=".$this->f_array[$i]['id'];
	
		echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a href=\"".$href."\" class=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['model']."\"   style=\"width:150px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a href=\"$href\" class=\"table_gift_link\">".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['model'])."</a></td>\n
				<td style=\"border:solid 1px black;\">".$new_price."руб.</td>
				</tr>\n";
				$i++;
		}
		echo "</table></div>";
	}

}
?>