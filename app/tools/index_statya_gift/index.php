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
<script type="text/javascript" src="http://www.filpan.ru/AjexFileManager/ajex.js"></script>
<script>
 $('document').ready(function(){initial()});

 function initial()
 {
var ckeditor1 = CKEDITOR.replace('text_statyi_inf');
AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});
 
}
 
 
 
 
 
 </script>
<body style="background-color:LightGrey;">

<?$statya=new index_statya_gift($_GET['id']);?>
<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">
<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<H3>Статья индексной страницы товар:</H3>
<?

$statya->show_adm();

?>
</div>
</div>		
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require_js.php");?>
</body>
<?}?>
