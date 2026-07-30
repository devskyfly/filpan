<div id='LevayaKolonkaVerxniyDiv'>
<?echo sprintf('<img id="Logotip" src="%sFilpanDesign/PageImages/Logotip.gif" usemap="#logomap">'."\r\n",$_WEB_ROOT);?>
<map name="logomap">
  <?echo sprintf('<area shape="circle" coords="86,96,80" href="%s" alt="Домашняя страница"/>'."\r\n",$_WEB_ROOT_HREF);
  echo sprintf('<area shape="rect" coords="66,199,76,188" href="%s" alt="Домашняя страница" />'."\r\n",$_WEB_ROOT_HREF);
  echo sprintf(' <area shape="rect" coords="82,199,95,188" href="mailto:filpan@yandex.ru" alt="Почта" />'."\r\n",$_WEB_ROOT_HREF);
  echo sprintf('<area shape="rect" coords="100,199,113,188" href="mailto:filpan@yandex.ru" alt="Структура сайта"/>'."\r\n",$_WEB_ROOT_HREF);
  ?>
</map>

</div>
<div id='PravayaKolonkaVerxniyDiv'>
	<div id='KorzinaPravayaKolonkaVerxniyDiv'>
		<?echo sprintf('<img src="%sFilpanDesign/PageImages/Korzina.gif" class="Korzina">'."\r\n",$_WEB_ROOT);?>
		<a class='OrangevayKnopka' id="VashaKOrzina" href=''>Ваша корзина2</a>
	</div>
	<div id='PoiskPravayaKolonkaVerxniyDiv'>	
			<div class='PoiskPoSaytu'>	
			Поиск по сайту			
			</div>
			<div>
			

			
			</div>
			
	</div>
	<div id='KakNasNaytiPravayaKolonkaVerxniyDiv' class="KakNasNayti">
	<?echo '<a class="KakNasNayti" href="/kontakti.php">КАК НАС НАЙТИ</a><a class="KakNasNayti"
	  href="https://maps.yandex.ru/?text=%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F%2C%20%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%20%D0%AD%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%B4%D0%BD%D1%8B%D0%B9%20%D0%BF%D1%80%D0%BE%D0%B5%D0%B7%D0%B4%2C%2014%D1%812&sll=37.752401%2C55.760661&ll=37.752722%2C55.760061&spn=0.016952%2C0.005959&z=17&l=map">';?>
	<?echo sprintf('<img id="ZnachekKarti" src="%sFilpanDesign/PageImages/ZnachekKarti.gif">'."\r\n",$_WEB_ROOT);?> НА КАРТЕ</a>
	</div>
</div>
<div id='SrednayaKolonkaVerxniyDiv'>
	<div class='TextOrangeviyKrupniy'><?echo sprintf('<img src="%sFilpanDesign/PageImages/Telefon.gif">',$_WEB_ROOT);?>(495) 943-07-73, (495) 776-05-70. Позвоните нам!</div>
	<div class='TextRegimRaboti'>Режим работы:<br>
	понедельник-пятница с 9-00 до 18-00;<br>
	в субботу – с 11-00 до 15-00 (по договоренности).<br>
	</div>
	<?echo sprintf('
		<div id="CentrirovanniyDivStranicSayta>
		<a href="%s" class="KakNasNayti">КАК НАС НАЙТИ</a>	
		<span class="RazdelitelSsilok">|</span>

		<a href="%soplata.php" class="SsilkaNaStranicuVZagolovke">Оплата</a>	

		<span class="RazdelitelSsilok">|</span>

		<a href="%sdostavka.php" class="SsilkaNaStranicuVZagolovke">Доставка</a>	
		<span class="RazdelitelSsilok">|</span>
		<a href="%s" class="SsilkaNaStranicuVZagolovke">Заправка картриджей</a>	
		<span class="RazdelitelSsilok">|</span>
		<a href="%sstatyi.php" class="SsilkaNaStranicuVZagolovke">Важно знать</a>	
		<span class="RazdelitelSsilok">|</span>
		<a href="%skontakti.php" class="SsilkaNaStranicuVZagolovke">Контакты</a>	
	</div>'."\r\n",$_WEB_ROOT_HREF,$_WEB_ROOT_HREF,$_WEB_ROOT_HREF,$_WEB_ROOT_HREF,$_WEB_ROOT_HREF,$_WEB_ROOT_HREF,$_WEB_ROOT_HREF);?>
		
</div>