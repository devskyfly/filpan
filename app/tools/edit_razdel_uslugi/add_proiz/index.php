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
 }
 
function save_razdel()
{
$.ajax
	 (
		 {
		   type: "POST",
		   url: "add_razdel.php",
		   data: "idrub="+<? echo $_REQUEST['rub'] ?>+"&rub="+encodeURIComponent($('#rub_inf')[0].value),
		   success: function(msg)
				   {
				   alert("Позиция сохранена");
			location="http://www.filpan.ru/tools/edit_razdel_uslugi/update_proiz?id="+msg;
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
Добавить производителя услуг
</Title>
</head> 
<body style="background-color:LightGrey;">
	<?echo '<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">';
    echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">
	    <input type="button" value="Сохранить" onclick="save_razdel()">
		<input type="button" value="Вернуться к списку разделов" onclick="window.location=\'http://www.filpan.ru/tools/edit_razdel_uslugi/index.php\'">
		</div>';
		echo '<div style="border:solid 2px black;background-color:white;padding:10px;margin:10px;">Название производителя:<br>
		<textarea rows="4" cols="80" id="rub_inf"></textarea></div>';?>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/javascript_functions/jq.js");?>
</body>
<?}?>

