<?
$time_start = microtime(1);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$User=new ElementUserLog();



$MassivKriteriyev=array();
$MassivKriteriyev['ssilka']=$_REQUEST['input_uri'];

		
$id=-1;
$title=404;
$keywords=404;
$description=404;
?>
<!DOCTYPE html>
<html>
	<head>
	<?echo sprintf('<link rel="shortcut icon" href="%sFilpanDesign/PageImages/favicon.ico" type="image/x-icon">',$_WEB_ROOT);?>
	<?echo sprintf('<meta name="keywords" content="%s"/>'."\r\n",$keywords)?>
	<?echo sprintf('<meta name="description" content="%s"/>'."\r\n",$description)?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>'."\r\n",$_WEB_ROOT);?>
	<script type="text/javascript">
	
	$(document).ready(function()
		{
			inicializaciyaSobitiy();
		}
		);
	</script>
	<?echo sprintf('<link rel="stylesheet" type="text/css" href="%sFilpanDesign/style.css">'."\r\n",$_WEB_ROOT);?>
		<title>
		<?echo $title;?>
		</title>
	</head>
	<body>
		<div id="FonZatemneniyaKorzini"></div>
		<div id='GlavniyDIV'>
			<div id='VerxniyDiv'>
			<?require($_ROOT.'FilpanDesign/ObshiyeModuli/VerxniyDiv.php');?>	
			</div>
			<div id='SredniyDiv'>
			<?echo sprintf('<input type="hidden" id="AktivniyElementMenu" value="%s">'."\r\n",$id);?>
			<span class="raskritiyePlus">+</span>
			<span class="raskritiyeMinus">-</span>

				<div id='LevayaKolonkaSredniyDiv'>
					<?require($_ROOT.'FilpanDesign/ObshiyeModuli/LevayaKolonkaSredniyDiv.php');?>
				</div>
				<div id='PravayaKolonkaSredniyDiv'>
					<?require($_ROOT.'FilpanDesign/ObshiyeModuli/PravayaKolonkaSredniyDiv.php');?>
				</div>
				<div id="SrednayaKolonkaSredniyDivDlyaTovara">
					<?//echo sprintf('<img id="img404" src="%spictures_for_elements/404.png" class="KartinkaTabliciTovarov" alt="404">',$_WEB_ROOT_HREF);?>
					<div id="img404">
					<div class="Text404 TextContenta">
					<div class="TextDiv404 TextContenta">
						<h2>Страница не найдена</h2>
					</div>
					<div class="TextDiv404 TextContenta">
						Неправильно набран адрес, или такой страницы на сайте больше не существует.
					</div>
					<div class="TextDiv404 TextContenta">
						Попробуйте следующее:
					</div>
					<div class="TextDiv404 TextContenta">
						Проверьте правильность адреса страницы в строке адреса
					</div>
					<div class="TextDiv404 TextContenta">
					<? echo sprintf('Перейдите на <a href="%s" class="link_orange">главную страницу</a>',$_WEB_ROOT_HREF);	?>
					</div>
					</div>
					</div>
				</div>
			</div>

		
		<div id='NigniyDiv'>
			<?require($_ROOT.'FilpanDesign/ObshiyeModuli/NigniyDiv.php');?>
		</div>

		<div id='Korzina'>
			<?//require('ObshiyeModuli/Korzina.php');?>
		</div>
	</div>
</body>
</html>
<?
$time_end = microtime(1);
$time = $time_end - $time_start;
// echo $time;
?>