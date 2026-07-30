<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$menu_uslugi=new menu_1level_usl("usltprub","uslsodraz");
$menu_tovari=new menu_1level("tprub","sodraz");
$spisok_statey= new statyi();

	$chpu_get_id=(int)$_GET['id'];
	$chpu_get_idraz=(int)$_GET['podc'];
	$chpu_get_proiz=(int)$_GET['dopp'];
if($_GET['view']==1){	$usl_gift=new usl_gift_element($chpu_get_id);
	   // $chpu_get_id = (int)$usl_gift->f_array['0']['id'];
	if(!isset($_GET['raz'])){    $chpu_get_raz = $usl_gift->f_array['0']['raz'];}
	if(!isset($_GET['podc'])){    $chpu_get_idraz = (int)$usl_gift->f_array['0']['idraz'];}//$_GET['podc']
	    $chpu_get_nazv = $usl_gift->f_array['0']['nazv'];
	    //$chpu_get_descr = $usl_gift->f_array['0']['descr'];
	    //$chpu_get_xcl = $usl_gift->f_array['0']['xcl'];
	    //$chpu_get_price = $usl_gift->f_array['0']['price'];
	    //$chpu_get_papka = $usl_gift->f_array['0']['papka'];
	    //$chpu_get_pict = $usl_gift->f_array['0']['pict'];
	    //$chpu_get_pict1 = $usl_gift->f_array['0']['pict1'];
	    //$chpu_get_super = $usl_gift->f_array['0']['super'];
	if(!isset($_GET['dopp'])){    $chpu_get_proiz = (int)$usl_gift->f_array['0']['proiz'];} //$_GET['dopp']
	    //$chpu_get_func = $usl_gift->f_array['0']['func'];
	    //$chpu_get_val = $usl_gift->f_array['0']['val'];
	    //$chpu_get_dop = $usl_gift->f_array['0']['dop'];

}
$statya=new statya_tov(2,$chpu_get_id,$chpu_get_idraz,$chpu_get_proiz);
//$statya=new statya_tov(2,$chpu_get_id,$_GET['podc'],$_GET['dopp']);
$spisok_news_statey= new news_statyi();
$title_way_usl=array();
$proiz_link="";

if($_GET['view']==1){
	if($_GET['chpu']==''){
	    $redirect_url=get_chpu_url($chpu_get_id,$chpu_get_nazv,$type='2');
	    header('HTTP/1.1 301 Moved Permanently');
		header('Location: '.$redirect_url);
		exit();	}
	$title=$usl_gift->show_title();
	$description=$usl_gift->show_description();
	$keywords=$usl_gift->show_keywords();

} else {
//if($_GET['id']==3)
//{
//$title='Ремонт оргтехники';
//$description='У нас Вы можете быстро и качественно отремонтировать свою офисную технику';
//$keywords='ремонт принтера, ремонт копира, ремонт ксерокса, HP, Samsung, Brother,Xerox';
//}
//else
//{
	if($_GET['id']==1&&!isset($chpu_get_idraz)&&!isset($chpu_get_proiz)){
		$chpu_get_idraz=27;
	}


	$usl_gifts=new usl_gifts($_GET['id'],$chpu_get_idraz,$chpu_get_proiz,$_GET['page']);
	//$title=$usl_gifts->show_title();
	if(isset($_GET['usl'])){$get_usl=$_GET['usl'];}else{$get_usl='1';}
	$menu_uslugi->show_title($_GET['id'],$chpu_get_idraz,$chpu_get_proiz,$title_way_usl,$proiz_link,2,$get_usl);

	$title_way_usl_size=count($title_way_usl);

	for($iterator=0;$iterator<	$title_way_usl_size;$iterator++){
		if($iterator==(	$title_way_usl_size-1)){
			$caption_link=$caption_link.$title_way_usl[$iterator]['text'];
		} else {
			$caption_link=$caption_link.$title_way_usl[$iterator]['text']."-";
		}
	}

	$title=$caption_link;
	if($statya->show_title()!=''){
		$title=$statya->show_title();
	}
	$description=$statya->show_descr();
	$keywords=$statya->show_keywords();

//}
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
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/element_uslfind_middle_content.php");
	}
	else
	{
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/uslfind_middle_content.php");
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