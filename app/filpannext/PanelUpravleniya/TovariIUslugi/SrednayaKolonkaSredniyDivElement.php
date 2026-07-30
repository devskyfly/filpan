<div class="ModulSredneyKolonki">
	<input type="button" value="Создать новый элемент" id="sozdatNoviyElementTovarov"  class="knopka">
<?
//$_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov']=1000000;

    if(isset($_REQUEST["show_all"]))
    {
        $_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'] = 10000000;
    }
    else
    {
        $_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'] = 100;?>

        <a href="<?=$_SERVER["REQUEST_URI"]."&show_all=1"?>">
            <input type="button" value="Показать все" class="knopka">
        </a>
    <?}




$SpisokTovarov=new TovariUslugi();
$SpisokTovarov->vibratPoliya('nazvanie,cena,picture,ssilka,id,valuta');
$SpisokTovarov->uporyadochitPoVozrastaniyu('id');
$MassivRoditeleyElementovMenuDliyaSpiska=$TekushiyElementMenu->poluchitPodchinennieElementi();
?>
<!-- <div class="blockElementovRabochegoOkna">
<input type="checkbox" id="marketChckBox"><span class="ProstoyText padding">Маркет</span>
<input type="checkbox" id="VsePozicii"><span class="ProstoyText padding">Все позиции</span>
</div> -->
<?
array_push($MassivRoditeleyElementovMenuDliyaSpiska, $TekushiyElementMenu->poluchitSvoystvo('id'));

$StrokaVivoda='';
$KolichestvoElementov=count($MassivRoditeleyElementovMenuDliyaSpiska);
for($iterator=0;$iterator<$KolichestvoElementov;$iterator++)
{
	if($iterator==($KolichestvoElementov-1))
	{
	$StrokaVivoda.=$MassivRoditeleyElementovMenuDliyaSpiska[$iterator];
	}
	else
	{
	$StrokaVivoda.=$MassivRoditeleyElementovMenuDliyaSpiska[$iterator].',';
	}

}
//echo 'where menu_id in ('.$StrokaVivoda.')';



if(count($MassivRoditeleyElementovMenuDliyaSpiska[0]))
{

$SpisokTovarov->poluchitPoKriteriyuPoStranicam($MassivRoditeleyElementovMenuDliyaSpiska,$_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'],$TekushayaStranica,0);


?>
		<div class="ModulSsilokNaStraniciTablici">
				<?
				$iterator=1;
				$KolochestvoSsilokDliyaPerehodaPoSpisku=$SpisokTovarov->poluchitKolichestvoSsilokDliyaPerehodaPoSpisku();
				while ( $iterator<= $KolochestvoSsilokDliyaPerehodaPoSpisku) {

					if($TekushayaPoziciyaStraniciSpiska==($iterator))
					{
						echo sprintf('<a href="%s/?id=%s&page=%s"><div class="TekushiyElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s</span>
							</div></a>',$_WEB_ROOT_ADMIN_HREF.'TovariIUslugi',$id_menu,$iterator,$iterator);

					}
					else
					{
						echo sprintf('<a href="%s/?id=%s&page=%s"><div class="ElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s<span></span>
							</div></a>',$_WEB_ROOT_ADMIN_HREF.'TovariIUslugi',$id_menu,$iterator,$iterator);

					}


					$iterator++;
				}
				?>

			</div>
			<?$MassivRoditeleyElementaMenu=array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());

			$TekushiyElementMenu->poluchitPodchinennieElementi();
            
			$SpisokTovarov=new TovariUslugi();
			$SpisokTovarov->vibratPoliya('nazvanie,cena,picture,ssilka,id,valuta,local_del,market,vnalichii,bid,kluchevoe_slovo,samovivoz,dostavka,nazakaz,local_del_days,min_summ,min_kol');
			$SpisokTovarov->uporyadochitPoVozrastaniyu('id');
			$MassivRoditeleyElementovMenuDliyaSpiska=$TekushiyElementMenu->poluchitPodchinennieElementi();
			array_push($MassivRoditeleyElementovMenuDliyaSpiska, $TekushiyElementMenu->poluchitSvoystvo('id'));
			//print_r($MassivRoditeleyElementovMenuDliyaSpiska);

			$SpisokTovarov->poluchitPoKriteriyuPoStranicam($MassivRoditeleyElementovMenuDliyaSpiska,$_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov'],$TekushayaStranica,0);

			?>
			<?if($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii())
			{?>
			<table class="TablicaTovarov">

					<caption>
					<?
						foreach ($MassivRoditeleyElementaMenu as $key => $value) {
							if($value!='')
							{
								$ElementMenuRoditel=new ElementMenu();
								$ElementMenuRoditel->poluchit($value);
								if($ElementMenuRoditel->poluchitSvoystvo('roditel')!=0)
								{
								echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a> | ',
								$_WEB_ROOT_HREF.$ElementMenuRoditel->poluchitSvoystvo('ssilka'),
								$ElementMenuRoditel->poluchitSvoystvo('nazvanie'));
								}
							}
						}
								echo sprintf('<a href="%s" class="ZagolovokSsilkaTabliciTovarov">%s</a>',
								$_WEB_ROOT_HREF.$TekushiyElementMenu->poluchitSvoystvo('ssilka'),
								$TekushiyElementMenu->poluchitSvoystvo('nazvanie'));
					?>
					</caption>
					<tr><th class="TextNaimenovaniyStolbcov">Код</th>
					<th class="TextNaimenovaniyStolbcov">Картинка</th>
					<th class="TextNaimenovaniyStolbcov">Название</th>
					<!--<th class="TextNaimenovaniyStolbcov">Ключевое слово</th>-->
					<th class="TextNaimenovaniyStolbcov">Ключ слово</th>
					<th class="TextNaimenovaniyStolbcov">Цена руб.</th>
					<th class="TextNaimenovaniyStolbcov">Цена $</th>
					<th class="TextNaimenovaniyStolbcov">Доставка</th>
						<th class="TextNaimenovaniyStolbcov">Срок доставка</th>
						<th class="TextNaimenovaniyStolbcov">Минимальная сумма</th>
						<th class="TextNaimenovaniyStolbcov">Минимальное количество</th>
					<th class="TextNaimenovaniyStolbcov">Цена клика</th>
					<th class="TextNaimenovaniyStolbcov">Маркет</th>
					<th class="TextNaimenovaniyStolbcov">Наличие</th>
					<!--<th class="TextNaimenovaniyStolbcov">Только самовывоз</th>-->
						<th class="TextNaimenovaniyStolbcov">Самовывоз</th>
						<th class="TextNaimenovaniyStolbcov">Доставка</th>
					<th class="TextNaimenovaniyStolbcov">На заказ</th></tr>
					<?
						//<td class="StolbecCenaAdmin">
						//	<input class="poleVvodaDannixStrokiKluchevoeSlovoTablici" id=\'input_kluchevoe_slovo\' type=\'text\' value=\'%s\'>
						//</td>

					while($SpisokTovarov->poluchitSleduyushiy())
					{

					    $SsilkaNaTovar="";

                        if (in_array("291", $MassivRoditeleyElementaMenu))
                        {
                            $SsilkaNaTovar=$_WEB_ROOT_ADMIN_HREF.'SoputstvuyushieTovariIUslugi/index.php?id='.$SpisokTovarov->_TekushiyElement['id'];
                        }
                        else
                        {
                            $SsilkaNaTovar=$_WEB_ROOT_ADMIN_HREF.'TovarUsluga/index.php?id='.$SpisokTovarov->_TekushiyElement['id'];
                        }

					    echo sprintf('
								<tr>
								<td class="StolbecArticulAdmin TextStolbecArticul">№ %s <input id=\'input_id\' type=\'hidden\' value=\'%s\'></td>
								<td class="StolbecPoridkoviyNomerAdmin">
									<a href="%s" target="_blank">
										<img src="%s" class="StolbecIzobrageniyeAdmin" alt="%s">
									</a>
								</td>
								<td class="StolbecNazvaniyeAdmin">
										<a href="%s" class="SsilkaNazvanieVTablice" target="_blank">
											%s
										</a>	
								</td>
								<td class="poleVvodaDannixStrokiKluchevoeSlovoTablici">					
									<textarea class="poleVvodaDannixStrokiKluchevoeSlovoTabliciTextArea inputText" id=\'input_kluchevoe_slovo\' type=\'text\'>%s</textarea>
								</td>
								<td class="StolbecCenaAdmin">					
									<input class="poleVvodaDannixStrokiCena inputChislo" id=\'ValutaRubl\' type=\'text\' value=\'%s\'>руб.	
								</td>
								<td class="StolbecCenaAdmin">					
									<input class="poleVvodaDannixStrokiCena inputChislo" id=\'ValutaDollar\' type=\'text\' value=\'%s\'>$	
								</td>
								<input id=\'valuta\' type=\'hidden\' value=\'%s\'>
								<input id=\'input_cena\' type=\'hidden\' value=\'%s\'>
								<td class="StolbecCenaAdmin">					
									<input class="poleVvodaDannixStrokiTablici inputChislo" id=\'input_local_del\' type=\'text\' value=\'%s\'>	
								</td>
								<td class="StolbecCenaAdmin">					
									<input class="poleVvodaDannixStrokiTablici inputText" id=\'input_local_del_days\' type=\'text\' value=\'%s\'>	
								</td>
								
								<td class="StolbecCenaAdmin">					
									<input class="poleVvodaDannixStrokiCena inputChislo" id=\'input_min_summ\' type=\'text\' value=\'%s\'>руб. или	
								</td>
								
								<td class="StolbecCenaAdmin">					
									<input class="poleVvodaDannixStrokiCena inputChislo" id=\'input_min_kol\' type=\'text\' value=\'%s\'>
								</td>
								
								
								<td class="StolbecCenaAdmin">					
									<input class="poleVvodaDannixStrokiTablici inputChislo" id=\'input_bid\' type=\'text\' value=\'%s\'>	
								</td>
								<td class="StolbecCheckBoxAdmin">					
									<input class="poleVvodaDannixChechboxStrokiTablici" id=\'input_market\' type=\'checkbox\' %s>	
								</td>
								<td class="StolbecCheckBoxAdmin">					
									<input class="poleVvodaDannixChechboxStrokiTablici" id=\'input_vnalichii\' type=\'checkbox\' %s>	
								</td>
								
								
								<td class="StolbecCheckBoxAdmin">					
									<input class="poleVvodaDannixChechboxStrokiTablici" id=\'input_samovivoz\' type=\'checkbox\' %s>	
								</td>
								
								<td class="StolbecCheckBoxAdmin">					
									<input class="poleVvodaDannixChechboxStrokiTablici" id=\'input_dostavka\' type=\'checkbox\' %s>	
								</td>
								<td class="StolbecCheckBoxAdmin">					
									<input class="poleVvodaDannixChechboxStrokiTablici" id=\'input_nazakaz\' type=\'checkbox\' %s>	
								</td>
							</tr>',
							$SpisokTovarov->_TekushiyElement['id'],
							$SpisokTovarov->_TekushiyElement['id'],
							$SsilkaNaTovar,
							$_WEB_ROOT_IMG.$SpisokTovarov->_TekushiyElement['picture'],
							$SpisokTovarov->_TekushiyElement['nazvanie'],
							$SsilkaNaTovar,
							$SpisokTovarov->_TekushiyElement['nazvanie'],
							$SpisokTovarov->_TekushiyElement['kluchevoe_slovo'],
							ElementTovarovUslug::poluchitCenuVRubliach($SpisokTovarov->_TekushiyElement['cena'],$SpisokTovarov->_TekushiyElement['valuta']),
							ElementTovarovUslug::poluchitCenuVDollarah($SpisokTovarov->_TekushiyElement['cena'],$SpisokTovarov->_TekushiyElement['valuta']),
							$SpisokTovarov->_TekushiyElement['valuta'],
							$cena = ($SpisokTovarov->_TekushiyElement['valuta']==1) ? ElementTovarovUslug::poluchitCenuVRubliach($SpisokTovarov->_TekushiyElement['cena'],$SpisokTovarov->_TekushiyElement['valuta']) : ElementTovarovUslug::poluchitCenuVDollarah($SpisokTovarov->_TekushiyElement['cena'],$SpisokTovarov->_TekushiyElement['valuta']),
							$SpisokTovarov->_TekushiyElement['local_del'],
							$SpisokTovarov->_TekushiyElement['local_del_days'],
							$SpisokTovarov->_TekushiyElement['min_summ'],
							$SpisokTovarov->_TekushiyElement['min_kol'],
							$SpisokTovarov->_TekushiyElement['bid'],
							BoolToChecked($SpisokTovarov->_TekushiyElement['market']),
							BoolToChecked($SpisokTovarov->_TekushiyElement['vnalichii']),
							BoolToChecked($SpisokTovarov->_TekushiyElement['samovivoz']),
							BoolToChecked($SpisokTovarov->_TekushiyElement['dostavka']),
							BoolToChecked($SpisokTovarov->_TekushiyElement['nazakaz'])
                        );
					}
				?></table>
				<?
				}
				else
				{
					echo sprintf('<div class="TextoviyModulSverhu">Раздел пуст</div>');
				}
				?>

				<div class="ModulSsilokNaStraniciTablici">
				<?
				$iterator=1;
				$KolochestvoSsilokDliyaPerehodaPoSpisku=$SpisokTovarov->poluchitKolichestvoSsilokDliyaPerehodaPoSpisku();
				while ( $iterator<= $KolochestvoSsilokDliyaPerehodaPoSpisku) {

					if($TekushayaPoziciyaStraniciSpiska==($iterator))
					{
						echo sprintf('<a href="%s/?id=%s&page=%s"><div class="TekushiyElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s</span>
							</div></a>',$_WEB_ROOT_ADMIN_HREF.'TovariIUslugi',$id_menu,$iterator,$iterator);

					}
					else
					{
						echo sprintf('<a href="%s/?id=%s&page=%s"><div class="ElementSsilkaStraniciTablici">
							<span class="SsilkaNaStranicuTablici">%s<span></span>
							</div></a>',$_WEB_ROOT_ADMIN_HREF.'TovariIUslugi',$id_menu,$iterator,$iterator);

					}


					$iterator++;
				}
}
else
{
	echo '<span class="ProstoyText">Выберите раздел для редактирования</span>';
}
				?>

			</div>
		</div>

</div>