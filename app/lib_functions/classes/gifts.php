<?
class gifts extends db_connection
{
var $basetable;
var $gifts_on_page;
var $variant_zagruzki;

var $raz;
var $idraz;
var $proiz;

var $lim1;
var $lim2;

var $kurs;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Конструктор
	function gifts($raz,$idraz,$proiz,$page,$name_order=0)
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->gifts_on_page=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/gifts_on_page.txt");

	$this->db_connection();


	$this->raz=$raz;
	$this->idraz=$idraz;
	$this->proiz=$proiz;

	if(empty($page))
	{

	$this->lim_count($page);
			if((!empty($raz))&&(!empty($idraz))&&(!empty($proiz)))
			{
			if($name_order==0){
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." AND proiz=".$proiz." ORDER BY price LIMIT $this->lim1, $this->lim2";
			}
			elseif($name_order==1)
			{$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." AND proiz=".$proiz." ORDER BY nazv";
			}
			$this->variant_zagruzki=3;
			}


			elseif((!empty($raz))&&(!empty($idraz)))
			{
			if($name_order==0){
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." ORDER BY price LIMIT $this->lim1, $this->lim2";

			}
			elseif($name_order==1)
			{$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." ORDER BY nazv ";
			}
			$this->variant_zagruzki=2;
			}
			elseif((!empty($raz)))
			{
			if($name_order==0){
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." ORDER BY price LIMIT $this->lim1, $this->lim2";

			}
			elseif($name_order==1)
			{$this->query="SELECT * FROM sodraz WHERE raz=".$raz." ORDER BY nazv";
			}
			$this->variant_zagruzki=1;
			}
			else
			{
			echo "Непредвиденная ситуация";
			}
	}
	else
	{
	$this->lim_count($page);
	   if((!empty($raz))&&(!empty($idraz))&&(!empty($proiz)))
			{


			if($name_order==0){
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." AND proiz=".$proiz." ORDER BY price LIMIT $this->lim1, $this->lim2";
			}
			elseif($name_order==1)
			{
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." AND proiz=".$proiz." ORDER BY nazv ";
			}
			$this->variant_zagruzki=3;
			}
			elseif((!empty($raz))&&(!empty($idraz)))
			{
			if($name_order==0){
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." ORDER BY price LIMIT $this->lim1, $this->lim2";
			}
			elseif($name_order==1)
			{
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." AND idraz=".$idraz." ORDER BY nazv ";
			}
			$this->variant_zagruzki=2;
			}
			elseif((!empty($raz)))
			{
			if($name_order==0){
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." ORDER BY price LIMIT $this->lim1, $this->lim2";
			}
			elseif($name_order==1)
			{
			$this->query="SELECT * FROM sodraz WHERE raz=".$raz." ORDER BY nazv ";
			}
			$this->variant_zagruzki=1;
			}
			else
			{
			echo "Непредвиденная ситуация";
			}
	}



	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Вывод результата на сайт
	function show($raz,$podc,$dopp,$way)
	{



	$way_size=count($way);

	for($iterator=0;$iterator<$way_size;$iterator++)
	{
	if($iterator==($way_size-1))
	{
	$caption_link=$caption_link."<a class=\"caption_link\" href=".$way[$iterator]['href'].">".$way[$iterator]['text']."</a>";
	}
	else
	{
	$caption_link=$caption_link."<a class=\"caption_link\" href=".$way[$iterator]['href'].">".$way[$iterator]['text']."</a> / ";
	}
	}


	if(count($this->f_array))
	{

	echo "<div class=\"div_gift_table\">\n";

			$i=0;
			echo "<table class=\"gift_table\" cellpadding=\"0\" cellspacing=\"0\">\n";
			echo "<caption class=\"caption_gift_table\">\n";
			echo "<a class=\"caption_link\" href=\"http://www.filpan.ru/find.php?id=1\">Каталог товаров</a> / ".$caption_link."\n";
			echo "</caption>\n";





				while ($this->f_array[$i])
				{
				if($this->variant_zagruzki==3)
					{
					$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='1');
					//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1";
					//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&podc=".$podc."&dopp=".$dopp."&view=1";
					}
					elseif($this->variant_zagruzki==2)
					{
					$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='1');
					//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1";
					//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&podc=".$podc."&view=1";
					}
					elseif($this->variant_zagruzki==1)
					{
					$href=get_chpu_url($this->f_array[$i]['id'],$this->f_array[$i]['nazv'],$type='1');
					//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&raz=".$this->f_array[$i]['raz']."&podc=".$this->f_array[$i]['idraz']."&dopp=".$this->f_array[$i]['proiz']."&view=1";
					//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&view=1";
					}
					else
					{
					echo "Не предвиденная ситуация";
					}
				$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;
				echo "
				<tr>\n
				<td class=\"td_img_gift_table\" >
				<a href=\"".$href."\" class=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv'])."\"  class=\"super_img_gift\"></a>
				</td>\n
				<td class=\"td_nazv_gift_table\"><a href=\"".$href."\" class=\"table_gift_link\">".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv'])."</a></td>\n
				<td class=\"td_buy_gift_table\">\n

				<table cellpadding=\"5\" cellspacing=\"1\" class=\"sub_table\">

				<tr>
				<td>Цена:
				</td>
				<td>".$new_price. " руб.
				</td>
				</tr>\n

				<td>Кол-во
				</td>
				<td><input id=\"kolichestvo_".$this->f_array[$i]['id']."\"  type=\"text\" size=\"2\" class=\"input_window\"  value=\"1\" >
				</td>
				</tr>\n

				<tr>
				<td colspan=\"2\">
				<div style=\"cursor:pointer;width:80px;\" onclick=\"buy_gift(".$this->f_array[$i]['id'].","."'".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv'])."'".
				",document.getElementById('"."kolichestvo_"
				.$this->f_array[$i]['id']."').value,"
				.$new_price.")\"><img src=\"http://www.filpan.ru/images/right_content/korz.gif\" class=\"img_korzina\"></div>
				</td>
				</tr>\n

				</table>\n

				</td>
				</tr>\n";
				$i++;
				}
				echo "</table>\n";
				$nume_pages=$this->pages();

				//echo $nume_pages;
				//echo "<table class=\"page_link_panel\">\n";
				//echo "<tr>\n";
					for ($num_link=1;$num_link<=$nume_pages;$num_link++)
					{
					if($this->variant_zagruzki==3)
					{
					if($_GET['page']==($num_link-1))
					{
					echo "<a href=\"http://".$_SERVER['SERVER_NAME']."/find.php?id=".$_GET['id']."&dopp=".$_GET['dopp']."&podc=".$_GET['podc']."&page=".($num_link-1)."\" class=\"sub_pages_link\"><div class=\"link_box_current\">".$num_link."</div></a>\n";
					}
					else
					{
					echo "<a href=\"http://".$_SERVER['SERVER_NAME']."/find.php?id=".$_GET['id']."&dopp=".$_GET['dopp']."&podc=".$_GET['podc']."&page=".($num_link-1)."\" class=\"sub_pages_link\"><div class=\"link_box\">".$num_link."</div></a>\n";
					}
					}
					elseif($this->variant_zagruzki==2)
					{
					if($_GET['page']==($num_link-1))
					{
					echo "<a href=\"http://".$_SERVER['SERVER_NAME']."/find.php?id=".$_GET['id']."&podc=".$_GET['podc']."&page=".($num_link-1)."\" class=\"sub_pages_link\"><div class=\"link_box_current\">".$num_link."</div></a>\n";
					}
					else
					{
					echo "<a href=\"http://".$_SERVER['SERVER_NAME']."/find.php?id=".$_GET['id']."&podc=".$_GET['podc']."&page=".($num_link-1)."\" class=\"sub_pages_link\"><div class=\"link_box\">".$num_link."</div></a>\n";
					}

					}
					elseif($this->variant_zagruzki==1)
					{
					if($_GET['page']==($num_link-1))
					{
					echo "<a href=\"http://".$_SERVER['SERVER_NAME']."/find.php?id=".$_GET['id']."&page=".($num_link-1)."\" class=\"sub_pages_link\"><div class=\"link_box_current\">".$num_link."</div></a>\n";
					}
					else
					{
					echo "<a href=\"http://".$_SERVER['SERVER_NAME']."/find.php?id=".$_GET['id']."&page=".($num_link-1)."\" class=\"sub_pages_link\"><div class=\"link_box\">".$num_link."</div></a>\n";
					}

					}
					else
					{
					echo "Не предвиденная ситуация";
					}

					}
					//echo "</tr>\n";
				//echo "</table>\n";


			echo "</div>";
		}



	}//Конец функции show()


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Вывод результата на сайт
	function show_soput_table($raz,$podc,$dopp,$sup_tov_array)
	{

	if(count($this->f_array))
	{

	echo "<div style=\"\">\n";
			$i=0;
			echo "<table style=\"width:100%\" cellpadding=\"0\" cellspacing=\"0\">\n";






				while ($this->f_array[$i])
				{
				$href= "http://".$_SERVER['SERVER_NAME']."/tools/edit_gift/index.php?id=".$this->f_array[$i]['id'];
				$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;




				$sootvetstvie=0;
				foreach ($sup_tov_array as $element)
				{
					if( $element==$this->f_array[$i]['id'])
					{
					$sootvetstvie=1;
					}
				}
				if ($sootvetstvie==0)
				{
				echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a target=\"_blank\" href=\"".$href."\" style=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  style=\"width:150px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a  class=\"simpl_link\" href=\"".$href."\" style=\"\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td style=\"border:solid 1px black;width:160px;\">\n

				<input class=\"tov_checkbox\" type=\"checkbox\" id=\"checkboxtov_".$this->f_array[$i]['id']."\"
				onclick=\"

				sop_tov_update(this,".$this->f_array[$i]['id'].");

				\">

				</td>
				</tr>\n";
				}
				else
				{
				echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a target=\"_blank\" href=\"".$href."\" style=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  style=\"width:150px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a href=\"".$href."\" style=\"\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td style=\"border:solid 1px black;width:160px;\">\n

				<input type=\"checkbox\" id=\"checkboxtov_".$this->f_array[$i]['id']."\" checked=\"checked\"
				onclick=\"

				sop_tov_update(this,".$this->f_array[$i]['id'].");

				\">

				</td>
				</tr>\n";
				}


				$i++;
				}
				echo "</table>\n";
				$nume_pages=$this->pages();

				//echo $nume_pages;
				//echo "<table class=\"page_link_panel\">\n";
				//echo "<tr>\n";
					for ($num_link=1;$num_link<=$nume_pages;$num_link++)
					{
					echo "<div style=\"float:left;padding:5px;border:solid 1px black;background-color:grey;\"
					 onclick=\"
					out_array_raz1=$('#razdel_tov > select');
					out_array_podraz1=$('#podrazdel_tov > select');
					out_array_proiz1=$('#proiz_tov > select');
					hidden_id=$('#hidden_id');

					$.ajax
						 (
							 {
							type: 'POST',
							async:false,
							url: 'sub_tov_update.php',
							data: 'raz='+out_array_raz1[0].value+'&'+'podraz='+out_array_podraz1[0].value+'&'+'proiz='+out_array_proiz1[0].value+'&'+'page='+".($num_link-1)."+'&'+'id='+hidden_id[0].value,
							success: function(msg)
							{
							$('#tov_table')[0].innerHTML=msg;
							set_checkes_gift();
							 }
							 }
							 );
					\">".$num_link."</div>\n";
					}



					//echo "</tr>\n";
				//echo "</table>\n";


			echo "</div>";
		}
		else
		{
		echo "Категория пуста.";
		}



	}//Конец функции show_soput_table()

	function show_soput_table_copy($raz,$podc,$dopp,$sup_tov_array)
	{

	if(count($this->f_array))
	{

	echo "<div style=\"\">\n";
			$i=0;
			echo "<table style=\"width:100%\" cellpadding=\"0\" cellspacing=\"0\">\n";






				while ($this->f_array[$i])
				{
				$href= "http://".$_SERVER['SERVER_NAME']."/tools/edit_gift/index.php?id=".$this->f_array[$i]['id'];
				$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;

				echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a target=\"_blank\" href=\"".$href."\" style=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  style=\"width:150px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a  class=\"simpl_link\" href=\"".$href."\" style=\"\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td style=\"border:solid 1px black;width:160px;\">\n

				<input  type=\"checkbox\" id=\"checkboxtov_".$this->f_array[$i]['id']."\"
				onclick=\"

				sop_tov_update(this,".$this->f_array[$i]['id'].");

				\">

				</td>
				</tr>\n";


				$i++;
				}
				echo "</table>\n";
				$nume_pages=$this->pages();

				//echo $nume_pages;
				//echo "<table class=\"page_link_panel\">\n";
				//echo "<tr>\n";
					for ($num_link=1;$num_link<=$nume_pages;$num_link++)
					{
					echo "<div style=\"float:left;padding:5px;border:solid 1px black;background-color:gray;\"
					 onclick=\"
					out_array_raz1=$('#razdel_tov > select');
					out_array_podraz1=$('#podrazdel_tov > select');
					out_array_proiz1=$('#proiz_tov > select');
					hidden_id=$('#hidden_id');

					$.ajax
						 (
							 {
							type: 'POST',
							async:false,
							url: 'sub_tov_update.php',
							data: 'raz='+out_array_raz1[0].value+'&'+'podraz='+out_array_podraz1[0].value+'&'+'proiz='+out_array_proiz1[0].value+'&'+'page='+".($num_link-1)."+'&'+'id='+hidden_id[0].value,
							success: function(msg)
							{
							$('#tov_table')[0].innerHTML=msg;
							set_checkes_gift();
							 }
							 }
							 );
					\">".$num_link."</div>\n";
					}



					//echo "</tr>\n";
				//echo "</table>\n";


			echo "</div>";
		}
		else
		{
		echo "Категория пуста.";
		}



	}//Конец функции show_soput_table()


	//Вывод результата на сайт
	function show_gifts_table($raz,$podc,$dopp,$sup_tov_array)
	{

	if(count($this->f_array))
	{

	echo '<div >';
			$i=0;
			echo "<table style=\"width:100%\" cellpadding=\"0\" cellspacing=\"0\">\n";






				while ($this->f_array[$i])
				{
				$href= "http://".$_SERVER['SERVER_NAME']."/tools/edit_gift/index.php?id=".$this->f_array[$i]['id'];
				$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;




				$sootvetstvie=0;
				foreach ($sup_tov_array as $element)
				{
					if( $element==$this->f_array[$i]['id'])
					{
					$sootvetstvie=1;
					}
				}
				if ($sootvetstvie==0)
				{
				echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a target=\"_blank\" href=\"".$href."\" style=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  style=\"width:150px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a href=\"".$href."\" style=\"\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td style=\"border:solid 1px black;width:160px;\">\n

				<input type=\"checkbox\" id=\"checkboxtov_".$this->f_array[$i]['id']."\"
				onclick=\"

				sop_tov_update(this,".$this->f_array[$i]['id'].");

				\">

				</td>
				</tr>\n";
				}
				else
				{
				echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a target=\"_blank\" href=\"".$href."\" style=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  style=\"width:150px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a href=\"".$href."\" style=\"\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td style=\"border:solid 1px black;width:160px;\">\n

				<input type=\"checkbox\" checked=\"checked\" id=\"checkboxtov_".$this->f_array[$i]['id']."\" checked=\"checked\"
				onclick=\"

				sop_tov_update(this,".$this->f_array[$i]['id'].");

				\">

				</td>
				</tr>\n";
				}


				$i++;
				}
				echo "</table>\n";
				$nume_pages=$this->pages();

				//echo $nume_pages;
				//echo "<table class=\"page_link_panel\">\n";
				//echo "<tr>\n";
					for ($num_link=1;$num_link<=$nume_pages;$num_link++)
					{
					echo "<div style=\"float:left;padding:5px;border:solid 1px black;background-color:white;\"
					 onclick=\"


					out_array_raz1=$('#razdel_tov > select');
					out_array_podraz1=$('#podrazdel_tov > select');
					out_array_proiz1=$('#proiz_tov > select');

					$.ajax
						 (
							 {
							type: 'POST',
							async:false,
							url: 'sub_tov_update.php',
							data: 'raz='+out_array_raz1[0].value+'&'+'podraz='+out_array_podraz1[0].value+'&'+'proiz='+out_array_proiz1[0].value+'&'+'page='+".($num_link-1).",
							success: function(msg)
							{
							$('#tov_table')[0].innerHTML=msg;
							set_checkes();
							 }
							 }
							 );
					\">".$num_link."</div>\n";
					}



					//echo "</tr>\n";
				//echo "</table>\n";


			//echo "</div>";
		}
		else
		{
		echo "Категория пуста.";
		}



	}//Конец функции show_gifts_table()


	//Вывод результата на сайт
	function show_mass_gifts_table($raz,$podc,$dopp,$sup_tov_array)
	{

	if(count($this->f_array))
	{

	echo '<div >';
			$i=0;
			echo "<table style=\"width:100%\" cellpadding=\"0\" cellspacing=\"0\">\n";






				while ($this->f_array[$i])
				{
				$href= "http://".$_SERVER['SERVER_NAME']."/tools/edit_gift/index.php?id=".$this->f_array[$i]['id'];
				$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;




				$sootvetstvie=0;
				foreach ($sup_tov_array as $element)
				{
					if( $element==$this->f_array[$i]['id'])
					{
					$sootvetstvie=1;
					}
				}
				if ($sootvetstvie==0)
				{

				$nal_cheked='';
				if($this->f_array[$i]['nazakaz'])
				{
				$nal_checked="checked=\"checked\"";
				}

				$mark_cheked='';
				if($this->f_array[$i]['mark'])
				{
				$mark_cheked="checked=\"checked\"";
				}



				echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a target=\"_blank\" href=\"".$href."\" style=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  style=\"width:100px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a href=\"".$href."\" style=\"\">".$this->f_array[$i]['nazv']."</a></td>\n
				<td style=\"border:solid 1px black;\"><input id=\"tov_price_".$this->f_array[$i]['id']."\" type=\"text\" value=\"".$new_price."\"/></td>\n
				<td style=\"border:solid 1px black;\"><input id=\"tov_keyword_".$this->f_array[$i]['id']."\" type=\"text\" value=\"".$this->f_array[$i]['word_key']."\"/></td>\n
				<td style=\"border:solid 1px black;\">Наличие:<input id=\"tov_nal_".$this->f_array[$i]['id']."\" type=\"checkbox\" $nal_checked \"/></td>\n
				<td style=\"border:solid 1px black;\">Маркет:<input id=\"tov_mark_".$this->f_array[$i]['id']."\" type=\"checkbox\" $mark_cheked \"/></td>\n
				<td style=\"border:solid 1px black;width:160px;\">\n
				<input type=\"hidden\" class=\"hidden_id\" value=\"".$this->f_array[$i]['id']."\">
				<input type=\"checkbox\" id=\"checkboxtov_".$this->f_array[$i]['id']."\"
				onclick=\"


				sop_tov_update_with_key_word(this,".$this->f_array[$i]['id'].",document.getElementById('tov_keyword_".$this->f_array[$i]['id']."').value,document.getElementById('tov_price_".$this->f_array[$i]['id']."').value,document.getElementById('tov_mark_".$this->f_array[$i]['id']."'),document.getElementById('tov_nal_".$this->f_array[$i]['id']."'));
				\">
				<a class=\"simpl_link\" href=\"http://www.filpan.ru/tools/copy_gift?id=".$this->f_array[$i]['id']."\">Копировать</a>
				</td>
				</tr>\n";
				}
				else
				{
				echo "
				<tr>\n
				<td style=\"border:solid 1px black;width:160px;\" >
				<a target=\"_blank\" href=\"".$href."\" style=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\"  style=\"width:100px\"></a>
				</td>\n
				<td style=\"border:solid 1px black;\"><a href=\"".$href."\" style=\"\">".$this->f_array[$i]['nazv']."</a></td>\n
					<td style=\"border:solid 1px black;\"><input id=\"tov_price_".$this->f_array[$i]['id']."\" type=\"text\" value=\"".$new_price."\"/></td>\n

				<td style=\"border:solid 1px black;\"><input id=\"tov_keyword_".$this->f_array[$i]['id']."\" type=\"text\" value=\"".$this->f_array[$i]['word_key']."\"/></td>\n
				<td style=\"border:solid 1px black;\">Наличие:<input id=\"tov_nal_".$this->f_array[$i]['id']."\" type=\"checkbox\" $nal_checked \"/></td>\n
				<td style=\"border:solid 1px black;\">Маркет:<input id=\"tov_mark_".$this->f_array[$i]['id']."\" type=\"checkbox\" $mark_cheked \"/></td>\n
				<input type=\"hidden\" class=\"hidden_id\" value=\"".$this->f_array[$i]['id']."\">
				<input type=\"checkbox\" checked=\"checked\" id=\"checkboxtov_".$this->f_array[$i]['id']."\" checked=\"checked\"
				onclick=\"

				sop_tov_update_with_key_word(this,".$this->f_array[$i]['id'].",document.getElementById('tov_keyword_".$this->f_array[$i]['id']."').value,document.getElementById('tov_price_".$this->f_array[$i]['id']."').value,document.getElementById('tov_mark_".$this->f_array[$i]['id']."'),document.getElementById('tov_nal_".$this->f_array[$i]['id']."'));

				\">
					<a class=\"simpl_link\" href=\"http://www.filpan.ru/tools/copy_gift?id=".$this->f_array[$i]['id']."\">Копировать</a>
				</td>
				</tr>\n";
				}


				$i++;
				}
				echo "</table>\n";
				$nume_pages=$this->pages();

				//echo $nume_pages;
				//echo "<table class=\"page_link_panel\">\n";
				//echo "<tr>\n";
					for ($num_link=1;$num_link<=$nume_pages;$num_link++)
					{


					if(($_POST['page']+1)==$num_link)
					{
					echo "<div style=\"float:left;padding:5px;border:solid 1px black;background-color:white;\"
					 onclick=\"


					out_array_raz1=$('#razdel_tov > select');
					out_array_podraz1=$('#podrazdel_tov > select');
					out_array_proiz1=$('#proiz_tov > select');
					out_array_sort_by_name=$('#sort_by_name');
					$.ajax
						 (
							 {
							type: 'POST',
							async:false,
							url: 'mass_sub_tov_update.php',
							data: 'raz='+out_array_raz1[0].value+'&'+'podraz='+out_array_podraz1[0].value+'&'+'proiz='+out_array_proiz1[0].value+'&'+'page='+".($num_link-1)."+'&'+'sort_by_name='+out_array_sort_by_name[0].checked,
							success: function(msg)
							{
							$('#tov_table')[0].innerHTML=msg;
							set_checkes();
							 }
							 }
							 );
					\">".$num_link."</div>\n";
					}
					else
					{
					echo "<div style=\"float:left;padding:5px;border:solid 1px black;background-color:gray;\"
					 onclick=\"


					out_array_raz1=$('#razdel_tov > select');
					out_array_podraz1=$('#podrazdel_tov > select');
					out_array_proiz1=$('#proiz_tov > select');
					out_array_sort_by_name=$('#sort_by_name');
					$.ajax
						 (
							 {
							type: 'POST',
							async:false,
							url: 'mass_sub_tov_update.php',
							data: 'raz='+out_array_raz1[0].value+'&'+'podraz='+out_array_podraz1[0].value+'&'+'proiz='+out_array_proiz1[0].value+'&'+'page='+".($num_link-1)."+'&'+'sort_by_name='+out_array_sort_by_name[0].checked,
							success: function(msg)
							{
							$('#tov_table')[0].innerHTML=msg;
							set_checkes();
							 }
							 }
							 );
					\">".$num_link."</div>\n";
					}
					}



					//echo "</tr>\n";
				//echo "</table>\n";


			//echo "</div>";
		}
		else
		{
		echo "Категория пуста.";
		}



	}//Конец функции show_gifts_table()


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Программа расчета количества страниц
	function pages()
	{
	if($this->variant_zagruzki==3)
	{
	$request=new db_connection();
	$request->query="SELECT id FROM sodraz WHERE raz=".$this->raz." AND idraz=".$this->idraz." AND proiz=".$this->proiz." ORDER BY price";
	//echo $request->query;
	$request->current_datebases();
	$request->set_query();
	$request->close_connection();
	}
	elseif($this->variant_zagruzki==2)
	{
	$request=new db_connection();
	$request->query="SELECT id FROM sodraz WHERE raz=".$this->raz." AND idraz=".$this->idraz." ORDER BY price";
	//echo $request->query;
	$request->current_datebases();
	$request->set_query();
	$request->close_connection();
	}
	elseif($this->variant_zagruzki==1)
	{
	$request=new db_connection();
	$request->query="SELECT id FROM sodraz WHERE raz=".$this->raz." ORDER BY price";
	//echo $request->query;
	$request->current_datebases();
	$request->set_query();
	$request->close_connection();
	}
	else
	{
	echo "Непредвиденная ситуация";
	}




	$gift_nums=count($request->f_array);
	//echo $gift_nums;
	$pages=$gift_nums/($this->gifts_on_page);
	$pages=ceil($pages);
	return $pages;
	}


	function lim_count($page)
	{
	$this->lim1=$this->gifts_on_page*$page;
	$this->lim2=$lim1+$this->gifts_on_page;
	}

function show_title()
	{
	if(	mb_strlen($this->f_array[0]['title']))
	{
	return $this->f_array[0]['title'];
	}
	else
	{
	return read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/find/default_title.txt");
	}
	}

	function show_description()
	{
	if(	mb_strlen($this->f_array[0]['db_description']))
	{
	return $this->f_array[0]['db_description'];
	}
	else
	{
	return read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/find/default_description.txt");
	}
	}

	function show_keywords()
	{
	if(	mb_strlen($this->f_array[0]['db_keywords']))
	{
	return $this->f_array[0]['db_keywords'];
	}
	else
	{
	return read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/find/default_keywords.txt");
	}
	}
}
?>
