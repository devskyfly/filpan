<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$menu_uslugi=new menu_1level_usl("usltprub","uslsodraz");
$menu_tovari=new menu_1level("tprub","sodraz");
$spisok_statey= new statyi();
	$chpu_get_id=(int)$_GET['id'];
	$chpu_get_idraz=(int)$_GET['podc'];
	$chpu_get_proiz=(int)$_GET['dopp'];
if($_GET['view']==1){
	$gift=new gift_element($chpu_get_id);

	   // $chpu_get_id = (int)$gift->f_array['0']['id'];
	if(!isset($_GET['raz'])){    $chpu_get_raz = $gift->f_array['0']['raz'];}
	if(!isset($_GET['podc'])){    $chpu_get_idraz = (int)$gift->f_array['0']['idraz'];}//$_GET['podc']
	    $chpu_get_nazv = $gift->f_array['0']['nazv'];
	    //$chpu_get_descr = $gift->f_array['0']['descr'];
	    //$chpu_get_xcl = $gift->f_array['0']['xcl'];
	    //$chpu_get_price = $gift->f_array['0']['price'];
	    //$chpu_get_papka = $gift->f_array['0']['papka'];
	    //$chpu_get_pict = $gift->f_array['0']['pict'];
	    //$chpu_get_pict1 = $gift->f_array['0']['pict1'];
	    //$chpu_get_super = $gift->f_array['0']['super'];
	if(!isset($_GET['dopp'])){    $chpu_get_proiz = (int)$gift->f_array['0']['proiz'];} //$_GET['dopp']
	    //$chpu_get_func = $gift->f_array['0']['func'];
	    //$chpu_get_val = $gift->f_array['0']['val'];
	    //$chpu_get_dop = $gift->f_array['0']['dop'];

}
//write_fl_a_pl($_SERVER['DOCUMENT_ROOT']."/url_redirect.txt","Параметры ввода: ".$chpu_get_id.$chpu_get_nazv.'1');
$statya=new statya_tov(1,$_GET['id'],$chpu_get_idraz,$chpu_get_proiz);
$spisok_news_statey= new news_statyi();

$title_way=array();
$proiz_link="";
//Полные тексты 	id 	raz 	idraz 	nazv 	descr 	xcl 	price 	papka 	pict 	pict1 	super 	proiz 	func 	val 	dop 	title 	mark 	local_del 	bid 	club 	soptov 	sopuslugi 	db_description 	db_keywords 	word_key 	nazakaz 	vnalichii 	text_modul 	superorde

if($_GET['view']==1){	if($_GET['chpu']==''){
		write_fl_a_pl($_SERVER['DOCUMENT_ROOT']."/url_redirect.txt","Параметры ввода: ".$chpu_get_id.$chpu_get_nazv.'1');
	    $redirect_url=get_chpu_url($chpu_get_id,$chpu_get_nazv,'1');
		write_fl_a_pl($_SERVER['DOCUMENT_ROOT']."/url_redirect.txt","\r\nНовая ссылка: ".$redirect_url);
	    header('HTTP/1.1 301 Moved Permanently');
		header('Location: '.$redirect_url);
		
		exit();
	}

$title=$gift->show_title();
$description=$gift->show_description();
$keywords=$gift->show_keywords();
}
else
{

$gifts=new gifts($_GET['id'],$chpu_get_idraz,$chpu_get_proiz,$_GET['page']);
//$title=$gifts->show_title();
$menu_tovari->show_title($_GET['id'],$chpu_get_idraz,$chpu_get_proiz,$title_way,$proiz_link,1,$_GET['usl']);

$title_way_size=count($title_way);

for($iterator=0;$iterator<	$title_way_size;$iterator++)
{
if($iterator==(	$title_way_size-1))
{
$caption_link=$caption_link.$title_way[$iterator]['text'];
}
else
{
$caption_link=$caption_link.$title_way[$iterator]['text']."-";
}
}

$title=$caption_link;

if($statya->show_title()!='')
{
$title=$statya->show_title();
}
$description=$statya->show_descr();
$keywords=$statya->show_keywords();


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?83"></script>

<script type="text/javascript">
  VK.init({apiId: 3496198, onlyWidgets: true});
</script>
<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="description"  <? echo "content=\"".$description."\""?> />
<meta name="keywords" <? echo "content=\"".$keywords."\""?> />
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/user_browser_find.php");
?>

<?echo "<title>".$title."</title>\n";?>
</head>
<body>
<div class="container">
	<div class="header">
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/header_content.php");
	?>
	</div>
	<div class="content">

	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/left_content.php");
	?>
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/right_content.php");
	?>
	<?
	if($_GET['view']==1)
	{
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/element_find_middle_content.php");
	}
	else
	{
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/find_middle_content.php");
	}
	?>

	</div>
	<div class="bottom">
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/bottom_content.php");
	?>
	</div>
</div>
<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require_js.php");?>
</body>
