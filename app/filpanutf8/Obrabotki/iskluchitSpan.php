<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");


/* function UbratSpan($string)
 {
		//print_r($string); 
		$expr='/<span data-scayt_word="([\S]*)" data-scaytid="[\d]*">[\S]*?<\/span>/';
		//echo "\r\n  Шаблон:";
		//print_r($expr);
		preg_match_all($expr, $string, $matches); 
		//echo "\r\n";
		//print_r($matches); 
		//			echo "\r\n";
		$KolichestvoSovpadeniy=count($matches[0]);
			if ($KolichestvoSovpadeniy>0) {
				for($iterator=0;$iterator<$KolichestvoSovpadeniy;$iterator++)
					{

					//echo sprintf('Ключ: %s;%s --- %s',$key,$matches[0][$iterator], $matches[1][$iterator]);
					$string=str_replace($matches[0][$iterator], $matches[1][$iterator], $string);
					}
			}

	return $string;
 }*/



$Tovari=new Spisok('filpan_new_tovari_uslugi');
$Tovari->vibratPoliya('id');
$Tovari->poluchit();

$kolichestvo=$Tovari->poluchitKolichestvoElementovMassivaInformacii();

$Massiv=$Tovari->poluchitMassivInformacii();

for($iterator=0;$iterator<$kolichestvo;$iterator++)
{
	$ElementSpiska =new ElementSpiska('filpan_new_tovari_uslugi');
	$ElementSpiska ->poluchit($Massiv[$iterator]['id']);
	$string=$ElementSpiska->poluchitSvoystvo('opisanie');
	$string=UbratSpan($string);
	$ElementSpiska->izmenitSvoystvo('opisanie',$string);


	$string=$ElementSpiska->poluchitSvoystvo('dopolnitelnoe_opisanie');
	$string=UbratSpan($string);
	$ElementSpiska->izmenitSvoystvo('dopolnitelnoe_opisanie',$string);

	$string=$ElementSpiska->poluchitSvoystvo('dopolnitelnoe_opisanie');
	$string=UbratSpan($string);
	$ElementSpiska->izmenitSvoystvo('dopolnitelnoe_opisanie',$string);

	$string=$ElementSpiska->poluchitSvoystvo('textoviy_modul');
	$string=UbratSpan($string);
	$ElementSpiska->izmenitSvoystvo('textoviy_modul',$string);

	$ElementSpiska->sohranit();
}




$Tovari=new Spisok('filpan_new_statyi');
$Tovari->vibratPoliya('id');
$Tovari->poluchit();

$kolichestvo=$Tovari->poluchitKolichestvoElementovMassivaInformacii();

$Massiv=$Tovari->poluchitMassivInformacii();

for($iterator=0;$iterator<$kolichestvo;$iterator++)
{
	$ElementSpiska =new ElementSpiska('filpan_new_statyi');
	$ElementSpiska ->poluchit($Massiv[$iterator]['id']);
	$string=$ElementSpiska->poluchitSvoystvo('text_statyi');
	$string=UbratSpan($string);
	$ElementSpiska->izmenitSvoystvo('text_statyi',$string);


	$string=$ElementSpiska->poluchitSvoystvo('dop_text_statyi');
	$string=UbratSpan($string);
	$ElementSpiska->izmenitSvoystvo('dop_text_statyi',$string);

	$ElementSpiska->sohranit();
}




echo "Obrabotka zakonchena";


/*$Tovari=new Spisok('sodraz');
$Tovari->vibratPoliya('id');
$Tovari->poluchit();
$kolichestvo=$Tovari->poluchitKolichestvoElementovMassivaInformacii();

$Massiv=$Tovari->poluchitMassivInformacii();

for($iterator=0;$iterator<$kolichestvo;$iterator++)
{
$ElementSpiska =new ElementSpiska('sodraz');
$ElementSpiska ->poluchit($Massiv[$iterator]['id']);

$string=$ElementSpiska->poluchitSvoystvo('descr');
$string=UbratSpan($string);
$ElementSpiska->izmenitSvoystvo('descr',$string);

$string=$ElementSpiska->poluchitSvoystvo('xcl');
$string=UbratSpan($string);
$ElementSpiska->izmenitSvoystvo('xcl',$string);

$string=$ElementSpiska->poluchitSvoystvo('text_modul');
$string=UbratSpan($string);
$ElementSpiska->izmenitSvoystvo('text_modul',$string);
$ElementSpiska->sohranit();
}*/


/*$Tovari=new Spisok('uslsodraz');
$Tovari->vibratPoliya('id');
$Tovari->poluchit();
$kolichestvo=$Tovari->poluchitKolichestvoElementovMassivaInformacii();

$Massiv=$Tovari->poluchitMassivInformacii();

for($iterator=0;$iterator<$kolichestvo;$iterator++)
{
$ElementSpiska =new ElementSpiska('uslsodraz');
$ElementSpiska ->poluchit($Massiv[$iterator]['id']);

$string=$ElementSpiska->poluchitSvoystvo('descr');
$string=UbratSpan($string);
$ElementSpiska->izmenitSvoystvo('descr',$string);

$string=$ElementSpiska->poluchitSvoystvo('xcl');
$string=UbratSpan($string);
$ElementSpiska->izmenitSvoystvo('xcl',$string);

$string=$ElementSpiska->poluchitSvoystvo('text_modul');
$string=UbratSpan($string);
$ElementSpiska->izmenitSvoystvo('text_modul',$string);
$ElementSpiska->sohranit();
}*/




/*
$string='<li>
		<span style="font-size:12px;"><span data-scayt_word="Производитель" data-scaytid="7">Производитель</span> OEM</span></li>
	<li>
		<span style="font-size:12px;"><span data-scayt_word="Модель" data-scaytid="8">Модель</span> для <span data-scayt_word="многофункционального" data-scaytid="9">многофункционального</span> <span data-scayt_word="устройства" data-scaytid="10">устройства</span> XEROX <span data-scayt_word="Phaser" data-scaytid="3">Phaser</span> 3010 (<span data-scayt_word="106R02183" data-scaytid="6">106R02183</span>) OEM</span></li>
	<li>
		<span style="font-size:12px;">Тип <span data-scayt_word="совместимый" data-scaytid="60">совместимый</span></span></li>
	<li>
		<span style="font-size:12px;"><span data-scayt_word="Производство" data-scaytid="61">Производство</span> <span data-scayt_word="Корея" data-scaytid="62">Корея</span></span></li>
	<li>
		<span style="font-size:12px;"><span data-scayt_word="Кол-во" data-scaytid="63">Кол-во</span> 1 <span data-scayt_word="шт" data-scaytid="64">шт</span>. Код <span data-scayt_word="производителя" data-scaytid="65">производителя</span> <span data-scayt_word="106R02183" data-scaytid="66">106R02183</span></span></li>';
print_r(UbratSpan($string));*/














?>