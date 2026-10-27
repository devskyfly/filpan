<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/smtp_mailer.php");
/*StrokaParametrov='FIO='+encodeURIComponent($('#FIO').val())+
'&ORGANIZACIYA='+encodeURIComponent($('#ORGANIZACIYA').val())+
'&TELEFON='+encodeURIComponent($('#TELEFON').val())+
'&ADRESDOSTAVKI='+encodeURIComponent($('#ADRESDOSTAVKI').val())+
'&METRO='+encodeURIComponent($('#METRO').val())+
'&EMAIL='+encodeURIComponent($('#EMAIL').val())+
'&INNKPP='+encodeURIComponent($('#INNKPP').val())+
'&URADRES='+encodeURIComponent($('#URADRES').val())+
'&FAKADRES='+encodeURIComponent($('#FAKADRES').val())+
'&OKPO='+encodeURIComponent($('#OKPO').val())+
'&RS='+encodeURIComponent($('#RS').val())+
'&BANK='+encodeURIComponent($('#BANK').val())+
'&KS='+encodeURIComponent($('#KS').val())+*/
$NAL=$_POST['NAL'];
$VIEZD=$_POST['VIEZD'];
$FIZ=$_POST['FIZ'];

$FAMILIYA=$_POST['FAMILIYA'];
$IMA=$_POST['IMA'];

$ORGANIZACIYA=$_POST['ORGANIZACIYA'];
$TELEFON=$_POST['TELEFON'];
$ADRESDOSTAVKI=$_POST['ADRESDOSTAVKI'];
$METRO=$_POST['METRO'];
$EMAIL=$_POST['EMAIL'];
$INNKPP=$_POST['INNKPP'];
$URADRES=$_POST['URADRES'];
$FAKADRES=$_POST['FAKADRES'];
$OKPO=$_POST['OKPO'];
$RS=$_POST['RS'];
$BANK=$_POST['BANK'];
$BIK=$_POST['BIK'];
$KS=$_POST['KS'];



$User= new ElementUserLog();
$Korzina=$User->PoluchitKorzinu();
if($Korzina->poluchitKolichestvoElementovMassivaInformacii())
{ 	

	$SummaUsluga=0;
    $SummaUslugaViezd=0;
    $SummaTovar=0;
    $SummaTovarViezd=0;
	$VsegokOplate=0;


$NomerZakaza=new ElementSpiska('filpan_new_zakaz_id ');


$MassivKriteriev=array();
$MassivKriteriev['id']=1;
$NomerZakaza->poluchitPoKriteriyu($MassivKriteriev);
$NomerZakaza->izmenitSvoystvo('nomer_zakaza',$NomerZakaza->poluchitSvoystvo('nomer_zakaza')+1);
$NomerZakaza->sohranit();

$PismoKlientu=sprintf('<div>Заказ № %s от %s</div><div>Уважаемый %s,благодарим Вас за заказ в нашем магазине. В ближайшее время наш менеджер свяжется с Вами для уточнения условий заказа.</div>', $NomerZakaza->poluchitSvoystvo('nomer_zakaza'),date("F j, Y, g:i a"),$FAMILIYA.' '.$IMA);


//Выезд к физическому лицу
$Logika=$VIEZD==1&&$FIZ==1;
if($Logika)
{
$PismoFirme=sprintf('
<div>Заказ на выезд к физическому лицу</div>
<div>Заказ № %s от %s</div>
<div>Ф.И.О:%s</div>
<div>Телефон:%s</div>
<div>Адрес доставки:%s</div>
<div>Станция метро:%s</div>
<div>E-mail:%s</div>',
$NomerZakaza->poluchitSvoystvo('nomer_zakaza'),
date("F j, Y, g:i a"),
$FAMILIYA.' '.$IMA,
$TELEFON,
$ADRESDOSTAVKI,
$METRO,
$EMAIL);
}


//Самовывоз для физического лица
$Logika=$VIEZD==0&&$FIZ==1;
if($Logika)
{
$PismoFirme=sprintf('
<div>Заказ на самовывоз от физического лица</div>
<div>Заказ № %s от %s</div>
<div>Ф.И.О:%s</div>
<div>Телефон:%s</div>
<div>E-mail:%s</div>',
$NomerZakaza->poluchitSvoystvo('nomer_zakaza'),
date("F j, Y, g:i a"),
$FAMILIYA.' '.$IMA,
$TELEFON,
$EMAIL);
}

//Выезд к юридическому лицу
$Logika=$VIEZD==1&&$FIZ==0&&$NAL==1;
if($Logika)
{
$PismoFirme=sprintf('
<div>Заказ на выезд к юридическому лицу (наличный расчет)</div>
<div>Заказ № %s от %s</div>
<div>Ф.И.О:%s</div>
<div>Организация:%s</div>
<div>Телефон:%s</div>
<div>Адрес доставки:%s</div>
<div>Станция метро:%s</div>
<div>E-mail:%s</div>
<div>ИНН/КПП:%s</div>
<div>Юридический адрес:%s</div>
<div>Фактический адрес:%s</div>
<div>ОКПО:%s</div>
<div>Р/с:%s</div>
<div>Банк:%s</div>
<div>БИК:%s</div>
<div>К/с:%s</div>',
$NomerZakaza->poluchitSvoystvo('nomer_zakaza'),
date("F j, Y, g:i a"),
$FAMILIYA.' '.$IMA,
$ORGANIZACIYA,
$TELEFON,
$ADRESDOSTAVKI,
$METRO,
$EMAIL,
$INNKPP,
$URADRES,
$FAKADRES,
$OKPO,
$RS,
$BANK,
$BIK,
$KS);
}

//Самовывоз для юридического лица
$Logika=$VIEZD==0&&$FIZ==0&&$NAL==1;
if($Logika)
{
$PismoFirme=sprintf('
<div>Заказ на самовывоз от юридического лица (наличный расчет)</div>
<div>Заказ № %s от %s</div>
<div>Ф.И.О:%s</div>
<div>Организация:%s</div>
<div>Телефон:%s</div>
<div>Адрес доставки:%s</div>
<div>Станция метро:%s</div>
<div>E-mail:%s</div>
<div>ИНН/КПП:%s</div>
<div>Юридический адрес:%s</div>
<div>Фактический адрес:%s</div>
<div>ОКПО:%s</div>
<div>Р/с:%s</div>
<div>Банк:%s</div>
<div>БИК:%s</div>
<div>К/с:%s</div>',
$NomerZakaza->poluchitSvoystvo('nomer_zakaza'),
date("F j, Y, g:i a"),
$FAMILIYA.' '.$IMA,
$ORGANIZACIYA,
$TELEFON,
$ADRESDOSTAVKI,
$METRO,
$EMAIL,
$INNKPP,
$URADRES,
$FAKADRES,
$OKPO,
$RS,
$BANK,
$BIK,
$KS);
}

//Выезд к юридическому лицу безнал
$Logika=$VIEZD==1&&$FIZ==0&&$NAL==0;
if($Logika)
{
$PismoFirme=sprintf('
<div>Заказ на выезд к юридическому лицу (безналичный расчет)</div>
<div>Заказ № %s от %s</div>
<div>Ф.И.О:%s</div>
<div>Организация:%s</div>
<div>Телефон:%s</div>
<div>Адрес доставки:%s</div>
<div>Станция метро:%s</div>
<div>E-mail:%s</div>
<div>ИНН/КПП:%s</div>
<div>Юридический адрес:%s</div>
<div>Фактический адрес:%s</div>
<div>ОКПО:%s</div>
<div>Р/с:%s</div>
<div>Банк:%s</div>
<div>БИК:%s</div>
<div>К/с:%s</div>',
$NomerZakaza->poluchitSvoystvo('nomer_zakaza'),
date("F j, Y, g:i a"),
$FAMILIYA.' '.$IMA,
$ORGANIZACIYA,
$TELEFON,
$ADRESDOSTAVKI,
$METRO,
$EMAIL,
$INNKPP,
$URADRES,
$FAKADRES,
$OKPO,
$RS,
$BANK,
$BIK,
$KS);
}

//Самовывоз для юридического лица бенал
$Logika=$VIEZD==0&&$FIZ==0&&$NAL==0;
if($Logika)
{
$PismoFirme=sprintf('
<div>Заказ на самовывоз от юридического лица (безналичный расчет)</div>
<div>Заказ № %s от %s</div>
<div>Ф.И.О:%s</div>
<div>Организация:%s</div>
<div>Телефон:%s</div>
<div>E-mail:%s</div>
<div>ИНН/КПП:%s</div>
<div>Юридический адрес:%s</div>
<div>Фактический адрес:%s</div>
<div>ОКПО:%s</div>
<div>Р/с:%s</div>
<div>Банк:%s</div>
<div>БИК:%s</div>
<div>К/с:%s</div>',
$NomerZakaza->poluchitSvoystvo('nomer_zakaza'),
date("F j, Y, g:i a"),
$FAMILIYA.' '.$IMA,
$ORGANIZACIYA,
$TELEFON,
$EMAIL,
$INNKPP,
$URADRES,
$FAKADRES,
$OKPO,
$RS,
$BANK,
$BIK,
$KS);
}

$Uslugi='<table class="tablicaBlankaZakaza" border="1"><caption>Услуги</caption>';
$Uslugi.='<tr><td>№</td><td>Артикул</td><td>Наименование</td><td>Количество</td><td>Цена</td><td>Сумма</td>';

$Tovari='<table class="tablicaBlankaZakaza" border="1"><caption>Товары</caption>';
$Tovari.='<tr><td>№</td><td>Артикул</td><td>Наименование</td><td>Количество</td><td>Цена</td><td>Сумма</td>';


$iteratorUslugi=0;
$iteratorTovarov=0;

	while($Korzina->poluchitSleduyushiy())
	{

	$Tovar=new ElementTovarovUslug();
	$Tovar->poluchit($Korzina->_TekushiyElement['tovar_usluga_id']);
	if($NAL==1)
	{
    //$Cena=$Tovar->poluchitCenuVRubliachSZaprosomKObshemuSpisku();
    $Cena=ElementTovarovUslug::poluchitCenuVRubliach($Tovar->poluchitSvoystvo('cena'),$Tovar->poluchitSvoystvo('valuta'));
	}
	else
	{
	//$Cena=$Tovar->poluchitCenuVRubliachSZaprosomKObshemuSpisku()*$_PROCENT_BEZNALA;
	$Cena=ElementTovarovUslug::poluchitCenuVRubliach($Tovar->poluchitSvoystvo('cena'),$Tovar->poluchitSvoystvo('valuta'))*$_PROCENT_BEZNALA;
	}
    $Kolichestvo=$Korzina->_TekushiyElement['kolichestvo'];


    $CenaViezd=$_VID_NOMENKLATURI[$Tovar->poluchitSvoystvo('vid_nomenkalturi')]['cena_viezd'];

    


   	if($NAL==1)
	{
    $CenaViezd=$_VID_NOMENKLATURI[$Tovar->poluchitSvoystvo('vid_nomenkalturi')]['cena_viezd'];
    $CenaviezdIzTabliciTovarov=$Tovar->poluchitSvoystvo('local_del');
	if($CenaviezdIzTabliciTovarov!=0) $CenaViezd=$CenaviezdIzTabliciTovarov;
	}
	else
	{
	$CenaViezd=$_VID_NOMENKLATURI[$Tovar->poluchitSvoystvo('vid_nomenkalturi')]['cena_viezd']*$_PROCENT_BEZNALA;
	$CenaviezdIzTabliciTovarov=$Tovar->poluchitSvoystvo('local_del');
	if($CenaviezdIzTabliciTovarov!=0) $CenaViezd=$CenaviezdIzTabliciTovarov*$_PROCENT_BEZNALA;
	}


	if($_VIDI_TOVAROV_USLUG['usluga']==$Tovar->poluchitSvoystvo('tip'))
	{
		$iteratorUslugi++;
		$Uslugi.=sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>',$iteratorUslugi,$Tovar->poluchitSvoystvo('id'),str_replace('_***_',$Tovar->poluchitSvoystvo('kluchevoe_slovo'),$Tovar->poluchitSvoystvo('nazvanie')),$Kolichestvo,$Cena,$Kolichestvo*$Cena);
		$SummaUsluga=$SummaUsluga+$Cena*$Kolichestvo;
		$SummaUslugaViezd=$SummaUslugaViezd+$CenaViezd*$Kolichestvo;
		$SummaVsegoViezd=$SummaTovarViezd+$SummaTovar+$SummaUsluga+$SummaUslugaViezd;
		$SummaVsego=$SummaTovar+$SummaUsluga;
	}
	elseif ($_VIDI_TOVAROV_USLUG['tovar']==$Tovar->poluchitSvoystvo('tip')) 
	{
		$iteratorTovarov++;
		$Tovari.=sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>',$iteratorTovarov,$Tovar->poluchitSvoystvo('id'),str_replace('_***_',$Tovar->poluchitSvoystvo('kluchevoe_slovo'),$Tovar->poluchitSvoystvo('nazvanie')),$Kolichestvo,$Cena,$Kolichestvo*$Cena);
		$SummaTovar=$SummaTovar+$Cena*$Kolichestvo;
		if($CenaViezd*$Kolichestvo>$SummaTovarViezd)
		{
		$SummaTovarViezd=$CenaViezd;
		}
		$SummaVsegoViezd=$SummaTovarViezd+$SummaTovar+$SummaUsluga+$SummaUslugaViezd;
		$SummaVsego=$SummaTovar+$SummaUsluga;
	}
	else
	{

	}			
		
	}


		if($VIEZD==1)
		{
			$UslugiPodval=sprintf('<tr><td colspan="6"> + %s руб. (за работу и доставку)</td></tr>', $SummaUslugaViezd);
		}
		else
		{
			$UslugiPodval='';
		}
		

		if($VIEZD==1)
		{
			$TovariPodval=sprintf('<tr><td colspan="6"> + %s руб. (за работу и доставку)</td></tr>', $SummaTovarViezd);
		}
		else
		{
			$TovariPodval='';
		}

		//$UslugiPodval=sprintf('<tr><td colspan="5">%s руб.</td></tr>',$SummaUsluga);
		//$TovariPodval=sprintf('<tr><td colspan="5">%s руб.</td></tr>',$SummaTovar);


		$Uslugi.=$UslugiPodval;
		$Tovari.=$TovariPodval;

		$Tovari.='</table>';
		$Uslugi.='</table>';

		if($iteratorUslugi==0)
		{
		$Uslugi='';
		}

		if($iteratorTovarov==0)
		{
		$Tovari='';
		}

		//echo $PismoKlientu;
		//echo $Tovari;
		//echo $Uslugi;



		


		if($VIEZD==1)
		{
		$PismoFirme.=$Uslugi.$Tovari.sprintf('<table class="tablicaBlankaZakaza" border="1"><tr><td>Общая сумма:</td><td>%s руб.</td></tr></table>',$SummaVsegoViezd);
		}
		else
		{
		$PismoFirme.=$Uslugi.$Tovari.sprintf('<table class="tablicaBlankaZakaza"><tr><td>Общая сумма:</td><td>%s руб.</td></tr></table>',$SummaVsego);
		}
		//echo $PismoFirme;
		$PismaOtpravleni = true;
		try
		{
			sendSiteSmtpMail(
				$_POCHTA_FIRMI,
				"Заказ от ".$FAMILIYA.' '.$IMA,
				$PismoFirme,
				$EMAIL,
				$FAMILIYA.' '.$IMA
			);
		}
		catch (Exception $exception)
		{
			error_log('Order notification email failed: ' . $exception->getMessage());
			$PismaOtpravleni = false;
		}
		
		file_put_contents($_SERVER['DOCUMENT_ROOT'].'/MailRegister.html', '<div style="border: 1px solid black; padding:5px; margin:5px;">'.$PismoFirme.'</div>',FILE_APPEND);

		if($VIEZD==1)
		{
		$PismoKlientu.=$Uslugi.$Tovari.sprintf('<table class="tablicaBlankaZakaza" border="1"><tr><td>Общая сумма:</td><td>%s руб.</td></tr></table>',$SummaVsegoViezd);
		}
		else
		{
		$PismoKlientu.=$Uslugi.$Tovari.sprintf('<table class="tablicaBlankaZakaza"><tr><td>Общая сумма:</td><td>%s руб.</td></tr></table>',$SummaVsego);
		}
		//echo $PismoKlientu;


		try
		{
			sendSiteSmtpMail(
				$EMAIL,
				"Заказ от Filpan",
				$PismoKlientu,
				$_POCHTA_FIRMI
			);
		}
		catch (Exception $exception)
		{
			error_log('Order confirmation email failed: ' . $exception->getMessage());
			$PismaOtpravleni = false;
		}

		echo $PismaOtpravleni ? "Yes" : "No";


		
}
?>
