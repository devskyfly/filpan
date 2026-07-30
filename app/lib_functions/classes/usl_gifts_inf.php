<?class usl_gifts_inf extends db_connection
{
var $basetable;
var $gifts_on_page;
var $variant_zagruzki;

var $raz;
var $idraz;
var $proiz;

var $lim1;
var $lim2;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Конструктор
	function usl_gifts_inf($raz,$idraz,$proiz)
	{
	$this->db_connection();
	$this->raz=$raz;
	$this->idraz=$idraz;
	$this->proiz=$proiz;
	
	
	
	   if((!empty($raz))&&(!empty($idraz))&&(!empty($proiz)))
			{
			$this->query="SELECT * FROM inf_podrazdel where katalog=2 AND razdel='$raz' AND podrazdel='$idraz' AND proiz='$proiz'";
			//echo $this->query;
			$this->variant_zagruzki=3;
			}
			elseif((!empty($raz))&&(!empty($idraz)))
			{
			
			$this->query="SELECT * FROM inf_podrazdel where katalog=2 AND razdel='$raz' AND podrazdel='$idraz' AND proiz='$proiz'";
			$this->variant_zagruzki=2;
			}
			elseif((!empty($raz)))
			{
			
			$this->query="SELECT * FROM inf_podrazdel where katalog=2 AND razdel='$raz' AND podrazdel='$idraz' AND proiz='$proiz'";
			$this->variant_zagruzki=1;
			}
			else
			{
			echo "Непредвиденная ситуация";
			}
	
	
	
	
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//Вывод результата на сайт
	function show()
	{
	//echo count($this->f_array);
	if(count($this->f_array))
	{
	echo "<div class=\"middle_content\" style=\"margin-left:2px;margin-right:2px;\">";
	echo $this->f_array[0]['text_statyi'];
	echo "</div>";
	}
	}
	
}
?>