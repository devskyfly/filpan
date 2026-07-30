<?require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");

$NAL=$_GET['NAL'];
$VIEZD=$_GET['VIEZD'];
$FIZ=$_GET['FIZ'];

$FAMILIYA=$_GET['FAMILIYA'];
$IMA=$_GET['IMA'];

$ORGANIZACIYA=$_GET['ORGANIZACIYA'];
$TELEFON=$_GET['TELEFON'];
$ADRESDOSTAVKI=$_GET['ADRESDOSTAVKI'];
$METRO=$_GET['METRO'];
$EMAIL=$_GET['EMAIL'];
$INNKPP=$_GET['INNKPP'];
$URADRES=$_GET['URADRES'];
$FAKADRES=$_GET['FAKADRES'];
$OKPO=$_GET['OKPO'];
$RS=$_GET['RS'];
$BANK=$_GET['BANK'];
$BIK=$_GET['BIK'];
$KS=$_GET['KS'];



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
    /* $NomerZakaza->poluchitPoKriteriyu($MassivKriteriev);
    $NomerZakaza->izmenitSvoystvo('nomer_zakaza',$NomerZakaza->poluchitSvoystvo('nomer_zakaza')+1);
    $NomerZakaza->sohranit(); */
    
    $PismoKlientu=sprintf('<div>%s</div><div>Уважаемый %s,благодарим Вас за заказ в нашем магазине. </br>На вашу почту отправлено письмо.</br>В ближайшее время наш менеджер свяжется с Вами для уточнения условий заказа.</div>', 
        //$NomerZakaza->poluchitSvoystvo('nomer_zakaza'),
        date("F j, Y, g:i a"),
        $FAMILIYA.' '.$IMA);
    
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
    
    if($VIEZD==1)
    {
        $PismoKlientu.=$Uslugi.$Tovari.sprintf('<table class="tablicaBlankaZakaza" border="1"><tr><td>Общая сумма:</td><td>%s руб.</td></tr></table>',$SummaVsegoViezd);
    }
    else
    {
        $PismoKlientu.=$Uslugi.$Tovari.sprintf('<table class="tablicaBlankaZakaza"><tr><td>Общая сумма:</td><td>%s руб.</td></tr></table>',$SummaVsego);
    }
}


//////////////////////
if($Korzina->poluchitKolichestvoElementovMassivaInformacii())
{
echo sprintf('<div id="korzina_body">
<div class="tite_blcok_color">
		Ваш заказ принят в обработку
</div>
%s
</div>',$PismoKlientu);
	
	

}else
{
echo sprintf("Ваша корзина пуста");
}
?>