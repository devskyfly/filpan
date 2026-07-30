<?
class usl_gift_element extends db_connection
{

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Конструктор
	function usl_gift_element($id)
	{
	$this->kurs=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/kurs.txt");
	$this->db_connection();
	$this->query="SELECT * FROM uslsodraz WHERE id=$id";
	$this->current_datebases();
	$this->set_query();
	$this->close_connection();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Вывод результата на сайт
	function show($podr,$raz,$idraz,$proiz)
	{

	$user_for_korz=new user();


	if(count($this->f_array))
	{
		$i=0;
		while ($this->f_array[$i])
		{
		$ans=access($_COOKIE['filpan_access']);
		if($ans)
	{
	echo "<a href=\"http://www.filpan.ru/tools/edit_usl/index.php?id=".$this->f_array[$i]['id']."\" class=\"table_gift_link\">Редактировать</a>";
	}
		echo "<div style=\"overflow-y:auto;\"><div class=\"relative_img_div_element\"><div class=\"img_div_element\">\n";
		echo "<div class=\"around_img\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$this->f_array[$i]['pict']."\""." alt=\"".$this->f_array[$i]['nazv']."\" class=\"img_gift\"></div>";
			if($this->f_array[$i]['nazakaz']==1){
		echo "<div style=\"height:30px;\">\n";
		echo "Наличие: <span class=\"super_orange_text\">есть в наличии</span>";
		echo "</div>\n";
		}
		else
		{
		echo "<div style=\"height:30px;\">\n";
		echo "Наличие: <span class=\"super_orange_text\">уточняйте у менеджера</span>";
		echo "</div>\n";
		}
		echo "<div style=\"height:30px;\">\n";

		echo "Цена: <span class=\"super_orange_text\">".$this->f_array[$i]['price']." руб.</span>";
		echo "</div>\n";
		echo "<div>Кол-во
	  <input id=\"kolichestvo_".$this->f_array[$i]['id']."\"  type=\"text\" size=\"2\" class=\"input_window\"  value=\"1\" ></div>";
		echo "<div   onclick=\"buy_usl(".$this->f_array[$i]['id'].","."'".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv'])."'".
				",document.getElementById('"."kolichestvo_"
				.$this->f_array[$i]['id']."').value,"
				.$this->f_array[$i]['price'].")\" style=\"cursor:pointer;width:80px;\">\n";
		echo "<img src=\"http://www.filpan.ru/images/right_content/korz.gif\" class=\"img_korzina\">\n";
		echo "</div>\n";
		echo "<div id=\"korz_div\">";
		$user_for_korz->korz_answer_text();
		echo "</div>";
		echo "</div><div class=\"img_div_element\">Внимание! Цена действительна при заказе в интернет-магазине. В розничных магазинах и заказе по телефону цена может быть другой.</div></div>\n";
		echo "<div class=\"right_div_element\">\n";
		echo "<div  style='float:right;top:0px;right:0px;position:relative;padding-left:30px;padding-bottom:30px;'><div><a href='http://www.filpan.ru/oplata.php'><img src='http://www.filpan.ru/images/dop_to_gift/oplata.gif'></a><div>Оплата</div></div>
		<div><a href='http://www.filpan.ru/dostavka.php'><img src='http://www.filpan.ru/images/dop_to_gift/dostavka.gif'></a><div>Доставка</div></div>
		<div><a href='http://www.filpan.ru/garantiya.php'><img src='http://www.filpan.ru/images/dop_to_gift/garantiya.gif'></a><div>Гарантия</div></div></div>";
		echo "<div class='description' style='margin-left:20px;margin-right:80px;'><h1 class=\"gift_title\">".str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['nazv'])."</h1><br><br>\n";


		// Удаление описания карточек товаров для раздела Каталог услуг->Заправка картриджей->Лазерные (idraz=27)
		//if($this->f_array[$i]['idraz']!='27'){

		echo str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['descr'])."<br>\n";


	    echo "Внешний вид товара может отличаться от размещенного на сайте.<br>\nТовары, услуги и цены, размещенные на сайте, не являются публичной офертой.<br>\n";
		//}

		///

		/*if (!empty($podr))
		{
	   // echo "</div>\n";*/


		echo "</div>\n";
		 echo "</div>\n";
	/*	}
		else
		{*
					if((!empty($raz))&&(!empty($idraz))&&(!empty($proiz)))
						{
						$href="http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&podc=".$idraz."&dopp=".$proiz."&view=1&podr=1&usl=1";

						}
						elseif((!empty($raz))&&(!empty($idraz)))
						{
						$href="http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&podc=".$idraz."&view=1&podr=1&usl=1";

						}
						elseif((!empty($raz)))
						{
						$href="http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&raz=".$raz."&view=1&podr=1&usl=1";
						}
						elseif((empty($raz))&&(empty($idraz))&&(empty($proiz)))
						{
						$href="http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$this->f_array[$i]['id']."&view=1&podr=1";
						}
						else
						{
						echo "Непредвиденная ситуация";
						}

		echo "<br><div style=\"clear:left\"><a class=\"podrobno\" href=\"$href\">Подробно...</a></div></div></div></div>\n";
		}*/


		$this->show_user_soput_table_gifts();

	   $this->show_user_soput_table_uslugi();
	    echo "<div class=\"bottom_div_element\">\n";
		echo str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['xcl'])."<br>\n";
		echo "</div>\n";
	   if(mb_strlen($this->f_array[$i]['text_modul'])!=0)
	   {
	   echo '<div class="bottom_div_element" style="clear:left;">'.str_replace("_***_",$this->f_array[$i]['word_key'],$this->f_array[$i]['text_modul']).'</div>';
	   }

		$i++;
		}
	}
}

	//Вывод позиции в окне администратора
	function show_admin()
	{


	if(count($this->f_array))
	{


		$i=0;
		while ($this->f_array[$i])
		{

		$spisok_razdelov=new razdel_usl($this->f_array[$i]['raz']);
		$spisok_podrazdelov=new podrazdel_usl($this->f_array[$i]['idraz'],$this->f_array[$i]['raz']);
		$spisok_proiz=new proiz_usl($this->f_array[$i]['proiz'],$this->f_array[$i]['raz']);


		$spisok_razdelov_tovar=new razdel_gift(0);


		$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;
		?>

		<?
		echo '<input id="hidden_id" type="hidden" value="'.$this->f_array[$i]['id'].'"><div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;"><input type="button" value="Сохранить" onclick="
		update_usl_resave(
		$(\'#hidden_id\'),
		$(\'#title_inf\'),
		$(\'#name_inf\'),
		$(\'#price_inf\'),
		$(\'#common_razdel > select\'),
		$(\'#common_podrazdel > select\'),
		$(\'#common_proiz > select\'),
		$(\'#super_inf\'),
		$(\'#market_inf\'),
		$(\'#nazakaz_inf\'),
		$(\'#local_del_inf\'),
		$(\'#bid_inf\'),
		$(\'#meta_description_inf\'),
		$(\'#meta_keywords_inf\'),
		$(\'#ref_1c_inf\'),
		CKEDITOR.instances.description_inf,
		CKEDITOR.instances.add_description_inf,
		CKEDITOR.instances.podrobno_inf,
	    CKEDITOR.instances.add_podrobno_inf,
		CKEDITOR.instances.text_modul_inf,
	    CKEDITOR.instances.add_text_modul_inf,
		$(\'#word_key_inf\'),
		$(\'#picture_inf\'),
		$(\'#gift_order\'),
		sop_tov,
		sop_usl)">
		<input type="button" value="Удалить" onclick="
		delete_usl(
		$(\'#hidden_id\'),
		sop_tov,
		sop_usl)">
		<input type="button" value="Копировать" onclick="window.location=\'http://www.filpan.ru/tools/copy_usl/index.php?id='.$this->f_array[$i]['id'].'\'">
		<input type="button" value="Вернуться к списку товаров" onclick="window.location=\'http://www.filpan.ru/tools/edit_uslugi/index.php\'">
		</div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Заголовок:<br>
		<textarea rows="4" cols="80" id="title_inf">'.$this->f_array[$i]['title'].'</textarea></div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Название позиции:<br>
		<textarea rows="4" cols="80" id="name_inf">'.
		$this->f_array[$i]['nazv']
		.'</textarea></div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Ссылка в базе 1с:<br>
		<textarea rows="4" cols="80" id="ref_1c_inf">'.
		$this->f_array[$i]['ref_1c']
		.'</textarea></div>';
		echo '<div style="overflow:auto; border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="float:left;">Цена позиции:
		<input style="width:40px;"

		id="price_inf" type="text" value="'.$this->f_array[$i]['price'].'"></div>';

		echo '<div style="float:left;"><div style="float:left;">Раздел:</div><div id="common_razdel" style="float:left;">';
		$spisok_razdelov->show();
		echo '</div></div>';
		echo '<div style="float:left;"><div style="float:left;">Подраздел:</div><div id="common_podrazdel" style="float:left;">';
		$spisok_podrazdelov->show();
		echo '</div></div>';
		echo '<div style="float:left;"><div style="float:left;">Производитель:</div><div id="common_proiz" style="float:left;">';
		$spisok_proiz->show();
		echo '</div></div></div>';


		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left;float:left;padding:10px">
		<img id="picture" width="150" src="http://'.$_SERVER['SERVER_NAME'].'/img/'.$this->f_array[$i]['pict'].'"></div>';
		echo '<iframe id="rFrame" name="rFrame" style="display: none">
		</iframe>
		<form action="handler.php" target="rFrame" method="POST"  enctype="multipart/form-data">
		<input type="file" name="loadfile">
		<input type="submit" value="Загрузить">
		</form>';
		echo '<div >Название картинки:<input id="picture_inf" type="text" value="'.$this->f_array[$i]['pict'].'"></div>';
		if ($this->f_array[$i]['super']==1)
		{
		$string='checked="checked"';
		}
		else
		{
		$string='';
		}

		echo '<div style="float:left;width:300px;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left">Добавить в суперпредложения:<input id="super_inf" type="checkbox" '.$string.'><div >Порядок отображения:<input id="gift_order" type="text" value="'.$this->f_array[$i]['superorder'].'"></div></div>';

		if ($this->f_array[$i]['mark']==1)
		{
		$string='checked="checked"';
		}
		else
		{
		$string='';
		}

		echo '<div >Добавить в ЯндексМаркет:<input id="market_inf" type="checkbox" '.$string.'></div>';
			if ($this->f_array[$i]['nazakaz']==1)
		{
		$string='checked="checked"';
		}
		else
		{
		$string='';
		}
		echo '<div >В наличии:<input id="nazakaz_inf" type="checkbox" '.$string.'></div>';
		echo '<div >Цена доставки:<input type="text" id="local_del_inf" value="'.$this->f_array[$i]['local_del'].'"></div>';
		echo '<div>Цена клика:<input type="text" id="bid_inf" value="'.$this->f_array[$i]['bid'].'"></div>';
		echo '<div>Ключевое слово:<input type="text" id="word_key_inf" value="'.$this->f_array[$i]['word_key'].'"></div></div></div>';



		echo '<div style="clear:left;overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left;float:left;">Meta описание:<br><textarea id="meta_description_inf" rows="5" cols="50">'.$this->f_array[$i]['db_description'].'</textarea></div>';
		echo '<div style="float:left;">Meta ключевые слова:<br><textarea id="meta_keywords_inf" rows="5" cols="50">'.$this->f_array[$i]['db_keywords'].'</textarea></div>';

		echo '<div style="clear:left;">Описание<br><textarea id="description_inf" class="ckeditor" rows="10" cols="80">'.$this->f_array[$i]['descr'].'</textarea></div>';
		echo '<div style="clear:left;">Дополнительно к описанию<br><textarea id="add_description_inf" class="ckeditor" rows="5" cols="80"></textarea></div>';
		echo '<div>Подробно<br><textarea id="podrobno_inf" class="ckeditor" rows="10" cols="80">'.$this->f_array[$i]['xcl'].'</textarea></div>';
		echo '<div>Дополнительно к подробно<br><textarea id="add_podrobno_inf" class="ckeditor" rows="5" cols="80"></textarea></div>';
		echo '<div>Модуль текста<br><textarea id="text_modul_inf" class="ckeditor" rows="10" cols="80">'.$this->f_array[$i]['text_modul'].'</textarea></div>';
		echo '<div>Дополнительно к модулю текста<br><textarea id="add_text_modul_inf" class="ckeditor" rows="5" cols="80"></textarea></div>';

		echo '<div style="clear:left;"><input type="button" value="Сохранить" onclick="
		update_usl_resave(
		$(\'#hidden_id\'),
		$(\'#title_inf\'),
		$(\'#name_inf\'),
		$(\'#price_inf\'),
		$(\'#common_razdel > select\'),
		$(\'#common_podrazdel > select\'),
		$(\'#common_proiz > select\'),
		$(\'#super_inf\'),
		$(\'#market_inf\'),
		$(\'#nazakaz_inf\'),
		$(\'#local_del_inf\'),
		$(\'#bid_inf\'),
		$(\'#meta_description_inf\'),
		$(\'#meta_keywords_inf\'),
			$(\'#ref_1c_inf\'),
		CKEDITOR.instances.description_inf,
		CKEDITOR.instances.add_description_inf,
		CKEDITOR.instances.podrobno_inf,
	    CKEDITOR.instances.add_podrobno_inf,
		CKEDITOR.instances.text_modul_inf,
	    CKEDITOR.instances.add_text_modul_inf,
		$(\'#word_key_inf\'),
		$(\'#picture_inf\'),
		$(\'#gift_order\'),
		sop_tov,
		sop_usl)">
		</div></div>';


		$spisok_razdelov_tovar=new razdel_gift(-1);
		$spisok_podrazdelov_tovar=new podrazdel_gift(0,-1);
		$spisok_proiz_tovar=new proiz_gift(0,-1);




		$spisok_razdelov_usl=new razdel_usl(-1);
		$spisok_podrazdelov_usl=new podrazdel_usl(0,-1);
		$spisok_proiz_usl=new proiz_usl(0,-1);




		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">';
		echo "<div id=\"razdel_tov\" style=\"float:left;overflow:auto;\">";
		$raz=$spisok_razdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"podrazdel_tov\" style=\"float:left;overflow:auto;\">";
		$podraz=$spisok_podrazdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"proiz_tov\" style=\"float:left;overflow:auto;\">";
		$proiz=$spisok_proiz_tovar->show();
		echo "</div>";


		echo '<div style="clear:left;">Сопутствующие товары:</div>';

		echo "<div id=\"tov_table\" style=\"overflow:auto;background-color:white;\">";
		$sub_gifts=new gifts(-1,-1,-1,0);
		$sop_tov=explode(";",$this->f_array[$i]['soptov']);
		$sub_gifts->show_soput_table($raz,$podraz,$proiz,$sop_tov);


		echo "</div>";
		echo '</div>';

		$sopuslugi_array=explode(";",$this->f_array[$i]['sopuslugi']);

		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"">';
		echo "<div id=\"razdel_usl\" style=\"float:left;overflow:auto;\">";
		$raz=$spisok_razdelov_usl->show();
		echo "</div>";
		echo "<div id=\"podrazdel_usl\" style=\"float:left;overflow:auto;\">";
		$podraz=$spisok_podrazdelov_usl->show();
		echo "</div>";
		echo "<div id=\"proiz_usl\" style=\"float:left;overflow:auto;\">";
		$proiz=$spisok_proiz_usl->show();
		echo "</div>";
		echo '<div style="clear:left;">Сопутствующие услуги:</div>';
		echo "<div id=\"usl_table\" style=\"overflow:auto;background-color:white;\">";
		$sub_gifts=new usl_gifts(-1,-1,-1,0);
		$sop_usl=explode(";",$this->f_array[$i]['sopuslugi']);
		$sub_gifts->show_soput_table($raz,$podraz,$proiz,$sop_usl);
		echo "</div>";

		echo '<div style="clear:left;"><input type="button" value="Сохранить" onclick="
		update_usl_resave(
		$(\'#hidden_id\'),
		$(\'#title_inf\'),
		$(\'#name_inf\'),
		$(\'#price_inf\'),
		$(\'#common_razdel > select\'),
		$(\'#common_podrazdel > select\'),
		$(\'#common_proiz > select\'),
		$(\'#super_inf\'),
		$(\'#market_inf\'),
		$(\'#nazakaz_inf\'),
		$(\'#local_del_inf\'),
		$(\'#bid_inf\'),
		$(\'#meta_description_inf\'),
		$(\'#meta_keywords_inf\'),
			$(\'#ref_1c_inf\'),
		CKEDITOR.instances.description_inf,
		CKEDITOR.instances.add_description_inf,
		CKEDITOR.instances.podrobno_inf,
	    CKEDITOR.instances.add_podrobno_inf,
		CKEDITOR.instances.text_modul_inf,
	    CKEDITOR.instances.add_text_modul_inf,
		$(\'#word_key_inf\'),
		$(\'#picture_inf\'),
		$(\'#gift_order\'),
		sop_tov,
		sop_usl)"></div>';

		echo '</div>';

		$i++;
		}
	}

	}


	function show_admin_copy()
	{


	if(count($this->f_array))
	{


		$i=0;
		while ($this->f_array[$i])
		{

		$spisok_razdelov=new razdel_usl($this->f_array[$i]['raz']);
		$spisok_podrazdelov=new podrazdel_usl($this->f_array[$i]['idraz'],$this->f_array[$i]['raz']);
		$spisok_proiz=new proiz_usl($this->f_array[$i]['proiz'],$this->f_array[$i]['raz']);


		$spisok_razdelov_tovar=new razdel_gift(0);


		$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;
		?>

		<?
		echo '<input id="hidden_id" type="hidden" value="'.$this->f_array[$i]['id'].'"><div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;"><input type="button" value="Сохранить" onclick="
		copy_usl(
		$(\'#hidden_id\'),
		$(\'#title_inf\'),
		$(\'#name_inf\'),
		$(\'#price_inf\'),
		$(\'#common_razdel > select\'),
		$(\'#common_podrazdel > select\'),
		$(\'#common_proiz > select\'),
		$(\'#super_inf\'),
		$(\'#market_inf\'),
		$(\'#nazakaz_inf\'),
		$(\'#local_del_inf\'),
		$(\'#bid_inf\'),
		$(\'#meta_description_inf\'),
		$(\'#meta_keywords_inf\'),
		$(\'#description_inf\'),
		$(\'#add_description_inf\'),
		$(\'#podrobno_inf\'),
	    $(\'#add_podrobno_inf\'),
		$(\'#text_modul_inf\'),
	    $(\'#add_text_modul_inf\'),
		$(\'#word_key_inf\'),
		$(\'#picture_inf\'),
		sop_tov,
		sop_usl)">
		<input type="button" value="Вернуться к списку товаров" onclick="window.location=\'http://www.filpan.ru/tools/edit_uslugi/index.php\'">
		</div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Заголовок:<br>
		<textarea rows="4" cols="80" id="title_inf">'.$this->f_array[$i]['title'].'</textarea></div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Название позиции:<br>
		<textarea rows="4" cols="80" id="name_inf">'.
		$this->f_array[$i]['nazv']
		.'</textarea></div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Ссылка в базе 1с:<br>
		<textarea rows="4" cols="80" id="ref_1c_inf">'.
		$this->f_array[$i]['ref_1c']
		.'</textarea></div>';
		echo '<div style="overflow:auto; border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="float:left;">Цена позиции:
		<input style="width:40px;"

		id="price_inf" type="text" value="'.$this->f_array[$i]['price'].'"></div>';

		echo '<div style="float:left;"><div style="float:left;">Раздел:</div><div id="common_razdel" style="float:left;">';
		$spisok_razdelov->show();
		echo '</div></div>';
		echo '<div style="float:left;"><div style="float:left;">Подраздел:</div><div id="common_podrazdel" style="float:left;">';
		$spisok_podrazdelov->show();
		echo '</div></div>';
		echo '<div style="float:left;"><div style="float:left;">Производитель:</div><div id="common_proiz" style="float:left;">';
		$spisok_proiz->show();
		echo '</div></div></div>';


		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left;float:left;padding:10px"><img id="picture" width="150" src="http://'.$_SERVER['SERVER_NAME'].'/img/'.$this->f_array[$i]['pict'].'"></div>';
		echo '<iframe id="rFrame" name="rFrame" style="display: none">
		</iframe>
		<form action="handler.php" target="rFrame" method="POST"  enctype="multipart/form-data">
		<input type="file" name="loadfile">
		<input type="submit" value="Загрузить">
		</form>';
		echo '<div >Название картинки:<input id="picture_inf" type="text" value="'.$this->f_array[$i]['pict'].'"></div>';
		if ($this->f_array[$i]['super']==1)
		{
		$string='checked="checked"';
		}
		else
		{
		$string='';
		}

		echo '<div style="float:left;width:300px;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left">Добавить в суперпредложения:<input id="super_inf" type="checkbox" '.$string.'></div>';

		if ($this->f_array[$i]['mark']==1)
		{
		$string='checked="checked"';
		}
		else
		{
		$string='';
		}

		echo '<div >Добавить в ЯндексМаркет:<input id="market_inf" type="checkbox" '.$string.'></div>';
			if ($this->f_array[$i]['nazakaz']==1)
		{
		$string='checked="checked"';
		}
		else
		{
		$string='';
		}
		echo '<div >В наличии:<input id="nazakaz_inf" type="checkbox" '.$string.'></div>';
		echo '<div >Цена доставки:<input type="text" id="local_del_inf" value="'.$this->f_array[$i]['local_del'].'"></div>';
		echo '<div>Цена клика:<input type="text" id="bid_inf" value="'.$this->f_array[$i]['bid'].'"></div>';
		echo '<div>Ключевое слово:<input type="text" id="word_key_inf" value="'.$this->f_array[$i]['word_key'].'"></div></div></div>';



		echo '<div style="clear:left;overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left;float:left;">Meta описание:<br><textarea id="meta_description_inf" rows="5" cols="50">'.$this->f_array[$i]['db_description'].'</textarea></div>';
		echo '<div style="float:left;">Meta ключевые слова:<br><textarea id="meta_keywords_inf" rows="5" cols="50">'.$this->f_array[$i]['db_keywords'].'</textarea></div>';

		echo '<div style="clear:left;">Описание<br><textarea id="description_inf" rows="10" cols="80">'.$this->f_array[$i]['descr'].'</textarea></div>';
		echo '<div style="clear:left;">Дополнительно к описанию<br><textarea id="add_description_inf" rows="5" cols="80"></textarea></div>';
		echo '<div>Подробно<br><textarea id="podrobno_inf" rows="10" cols="80">'.$this->f_array[$i]['xcl'].'</textarea></div>';
		echo '<div>Дополнительно к подробно<br><textarea id="add_podrobno_inf" rows="5" cols="80"></textarea></div>';
		echo '<div>Модуль текста<br><textarea id="text_modul_inf" rows="10" cols="80">'.$this->f_array[$i]['text_modul'].'</textarea></div>';
		echo '<div>Дополнительно к модулю текста<br><textarea id="add_text_modul_inf" rows="5" cols="80"></textarea></div>';

		echo '<div style="clear:left;"><input type="button" value="Сохранить" onclick="
		update_usl(
		$(\'#hidden_id\'),
		$(\'#title_inf\'),
		$(\'#name_inf\'),
		$(\'#price_inf\'),
		$(\'#common_razdel > select\'),
		$(\'#common_podrazdel > select\'),
		$(\'#common_proiz > select\'),
		$(\'#super_inf\'),
		$(\'#market_inf\'),
		$(\'#nazakaz_inf\'),
		$(\'#local_del_inf\'),
		$(\'#bid_inf\'),
		$(\'#meta_description_inf\'),
		$(\'#meta_keywords_inf\'),
		$(\'#description_inf\'),
		$(\'#add_description_inf\'),
		$(\'#podrobno_inf\'),
	    $(\'#add_podrobno_inf\'),
		$(\'#text_modul_inf\'),
	    $(\'#add_text_modul_inf\'),
		$(\'#word_key_inf\'),
		$(\'#picture_inf\'),
		sop_tov,
		sop_usl)"></div></div>';


		$spisok_razdelov_tovar=new razdel_gift(-1);
		$spisok_podrazdelov_tovar=new podrazdel_gift(0,-1);
		$spisok_proiz_tovar=new proiz_gift(0,-1);




		$spisok_razdelov_usl=new razdel_usl(-1);
		$spisok_podrazdelov_usl=new podrazdel_usl(0,-1);
		$spisok_proiz_usl=new proiz_usl(0,-1);




		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">';
		echo "<div id=\"razdel_tov\" style=\"float:left;overflow:auto;\">";
		$raz=$spisok_razdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"podrazdel_tov\" style=\"float:left;overflow:auto;\">";
		$podraz=$spisok_podrazdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"proiz_tov\" style=\"float:left;overflow:auto;\">";
		$proiz=$spisok_proiz_tovar->show();
		echo "</div>";


		echo '<div style="clear:left;">Сопутствующие товары:</div>';

		echo "<div id=\"tov_table\" style=\"overflow:auto;background-color:white;\">";
		$sub_gifts=new gifts(-1,-1,-1,0);
		//$sop_tov=explode(";",$this->f_array[$i]['soptov']);
		$sop_tov=array();
		$sub_gifts->show_soput_table_copy(-1,-1,-1,$sop_tov);


		echo "</div>";
		echo '</div>';

		//$sopuslugi_array=explode(";",$this->f_array[$i]['sopuslugi']);
		$sopuslugi_array=array();
		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"">';
		echo "<div id=\"razdel_usl\" style=\"float:left;overflow:auto;\">";
		$raz=$spisok_razdelov_usl->show();
		echo "</div>";
		echo "<div id=\"podrazdel_usl\" style=\"float:left;overflow:auto;\">";
		$podraz=$spisok_podrazdelov_usl->show();
		echo "</div>";
		echo "<div id=\"proiz_usl\" style=\"float:left;overflow:auto;\">";
		$proiz=$spisok_proiz_usl->show();
		echo "</div>";
		echo '<div style="clear:left;">Сопутствующие услуги:</div>';
		echo "<div id=\"usl_table\" style=\"overflow:auto;background-color:white;\">";
		$sub_gifts=new usl_gifts(-1,-1,-1,0);
		//$sop_usl=explode(";",$this->f_array[$i]['sopuslugi']);
		$sop_usl=array();
		$sub_gifts->show_soput_table_copy(-1,-1,-1,$sop_usl);
		echo "</div>";

		echo '<div style="clear:left;"><input type="button" value="Сохранить" onclick="
		update_usl(
		$(\'#hidden_id\'),
		$(\'#title_inf\'),
		$(\'#name_inf\'),
		$(\'#price_inf\'),
		$(\'#common_razdel > select\'),
		$(\'#common_podrazdel > select\'),
		$(\'#common_proiz > select\'),
		$(\'#super_inf\'),
		$(\'#market_inf\'),
		$(\'#nazakaz_inf\'),
		$(\'#local_del_inf\'),
		$(\'#bid_inf\'),
		$(\'#meta_description_inf\'),
		$(\'#meta_keywords_inf\'),
		$(\'#description_inf\'),
		$(\'#add_description_inf\'),
		$(\'#podrobno_inf\'),
	    $(\'#add_podrobno_inf\'),
		$(\'#text_modul_inf\'),
	    $(\'#add_text_modul_inf\'),
		$(\'#word_key_inf\'),
		$(\'#picture_inf\'),
		sop_tov,
		sop_usl)"></div>';

		echo '</div>';

		$i++;
		}
	}

	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function show_title()
	{
	if(	mb_strlen($this->f_array[0]['title']))
	{
	return str_replace("_***_",$this->f_array[0]['word_key'],$this->f_array[0]['title']);
	}
	else
	{
	return read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/uslfind_element/default_title.txt");
	}
	}

	function show_description()
	{
	if(	mb_strlen($this->f_array[0]['db_description']))
	{
	//return $this->f_array['db_description'];
    return str_replace("_***_",$this->f_array[0]['word_key'],$this->f_array[0]['db_description']);

	}
	else
	{
	return read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/uslfind_element/default_description.txt");
	}
	}

	function show_keywords()
	{
	if(	mb_strlen($this->f_array[0]['db_keywords']))
	{
	//return $this->f_array['db_keywords'];
	return str_replace("_***_",$this->f_array[0]['word_key'],$this->f_array[0]['db_keywords']);
	}
	else
	{
	return read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/page_description/uslfind_element/default_keywords.txt");
	}

	}



	function show_user_soput_table_gifts()
	{

	if(empty($this->f_array[0]['soptov'])==1)
	{return;}
	$iterator=0;
	$sop_tov=explode(";",$this->f_array[0]['soptov']);

    echo "<div style=\"clear:left\">";
	echo "<div class=\"sop_tov_usl\"><div style='font-weight:bold;font-size: 1.17em;'>Сопутствующие товары:</div></div>";
	while($sop_tov[$iterator])
	{
	echo "<div class=\"sub_content\">\n";
	$gift_elem=new gift_element($sop_tov[$iterator]);
	$new_price=ceil(($gift_elem->f_array[0]['price']*$this->kurs)/10)*10;
	//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$gift_elem->f_array[0]['id']."&raz=".$gift_elem->f_array[0]['idraz']."&view=1";
	//$href= "http://".$_SERVER['SERVER_NAME']."/find.php?id=".$gift_elem->f_array[0]['id']."&raz=".$gift_elem->f_array[0]['raz']."&podc=".$gift_elem->f_array[0]['idraz']."&dopp=".$gift_elem->f_array[0]['proiz']."&view=1";
	$href=get_chpu_url($gift_elem->f_array[0]['id'],$gift_elem->f_array[0]['nazv'],$type='1');

$short_nazv= substr(str_replace ("_***_",$gift_elem->f_array[0]['word_key'],$gift_elem->f_array[0]['nazv']),0,80)."...";
	echo "
	<div style=\"float:left\"><a href=\"".$href."\" class=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$gift_elem->f_array[0]['pict']."\""." alt=\"".str_replace ("_***_",$gift_elem->f_array[0]['word_key'],$gift_elem->f_array[0]['nazv'])."\"   class=\"super_img_gift\"></a></div>";

	echo "<div style=\"float:left;width:120px;margin-left:10px;\"><a href=\"".$href."\" class=\"super_link\">".$short_nazv."</a>";
	echo "<div style=\"height:30px;\">\n";
		echo "<br>Цена: <span class=\"super_orange_text\">".$new_price." руб.</span>";
		echo "</div>\n";
	echo "<div style=\"height:30px;\">Кол-во
	  <input id=\"kolichestvo_".$gift_elem->f_array[0]['id']."\"  type=\"text\"  value=\"1\" size=\"2\" class=\"input_window\" ></div>";
		echo "<div onclick=\"buy_gift(".$gift_elem->f_array[0]['id'].","."'".str_replace ("_***_",$gift_elem->f_array[0]['word_key'],$gift_elem->f_array[0]['nazv'])."'".
				",document.getElementById('"."kolichestvo_"
				.$gift_elem->f_array[0]['id']."').value,"
				.$new_price.")\" style=\"cursor:pointer;width:80px;\">\n";
		echo "<img src=\"http://www.filpan.ru/images/right_content/korz.gif\" class=\"img_korzina\">\n";
		echo "</div>\n";
	echo "</div>";

	echo "</div>";
	$iterator++;
	}
	echo "</div>";
	}

	function show_user_soput_table_uslugi()
	{
	if(empty($this->f_array[0]['sopuslugi'])==1)
	{return;}
	$iterator=0;
	$sop_usl=explode(";",$this->f_array[0]['sopuslugi']);

     echo "<div style=\"clear:left\">";
	echo "<div class=\"sop_tov_usl\"><div style='font-weight:bold;font-size: 1.17em;'>Сопутствующие услуги:</div></div>";
	while($sop_usl[$iterator])
	{
	echo "<div class=\"sub_content\">\n";
	$usl_elem=new usl_gift_element($sop_usl[$iterator]);
	$new_price=ceil(($usl_elem->f_array[0]['price']*$this->kurs)/10)*10;
	//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$usl_elem->f_array[0]['id']."&raz=".$usl_elem->f_array[0]['raz']."&podc=".$usl_elem->f_array[0]['idraz']."&dopp=".$usl_elem->f_array[0]['proiz']."&view=1&usl=1";
	$href=get_chpu_url($usl_elem->f_array[0]['id'],$usl_elem->f_array[0]['nazv'],$type='2');

	//$href= "http://".$_SERVER['SERVER_NAME']."/uslfind.php?id=".$usl_elem->f_array[0]['id']."&raz=".$usl_elem->f_array[0]['idraz']."&view=1&usl=1";
	$short_nazv= substr(str_replace ("_***_",$usl_elem->f_array[0]['word_key'],$usl_elem->f_array[0]['nazv']),0,80)."...";
	echo "
	<div style=\"float:left\"><a href=\"".$href."\" class=\"\"><img src=\"http://".$_SERVER['SERVER_NAME']."/img/".$usl_elem->f_array[0]['pict']."\""." alt=\"".str_replace ("_***_",$usl_elem->f_array[0]['word_key'],$usl_elem->f_array[0]['nazv'])."\"   class=\"super_img_gift\"></a></div>";

	echo "<div style=\"float:left;width:120px;margin-left:10px;\"><a href=\"".$href."\" class=\"super_link\">".$short_nazv."</a>";
	echo "<div style=\"height:30px;\">\n";
		echo "<br>Цена: <span class=\"super_orange_text\">".$usl_elem->f_array[0]['price']." руб.</span>";
		echo "</div>\n";
	echo "<div style=\"height:30px;\">Кол-во
	  <input id=\"kolichestvo_".$usl_elem->f_array[0]['id']."\"  type=\"text\" size=\"2\"  value=\"1\" class=\"input_window\" ></div>";
		echo "<div onclick=\"buy_gift(".$usl_elem->f_array[0]['id'].","."'".str_replace ("_***_",$usl_elem->f_array[0]['word_key'],$usl_elem->f_array[0]['nazv'])."'".
				",document.getElementById('"."kolichestvo_"
				.$usl_elem->f_array[0]['id']."').value,"
				.$usl_elem->f_array[0]['price'].")\" style=\"cursor:pointer;width:80px;\">\n";
		echo "<img src=\"http://www.filpan.ru/images/right_content/korz.gif\" class=\"img_korzina\">\n";
		echo "</div>\n";
	echo "</div>";

	echo "</div>";
	$iterator++;
	}
	echo "</div>";
	}




	function show_js_arrays()
	{
	$sop_tov=explode(";",$this->f_array[0]['soptov']);
	$sop_uslugi=explode(";",$this->f_array[0]['sopuslugi']);

	$sop_tov_size=count($sop_tov);
	$tov_st='';
	for($iterator_tov=0;$iterator_tov<$sop_tov_size;$iterator_tov++)
	{
	if($sop_tov[$iterator_tov]==''){break;}

		if($iterator_tov==0)
		{
		$tov_str.=$sop_tov[$iterator_tov];
		}
		else
		{
		$tov_str.=",".$sop_tov[$iterator_tov];

		}
	}

	$tov_str='sop_tov=['.$tov_str.'];';


	$sop_usl_size=count($sop_uslugi);
	$usl_st='';
	for($iterator_usl=0;$iterator_usl<$sop_usl_size;$iterator_usl++)
	{
	if($sop_uslugi[$iterator_usl]==''){break;}

		if($iterator_usl==0)
		{
		$usl_str.=$sop_uslugi[$iterator_usl];
		}
		else
		{
		$usl_str.=",".$sop_uslugi[$iterator_usl];

		}
	}

	$usl_str='sop_usl=['.$usl_str.'];';


	echo $usl_str.$tov_str;

	}



	function deleting()
	{
	//
		$sop_tov=explode(";", $this->f_array[0]['soptov']);

		for($iterator=0;$sop_tov[$iterator];$iterator++)
		{
		if($sop_tov[$iterator]==""){continue;}
		$sop_gift=$sop_tov[$iterator];
		$gift=new gift_element($sop_gift);
		$gift->delete_from_sop_usl($this->f_array[0]['id']);
		}

		$sop_usl=explode(";", $this->f_array[0]['sopuslugi']);

		for($iterator=0;$sop_usl[$iterator];$iterator++)
		{
		if($sop_usl[$iterator]==""){continue;}
		$sop_usl=$sop_usl[$iterator];
		$gift=new usl_gift_element($sop_usl);
		$gift->delete_from_sop_usl($this->f_array[0]['id']);
		}



	}

		function delete_from_sop_usl($id)
	{
	$sop_tov=explode(";", $this->f_array[0]['sopuslugi']);

	$new_array=array();
	for($iterator=0;$sop_tov[$iterator];$iterator++)
		{
		if($sop_tov[$iterator]==""){continue;}
		$sop_gift=$sop_tov[$iterator];
		if($sop_gift!=$id)
		{
		array_push($new_array,$sop_gift);
		}
		}
		$out_new_array=implode(";",$new_array);

	    $db=new db_connection();
		 $db->query="UPDATE uslsodraz SET sopuslugi='".$out_new_array."' WHERE id=".$this->f_array[0]['id'];
		 $db->current_datebases();
		 $db->set_query();
		 $db->close_connection();
	}

		function delete_from_sop_tov($id)
	{
	$sop_tov=explode(";", $this->f_array[0]['soptov']);

	$new_array=array();
	for($iterator=0;$sop_tov[$iterator];$iterator++)
		{
		if($sop_tov[$iterator]==""){continue;}
		$sop_gift=$sop_tov[$iterator];
		if($sop_gift!=$id)
		{
		array_push($new_array,$sop_gift);
		}
		}
		$out_new_array=implode(";",$new_array);

	    $db=new db_connection();
		 $db->query="UPDATE uslsodraz SET soptov='".$out_new_array."' WHERE id=".$this->f_array[0]['id'];
		 $db->current_datebases();
		 $db->set_query();
		 $db->close_connection();
	}
}
?>
