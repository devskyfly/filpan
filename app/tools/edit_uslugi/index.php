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

function name_load(ob)
{ 
 eval('var obj = ' + ob + ';');  
 descr_text=$('#name_text');
descr_text[0].value=obj.descr;	
}

function title_load(ob)
{ 
 eval('var obj = ' + ob + ';');  
 descr_text=$('#title_text');
descr_text[0].value=obj.descr;	
}

function descr_load(ob)
{ 
 eval('var obj = ' + ob + ';');  
 /*descr_text=$('#descr_text');
descr_text[0].value=obj.descr;*/	
CKEDITOR.instances.descr_text.setData(obj.descr);
}

function description_load(ob)
{ 
 eval('var obj = ' + ob + ';');  
 descr_text=$('#description_text');
descr_text[0].value=obj.descr;	
}

function podrobno_load(ob)
{ 
 eval('var obj = ' + ob + ';');  
// descr_text=$('#podrobno_text');
//descr_text[0].value=obj.descr;	

CKEDITOR.instances.podrobno_text.setData(obj.descr);
}

function keywords_load(ob)
{ 
 eval('var obj = ' + ob + ';');  
 descr_text=$('#keywords_text');
descr_text[0].value=obj.descr;	
}



sop_tov=[];
sop_usl=[];

var sop_tov_keyword=[];
var sop_usl_keyword=[];

var sop_tov_price=[];
var sop_usl_price=[];

var sop_usl_mark=[];
var sop_usl_nazakaz=[];

$('document').ready(function(){initial();});



function set_checkes()
{

checkboxs=$('input[type|="checkbox"]');

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
				document.getElementById("usl_keyword_"+real_id).value=sop_usl_keyword[sop_usl_iterator];
				}
				}

}
}


function save_addition()
{
sop_usl_size=sop_usl.length;
for(iterator=0;iterator<sop_usl_size;iterator++)
{
mark=0;

if(sop_usl_mark[iterator]==true)
{
mark=1;

}

nazakaz=0;

if(sop_usl_nazakaz[iterator]==true)
{
nazakaz=1;

}
name_text=$("#name_text");
title_text=$("#title_text");
descr_text=$("#descr_text");
	 podrobno_text=$("#podrobno_text");
	 description_text=$("#description_text");
	 keywords_text=$("#keywords_text");
	 
	 name_checkbox=$("#checkbox_name");
	 title_checkbox=$("#checkbox_title");
	 descr_checkbox=$("#checkbox_descr");
	 podrobno_checkbox=$("#checkbox_podrobno");
	 description_checkbox=$("#checkbox_description");
	 keywords_checkbox=$("#checkbox_keywords");
	 
	 name_text_val=name_text[0].value;
	 title_text_val=title_text[0].value;
	 descr_text_val=descr_text[0].value;
	// descr_text_val=descr_text_val.replace("\"","&#34;");
	// descr_text_val=descr_text_val.replace("\'","&#39;");
	 podrobno_text_val=CKEDITOR.instances.podrobno_text.getData();
	// podrobno_text_val=podrobno_text_val.replace("\"","&#34;");
	// podrobno_text_val=podrobno_text_val.replace("\'","&#39;");
    description_text_val=description_text[0].value;
	// description_text_val=description_text_val.replace("\"","&#34;");
	 //description_text_val=description_text_val.replace("\'","&#39;");
	 
	 keywords_text_val=keywords_text[0].value;
	 //keywords_text_val=keywords_text_val.replace("\"","&#34;");
	// keywords_text_val=keywords_text_val.replace("\'","&#39;");
	 
$.ajax
	 (
	 
		 {
		   type: "POST",
		   async:false,
		   url: "save_addition.php",
		   data: 
		    "&name="+encodeURIComponent(name_text_val)+
		    "&title="+encodeURIComponent(title_text_val)+
		   "&descr="+encodeURIComponent(descr_text_val)+
		   "&podrobno="+encodeURIComponent(podrobno_text_val)+
		   "&description="+encodeURIComponent(description_text_val)+
		   "&keywords="+encodeURIComponent(keywords_text_val)+
		   "&checkbox_name="+name_checkbox[0].checked+
		   "&checkbox_title="+title_checkbox[0].checked+
		   "&checkbox_descr="+descr_checkbox[0].checked+
		   "&checkbox_podrobno="+podrobno_checkbox[0].checked+
		   "&checkbox_description="+description_checkbox[0].checked+
		   "&checkbox_keywords="+keywords_checkbox[0].checked+
		    "&keyword="+sop_usl_keyword[iterator]+
			"&price="+sop_usl_price[iterator]+
		     "&mark="+mark+
			"&nazakaz="+nazakaz+
		   "&id="+sop_usl[iterator],
		   success: function(msg)
				   {
				   //alert(msg);
				   }
		}
  )
  
  }
  $.ajax
	 (
		{
		   type: "POST",
		   async:false,
		   url: "update_market.php",
		   data: "",
		   success: function(){}
		}
	 )
  alert("Позиции редактированы");
}





function initial()
{
var ckeditor1 = CKEDITOR.replace('descr_text');
AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});

var ckeditor1 = CKEDITOR.replace('podrobno_text');
AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});

sel_all=$('#select_all').live('change',function()
{
if(sel_all[0].checked==true)
{
hidden_ar=$('.hidden_id');
for(iterator=0;iterator<hidden_ar.length;iterator++)
{

checkbox=$('#checkboxtov_'+hidden_ar[iterator].value);

price=$('#usl_price_'+hidden_ar[iterator].value);
keyword=$('#usl_keyword_'+hidden_ar[iterator].value);
mark=$('#usl_mark_'+hidden_ar[iterator].value);
nazakaz=$('#usl_nal_'+hidden_ar[iterator].value);

if(checkbox[0].checked==true)
{
sop_usl_update_with_key_word(checkbox[0],hidden_ar[iterator].value,keyword[0].value,price[0].value,mark[0],nazakaz[0]);
sop_usl_update_with_key_word(checkbox[0],hidden_ar[iterator].value,keyword[0].value,price[0].value,mark[0],nazakaz[0]);
}
else
{
checkbox[0].checked=true;
sop_usl_update_with_key_word(checkbox[0],hidden_ar[iterator].value,keyword[0].value,price[0].value,mark[0],nazakaz[0]);
}
}



}
else
{
hidden_ar=$('.hidden_id');
for(iterator=0;iterator<hidden_ar.length;iterator++)
{

checkbox=$('#checkboxtov_'+hidden_ar[iterator].value);
price=$('#usl_price_'+hidden_ar[iterator].value);
keyword=$('#usl_keyword_'+hidden_ar[iterator].value);
mark=$('#usl_mark_'+hidden_ar[iterator].value);
nazakaz=$('#usl_nal_'+hidden_ar[iterator].value);


if(checkbox[0].checked==true)
{
checkbox[0].checked=false;
sop_usl_update_with_key_word(checkbox[0],hidden_ar[iterator].value,keyword[0].value,price[0].value,mark[0],nazakaz[0]);
}
else
{

}


checkbox[0].checked=false;
}
}
}
);

button=$('.save_edition').click(function() {save_addition()});






out_array=$('#common_razdel > select').live('change',
 function()
 {
 out_array=$('#common_razdel > select');
$.ajax
	 (
		 {
		   type: "POST",
		   url: "common_razdel.php",
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
		   url: "common_podrazdel.php",
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
		out_array_sort_by_name=$('#sort_by_name');
	hidden_id=$('#hidden_id');
	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "mass_sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"sort_by_name="+out_array_sort_by_name[0].checked,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
						set_checkes();
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
		out_array_sort_by_name=$('#sort_by_name');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "mass_sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"sort_by_name="+out_array_sort_by_name[0].checked,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
						set_checkes();
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
		out_array_sort_by_name=$('#sort_by_name');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "mass_sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"sort_by_name="+out_array_sort_by_name[0].checked,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
						set_checkes();
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
		out_array_sort_by_name=$('#sort_by_name');
	hidden_id=$('#hidden_id');
	
	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "mass_sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"sort_by_name="+out_array_sort_by_name[0].checked,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
						set_checkes();
					 }
		}
	);

	});
 
  out_array_subusl_podraz=$('#podrazdel_usl > select').live('change',
 function()
 {
	out_array_raz=$('#razdel_usl > select');
	out_array_podraz=$('#podrazdel_usl > select');
	out_array_proiz=$('#proiz_usl > select');
		out_array_sort_by_name=$('#sort_by_name');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "mass_sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"sort_by_name="+out_array_sort_by_name[0].checked,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
						set_checkes();
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
		out_array_sort_by_name=$('#sort_by_name');
	hidden_id=$('#hidden_id');

	$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "mass_sub_usl_update.php",
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"sort_by_name="+out_array_sort_by_name[0].checked,
		   success: function(msg)
					{
					
					$('#usl_table')[0].innerHTML=msg;
					set_checkes();
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

<style type="text/css">
.simpl_link
{
}

.simpl_link:visited
{ 
color:black;
}

.simpl_link:link
{ 
color:black;
}

.simpl_link:hover
{ 
color:black;
}

.simpl_link:active
{ 
color:black;
}
</style>

<Title>
Массовое редактирование услуг
</Title>
</head> 
<body style="background-color:LightGrey;">

<?

$spisok_razdelov_tovar=new razdel_usl(0);
$spisok_podrazdelov_tovar=new podrazdel_usl(0,1);
$spisok_proiz_tovar=new proiz_usl(0,1);
		

		
		
		echo '<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">';
		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><a  class="simpl_link" href="http://www.filpan.ru/tools/add_usl"><H3>Добавить услугу</H3></a></div>';
		echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;"><input type="button" class="save_edition" value="Редактировать выбранные">
		<input type="button" value="Вернуться в главное меню" onclick="window.location=\'http://www.filpan.ru/tools/index.php\'">
		</div>';
		echo "<div style=\"overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px\"><div>Наименование позиции:</div>";
		echo "<div style=\"float:left;overflow:auto;\">
		<textarea id=\"name_text\" rows=\"10\" cols=\"90\"></textarea>
		</div>
		<div style=\"float:left;overflow:auto;\">
		<iframe id=\"name\" name=\"name\" style=\"display: none\">  
		</iframe>  
		<form action=\"name_handler.php\" target=\"name\" method=\"POST\"  enctype=\"multipart/form-data\">  
		<input type=\"file\" name=\"loadfile\">  
		<input type=\"submit\" value=\"Загрузить\">  
		</form>
		</div>
		<input type=\"checkbox\" id=\"checkbox_name\"> 
		</div>";
		echo "<div style=\"overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px\"><div>Заголовок позиции:</div>";
		echo "<div style=\"float:left;overflow:auto;\">
		<textarea id=\"title_text\" rows=\"10\" cols=\"90\"></textarea>
		</div>
		<div style=\"float:left;overflow:auto;\">
		<iframe id=\"title\" name=\"title\" style=\"display: none\">  
		</iframe>  
		<form action=\"title_handler.php\" target=\"title\" method=\"POST\"  enctype=\"multipart/form-data\">  
		<input type=\"file\" name=\"loadfile\">  
		<input type=\"submit\" value=\"Загрузить\">  
		</form>
		</div>
		<input type=\"checkbox\" id=\"checkbox_title\"> 
		</div>";
		echo "<div style=\"overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px\"><div>Поле описание товара:</div>";
		echo "<div style=\"float:left;overflow:auto;\">
		<textarea id=\"descr_text\" class=\"ckeditor\" rows=\"10\" cols=\"90\"></textarea>
		</div>
		<div style=\"float:left;overflow:auto;\">
		<iframe id=\"descr\" name=\"descr\" style=\"display: none\">  
		</iframe>  
		<form action=\"descr_handler.php\" target=\"descr\" method=\"POST\"  enctype=\"multipart/form-data\">  
		<input type=\"file\" name=\"loadfile\">  
		<input type=\"submit\" value=\"Загрузить\">  
		</form>
		</div>
		<input type=\"checkbox\" id=\"checkbox_descr\"> 
		</div>";
		echo "<div  style=\"overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px\"><div>Поле подробно:</div>";
		echo "<div style=\"float:left;\">
		<textarea  id=\"podrobno_text\" class=\"ckeditor\" rows=\"10\" cols=\"90\"></textarea></div>
		<div style=\"float:left;overflow:auto;\">
		<iframe id=\"podrobno\" name=\"podrobno\" style=\"display: none\">  
		</iframe>  
		<form action=\"podrobno_handler.php\" target=\"podrobno\" method=\"POST\"  enctype=\"multipart/form-data\">  
		<input type=\"file\" name=\"podrobno_loadfile\">  
		<input type=\"submit\" value=\"Загрузить\">  
		</form>
		</div><input type=\"checkbox\" id=\"checkbox_podrobno\"> </div>";
		echo "<div  style=\"overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px\"><div>Поле описание(description):</div>";
		echo "<div style=\"float:left;\">
		<textarea  id=\"description_text\"  rows=\"10\" cols=\"90\"></textarea></div>
		<div style=\"float:left;overflow:auto;\">
		<iframe id=\"description\" name=\"description\" style=\"display: none\">  
		</iframe>  
		<form action=\"description_handler.php\" target=\"description\" method=\"POST\"  enctype=\"multipart/form-data\">  
		<input type=\"file\" name=\"description_loadfile\">  
		<input type=\"submit\" value=\"Загрузить\">  
		</form>
		</div>
		<input type=\"checkbox\" id=\"checkbox_description\"> 
		</div>";
		echo "<div  style=\"overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px\"><div>Поле ключевые слова(keywords):</div>";
		echo "<div style=\"float:left;\">
		<textarea id=\"keywords_text\"	rows=\"10\" cols=\"90\"></textarea>
		</div>
		<div style=\"float:left;overflow:auto;\">
		<iframe id=\"keywords\" name=\"keywords\" style=\"display: none\">  
		</iframe>  
		<form action=\"keywords_handler.php\" target=\"keywords\" method=\"POST\"  enctype=\"multipart/form-data\">  
		<input type=\"file\" name=\"keywords_loadfile\">  
		<input type=\"submit\" value=\"Загрузить\">  
		</form>
		</div>
		<input type=\"checkbox\" id=\"checkbox_keywords\"> 
		</div>";
		
		echo "<div  style=\"overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px\"><div id=\"razdel_usl\" style=\"float:left;overflow:auto;\">";
		$raz=$spisok_razdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"podrazdel_usl\" style=\"float:left;overflow:auto;\">";
		$podraz=$spisok_podrazdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"proiz_usl\" style=\"float:left;overflow:auto;\">";
		$proiz=$spisok_proiz_tovar->show();
		echo "</div>";
		
		echo "<div id=\"second_push_button\" style=\"float:left;overflow:auto;\">";
		echo "<input type=\"button\" class=\"save_edition\" value=\"Редактировать выбранные\">";echo "Выделить все:<input type=\"checkbox\" id=\"select_all\">";
			echo "Сортировать по имени:<input type=\"checkbox\" id=\"sort_by_name\">";
		echo "</div>";
		
		
		echo '<div style="clear:left;">Услуги:</div>';
		
		echo "<div id=\"usl_table\" style=\"overflow:auto;background-color:white;\">";
	   $sub_gifts=new usl_gifts(-1,-1,-1,0);
	   $sub_gifts->show_mass_usl_table(-1,-1,-1,array());
		
		
		echo "</div>";
			echo "<div id=\"second_push_button\" style=\"clear:left;overflow:auto;\">";
		echo "<input type=\"button\" class=\"save_edition\" value=\"Редактировать выбранные\">";
		
		echo "</div>";

		//echo '</div>';
		echo '</div>';

?>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/javascript_functions/jq.js");?>

</body>
<?}?>
