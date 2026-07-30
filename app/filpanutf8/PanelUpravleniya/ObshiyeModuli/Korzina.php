<?require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$User= new ElementUserLog();
$Korzina=$User->PoluchitKorzinu();





if($Korzina->poluchitKolichestvoElementovMassivaInformacii())
{
echo sprintf('<table class="TablicaKorzina">
				<tr>
					<th>Артикул</th>
					<th>Наименование</th>
					<th>Кол-во</th>
					<th>Цена</th>
					<th>Сумма</th>
					<th></th>
				</tr>');

	$VsegokOplate=0;
	while($Korzina->poluchitSleduyushiy())
	{
	$Tovar=new ElementTovarovUslug();

	$Tovar->poluchit($Korzina->_TekushiyElement['tovar_usluga_id']);
    $Cena=$Tovar->poluchitCenuVRubliachSZaprosomKObshemuSpisku();
    $Kolichestvo=$Korzina->_TekushiyElement['kolichestvo'];
		echo sprintf('<tr>
					<input type="hidden" class="id" value="%s">
					<td class="ProstoyText">№%s</td>
					<td class="TablicaKorzinaBezCentrovki"><a href="%s" class="SsilkaNazvanieVTablice">%s</a></td>
					<td class="StolbecKnopok">
						<input type="button" class="minus" value="-">
						<input type="text" class="StrokaVvodaKolichestvo" value="%s">
						<input type="button" class="plus" value="+">
					</td>
					<td class="cena">%s</td>
					<td class="summa">%s</td>
					<td><input type="button" class="OrangevayaKnopkaRezinovaya UdalitPokupku" value="Удалить"></td>
					</tr>',
					$Tovar->poluchitSvoystvo('id'),
					$Tovar->poluchitSvoystvo('id'),
					$Tovar->poluchitSvoystvo('ssilka'),
					$Tovar->poluchitSvoystvo('nazvanie'),
					$Kolichestvo,
					$Cena,
					$Kolichestvo*$Cena
					);

	$VsegokOplate+=$Cena*$Kolichestvo;	
	}

	echo sprintf('
		</table>
			<div class="DivVsegoKOplate"><span class="TextKartochkiTovara">Всего к оплате:</span><span class="CenaSumma">%s</span><span class="Cena"> руб.</span></div>
			',$VsegokOplate);
	echo sprintf('<div>
				<input type="button" class="OrangevayaKnopkaRezinovaya" value="Продолжить оформление">
				<input type="button" class="OrangevayaKnopkaRezinovaya" value="Очистить корзину">
			</div>');
}
else
{
echo sprintf("Ваша корзина пуста");
}

?>

			