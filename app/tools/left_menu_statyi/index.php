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

 function initial()
 {

 
}
 
 
function shift_up(id_inf,way)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "shift_up.php",
		   data: 
		   "&id="+encodeURIComponent(id_inf),
		   success: function(msg)
				   {
				//alert(msg);
				   window.location=way;
					
				   }
		}
  )
}
function shift_down(id_inf,way)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "shift_down.php",
		   data: 
		   "&id="+encodeURIComponent(id_inf),
		   success: function(msg)
				   {
				// alert(msg);
				   window.location=way;
					
				   }
		}
  )
}
 
 
 
 </script>
<body style="background-color:LightGrey;">

<?$statyi=new left_menu_statyi();?>
<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">
<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<H3>Статьи в левом меню:</H3>
<input type="button" value="Вернуться в главное меню" onclick="window.location='http://www.filpan.ru/tools'"><input type="button" value="Добавить статью" onclick="window.location='http://www.filpan.ru/tools/left_menu_statya/add_statya.php'">
<?

echo '<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">';
$statyi->show_statyi_adm();
echo '</div>';
?>
</div>
</div>		
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require_js.php");?>
</body>
<?}?>
