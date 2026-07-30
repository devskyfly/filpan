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
<body style="background-color:LightGrey;">
<div style="width:1000px;margin-left:auto;margin-right:auto;margin:0px;padding:0px;">
<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<H3>Список опубликованных товаров:</H3>
<?$yml=new yml_request();$yml-> printlist()?>
</div>

<div style="overflow:auto;border:solid 2px black;background-color:white;padding:10px;margin:10px;">
<H3>Список опубликованных услуг:</H3>
<?$yml_usl=new yml_request_usl();$yml_usl-> printlist()?>
</div>

</div>		
</body>

