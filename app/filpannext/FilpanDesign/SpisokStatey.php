<?
$time_start = microtime(1);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$User=new ElementUserLog();



$MassivKriteriyev=array();
//$MassivKriteriyev['ssilka']=$Ssilka;
//print_r($MassivKriteriyev);
//$MassivKriteriyev['ssilka']=$_REQUEST['input_uri'];
$MassivKriteriyev['ssilka']=substr( $_SERVER['REQUEST_URI'], 1 );
$ElementVidStatyi= new ElementVidStatyi();
$ElementVidStatyi->poluchitPoKriteriyu($MassivKriteriyev);


$id=-1;
//$id_tovara=$ElementVidStatyi->poluchitSvoystvo('id');

$MassivKriterievDliyaSpiska=array();
$MassivKriterievDliyaSpiska['vid_statyi_id']=$ElementVidStatyi->poluchitSvoystvo('id');
$title=$ElementVidStatyi->poluchitSvoystvo('title');
$keywords=$ElementVidStatyi->poluchitSvoystvo('keywords');
$description=$ElementVidStatyi->poluchitSvoystvo('description');

?>
<!DOCTYPE html>
<html>
	<head>
	<?echo sprintf('<link rel="shortcut icon" href="%sFilpanDesign/PageImages/favicon.ico" type="image/x-icon">',$_WEB_ROOT);?>
	<?echo sprintf('<meta name="keywords" content="%s"/>'."\r\n",$keywords)?>
	<?echo sprintf('<meta name="description" content="%s"/>'."\r\n",$description)?>

    <?echo sprintf('<meta property="og:title" content="%s"/>'."\r\n",$title)?>
    <?echo sprintf('<meta property="og:description" content="%s"/>'."\r\n",$description)?>
    <?echo sprintf('<meta property="og:url" content="%s">'."\r\n",request_url())?>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(84421966, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
	<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<?require_once ($_SERVER['DOCUMENT_ROOT']."/filpannext/FilpanDesign/GeoTag.php");?>
	<?echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script type="text/javascript" src="%sFilpanDesign/jquery.lightbox-0.5.min.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>'."\r\n",$_WEB_ROOT);?>
	<?echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-input-mask-phone-number.min.js"></script>'."\r\n",$_WEB_ROOT);?>
	
	<script src="https://serjopepper.github.io/kick_sovetnik/dist/index.min.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-61388795-1', 'auto');
	  ga('send', 'pageview');

	</script>

	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-61388795-1']);
	_gaq.push(['_trackPageview']);
	setTimeout("_gaq.push(['_trackEvent', '15_seconds', 'read'])",15000);
	 
	(function() {
	        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
	        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>

	
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
        <a href="https://web.whatsapp.com/send?phone=79151634182" target="_blank" title="Написать в Whatsapp" rel="noopener noreferrer">
            <div class="whatsapp-button"><i class="fa fa-whatsapp"></i></div>
        </a>
        <a href="tg://resolve?domain=filpan_servise_centr" target="_blank" title="Написать в Telegram" rel="noopener noreferrer">
            <div class="telegram-button"><i class="fa fa-telegram"></i></div>
        </a>
		<div id="FonZatemneniyaKorzini"></div>
		<div id='GlavniyDIV'>
			<div id='VerxniyDiv'>
			<?require('ObshiyeModuli/VerxniyDiv.php');?>	
			</div>
			<div id='SredniyDiv'>
			<?echo sprintf('<input type="hidden" id="AktivniyElementMenu" value="%s">'."\r\n",$id);?>
			<span class="raskritiyePlus">+</span>
			<span class="raskritiyeMinus">-</span>
				<div id='LevayaKolonkaSredniyDiv'>
					<?require('ObshiyeModuli/LevayaKolonkaSredniyDiv.php');?>
				</div>
				<div id='PravayaKolonkaSredniyDiv'>
					<?require('ObshiyeModuli/PravayaKolonkaSredniyDiv.php');?>
				</div>
				<div id="SrednayaKolonkaSredniyDiv">
					<?require('SrednayaKolonkaSredniyDivSpisokStatey.php');?>
				</div>
			</div>



	</div>
		<div id='NigniyDiv'>
			<?require('ObshiyeModuli/NigniyDiv.php');?>
		</div>
			<div id='Korzina'>
			<?require('ObshiyeModuli/Korzina.php');?>
		</div>
</body>
</html>
<?
$time_end = microtime(1);
$time = $time_end - $time_start;
//echo $time;
?>