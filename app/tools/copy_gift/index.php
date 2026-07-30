<?
if ($_COOKIE['filpan_access']=='yes')
{
?>
<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$gift=new gift_element($id);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require_js.php");


?>
<script>

 function onResponse(d) {  
 eval('var obj = ' + d + ';');  
 //alert('Файл ' + obj.filename + (obj.success ? " " : " НЕ ") +  
//    "загружен.");  
	element=document.getElementById("picture_inf");
	element.value=obj.newfilename;
	
	element=document.getElementById("picture");
	element.src="http://www.filpan.ru/img/"+obj.newfilename;
	//alert(element.src);
 }  


 







$('document').ready(function(){initial()});
<?$gift->show_js_arrays();?>


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
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"id="+hidden_id[0].value,
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
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"id="+hidden_id[0].value,
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
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"id="+hidden_id[0].value,
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
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"id="+hidden_id[0].value,
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
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"id="+hidden_id[0].value,
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
		   data: "raz="+out_array_raz[0].value+"&"+"podraz="+out_array_podraz[0].value+"&"+"proiz="+out_array_proiz[0].value+"&"+"page="+0+"&"+"id="+hidden_id[0].value,
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
Редактирование товара
</Title>
</head> 
<body style="background-color:LightGrey;">

<?$gift->show_admin_copy()?>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/javascript_functions/jq.js");?>


</body>
<?}?>
