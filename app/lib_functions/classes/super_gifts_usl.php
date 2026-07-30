<?

class super_gifts_usl extends db_connection
{
var $variant_zagruzki;

function super_gifts_usl($table,$raz,$idraz,$proiz)
	{
	$this->db_connection();
	$this->query="SELECT * FROM ".$table." WHERE super=1 ORDER BY superorder ASC";
	//echo $this->query."<br>\n";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();


	if((!empty($raz))&&(!empty($idraz))&&(!empty($proiz)))
			{
			$this->variant_zagruzki=3;
			}
			elseif((!empty($raz))&&(!empty($idraz)))
			{
			$this->variant_zagruzki=2;
			}
			elseif((!empty($raz)))
			{
			$this->variant_zagruzki=1;
			}
			elseif((empty($raz))&&(empty($idraz))&&(empty($proiz)))
			{
			$this->variant_zagruzki=0;
			}
			else
			{
			echo "Непредвиденная ситуация1";
			}

	}


	function show($raz,$idraz,$proiz)
	{
	$i=0;
		while ($this->f_array[$i])
		{
		if($this->variant_zagruzki==3)
					{
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&podc=".$podc."&dopp=".$dopp."&view=1&usl=1";
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1&usl=1";
						$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='2');
					}
					elseif($this->variant_zagruzki==2)
					{
						$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='2');
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1&usl=1";
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&podc=".$podc."&view=1&usl=1";
					}
					elseif($this->variant_zagruzki==1)
					{
						$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='2');
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1&usl=1";
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&view=1&usl=1";
					}
					elseif($this->variant_zagruzki==0)
					{
						$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='2');
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1&usl=1";
					//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&view=1&usl=1";
					}
					else
					{
					echo "Не предвиденная ситуация2";
					}
		$new_descr=strip_tags(mb_substr(str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['descr']),0,100,'utf-8'))."...";

		echo '<div class="super_box">'."\n";
				echo '<div>'."\n";
				echo '<a href="'.$href.'"><img src="http://'.$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict'].'"   alt="'.str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv']).'"   class="super_img_gift"></a>'."\n";
				echo '</div>'."\n";
				echo '<div>'."\n";
				echo '<a class="super_link" href="'.$href.'">'.str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv'])."</a>"."\n";
				echo '</div>'."\n";
				echo '<div class="super_text">';
				echo $new_descr."\n";
				echo '</div>'."\n";
				echo '<div>'."\n";
				echo 'Цена:<span class="super_orange_text">'.$this->f_array[$i]['price'].' руб.</span>'."\n";
				echo '</div>'."\n";

				echo "<div style=\"cursor:pointer;width:100px;\" onclick=\"buy_usl(".$this->f_array[$i]['id'].","."'".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv'])."'".
				",1,"
				.$this->f_array[$i]['price'].")\"><img src=\"http://www.filpan.ru/images/right_content/korz.gif\" class=\"img_korzina\"></div>\n";

				echo '<img src="http://www.filpan.ru/images/right_content/left_bottom.gif"  class="super_img">';
				echo '</div>'."\n";

		$i=$i+1;

		}
	}
}
?>