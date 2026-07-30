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
<script>

$('document').ready(function(){initial()});

sop_tov=[];
sop_usl=[];




function initial()
{
razdel=$("#razdel");
podrazdel=$("#podrazdel");
proiz=$("#proiz");

$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "update_razdel.php",
		  // data: "raz="+out_array[0].value,
		   success: function(msg)
				   {
					$('#razdel')[0].innerHTML=msg;				
				   }
		}
	);
	
	
					$('#podrazdel')[0].innerHTML="Выберите раздел";				
					$('#proiz')[0].innerHTML="Выберите подраздел";	

}

function add_razdel(){window.open("http://www.filpan.ru/tools/edit_razdel_uslugi/add_razdel")}
function add_podrazdel(rub){window.open("http://www.filpan.ru/tools/edit_razdel_uslugi/add_podrazdel?rub="+rub)}
function add_proiz(rub){window.open("http://www.filpan.ru/tools/edit_razdel_uslugi/add_proiz?rub="+rub)}

function select_razdel(razdel_id,obj)
{
$('.radel_div').css('backgroundColor','black');
obj.style.backgroundColor="red";
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "update_podrazdel.php",
		  data: "id_razdel="+razdel_id,
		   success: function(msg)
				   {
					$('#podrazdel')[0].innerHTML=msg;				
				   }
		}
	);
		//$('#proiz')[0].innerHTML="Выберите подраздел";	
		$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "update_proiz.php",
		  data: "id_podrazdel="+razdel_id,
		   success: function(msg)
				   {
					$('#proiz')[0].innerHTML=msg;				
				   }
		}
	);
}

function select_podrazdel(razdel_id)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "update_proiz.php",
		  data: "id_podrazdel="+razdel_id,
		   success: function(msg)
				   {
					$('#proiz')[0].innerHTML=msg;				
				   }
		}
	);
}


function delete_razdel(id_in)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "delete_razdel.php",
		  data: "id="+id_in,
		   success: function(msg)
				   {
					alert("Позиция удалена");			
				   }
		}
	);
}
function delete_podrazdel(id_in)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "delete_podrazdel.php",
		  data: "id="+id_in,
		   success: function(msg)
				   {
					alert("Позиция удалена");			
				   }
		}
	);
}
function delete_proiz(id_in)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "delete_proiz.php",
		  data: "id="+id_in,
		   success: function(msg)
				   {
					alert("Позиция удалена");			
				   }
		}
	);
}

</script>
<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="styles/common_style.css" />
<Title>
Редактировать разделы услуг
</Title>
</head> 
<body style="background-color:LightGrey;">
		
		<?
		echo '<div style="overflow:auto;width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">';
		
		echo '<div  style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">';
		echo '<div id="razdel" style="float:left;width:300px;"></div>';
		echo '<div id="podrazdel" style="float:left;width:300px;"></div>';
		echo '<div id="proiz" style="float:left;width:300px;"></div>';
		echo '</div>';
		
		echo '</div>';
	
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/javascript_functions/jq.js");?>


</body>
<?}?>

