<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
/*echo sprintf('<link rel="stylesheet" type="text/css" href="%sFilpanDesign/style.css">'."\r\n",$_WEB_ROOT);
echo sprintf('<script type="text/javascript" src="%sFilpanDesign/PageFunctions.js"></script>'."\r\n",$_WEB_ROOT);
echo sprintf('<script src="%sFunkciiIKlassi/Biblioteki/jquery/jquery-1.11.1.js"></script>'."\r\n",$_WEB_ROOT);*/



$User= new ElementUserLog();
$Korzina=$User->PoluchitKorzinu();
if($Korzina->poluchitKolichestvoElementovMassivaInformacii())
{ 	

	$SummaUsluga=0;
    $SummaUslugaViezd=0;
    $SummaTovar=0;
    $SummaTovarViezd=0;
	$VsegokOplate=0;
	$iteratorUslugi=0;
	$iteratorTovarov=0;

	while($Korzina->poluchitSleduyushiy())
	{

	$Tovar=new ElementTovarovUslug();
	$Tovar->poluchit($Korzina->_TekushiyElement['tovar_usluga_id']);
    //$Cena=$Tovar->poluchitCenuVRubliachSZaprosomKObshemuSpisku();
    $Cena=ElementTovarovUslug::poluchitCenuVRubliach($Tovar->poluchitSvoystvo('cena'),$Tovar->poluchitSvoystvo('valuta'));
    $Kolichestvo=$Korzina->_TekushiyElement['kolichestvo'];


    $CenaViezd=$_VID_NOMENKLATURI[$Tovar->poluchitSvoystvo('vid_nomenkalturi')]['cena_viezd'];
	$CenaviezdIzTabliciTovarov=$Tovar->poluchitSvoystvo('local_del');

	if($CenaviezdIzTabliciTovarov!=0) $CenaViezd=$CenaviezdIzTabliciTovarov;

	if($_VIDI_TOVAROV_USLUG['usluga']==$Tovar->poluchitSvoystvo('tip'))
	{
		$iteratorUslugi++;
		$SummaUsluga=$SummaUsluga+$Cena*$Kolichestvo;
		$SummaUslugaViezd=$SummaUslugaViezd+$CenaViezd*$Kolichestvo;
		$SummaVsegoViezd=$SummaTovarViezd+$SummaTovar+$SummaUsluga+$SummaUslugaViezd;
		$SummaVsego=$SummaTovar+$SummaUsluga;

	}
	elseif ($_VIDI_TOVAROV_USLUG['tovar']==$Tovar->poluchitSvoystvo('tip')) 
	{
		$iteratorTovarov++;
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
}
else
{
echo sprintf("Ваша корзина пуста");
}
?>




<div class="BlankZakazaDivText" id="ZakazViezd">
	<div>
	  <h3>Оформление заказа</h3>
	</div>
	<div>
	<?if($iteratorUslugi>0){echo sprintf('<br>Услуги:%s руб. + %s руб. (за доставку и работу)',$SummaUsluga,$SummaUslugaViezd);}?>
	</div>
	<div>
	<?if($iteratorTovarov>0){echo sprintf('<br>Товары:%s руб. + %s руб. (за доставку и работу)',$SummaTovar,$SummaTovarViezd);}?>
	</div>
	<div>
	<?echo sprintf('<br>Всего к оплате:%s руб.',$SummaVsegoViezd);?>
	</div>
</div>
<div class="BlankZakazaDivText" id="ZakazSamovivoz">
	<h3>Оформление заказа</h3>
	<div>
	<?if($iteratorUslugi>0){echo sprintf('<br>Услуги:%s руб. ',$SummaUsluga);}?>
	</div>
	<div>
	<?if($iteratorTovarov>0){echo sprintf('<br>Товары:%s руб. ',$SummaTovar);}?>
	</div>
	<div>
	<?echo sprintf('<br>Всего к оплате:%s руб.',$SummaVsego);?>
	</div>
</div>
<div class="BlankZakazaDivText" id="ZakazViezdBeznal">
	<div>
	  <h3>Оформление заказа</h3>
	</div>
	<div>
	<?if($iteratorUslugi>0){echo sprintf('<br>Услуги:%s руб. + %s руб. (за доставку и работу)',$SummaUsluga,$SummaUslugaViezd);}?>
	</div>
	<div>
	<?if($iteratorTovarov>0){echo sprintf('<br>Товары:%s руб. + %s руб. (за доставку и работу)',$SummaTovar,$SummaTovarViezd);}?>
	</div>
	<div>
	<?echo sprintf('<br>Всего к оплате:%s руб.',$SummaVsegoViezd*1.04);?>
	</div>
</div>
<div class="BlankZakazaDivText" id="ZakazSamovivozBeznal">
	<h3>Оформление заказа</h3>
	<div>
	<?if($iteratorUslugi>0){echo sprintf('<br>Услуги:%s руб. ',$SummaUsluga);}?>
	</div>
	<div>
	<?if($iteratorTovarov>0){echo sprintf('<br>Товары:%s руб. ',$SummaTovar);}?>
	</div>
	<div>
	<?echo sprintf('<br>Всего к оплате:%s руб.',$SummaVsego*1.04);?>
	</div>
</div>
<div class="BlankZakazaDivText">
<table>
	<tr><td>Самовывоз: <input type="checkbox" id="SAMOVIVOZ"></td>
	<tr><td>Частным лицам &nbsp</td><td><input name="pokupatel" class="RadioKnopkaPoPokupatelu" checked type="radio" value="fizicheskoe"></td><td>Организациям &nbsp </td><td><input name="pokupatel" class="RadioKnopkaPoPokupatelu" type="radio" value="uridicheskoe"></td></tr>
	<tr class="ORGANIZACIYA"><td>Наличный расчет  &nbsp</td><td><input name="raschet" class="RadioKnopkaPoSposobuOplati" checked type="radio" value="nalichniy"></td><td>Безналичный расчет &nbsp </td><td><input name="raschet" class="RadioKnopkaPoSposobuOplati"  type="radio" value="beznalichniy"></td></tr>
</table>
<table class="blankZakazaTable">
<tr>
<td>Фамилия</td>
<td><input id="FAMILIYA" type="text" value=""></td>
</tr>
<tr>
<td>Имя</td>
<td><input id="IMA" type="text" value=""></td>
</tr>
<tr class="ORGANIZACIYA">
	<td>Организация</td>
	<td><input id="ORGANIZACIYA" type="text" value=""></td>
</tr>
<tr><td>Телефон</td><td><input id="TELEFON" type="text" value=""></td></tr>
<tr><td>Адрес доставки</td><td><input id="ADRESDOSTAVKI" type="text" value=""></td></tr>
<div>
<tr><td>Станции метро</td><td>
<select name="Metro" id="METRO" >
<option value=""></option>
<option value="нет метро">нет метро</option>
<option value="Авиамоторная">Авиамоторная</option>
<option value="Автозаводская">Автозаводская</option>
<option value="Академическая">Академическая</option>
<option value="Александровский сад">Александровский сад</option>
<option value="Алексеевская">Алексеевская</option>
<option value="Алтуфьево">Алтуфьево</option>
<option value="Аннино">Аннино</option>
<option value="Арбатская">Арбатская</option>
<option value="Арбатская">Арбатская</option>
<option value="Аэропорт">Аэропорт</option>
<option value="Бабушкинская">Бабушкинская</option>
<option value="Багратионовская">Багратионовская</option>
<option value="Баррикадная">Баррикадная</option>
<option value="Бауманская">Бауманская</option>
<option value="Беговая">Беговая</option>
<option value="Белорусская">Белорусская</option>
<option value="Белорусская">Белорусская</option>
<option value="Беляево">Беляево</option>
<option value="Бибирево">Бибирево</option>
<option value="Библиотека имени Ленина">Библиотека имени Ленина</option>
<option value="Боровицкая">Боровицкая</option>
<option value="Ботанический сад">Ботанический сад</option>
<option value="Братиславская">Братиславская</option>
<option value="Бульвар Дмитрия Донского">Бульвар Дмитрия Донского</option>
<option value="Бульвар адмирала Ушакова">Бульвар адмирала Ушакова</option>
<option value="Бунинская аллея">Бунинская аллея</option>
<option value="ВДНХ">ВДНХ</option>
<option value="Варшавская">Варшавская</option>
<option value="Владыкино">Владыкино</option>
<option value="Водный стадион">Водный стадион</option>
<option value="Войковская">Войковская</option>
<option value="Волгоградский проспект">Волгоградский проспект</option>
<option value="Волжская">Волжская</option>
<option value="Воробьёвы горы">Воробьёвы горы</option>
<option value="Выставочная">Выставочная</option>
<option value="Выставочный центр">Выставочный центр</option>
<option value="Выхино">Выхино</option>
<option value="Динамо">Динамо</option>
<option value="Дмитровская">Дмитровская</option>
<option value="Добрынинская">Добрынинская</option>
<option value="Домодедовская">Домодедовская</option>
<option value="Дубровка">Дубровка</option>
<option value="Измайловская">Измайловская</option>
<option value="Калужская">Калужская</option>
<option value="Кантемировская">Кантемировская</option>
<option value="Каховская">Каховская</option>
<option value="Каширская">Каширская</option>
<option value="Каширская">Каширская</option>
<option value="Киевская">Киевская</option>
<option value="Киевская">Киевская</option>
<option value="Киевская">Киевская</option>
<option value="Китай-город">Китай-город</option>
<option value="Китай-город">Китай-город</option>
<option value="Кожуховская">Кожуховская</option>
<option value="Коломенская">Коломенская</option>
<option value="Комсомольская">Комсомольская</option>
<option value="Комсомольская">Комсомольская</option>
<option value="Коньково">Коньково</option>
<option value="Красногвардейская">Красногвардейская</option>
<option value="Краснопресненская">Краснопресненская</option>
<option value="Красносельская">Красносельская</option>
<option value="Красные ворота">Красные ворота</option>
<option value="Крестьянская застава">Крестьянская застава</option>
<option value="Кропоткинская">Кропоткинская</option>
<option value="Крылатское">Крылатское</option>
<option value="Кузнецкий мост">Кузнецкий мост</option>
<option value="Кузьминки">Кузьминки</option>
<option value="Кунцевская">Кунцевская</option>
<option value="Кунцевская">Кунцевская</option>
<option value="Курская">Курская</option>
<option value="Курская">Курская</option>
<option value="Кутузовская">Кутузовская</option>
<option value="Ленинский проспект">Ленинский проспект</option>
<option value="Лубянка">Лубянка</option>
<option value="Люблино">Люблино</option>
<option value="Марксистская">Марксистская</option>
<option value="Марьино">Марьино</option>
<option value="Маяковская">Маяковская</option>
<option value="Медведково">Медведково</option>
<option value="Международная">Международная</option>
<option value="Менделеевская">Менделеевская</option>
<option value="Молодёжная">Молодёжная</option>
<option value="Нагатинская">Нагатинская</option>
<option value="Нагорная">Нагорная</option>
<option value="Нахимовский проспект">Нахимовский проспект</option>
<option value="Новогиреево">Новогиреево</option>
<option value="Новокузнецкая">Новокузнецкая</option>
<option value="Новослободская">Новослободская</option>
<option value="Новоясеневская">Новоясеневская</option>
<option value="Новые Черёмушки">Новые Черёмушки</option>
<option value="Октябрьская">Октябрьская</option>
<option value="Октябрьская">Октябрьская</option>
<option value="Октябрьское поле">Октябрьское поле</option>
<option value="Орехово">Орехово</option>
<option value="Отрадное">Отрадное</option>
<option value="Охотный ряд">Охотный ряд</option>
<option value="Павелецкая">Павелецкая</option>
<option value="Павелецкая">Павелецкая</option>
<option value="Парк Победы">Парк Победы</option>
<option value="Парк культуры">Парк культуры</option>
<option value="Парк культуры">Парк культуры</option>
<option value="Партизанская">Партизанская</option>
<option value="Первомайская">Первомайская</option>
<option value="Перово">Перово</option>
<option value="Петровско-Разумовская">Петровско-Разумовская</option>
<option value="Печатники">Печатники</option>
<option value="Пионерская">Пионерская</option>
<option value="Планерная">Планерная</option>
<option value="Площадь Ильича">Площадь Ильича</option>
<option value="Площадь Революции">Площадь Революции</option>
<option value="Полежаевская">Полежаевская</option>
<option value="Полянка">Полянка</option>
<option value="Пражская">Пражская</option>
<option value="Преображенская площадь">Преображенская площадь</option>
<option value="Пролетарская">Пролетарская</option>
<option value="Проспект Вернадского">Проспект Вернадского</option>
<option value="Проспект Мира">Проспект Мира</option>
<option value="Проспект Мира">Проспект Мира</option>
<option value="Профсоюзная">Профсоюзная</option>
<option value="Пушкинская">Пушкинская</option>
<option value="Речной вокзал">Речной вокзал</option>
<option value="Рижская">Рижская</option>
<option value="Римская">Римская</option>
<option value="Рязанский проспект">Рязанский проспект</option>
<option value="Савёловская">Савёловская</option>
<option value="Свиблово">Свиблово</option>
<option value="Севастопольская">Севастопольская</option>
<option value="Семёновская">Семёновская</option>
<option value="Серпуховская">Серпуховская</option>
<option value="Славянский бульвар">Славянский бульвар</option>
<option value="Смоленская">Смоленская</option>
<option value="Смоленская">Смоленская</option>
<option value="Сокол">Сокол</option>
<option value="Сокольники">Сокольники</option>
<option value="Спортивная">Спортивная</option>
<option value="Сретенский бульвар">Сретенский бульвар</option>
<option value="Строгино">Строгино</option>
<option value="Студенческая">Студенческая</option>
<option value="Сухаревская">Сухаревская</option>
<option value="Сходненская">Сходненская</option>
<option value="Таганская">Таганская</option>
<option value="Таганская">Таганская</option>
<option value="Тверская">Тверская</option>
<option value="Театральная">Театральная</option>
<option value="Текстильщики">Текстильщики</option>
<option value="Телецентр">Телецентр</option>
<option value="Тимирязевская">Тимирязевская</option>
<option value="Тимирязевская">Тимирязевская</option>
<option value="Третьяковская">Третьяковская</option>
<option value="Третьяковская">Третьяковская</option>
<option value="Трубная">Трубная</option>
<option value="Тульская">Тульская</option>
<option value="Тургеневская">Тургеневская</option>
<option value="Тушинская">Тушинская</option>
<option value="Тёплый стан">Тёплый стан</option>
<option value="Улица 1905 года">Улица 1905 года</option>
<option value="Улица Академика Королёва">Улица Академика Королёва</option>
<option value="Улица Горчакова">Улица Горчакова</option>
<option value="Улица Милашенкова">Улица Милашенкова</option>
<option value="Улица Подбельского">Улица Подбельского</option>
<option value="Улица Сергея Эйзенштейна">Улица Сергея Эйзенштейна</option>
<option value="Улица Скобелевская">Улица Скобелевская</option>
<option value="Улица Старокачаловская">Улица Старокачаловская</option>
<option value="Улица академика Янгеля">Улица академика Янгеля</option>
<option value="Университет">Университет</option>
<option value="Филевский парк">Филевский парк</option>
<option value="Фили">Фили</option>
<option value="Фрунзенская">Фрунзенская</option>
<option value="Царицыно">Царицыно</option>
<option value="Цветной бульвар">Цветной бульвар</option>
<option value="Черкизовская">Черкизовская</option>
<option value="Чертановская">Чертановская</option>
<option value="Чеховская">Чеховская</option>
<option value="Чистые пруды">Чистые пруды</option>
<option value="Чкаловская">Чкаловская</option>
<option value="Шаболовская">Шаболовская</option>
<option value="Шоссе Энтузиастов">Шоссе Энтузиастов</option>
<option value="Щукинская">Щукинская</option>
<option value="Щёлковская">Щёлковская</option>
<option value="Электрозаводская">Электрозаводская</option>
<option value="Юго-Западная">Юго-Западная</option>
<option value="Южная">Южная</option>
<option value="Ясенево">Ясенево</option></select>
</td></tr>
<tr><td>E-mail</td><td><input id="EMAIL" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>ИНН/КПП</td><td><input id="INNKPP" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>Юридический адрес</td><td><input id="URADRES" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>Фактический адрес</td><td><input id="FAKADRES" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>ОКПО</td><td><input id="OKPO" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>Р/с</td><td><input id="RS" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>Банк</td><td><input id="BANK" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>БИК</td><td><input id="BIK" type="text" value=""></td></tr>
<tr class="BEZNAL"><td>К/с</td><td><input id="KS" type="text" value=""></td></tr>
</table>
<input type="button" id="OtpravitZakaz"class="OrangevayaKnopkaRezinovaya" style="width:auto !important;margin:2px;padding:2px;" value="Отправить заказ">
<input type="button" id="VernutsiyaVKorzinu"class="OrangevayaKnopkaRezinovaya" style="width:auto !important;margin:2px;padding:2px;" value="Вернуться к корзине">

</div>




