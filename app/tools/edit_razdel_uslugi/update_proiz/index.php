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

function initial()
{
}

function update_razdel()
{
$.ajax
	 (
		 {
		   type: "POST",
		   url: "update_razdel.php",
		   data: "id="+<? echo $_REQUEST['id']; ?>+"&rub="+encodeURIComponent($('#rub_inf')[0].value),
		   success: function(msg)
				   {
				   alert("Позиция сохранена");
			location="http://www.filpan.ru/tools/edit_razdel_uslugi/update_proiz?id="+<?echo $_REQUEST['id']; ?>;
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
Редактировать производителя услуг
</Title>
</head> 
<body style="background-color:LightGrey;">
<?
$proiz_usl_element=new proiz_usl_element($_REQUEST['id']);
$proiz_usl_element->show_admin();
?>		


<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/javascript_functions/jq.js");?>
</body>

<?}?>

