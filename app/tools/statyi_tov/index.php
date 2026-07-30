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
<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="http://www.filpan.ru/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="http://www.filpan.ru/AjexFileManager/ajex.js"></script>

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
Административная часть
</Title>
</head>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/javascript_functions/jq.js");?>
<script src="http://www.filpan.ru/ckeditor/ckeditor.js"></script>
<script>
 $('document').ready(function(){initial()});
  function save_statya(
text_statyi,
title,
html_title,
descr,
keywords,
katalog,
razdel,
podrazdel,
proiz
)
{


$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "save_statya.php",
		   data: 
		   "&text_statyi="+encodeURIComponent(CKEDITOR.instances.statiya_inf.getData())+
		   "&title="+encodeURIComponent(title[0].value)+
		   "&html_title="+encodeURIComponent(html_title[0].value)+
		   "&descr="+encodeURIComponent(descr[0].value)+
		   "&keywords="+encodeURIComponent(keywords[0].value)+
		   "&katalog="+katalog[0].value+
		   "&razdel="+razdel[0].value+
		   "&podrazdel="+podrazdel[0].value+
		   "&proiz="+proiz[0].value,
		   success: function(msg)
				   {
				   //alert(msg);
				   checker=$('#replace_content');
				   checker[0].checked=false;
				   	alert('Позиция сохранена');
					
					//document.write(http);
					//window.location=http;
				   }
		}
  );
}

function update_statya_inf()
{
CKEDITOR.instances.statiya_inf.destroy();
 out_array_katalog=$('#katalog > select');

 array_razdel=$('#razdel_tov > select');
 array_podraz=$('#podrazdel_tov > select');
 
 
  if(!$('#podrazdel_tov > select').is(array_podraz))
 {array_podraz.push({value:'-1'})}
 
 
 array_proiz=$('#proiz_tov > select');
 if(!$('#proiz_tov > select').is(array_proiz))
 {array_proiz.push({value:'-1'})}
 checker=$('#replace_content'); 
 var ckeditor1 = CKEDITOR.replace('statiya_inf');
AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});
 if(checker[0].checked==false)
 {
 
 $.ajax
	(
		 {
		   type: "POST",
		   url: "text_statiy.php",
		   data: "katalog="+out_array_katalog[0].value+"&"+"raz="+array_razdel[0].value+"&"+"podraz="+array_podraz[0].value+"&"+"proiz="+array_proiz[0].value,
		   success: function(msg)
				   {


					//$('#statiya_inf')[0].value=msg;
					CKEDITOR.instances.statiya_inf.setData(msg);
					//alert(msg);
				   }
		}
	
    );

	$.ajax
	(
		 {
		   type: "POST",
		   url: "title_statiy.php",
		   data: "katalog="+out_array_katalog[0].value+"&"+"raz="+array_razdel[0].value+"&"+"podraz="+array_podraz[0].value+"&"+"proiz="+array_proiz[0].value,
		   success: function(msg)
				   {


					$('#title_inf')[0].value=msg;
					
				   }
		}
	
    );

	$.ajax
	(
		 {
		   type: "POST",
		   url: "html_title_statiy.php",
		   data: "katalog="+out_array_katalog[0].value+"&"+"raz="+array_razdel[0].value+"&"+"podraz="+array_podraz[0].value+"&"+"proiz="+array_proiz[0].value,
		   success: function(msg)
				   {


					$('#html_title_inf')[0].value=msg;
					
				
				   }
		}
	
    );

	$.ajax
	(
		 {
		   type: "POST",
		   url: "descr_statiy.php",
		   data: "katalog="+out_array_katalog[0].value+"&"+"raz="+array_razdel[0].value+"&"+"podraz="+array_podraz[0].value+"&"+"proiz="+array_proiz[0].value,
		   success: function(msg)
				   {


					$('#descr_inf')[0].value=msg;
					
					
				   }
		}
	
    );
	
	$.ajax
	(
		 {
		   type: "POST",
		   url: "keywords_statiy.php",
		   data: "katalog="+out_array_katalog[0].value+"&"+"raz="+array_razdel[0].value+"&"+"podraz="+array_podraz[0].value+"&"+"proiz="+array_proiz[0].value,
		   success: function(msg)
				   {


					$('#keywords_inf')[0].value=msg;
					
				   }
		}
	
    );
	};
	//CKEDITOR.replace('statiya_inf');
}





 function initial()
 {

 
 out_array_katalog=$('#katalog > select').live('change',
 function()
 {

 if(out_array_katalog[0].value==1)
 {
 $.ajax
	 (
		 {
		   type: "POST",
		   url: "razdel.php",
		   data: "raz="+out_array_katalog[0].value,
		   success: function(msg)
				   {
				  
					$('#razdel_tov')[0].innerHTML=msg;
					
				   }
		}
	);
	update_statya_inf();
 }
 
 if(out_array_katalog[0].value==2)
 {
 $.ajax
	 (
		 {
		   type: "POST",
		   url: "razdel_usl.php",
		   data: "raz="+out_array_katalog[0].value,
		   success: function(msg)
				   {
				
					$('#razdel_tov')[0].innerHTML=msg;
				   }
		}
	);
	update_statya_inf();
 }
 
	 
 }
 );
 ////////////////////////////////////////////////////////////////////////////////////////////
out_array_raz=$('#razdel_tov > select').live('change',
 function()
 {

 out_array_katalog=$('#katalog > select');
 out_array_raz=$('#razdel_tov > select');
  if(out_array_katalog[0].value==1)
 {
 $.ajax
	 (
		 {
		   type: "POST",
		   url: "podrazdel.php",
		   data: "raz="+out_array_raz[0].value,
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
		   url: "proiz.php",
		   data: "raz="+out_array_raz[0].value,
		   success: function(msg)
				   {
					$('#proiz_tov')[0].innerHTML=msg;
				   }
		}
	);
	update_statya_inf();
	}
	 if(out_array_katalog[0].value==2)
 {
 
 
 $.ajax
	 (
		 {
		   type: "POST",
		   url: "podrazdel_usl.php",
		   data: "raz="+out_array_raz[0].value,
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
		   url: "proiz_usl.php",
		   data: "raz="+out_array_raz[0].value,
		   success: function(msg)
				   {
					$('#proiz_tov')[0].innerHTML=msg;
				   }
		}
	);
	update_statya_inf();
	}
	 
 }
 );
 
 
 
 ////////////////////////////////////////////////////////////////////////////////////////////////////////
out_array_podraz=$('#podrazdel_tov > select').live('change',
 function()
 {
  out_array_katalog=$('#katalog > select');
  if(out_array_katalog[0].value==1)
 {
	$.ajax
	 (
		 {
		   type: "POST",
		   url: "proiz.php",
		   data: "raz="+out_array_raz[0].value,
		   success: function(msg)
				   {
					$('#proiz_tov')[0].innerHTML=msg;
				   }
		}
	);
	update_statya_inf();
	}
   if(out_array_katalog[0].value==2)
   {
   $.ajax
	 (
		 {
		   type: "POST",
		   url: "proiz_usl.php",
		   data: "raz="+out_array_raz[0].value,
		   success: function(msg)
				   {
					$('#proiz_tov')[0].innerHTML=msg;
				   }
		}
	);
	 update_statya_inf();
   }
   
 });
////////////////////////////////////////////////////////////////////////////////////////////
out_array_proiz=$('#proiz_tov > select').live('change',
 function()
 {
 update_statya_inf();
	}
	
	);
	
	}
 
 
 
 
 
 </script>
<body style="background-color:LightGrey;">

<?
$katalog=new katalog();
	$spisok_razdelov_tovar=new razdel_gift(-1);
		$spisok_podrazdelov_tovar=new podrazdel_gift(-1,-1);
		$spisok_proiz_tovar=new proiz_gift(-1,-1);
?>
<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">
<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<H3>Статьи по подразделам:</H3>
<?
echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">';
echo "<div id=\"katalog\" style=\"float:left;overflow:auto;\">";
		$raz=$katalog->show_select();
		echo "</div>";
		echo "<div id=\"razdel_tov\" style=\"float:left;overflow:auto;\">";
		$raz=$spisok_razdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"podrazdel_tov\" style=\"float:left;overflow:auto;\">";
		$podraz=$spisok_podrazdelov_tovar->show();
		echo "</div>";
		echo "<div id=\"proiz_tov\" style=\"float:left;overflow:auto;\">";
		$proiz=$spisok_proiz_tovar->show();
		echo "</div>";
		echo "<div id=\"save_button\" style=\"float:left;overflow:auto;\">";
		echo '<input type="button" value="Сохранить" onclick="save_statya($(\'#statiya_inf\'),$(\'#title_inf\'),$(\'#html_title_inf\'),$(\'#descr_inf\'),$(\'#keywords_inf\'),$(\'#katalog > select\'),$(\'#razdel_tov > select\'),$(\'#podrazdel_tov > select\'),$(\'#proiz_tov > select\'))">';
		echo "</div>";
		echo "<div id=\"checker\" style=\"float:left;overflow:auto;\">";
		echo '<input type="checkbox" id="replace_content">Перенести содержимое в другой раздел';
		echo "</div></div>";
		echo '<div id="text_statyi">Текст статьи<br><textarea id="statiya_inf" class="ckeditor" rows="10" cols="80"></textarea></div>';
		echo '<div id="title_statyi">Заголовок страницы данной статьи<br><textarea id="title_inf" rows="10" cols="80"></textarea></div>';
		echo '<div id="html_title_statyi">HTML заголовок страницы данной статьи<br><textarea id="html_title_inf" rows="10" cols="80"></textarea></div>';
		echo '<div id="descr_statyi">META описание<br><textarea id="descr_inf" rows="10" cols="80"></textarea></div>';
		echo '<div id="keywords_statyi">META ключевые слова<br><textarea id="keywords_inf" rows="10" cols="80"></textarea></div>';
?>
</div>
</div>		

</body>
<?}?>
