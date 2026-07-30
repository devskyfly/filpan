<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
?>
<style>
.hiddenTh{
	display: none;
}
</style>
<?

$User=new ElementUserLog();

if($User->VxodVAdminku())
{
$User->ZaregistririvatAdmina();

}
else
{
	echo "<form action=\"#\">
Введите имя: <input type=text name=\"Admin\"><br>
Введите пароль: <input type=text name=\"Password\"><br>
<input type=submit value=\"GO!\">
</form>";
exit();
}


$MassivKriteriyev=array();
$MassivKriteriyev['ssilka']=$_REQUEST['input_uri'];


if(isset($_REQUEST['id']))
{
$ElementMenu=new ElementMenu();	
$ElementMenu->poluchit($_REQUEST['id']);
$title=$ElementMenu->poluchitSvoystvo('title');
$keywords=$ElementMenu->poluchitSvoystvo('keywords');
$description=$ElementMenu->poluchitSvoystvo('description');
$id_menu=$_REQUEST['id'];
$TekushayaStranica=$_REQUEST['page'];
$TekushayaPoziciyaStraniciSpiska=$_REQUEST['page'];
$DannieZapolneniya=$ElementMenu->poluchitMassivSvoystv();
}
else
{
$id_menu=-1;	
$title="Создать новый элемент меню";
$keywords="Создать новый элемент меню";
$description="Создать новый элемент меню";
}





?>
<!DOCTYPE html>
<html>
	<head>
	<?echo sprintf('<link rel="shortcut icon" href="%sPageImages/favicon.ico" type="image/x-icon">',$_WEB_ROOT);?>
	<?echo sprintf('<meta name="keywords" content="%s"/>'."\r\n",$keywords)?>
	<?echo sprintf('<meta name="description" content="%s"/>'."\r\n",$description)?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?
	require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/GlobalniyePeremennieJS.php");
	?>
	<?echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script type="text/javascript" src="%sPanelUpravleniyaFunctions.js"></script>'."\r\n",$_WEB_ROOT_ADMIN_HREF);?>
	<?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/BrowserDetect.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/ckeditor/ckeditor.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/AjexFileManager/ajex.js"></script>'."\r\n",$_WEB_ROOT);?>
	<script type="text/javascript">
	
	$(document).ready(function()
		{
			inicializaciyaSobitiy();
			nachalniyeSobitiyaPaneliUpravleniyaMenu();
			//priIzmeneniyiInputTablici();
			$(document).scroll(function(){

			if($(document).scrollTop()>200){
				
				$('#StickyTitle').removeClass('hiddenTh');
				}
				else{
					$('#StickyTitle').addClass('hiddenTh');
					
				}

			
			});


			var th=$(".ModulSredneyKolonki .TablicaTovarov tr th");

			if(th.length>0){
				
				BrowserDetect.init();

				if(BrowserDetect.browser=="Chrome"){
					var OfssetTable=$(".ModulSredneyKolonki .TablicaTovarov").offset();
					console.log(OfssetTable);
					$("#StickyTitle").css({"left":OfssetTable.left});
					var len=th.length;
					var thStick=$("#StickyTitle .TablicaTovarov tr th");
		
						for(var iter=0;iter<len;iter++){
							var NewWidth=parseInt($(th[iter]).css('width'));
							$(thStick[iter]).css({'width':NewWidth+1});			
							
						}
				}else{
					var OfssetTable=$(".ModulSredneyKolonki .TablicaTovarov").offset();
					//console.log(OfssetTable);
					$("#StickyTitle").css({"left":OfssetTable.left});
					var len=th.length;
					var thStick=$("#StickyTitle .TablicaTovarov tr th");
		
						for(var iter=0;iter<len;iter++){
							var NewWidth=parseInt($(th[iter]).css('width'));
							$(thStick[iter]).css({'width':NewWidth});			
							
						}
					}
			}
		}
		);
	</script>
		<?echo sprintf('<link rel="stylesheet" type="text/css" href="%s/style.css">'."\r\n",$_WEB_ROOT_ADMIN_HREF);?>

		<title>
		<?echo $title;?>
		</title>
	</head>
	<body>
	<div style="position:fixed;z-index:100;background-color: white; " class="hiddenTh" id="StickyTitle">
			<table class="TablicaTovarov">
				<tr><th class="TextNaimenovaniyStolbcov">Код</th>
					<th class="TextNaimenovaniyStolbcov">Картинка</th>
					<th class="TextNaimenovaniyStolbcov">Название</th>
					<!--<th class="TextNaimenovaniyStolbcov">Ключевое слово</th>-->
					<th class="TextNaimenovaniyStolbcov">Ключ слово</th>
					<th class="TextNaimenovaniyStolbcov">Цена руб.</th>
					<th class="TextNaimenovaniyStolbcov">Цена $</th>
					<th class="TextNaimenovaniyStolbcov">Доставка</th>
					<th class="TextNaimenovaniyStolbcov">Срок доставки</th>
					<th class="TextNaimenovaniyStolbcov">Минимальная сумма</th>
					<th class="TextNaimenovaniyStolbcov">Минимальное количество</th>

					<th class="TextNaimenovaniyStolbcov">Цена клика</th>
					<th class="TextNaimenovaniyStolbcov">Маркет</th>
					<th class="TextNaimenovaniyStolbcov">Наличие</th>

					<th class="TextNaimenovaniyStolbcov">Самовывоз</th>
					<th class="TextNaimenovaniyStolbcov">Доставка</th>
					<th class="TextNaimenovaniyStolbcov">На заказ</th>
				</tr>
			</table>
		</div>
		<div id="FonZatemneniyaKorzini"></div>
		<div id='GlavniyDIV'>
			<div id='VerxniyDiv'>
			<?require('../ObshiyeModuli/VerxniyDiv.php');?>	
			</div>
			<div id='SredniyDiv'>
			<?echo sprintf('<input type="hidden" id="AktivniyElementMenu" value="%s">'."\r\n",$id_menu);?>
			<span class="raskritiyePlus">+</span>
			<span class="raskritiyeMinus">-</span>
				<div id='LevayaKolonkaSredniyDiv'>
					<?require('../ObshiyeModuli/LevayaKolonkaSredniyDiv.php');?>
					<?require('../ObshiyeModuli/LevoeMenu.php');?>
				</div>
				
				<div id="SrednayaKolonkaSredniyDivDlyaPaneliUpravleniya">
					<?require('SrednayaKolonkaSredniyDivElement.php');?>
				</div>
			</div>

		
		<div id='NigniyDiv'>
			<?require('../ObshiyeModuli/NigniyDiv.php');?>
		</div>

		<div id='Korzina'>
			<?//require('../ObshiyeModuli/Korzina.php');?>
		</div>
	</div>
</body>
</html>


