<div class="ModulSredneyKolonki">

<?
 $MassivRoditeleyElementaMenu=array_reverse($TekushiyElementMenu->poluchitRoditelskiyeElementi());
 $User=new ElementUserLog();


 	$Status='';
    if($ElementTovara->poluchitSvoystvo('market')){
     $Status.='M';
	}
	if($ElementTovara->poluchitSvoystvo('nazakaz')){
    $Status.='Z';
	}
	if($ElementTovara->poluchitSvoystvo('vnalichii')){
     $Status.='V';
	}
    
    if(count($Status)){
		
			$YandexMarket="<span style='color:white;border:1px solid red;border-radius:10px;padding:3px;background-color:red;'>$Status</span>";
    }

	
?>


<!-- Имя товара -->
<div class="titlePRD"><?echo sprintf('%s<h1 class="name_tovar" itemprop="name">%s</h1><br>',$YandexMarket,str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('nazvanie')));?></div>
<!-- Хлебные крохи -->
<div class="pathhrefs"> 
<?
foreach ($MassivRoditeleyElementaMenu as $key => $value) {
	if($value!='')
	{
	$ElementMenuRoditel=new ElementMenu();
	$ElementMenuRoditel->poluchit($value);
		if($ElementMenuRoditel->poluchitSvoystvo('roditel')!=0)
		{
		echo sprintf('<a href="%s" class="path_href">%s</a> / ',
		$_WEB_ROOT_HREF.$ElementMenuRoditel->poluchitSvoystvo('ssilka'),
		$ElementMenuRoditel->poluchitSvoystvo('nazvanie'));	
		}
	}
}
echo sprintf('<a href="%s" class="path_href">%s</a>',
$_WEB_ROOT_HREF.$TekushiyElementMenu->poluchitSvoystvo('ssilka'),
$TekushiyElementMenu->poluchitSvoystvo('nazvanie'));

if($User->VxodVAdminku())
{ echo sprintf ('<br><br><a target="_blank" href="%s" class="path_href">Редактировать</a>',$_WEB_ROOT_ADMIN_HREF.'TovarUsluga/index.php?id='.$ElementTovara->poluchitSvoystvo('id')); }?>
</div>

<!-- Левый верхний блок  -->
<div class="leftTopTovar">
	<div class="krankoeOpisanie">Краткое описание:</div>
	<!-- ОПИСАНИЕ ТОВАРА -->
	<div class="minidescrBloker">	
		<div class="description_block"><?echo sprintf('<p> %s </p>',str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), $ElementTovara->poluchitSvoystvo('opisanie')));?></div>
		<div itemprop="description" style="visibility: hidden;">
		Описание
			<?
			$str=strip_tags(
			    str_replace(
			        '_***_',
			        $ElementTovara->poluchitSvoystvo('kluchevoe_slovo'), 
			        $ElementTovara->poluchitSvoystvo('opisanie')
			        )
			    );
			echo $str;
			?>
		</div>
		<div class="hideMiniDesc">Свернуть текст</div>
	</div>
	<div class="showMiniDesc">Развернуть текст</div>

	<!-- ВНИМАНИЕ -->
	<div class="VneshniyVidTovara ProstoyText" style="margin-bottom: -3px;">
	Уважаемые покупатели! Производитель оставляет за собой право изменять характеристики товара, внешний вид упаковки и комплектность без предварительного уведомления. Товары, услуги и цены, размещенные на сайте, не являются публичной офертой.
	</div>
	<div class="VneshniyVidTovara ProstoyText">
	Уважаемые покупатели!
 Цена действительна при заказе в интернет-магазине. В розничных магазинах и заказе по телефону цена может быть другой. Стоимость доставки может ваьироваться от веса товара, удаленности от метро, как в большую, так и в меньшую сторону.
	</div>

	<div style="clear: both;"></div>
</div>

<!-- Центральный верхний блок -->
<div class="centerTopTovar">
<?//$_SHOW_IMAGES=1;?>

print_r('+++');

	<?if($_SHOW_IMAGES=='1'):?>
	<div class="marker_Blokers">
			<?
			if($ElementTovara->poluchitSvoystvo('vid_kartinka_1')=="-" || $ElementTovara->poluchitSvoystvo('vid_kartinka_1')==""){
			}
			else{
			echo sprintf('<img src="/filpannext/FilpanDesign/Tovar_Usluga_Img/%s"  id="marker-a">', $ElementTovara->poluchitSvoystvo('vid_kartinka_1'));
			}
			?>

			<?
			if($ElementTovara->poluchitSvoystvo('vid_kartinka_2')=="-" || $ElementTovara->poluchitSvoystvo('vid_kartinka_2')==""){
			}
			else{
			echo sprintf('<img src="/filpannext/FilpanDesign/Tovar_Usluga_Img/%s"  id="marker-r">', $ElementTovara->poluchitSvoystvo('vid_kartinka_2'));
			}
			?>

		<!--<img src="/filpannext/FilpanDesign/PageImages/marker-a.png" id="marker-a">
		<img src="/filpannext/FilpanDesign/PageImages/marker-r.png" id="marker-r">-->
	</div>
	<?endif;?>
	<div class="video_bloker">
		<img src="/filpannext/FilpanDesign/PageImages/video-icon.png" id="videoIcon">
		<div class="wathvideo">Как заправить ?</div>	
	</div>

	<!--<div class="sovmesimiyBloker">Совместимые</div>-->
	<!-- Картинка -->
	<div class="image_block">
		<?echo sprintf('<div><a><img src="%s" alt="%s" class="KartinkaTovara" itemprop="image"> </a></div>',$_WEB_ROOT_IMG.$ElementTovara->poluchitSvoystvo('picture'),str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovara->poluchitSvoystvo('nazvanie')));

		//Если $ElementTovara->poluchitSvoystvo('vid_kartinka_1')=="-", ничего не выводить
		// echo $_WEB_ROOT_DESIGN_IMG.$ElementTovara->poluchitSvoystvo('vid_kartinka_1');
		// В папке /filpannext/FilpanDesign/new_images/' создать файлы
		//'img1_1.png';'img1_2.png';'img1_3.png';
		// echo $_WEB_ROOT_DESIGN_IMG.$ElementTovara->poluchitSvoystvo('vid_kartinka_2');
		// В папке /filpannext/FilpanDesign/new_images/' создать файлы
		//'img2_1.png';'img2_2.png';'img2_3.png';
		?>
	</div>
</div>

<!-- Правый верхний блок -->
<div class="rightTopTovar" itemprop="offers" itemscope itemtype="https://schema.org/Offer">

	<!-- код товра-->	
	<div class="code_tovar"><?echo sprintf('<div class="ElementiContenta"id="kod_tovara"> <span class="TextKartochkiTovara">Код товара: № %s </span> </div>',$ElementTovara->poluchitSvoystvo('id'));?></div>

	<?
	$Cena=ElementTovarovUslug::poluchitCenuVRubliach($ElementTovara->poluchitSvoystvo('cena'),$ElementTovara->poluchitSvoystvo('valuta'));
	
	if($ElementTovara->poluchitSvoystvo('tolko_samovivoz')==1)
	{
	echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="Cena" style="color: #FF0000;"> Только самовывоз</span>	
	</div>');
	}
	
	if($ElementTovara->poluchitSvoystvo('vnalichii')==1)
	{
	echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="TextKartochkiTovara">Наличие:</span><span class="Cena" style="color: #75BA00;"> есть в наличии</span>	
	</div>');
	}
	elseif($ElementTovara->poluchitSvoystvo('nazakaz')==1)
	{
	echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="TextKartochkiTovara">Наличие:</span><span class="Cena" > на заказ (уточняйте у менеджера)</span>	
	</div>');
	}
	else
	{
	echo sprintf('<div class="ElementiContenta naliche_block">
	<span class="TextKartochkiTovara">Наличие:</span><span class="Cena"> на заказ (уточняйте у менеджера)</span>	
	</div>');
	}
	?>

	<?echo sprintf('

		<!-- ЦЕНА -->	
		<div class="ElementiContenta" id="price_block">
			<div class="cena_title">Цена:</div>
			<div class="cena_count" itemprop="price" content="%s">%s <span itemprop="priceCurrency" content="RUB">руб.</span></div>
		</div>

	 	<div style="clear: both;"></div>

		<!-- КНОПКА КУПИТЬ -->	
		<div class="DivContentSuperPredlogeniye" id="block_buy_prod">
			<input type="text" value="1" class="StrokaVvodaKolichestvo_big StrokaVvodaKolichestvo">
			<div class="counts_buttons">
				<div class="addcount pluse_add">+</div>
				<div class="addcount minus_add">-</div>
			</div>	
			<div class="button_add_to_cart_big KorzinaKupit ">
				<img src="%sFilpanDesign/PageImages/big_cart.png" class="add_to_cart_icon_big">
				<span class="add_to_cart_text_button_big">Добавить в корзину</span>
			</div>

			<input type="hidden" value="%s">

			<div style="clear: both;"></div>


			<div class="dostavka_i_oplata">
			<!-- <center> -->
				<div class="bloker_info_timework">
			
					<!-- БЛОК ИФНФОРМАЦИИ  -->
					<div class="info_timework_block">
						<!-- ЗАГОЛОВОК -->
						<div class="info_time_title" id="show_b4"> 
							<img src="/filpannext/FilpanDesign/PageImages/icon_prod_1.png" class="info_time_icon_1"> 
							<span class="info_time_text_title">Время работы</span> 
						</div>
			
						<!-- ИНФОРМАЦИЯ -->
						<div class="info_information" id="cblock_b4">
							ПН - ПТ с 9-00 до 18-00 <br>
							СБТ с 11-00 до 15-00 <br>
							ВСК - выходной <br>
						</div>
					</div>
			
			
					<!-- БЛОК ИФНФОРМАЦИИ  -->
					<div class="info_timework_block">
						<!-- ЗАГОЛОВОК -->
						<div class="info_time_title" id="show_b1"> 
							<img src="/filpannext/FilpanDesign/PageImages/icon_prod_2.png" class="info_time_icon_2"> 
							<span class="info_time_text_title">Контакты</span> 
						</div>
			
						<!-- ИНФОРМАЦИЯ -->
						<div class="info_information" id="cblock_b1">
			
							<div class="block_cont"> 
								<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/tell_gray.png" class="con_tell"></div> 
								<a href="tel:+74959430773"><div class="blcok_text_Con" style="color: rgb(144, 144, 144);">(495) 943-07-73</div></a>
							</div>
							<div class="block_cont"> 
								<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/tell_gray.png" class="con_tell"></div> 
								<a href="tel:+74957760570"><div class="blcok_text_Con" style="color: rgb(144, 144, 144);">(495) 776-05-70</div></a>
							</div>
							<div class="block_cont"> 
								<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/mail_gray.png" class="con_mail"></div> 
								<a href="mailto:filpan@yandex.ru"><div class="blcok_text_Con" style="color: rgb(144, 144, 144);">filpan@yandex.ru</div></a>
							</div>
							<div class="block_cont"> 
								<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/skype_gray.png" class="con_skype"></div> 
								<a href="tel:jarosss333"><div class="blcok_text_Con" style="color: rgb(144, 144, 144);">jarosss333</div></a>
							</div>
							<a href="/kontakti.php" target="_blank" class="more_link_cont_prod">подробнее</a>
						</div>
					</div>
			
			
					<!-- БЛОК ИФНФОРМАЦИИ  -->
					<div class="info_timework_block" id="show_b2">
						<!-- ЗАГОЛОВОК -->
						<div class="info_time_title"> 
							<img src="/filpannext/FilpanDesign/PageImages/icon_prod_3.png" class="info_time_icon_3"> 
							<span class="info_time_text_title">Оплата товара</span> 
						</div>
			
						<!-- ИНФОРМАЦИЯ -->
						<div class="info_information" id="cblock_b2">
							• Наличный платеж <br>
							• Безналичный платеж <br>
							<a href="/oplata.php" target="_blank" class="more_link_cont_prod">подробнее</a>
						</div>
					</div>
			
					<!-- БЛОК ИФНФОРМАЦИИ  -->
					<div class="info_timework_block" id="show_b3">
						<!-- ЗАГОЛОВОК -->
						<div class="info_time_title"> 
							<img src="/filpannext/FilpanDesign/PageImages/icon_prod_4.png" class="info_time_icon_4"> 
							<span class="info_time_text_title">Доставка товара</span> 
						</div>
			
						<!-- ИНФОРМАЦИЯ -->
						<div class="info_information" id="cblock_b3">
							• Самовывоз <br>
							• Доставка курьером <br>
							<a href="/dostavka.php" target="_blank" class="more_link_cont_prod">подробнее</a>
						</div>
					</div>
			
				</div>
			<!-- </center> -->
			</div>


		</div>	

	</div>

	',
	$Cena, $Cena,
	$_WEB_ROOT,
	$ElementTovara->poluchitSvoystvo('id'),
	$_WEB_ROOT_HREF,
	$_WEB_ROOT,
	$_WEB_ROOT_HREF,
	$_WEB_ROOT,
	$_WEB_ROOT,
	str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovara->poluchitSvoystvo('nazvanie')),
	str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovara->poluchitSvoystvo('opisanie')));
	?>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('.pluse_add').click(function(){
			var countPRD = $('.StrokaVvodaKolichestvo_big').val();
			countPRD ++;
			$('.StrokaVvodaKolichestvo_big').val(countPRD);
		});
		$('.minus_add').click(function(){
			var countPRD = $('.StrokaVvodaKolichestvo_big').val();
			countPRD --;
			$('.StrokaVvodaKolichestvo_big').val(countPRD);
		});

		// var bodyWidth = $('html').width();
  		//   	if (bodyWidth <= '960') {
		// 	$('div.leftTopTovar').prependTo("div.pastemober");
  		//   	}

  		$('.butons_params').click(function(){
  			$('.butons_params').attr("class", "butons_params");
  			$(this).attr("class", "butons_params active_button_param");
  		});

		$('#btab-1').click(function(){
			$('#opisanie').show();
			$('#otzivy').hide(); 
			$('#harakteristiki').hide();
  		});

		$('#btab-2').click(function(){
			$('#harakteristiki').show();
			$('#opisanie').hide();
			$('#otzivy').hide(); 
  		});

		$('#btab-3').click(function(){
			$('#otzivy').show(); 
			$('#opisanie').hide();
			$('#harakteristiki').hide();
  		});

  		$('.showMiniDesc').click(function(){
  			$('.minidescrBloker').addClass( "active", 1000, "easeOutBounce" );
  			$('#SrednayaKolonkaSredniyDivDlyaTovara').attr("style", "overflow: visible;")
  		});

  		$('.minidescrBloker').click(function(){
  			$('.minidescrBloker').removeClass( "active" )
  		});
  		
  		$('.hideMiniDesc').click(function(){
  			$('.minidescrBloker').removeClass( "active" )
  			$('#SrednayaKolonkaSredniyDivDlyaTovara').attr("style", "overflow: hidden;")
  		});


  		// $('.minidescrBloker').click(function(){
  		// 	$('.minidescrBloker').attr("class", "minidescrBloker active")
  		// });

  		// $('.minidescrBloker.active').click(function(){
  		// 	$('.minidescrBloker').attr("class", "minidescrBloker")
  		// });

  		// $('.hideMiniDesc').click(function(){
  		// 	$('.minidescrBloker').attr("class", "minidescrBloker")
  		// });


	});
</script>
<div class="pastemober"></div>
























<div class="LevoeObsheeOknoKartochkaTovara">
<div class="ContentElementiLevoeObsheeOknoKartochkaTovara">
	
<!-- ПЕРЕКЛЮЧАТЕЛИ -->
<div id="btab-1" class="butons_params active_button_param">Описание</div>
<div id="btab-2" class="butons_params">Характеристики</div>
<div id="btab-3" class="butons_params">Отзывы</div>

<div class="block_param_and_rew">
	<?if(mb_strlen(($ElementTovara->poluchitSvoystvo('harakteristiki')))){?>
		<!-- БЛОК ХАРАКТЕРИСТИК -->
		<div class="block_param new" id="harakteristiki">
		<?echo str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovara->poluchitSvoystvo('harakteristiki'));?>
			<!-- <div class="param_line"><span class="name_param">Устройство</span><span class="param_informer">принтер</span></div>
			<div class="param_line white_line"><span class="name_param">Технология печати	</span><span class="param_informer">лазерная</span></div>
			<div class="param_line"><span class="name_param">Тип печати</span><span class="param_informer">черно-белая</span></div>
			<div class="param_line white_line"><span class="name_param">Область применения</span><span class="param_informer">средний офис</span></div>
			<div class="param_line"><span class="name_param">Максимальный формат</span><span class="param_informer">A4</span></div>
			<div class="param_line white_line"><span class="name_param">Автоматическая двусторонняя печать</span><span class="param_informer">есть</span></div>
			<div class="param_line"><span class="name_param">Максимальное разрешение для ч/б печати</span><span class="param_informer">1200x1200 dpi</span></div>
			<div class="param_line white_line"><span class="name_param">Скорость печати</span><span class="param_informer">28 стр/мин (ч/б А4)</span></div> -->
		</div>
	<?}?>


	<!-- ОПИСАНИЕ -->
	<?$dopolnitelnoe_opisanie=str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovara->poluchitSvoystvo('dopolnitelnoe_opisanie'));
	if(strlen($dopolnitelnoe_opisanie)) {?>
	<div class="block_param new" id="opisanie">
		<?echo sprintf('<div class="DopolnitelnoeOpisanie TextContenta">%s</div>',$dopolnitelnoe_opisanie);?>
	</div>
	<?
	}
	else
	{
	?>
	<div class="header_cart_prod"></div><div class="DopolnitelnoeOpisanie TextContenta"></div></div>
	<?	
	}
	?>
	<?
	//print_r($SoputstvuyushieTovari->poluchitMassivInformacii());
	//$SoputstvuyushieTovari=new SoputstvuyushieTovariIUslugi();
	//$MassivKriteriev=array();
	//$MassivKriteriev['tip']=$_VIDI_TOVAROV_USLUG['tovar'];
	//$SoputstvuyushieTovari->vibratPoliya('nazvanie,cena,picture,ssilka,id,valuta');
	//$SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
	?>

	<div class="block_param new" id="otzivy">
			 
	</div>

</div>






			

					<?
					$SoputstvuyushieTovari=new SoputstvuyushieTovariIUslugi();
					$MassivKriteriev=array();
					$MassivKriteriev['id_tovara_uslugi']=$id_tovara;
					$MassivKriteriev['tip']=$_VIDI_TOVAROV_USLUG['tovar'];
					//print_r($MassivKriteriev);
					$SoputstvuyushieTovari->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
					$SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
					if($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii())
					{?>

					<div class="SoputstvuyushieTovariIUslugi">
					<div class="SoputstvuyushieTovari">
					<span class="ZagolovokSoputstvuyushieTovari">Сопутствующие товары</span>
					<div class="ObshiySpisokSoputstvuushixTovarov">
		

					<div class="carousel shadow"> 
		   			<div class="carousel-button-left" id="left_sop_tovar"><a href="#" id="res_image_left"></a></div> 
		   			<div class="carousel-button-right" id="right_sop_tovar"><a href="#"  id="res_image_right"></a></div> 	
					<div class="carousel-wrapper"> 
				    <div class="carousel-items"> 
								
									<?
								while($SoputstvuyushieTovari->poluchitSleduyushiy())
								{
									$ElementTovarov=new ElementTovarovUslug();
									$ElementTovarov->poluchit($SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);
									
									echo sprintf('

					 		<div class="carousel-block">

										<div class="SoputstvuyushiyTovarElement">
										<center>
										<div class="block_sop_tovar_informer">
											<div>
												<a href="%s"><img src="%s" class="KartinkaTovaraSoputstvuyushiyTovarElement" alt="%s"></a>
											</div>	
											<div class="ElementiContentaSoputstvuyushiyTovarElement">
											<a href="%s" class="SsilkaNaSoputstvushiyTovar">%s</a>
											</div>

											<div class="ElementiContentaSoputstvuyushiyTovarElement" id="price_blocker">
											<span class="Cena" id="new_sop_price"> %s руб.</span>	
											</div>

											<div class="ElementiContentaSoputstvuyushiyTovarElement">
											 
											</div>	
											</div>	


											<div class="DivContentSoputstvuyushiyTovarElement" id="bottom_sop_tovar">

												<span class="ProstoyText"></span><input type="text" value="1" class="StrokaVvodaKolichestvo" id="val_gold">	
												<div class="button_add_to_cart" id="goldcolor">
													<img src="/filpannext/FilpanDesign/PageImages/add_to_cart_button_icon.png" class="add_to_cart_icon_sop_2" >
													<span class="add_to_cart_text_button_sop_2">купить</span>
												</div>
										
												<input type="hidden" value="%s">
											</div>	

										</center>	
										</div>
					 		</div>
				 							 		

									',
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									$_WEB_ROOT_IMG.$ElementTovarov->poluchitSvoystvo('picture'),
									str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovarov->poluchitSvoystvo('nazvanie')),
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									mb_substr(str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovarov->poluchitSvoystvo('nazvanie')),0,100).'...',
									ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'),$ElementTovarov->poluchitSvoystvo('valuta')),
									$_WEB_ROOT,
									$ElementTovarov->poluchitSvoystvo('id'));	
										
								}?>

					</div>
					</div>
					</div>


						</div>
						</div>	
						<?}?>
						<?
						$SoputstvuyushieTovari=new SoputstvuyushieTovariIUslugi();
						$MassivKriteriev=array();
						$MassivKriteriev['id_tovara_uslugi']=$id_tovara;
						$MassivKriteriev['tip']=$_VIDI_TOVAROV_USLUG['usluga'];
						$SoputstvuyushieTovari->vibratPoliya('id_soputstvuyushego_tovara_uslugi');
						$SoputstvuyushieTovari->poluchitPoKriteriyu($MassivKriteriev);
						if($SoputstvuyushieTovari->poluchitKolichestvoElementovMassivaInformacii())
						{
						?>
						<div class="SoputstvuyushieTovari">
						<span class="ZagolovokSoputstvuyushieTovari">Сопутствующие услуги</span>
						<div class="ObshiySpisokSoputstvuushixTovarov">
							

					<div class="carousel shadow"> 
		   			<div class="carousel-button-left" id="left_sop_tovar"><a href="#" id="res_image_left"></a></div> 
		   			<div class="carousel-button-right" id="right_sop_tovar"><a href="#"  id="res_image_right"></a></div> 	

					<div class="carousel-wrapper"> 
				    <div class="carousel-items"> 
								
								<?
								while($SoputstvuyushieTovari->poluchitSleduyushiy())
								{

									$ElementTovarov=new ElementTovarovUslug();
									$ElementTovarov->poluchit($SoputstvuyushieTovari->_TekushiyElement['id_soputstvuyushego_tovara_uslugi']);
									
									echo sprintf('




					 					<div class="carousel-block">
										

													<div class="SoputstvuyushiyTovarElement">
													<center>
													<div class="block_sop_tovar_informer">
														<div>
															<a href="%s"><img src="%s" class="KartinkaTovaraSoputstvuyushiyTovarElement" alt="%s"></a>
														</div>	
														<div class="ElementiContentaSoputstvuyushiyTovarElement">
														<a href="%s" class="SsilkaNaSoputstvushiyTovar">%s</a>
														</div>

														<div class="ElementiContentaSoputstvuyushiyTovarElement" id="price_blocker">
														<span class="Cena" id="new_sop_price"> %s руб.</span>	
														</div>

														<div class="ElementiContentaSoputstvuyushiyTovarElement">
														 
														</div>	
														</div>

														<div class="DivContentSoputstvuyushiyTovarElement" id="bottom_sop_tovar">

															<span class="ProstoyText"></span><input type="text" value="1" class="StrokaVvodaKolichestvo" id="val_gold">	
															<div class="button_add_to_cart" id="goldcolor">
																<img src="/filpannext/FilpanDesign/PageImages/add_to_cart_button_icon.png" class="add_to_cart_icon_sop_2" >
																<span class="add_to_cart_text_button_sop_2">купить</span>
															</div>
													
															<input type="hidden" value="%s">
														</div>	

													</center>	
													</div>

					 					</div>


									',
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									$_WEB_ROOT_IMG.$ElementTovarov->poluchitSvoystvo('picture'),
									str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovarov->poluchitSvoystvo('nazvanie')),
									$_WEB_ROOT_HREF.$ElementTovarov->poluchitSvoystvo('ssilka'),
									mb_substr(str_replace('_***_',$ElementTovara->poluchitSvoystvo('kluchevoe_slovo'),$ElementTovarov->poluchitSvoystvo('nazvanie')),0,100).'...',
									ElementTovarovUslug::poluchitCenuVRubliach($ElementTovarov->poluchitSvoystvo('cena'),$ElementTovarov->poluchitSvoystvo('valuta')),
									$_WEB_ROOT,
									$ElementTovarov->poluchitSvoystvo('id'));
										
								}?>

					</div>
					</div>

					</div>

						</div>
						
						</div>
						<?}?>	

					</div>
			<?
			//if(empty($ElementTovara->poluchitSvoystvo('textoviy_modul'))){
				echo sprintf('<div style ="padding:30px">%s</div>',$ElementTovara->poluchitSvoystvo('textoviy_modul'));
			//}
			?>

				</div>
				</div>



				</div>
