<?
if ($_COOKIE['filpan_access']=='yes')
{
?>
<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require_js.php");?>
<script src="http://www.filpan.ru/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="http://www.filpan.ru/AjexFileManager/ajex.js"></script>
<script>

$('document').ready(function(){initial()});

sop_tov=[];
sop_usl=[];

 function onResponse(d) {  
 eval('var obj = ' + d + ';');  
// alert('Файл ' + obj.filename + (obj.success ? " " : " НЕ ") +  
 //   "загружен.");  
	element=document.getElementById("picture_inf");
	element.value=obj.newfilename;
	
	element=document.getElementById("picture");
	element.src="http://www.filpan.ru/img/"+obj.newfilename;
	//alert(element.src);
 }  

function set_checkes_gift()
{

checkboxs=$('input[class|="tov_checkbox"]');

sz_checkbox=checkboxs.length;
sz_sop_tov=sop_tov.length;


for(checkbox_iterator=0;checkbox_iterator<sz_checkbox;checkbox_iterator++)
{



				for(sop_tov_iterator=0;sop_tov_iterator<sz_sop_tov;sop_tov_iterator++)
				{
				input_id=checkboxs[checkbox_iterator].id;
				real_id=input_id.match("[0-9]+");
				if(real_id==sop_tov[sop_tov_iterator])
				{	
				checkboxs[checkbox_iterator].checked=true;
				}
				}

}
}

function set_checkes_usl()
{

checkboxs=$('input[class|="usl_checkbox"]');

sz_checkbox=checkboxs.length;
sz_sop_usl=sop_usl.length;


for(checkbox_iterator=0;checkbox_iterator<sz_checkbox;checkbox_iterator++)
{



				for(sop_usl_iterator=0;sop_usl_iterator<sz_sop_usl;sop_usl_iterator++)
				{
				input_id=checkboxs[checkbox_iterator].id;
				real_id=input_id.match("[0-9]+");
				if(real_id==sop_usl[sop_usl_iterator])
				{	
				checkboxs[checkbox_iterator].checked=true;
				}
				}

}
}

function initial()
{
mark_change();
out_array=$('#common_razdel > select').live('change',
 function()
 {
 out_array=$('#common_razdel > select');
$.ajax
	 (
		 {
		   type: "POST",
		   url: "common_razdel_usl.php",
		   data: "raz="+out_array[0].value,
		   success: function(msg)
				   {
					$('#common_podrazdel')[0].innerHTML=msg;
				   }
		}
	);
	$.ajax
	 (
		 {
		   type: "POST",
		   url: "common_podrazdel_usl.php",
		   data: "raz="+out_array[0].value,
		   success: function(msg)
				   {
					$('#common_proiz')[0].innerHTML=msg;
				   }
		}
	);
 });
 
 
  //При изменении списка группы сопутствующих товаров
 out_array_subtov=$('#razdel_tov > select').live('change',
 function()
 {
 
 out_array=$('#razdel_tov > select');
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "common_razdel.php",
		   data: "raz="+out_array[0].value,
		   success: function(msg)
				   {
					$('#podrazdel_tov')[0].innerHTML=msg;				
				   }
		}
	);
	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "common_podrazdel.php",
		   data: "raz="+out_array[0].value,
		   success: function(msg)
				   {
					$('#proiz_tov')[0].innerHTML=msg

				   }
		}
  )
  
    out_array_raz=$('#razdel_tov > select');
	out_array_podraz=$('#podrazdel_tov > select');
	out_array_proiz=$('#proiz_tov > select');
	hidden_id=$('#hidden_id');
	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "sub_tov_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0,
		   success: function(msg)
					{
					
					$('#tov_table')[0].innerHTML=msg;
					set_checkes_gift();
					 }
		}
	);
 });
 
   out_array_subtov_podraz=$('#podrazdel_tov > select').live('change',
 function()
 {
	out_array_raz=$('#razdel_tov > select');
	out_array_podraz=$('#podrazdel_tov > select');
	out_array_proiz=$('#proiz_tov > select');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "sub_tov_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0,
		   success: function(msg)
					{
					
					$('#tov_table')[0].innerHTML=msg;
					set_checkes_gift();
					 }
		}
	);
	
	
 });
 
   //При изменении списка производителей сопутствующих товаров
  out_array_subtov_proiz=$('#proiz_tov > select').live('change',
 function()
 {
	out_array_raz=$('#razdel_tov > select');
	out_array_podraz=$('#podrazdel_tov > select');
	out_array_proiz=$('#proiz_tov > select');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "sub_tov_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0,
		   success: function(msg)
					{
					
					$('#tov_table')[0].innerHTML=msg;
					set_checkes_gift();
					 }
		}
	);
	
	
 });
 
 out_array_subusl=$('#razdel_usl > select').live('change',
 function()
 {
 out_array=$('#razdel_usl > select');
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "common_razdel_usl.php",
		   data: "raz="+out_array[0].value,
		   success: function(msg)
				   {
					$('#podrazdel_usl')[0].innerHTML=msg;				
				   }
		}
	);
	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "common_podrazdel_usl.php",
		   data: "raz="+out_array[0].value,
		   success: function(msg)
				   {
					$('#proiz_usl')[0].innerHTML=msg

				   }
		}
	);
	
	
	
	out_array_raz=$('#razdel_usl > select');
	out_array_podraz=$('#podrazdel_usl > select');
	out_array_proiz=$('#proiz_usl > select');
	hidden_id=$('#hidden_id');
	
	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
					set_checkes_usl();
					 }
		}
	);});
 
  out_array_subusl_podraz=$('#podrazdel_usl > select').live('change',
 function()
 {
	out_array_raz=$('#razdel_usl > select');
	out_array_podraz=$('#podrazdel_usl > select');
	out_array_proiz=$('#proiz_usl > select');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
					set_checkes_usl();
					 }
		}
	);
	
	
 });
 
 //При изменении списка производителей сопутствующих товаров
  out_array_subusl_proiz=$('#proiz_usl > select').live('change',
 function()
 {
	out_array_raz=$('#razdel_usl > select');
	out_array_podraz=$('#podrazdel_usl > select');
	out_array_proiz=$('#proiz_usl > select');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
					set_checkes_usl();
					 }
		}
	);
	
	
 });
 
 }



</script>
<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="styles/common_style.css" />
<Title>
Добавить услугу
</Title>
</head> 
<body style="background-color:LightGrey;">


	
<?
		
		$spisok_razdelov=new razdel_usl(0);
		$spisok_podrazdelov=new podrazdel_usl(0,1);
		$spisok_proiz=new proiz_usl(0,1);
	
		
		
		
		
		
		
		
		//$new_price=ceil(($this->f_array[$i]['price']*$this->kurs)/10)*10;
		?>
		<script>
		kurs=<?echo read_fl($_SERVER['DOCUMENT_ROOT'].'/site_information/kurs.txt');?>;
		</script>
		<?
		echo '<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;"><input type="button" value="Сохранить" onclick="
		add_usl(
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
		</div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Заголовок:<br>
		<textarea rows="4" cols="80" id="title_inf"></textarea></div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Название позиции:<br>
		<textarea rows="4" cols="80" id="name_inf"></textarea></div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Ссылка в базе 1с:<br>
		<textarea rows="4" cols="80" id="ref_1c_inf"></textarea></div>';
		echo '<div style="overflow:auto; border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="float:left;">Цена позиции:
		

		<input id="price_inf" style="width:40px;"
		
		type="text" value=""> 

		руб.</div>';
		
		echo '<div style="float:left;"><div style="float:left;">Раздел:</div><div id="common_razdel" style="float:left;">';
		$spisok_razdelov->show();
		echo '</div></div>';
		echo '<div style="float:left;"><div style="float:left;">Подраздел:</div><div id="common_podrazdel" style="float:left;">';
		$spisok_podrazdelov->show();
		echo '</div></div>';
		echo '<div style="float:left;"><div style="float:left;">Производитель:</div><div id="common_proiz" style="float:left;">';
		$spisok_proiz->show();
		echo '</div></div></div>';
		
		
		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="width:150px;height:150px;;clear:left;float:left;padding:10px;border:1px solid black;"><img id="picture" width="150" src=""></div>';
			
		
echo '<iframe id="rFrame" name="rFrame" style="display: none">  
</iframe>  
<form action="handler.php" target="rFrame" method="POST"  enctype="multipart/form-data">  
<input type="file" name="loadfile">  
<input type="submit" value="Загрузить">  
</form>';  
		
		
		
		echo '<div >Название картинки:<input id="picture_inf" type="text" value=""></div>';
		echo '<div style="float:left;width:300px;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left">Добавить в суперпредложения:<input id="super_inf" type="checkbox" ></div>';
		
		

		echo '<div >Добавить в ЯндексМаркет:<input id="market_inf" type="checkbox"></div>';
		echo '<div >В наличии:<input id="nazakaz_inf" type="checkbox"></div>';
		echo '<div >Цена доставки:<input type="text" id="local_del_inf" value=""></div>';
		echo '<div>Цена клика:<input type="text" id="bid_inf" value=""></div>';
		echo '<div>Ключевое слово:<input type="text" id="word_key_inf" value=""></div></div></div>';
		
		
		
		
		echo '<div style="clear:left;overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><div style="clear:left;float:left;">Meta описание:<br><textarea id="meta_description_inf" rows="5" cols="50"></textarea></div>';
		echo '<div style="float:left;">Meta ключевые слова:<br><textarea id="meta_keywords_inf" rows="5" cols="50"></textarea></div>';
		
		echo '<div style="clear:left;">Описание<br><textarea id="description_inf" class="ckeditor" rows="10" cols="80"></textarea></div>';
		echo '<div style="clear:left;">Дополнительно к описанию<br><textarea class="ckeditor" id="add_description_inf" rows="5" cols="80"></textarea></div>';
		echo '<div>Подробно<br><textarea class="ckeditor" id="podrobno_inf" rows="10" cols="80"></textarea></div>';
		echo '<div>Дополнительно к подробно<br><textarea class="ckeditor" id="add_podrobno_inf" rows="5" cols="80"></textarea></div>';
		echo '<div>Модуль текста<br><textarea class="ckeditor" id="text_modul_inf" rows="10" cols="80"></textarea></div>';
		echo '<div>Дополнительно к модулю текста<br><textarea class="ckeditor" id="add_text_modul_inf" rows="5" cols="80"></textarea></div>';
		echo '<div ><input type="button" value="Сохранить" onclick="
		add_usl(
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
	
		$spisok_razdelov_tovar=new razdel_gift(0);
		$spisok_podrazdelov_tovar=new podrazdel_gift(0,1);
		$spisok_proiz_tovar=new proiz_gift(0,1);
		
		
		
		
		$spisok_razdelov_usl=new razdel_usl(0);
		$spisok_podrazdelov_usl=new podrazdel_usl(0,1);
		$spisok_proiz_usl=new proiz_usl(0,1);
		
			
		
		
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
		$sub_gifts=new gifts($raz,$podraz,$proiz,0);

		$sub_gifts->show_soput_table($raz,$podraz,$proiz,array());
		
		
		echo "</div>";
		echo '</div>';
		
	

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

		$sub_gifts->show_soput_table(-1,-1,-1,array());
		echo "</div>";
		echo '<div ><input type="button" value="Сохранить" onclick="
		add_usl(
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
	
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/javascript_functions/jq.js");?>


</body>
<?}?>
