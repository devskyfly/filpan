<div class="left_content">
				<div class="content-box">
				<span class="content_box_title">Каталог услуг</span>
				<?
				$way=array();
				if(!isset($_GET['raz']))$_GET['raz']=$chpu_get_raz;
				if(!isset($_GET['podc']))$_GET['podc']=$chpu_get_idraz;
                if(!isset($_GET['dopp']))$_GET['dopp']=$chpu_get_proiz;
                //if($_GET['chpu']=='false')echo $_GET['raz'].' '.$_GET['podc'].' '.$_GET['dopp'].' '.$way.' 2 '.$_GET['usl'];
				if($_GET['view']==1)
				{
				$menu_uslugi->show($_GET['raz'],$_GET['podc'],$_GET['dopp'],$way,2,$_GET['usl']);

				}
				else
				{
				$menu_uslugi->show($_GET['id'],$_GET['podc'],$_GET['dopp'],$way,2,$_GET['usl']);
				}


				?>
				</div>
				<div class="content-box">
				<span class="content_box_title">Каталог товаров</span>
				<?

				if($_GET['view']==1)
				{
					//if($_GET['chpu']=='false')echo $_GET['raz'].' '.$_GET['podc'].' '.$_GET['dopp'].' '.$way.' 1 '.$_GET['usl'];
				$menu_tovari->show($_GET['raz'],$_GET['podc'],$_GET['dopp'],$way,1,$_GET['usl']);

				}
				else
				{
				$menu_tovari->show($_GET['id'],$_GET['podc'],$_GET['dopp'],$way,1,$_GET['usl']);

				}
				?>

				</div>
				<div class="content-box" style="padding:10px;">
				<div style="clear:both;margin-left:auto;margin-right:auto;width:200px;"><a  href="http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2508/*http://grade.market.yandex.ru/?id=37776&action=link"><img src="http://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2507/*http://grade.market.yandex.ru/?id=37776&action=image&size=3" border="0" width="200" height="125" alt="Читайте отзывы покупателей и оценивайте качество магазина на Яндекс.Маркете" /></a></div>
				</div>

				<?
				$left_menu_statyi=new left_menu_statyi();
				$left_menu_statyi->show();
				?>
				<div class="content-box">
				<span class="content_box_title">Новости</span>
				<div class="inner_div">
    <?$spisok_news_statey->show_for_menu();?>
				<a href="http://www.filpan.ru/news/spisok_statey.php" class="menu_links_super_predl">Смотрите также...</a>
				</div>
				</div>
				<div class="content-box">
				<span class="content_box_title">Статьи</span>
				<div class="inner_div">
    <?$spisok_statey->show_for_menu();?>
	<a href="http://www.filpan.ru/spisok_statey.php" class="menu_links_super_predl">Смотрите также...</a>
				</div>
				</div>
				<?if($_SERVER['SCRIPT_NAME']=='/dostavka.php')
				{?>
				<div class="content-box">
				<span class="content_box_title">Информация</span>
				<div class="inner_div">
				<a class="menu_links_super_predl" href="http://musicangel.ru/ha-03m.htm">Ламповый усилитель</a>
				</div>
				</div>
				<?}?>
				<?/*<div class="content-box">
				<div class="content_box_title">Суперпредложения: <br>СОВМЕСТИМЫЕ КАРТРИДЖИ</div>
				<div class="inner_div">
				<ul class="ul_links_super_predl">
  <li class="li_links_super_predl"><a class="menu_links_super_predl" href="http://www.filpan.ru/find.php?id=655&view=1">Картридж SAMSUNG CLP-P300C - 1050 руб.</a> </li>
  <li class="li_links_super_predl"><a class="menu_links_super_predl" href="http://www.filpan.ru/find.php?id=860&view=1">Картридж совместимый НР CE505X - 2250 руб.</a> </li>
  <li class="li_links_super_predl"><a class="menu_links_super_predl" href="http://www.filpan.ru/find.php?id=871&view=1">Картридж совместимый НР Q2612A - 1400 руб.</a></li>
  <li class="li_links_super_predl"><a class="menu_links_super_predl" href="http://www.filpan.ru/find.php?id=864&view=1">Картридж совместимый HP CB 435 A - 1670 руб.</a></li>
  <li class="li_links_super_predl"><a class="menu_links_super_predl" href="http://www.filpan.ru/find.php?id=645&view=1">Картридж SAMSUNG SCX-4200 - 1700 руб.</a></li>
  <li class="li_links_super_predl"><a class="menu_links_super_predl" href="http://www.filpan.ru/find.php?id=647&view=1">Картридж SAMSUNG ML-1630/SCX 4500 - 1450 руб.</a></li>
  <li class="li_links_super_predl"><a class="menu_links_super_predl" href="http://www.filpan.ru/find.php?id=880&view=1">Картриджи Canon FX 10 - 1500 руб.</a></li>
				</ul>
				</div>
				</div>*/?>


				<div class="content-box">
				<span class="content_box_title">Интересное</span>
				<div class="inner_div">
				<div style="text-indent:10px;margin-bottom:10px;">Немного о заправке лазерных картриджей тонером...</div>

<div style="text-indent:10px;margin-bottom:10px;">Высокое качество печати после заправки или восстановления картриджа, на нашем оборудовании превосходит качество оригинала. При печати мелкого текста и таблиц, Вы сразу увидите разницу!</div>

<div style="text-indent:10px;margin-bottom:10px;">Мы используем для заправки только оригинальный тонер LG, характеристки которого полностью соответствуют типу картриджа. Ресурс печати картриджа рассчитывается из расчета 5% заполнения листа.</div>

<div style="text-indent:10px;margin-bottom:10px;">Заправка картриджей, произведенная с соблюдением всех требований, обеспечивает такое же количество отпечатанных страниц, как и новый картридж.</div>

<div style="text-indent:10px;margin-bottom:10px;">Чаще всего причиной полос по краю листа является износ внутренних компонентов картриджа, таких, как фоторецептора или ракель. Обычная заправка картриджей в случае износа этих деталей уже не помогает и требуется восстановление картриджей с заменой фоторецептора.</div>

<div style="text-indent:10px;margin-bottom:10px;">ВНИМАНИЕ!!! Тонер довольно опасен, если его вдыхать. Поэтому, существуют риски при самостоятельной заправке картриджей. Если заправка картриджей производится самостоятельно, то мы рекомендуем вам использовать перчатки и респиратор!!!! Сам по себе тонер не токсичен, но при попадании на кожу, может вызывать аллегрические реакции!!! Храните тонер в недоступном от детей месте!!!</div>
				</div>
				</div>
				<?if($_SERVER['SCRIPT_NAME']=='/index.php')
				{?>
				<div class="content-box">
				<span class="content_box_title"><a href="http://www.filpan.ru/nashi_partnery.php" class="menu_links_super_predl" style="color:white;">Наши партнеры:</a></span>
				<UL style="width:220px;list-style-type: circle;">
				<LI>Компания IDN - <a class="mail_link"	href="http://www.idn.ru" target='_blank'  rel="nofollow">продажа офисной техники</a>
оптом и в розницу! Низкие цены на расходные материалы.</LI>
				<li>
				Сервисный центр Офистех - качественная <a class="mail_link" target='_blank'
href="http://www.officetex.ru/" rel="nofollow">заправка картриджей</a> в Москве.
				</li>
				<li>
				 <a class="mail_link" target='_blank'
href="http://www.pkpz.ru/" rel="nofollow">Юристы 8-926-781-73-82</a>
				</li>
				</UL>

				</div>
				<?}?>

				<noindex>
				<div class="content-box">

				<span class="content_box_title">Прошивка принтеров и МФУ:</span>



				<ul style="color::#89898A;width:220px;list-style-type: circle;">

				<li><a class="small_link_orange" href='http://www.filpan.ru/proshivki.php'>Сводная таблица прошивок <br>Samsung, Xerox </a></li>
				</ul>
				<ul style="width:220px;list-style-type: circle;">
				<br>


				<li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=270&raz=4&view=1&usl=1'>Прошивка принтера Samsung SCX-4623F </a></li>

				  <li><a class="small_link"href='http://www.filpan.ru/uslfind.php?view=1&id=266&raz=4&view=1&usl=1'>Прошивка принтера Samsung SCX-4623FN</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=273&raz=4&podr=1&view=1&usl=1'>Прошивка принтера Samsung   ML-1910</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=311&raz=4&view=1&usl=1'>Прошивка принтера Samsung ML-2855</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=259&raz=4&view=1&usl=1'>Прошивка принтера Samsung SCX-4824</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=265&raz=4&view=1&usl=1'>Прошивка принтера Samsung SCX-4828</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=222&raz=4&view=1&usl=1'>Прошивка принтера Samsung SCX-4300</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=327&raz=4&view=1&usl=1'>Прошивка принтера Samsung SCX-3200</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=328&raz=4&view=1&usl=1'>Прошивка принтера Samsung SCX-3205</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=305&raz=4&view=1&usl=1'>Прошивка принтера Samsung ML-1640</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=330&raz=4&view=1&usl=1'>Прошивка принтера Samsung ML-1641</a></li>

				  <li><a class="small_link" href='http://www.filpan.ru/uslfind.php?view=1&id=331&raz=4&view=1&usl=1'>Прошивка принтера Samsung ML-1645</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=308&raz=4&view=1&usl=1'>Прошивка принтера Samsung ML-2245</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=371&raz=4&view=1&usl=1'>Прошивка принтера Samsung ML-1661</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=375&raz=4&view=1&usl=1'>Прошивка принтера Samsung CLP-310</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=376&raz=4&view=1&usl=1'>Прошивка принтера Samsung CLP-315</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=374&raz=4&view=1&usl=1'>Прошивка принтера Samsung CLP-320</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=372&raz=4&view=1&usl=1'>Прошивка принтера Samsung CLX-3185</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=413&raz=9&view=1&usl=1'>Прошивка принтера Samsung SCX-4833FD</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=414&raz=9&view=1&usl=1'>Прошивка принтера Samsung SCX-4833FR</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=413&raz=9&view=1&usl=1'>Прошивка принтера Samsung SCX-4833FD</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=417&raz=9&view=1&usl=1'>Прошивка принтера Samsung ML-1865W</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=411&raz=9&view=1&usl=1'>Прошивка принтера Samsung ML-3310D</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=416&raz=9&view=1&usl=1'>Прошивка принтера Samsung SCX-3205W</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=650'>Прошивка Samsung ML-1660</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=651'>Прошивка Samsung ML-1665</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=652'>Прошивка Samsung ML-1667</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=653'>Прошивка Samsung ML-1670</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=654'>Прошивка Samsung ML-1675</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=655'>Прошивка Samsung ML-1677</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=656'>Прошивка Samsung ML-1860</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=657'>Прошивка Samsung ML-1865</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=658'>Прошивка Samsung ML-1865W</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=659'>Прошивка Samsung ML-1867</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=661'>Прошивка Samsung ML-1915</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=662'>Прошивка Samsung ML-2240</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=663'>Прошивка Samsung ML-2241</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=665'>Прошивка Samsung ML-2265W</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=666'>Прошивка Samsung ML-2520</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=667'>Прошивка Samsung ML-2525</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=668'>Прошивка Samsung ML-2540</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=669'>Прошивка Samsung 2580N</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=670'>Прошивка Samsung 2850D</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=671'>Прошивка Samsung 2851ND</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=673'>Прошивка Samsung 3310D</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=674'>Прошивка Samsung 3710D</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=675'>Прошивка Samsung 3710ND</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=678'>Прошивка Samsung SCX-3205W</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=679'>Прошивка Samsung SCX-3207</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=680'>Прошивка Samsung SCX-3400F</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=681'>Прошивка Samsung SCX-3405W</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=683'>Прошивка Samsung SCX-4600</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=686'>Прошивка Samsung SCX-4728FD</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=687'>Прошивка Samsung SCX-4729FD</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=692'>Прошивка Samsung SCX-5637FR</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=694'>Прошивка Samsung CLP-310N</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=696'>Прошивка Samsung CLP-315W</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=698'>Прошивка Samsung CLP-320N</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=699'>Прошивка Samsung CLP-325</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=700'>Прошивка Samsung CLP-620ND</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=701'>Прошивка Samsung CLX-3170FN</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=702'>Прошивка Samsung CLX-3175</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=703'>Прошивка Samsung CLX-3175N</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=704'>Прошивка Samsung CLX-3175FN</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=705'>Прошивка Samsung CLX-3175FW</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=706'>Прошивка Samsung CLX-3180</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=708'>Прошивка Samsung CLX-3185N</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=709'>Прошивка Samsung CLX-3185FN</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=312&raz=4&view=1&usl=1'>Прошивка принтера Xerox 3140</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=267&raz=4&view=1&usl=1'>Прошивка принтера Xerox WorkCentre 3210N</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=268&raz=4&view=1&usl=1'>Прошивка принтера Xerox WorkCentre 3220DN</a></li>

				  <li><a class="small_link"  href='http://www.filpan.ru/uslfind.php?view=1&id=712'>Прошивка Xerox WC-3550</a></li>
					</ul>

					</div>

</noindex>



</div>
