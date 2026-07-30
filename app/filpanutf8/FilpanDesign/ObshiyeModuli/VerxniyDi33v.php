
<script type="text/javascript">
$(document).ready(function(){;


	var hleft = $('#LevayaKolonkaSredniyDiv').height();
 	hleft = hleft - 80;
	 

	// $('.ModulSredneyKolonki').css({height: hleft});
	// $('.TextoviyModulSverhu').css({height: hleft});
    // $('#SrednayaKolonkaSredniyDiv').css({height: hleft});
 
 	
	$('#show_b4').click(function(){
		$('#cblock_b4').slideToggle(180);
	});
	$('#show_b1').click(function(){
		$('#cblock_b1').slideToggle(180);
	});
	$('#show_b2').click(function(){
		$('#cblock_b2').slideToggle(180);
	});
	$('#show_b3').click(function(){
		$('#cblock_b3').slideToggle(180);
	});


	$('div#show_all_desc').click(function(){
		$('#description_prod').attr("class", "desc_pop_up");
		$('#FonZatemneniyaKorzini').show();
	});

 
	$('#show_all_desc').click(function(){
		$('.desc_pop_up').attr("class", "ContentTovara TextContenta");	
		$('#FonZatemneniyaKorzini').hide();
	});

	$('#FonZatemneniyaKorzini').click(function(){
		$('.desc_pop_up').attr("class", "ContentTovara TextContenta");	
		$('#FonZatemneniyaKorzini').hide();
	});




  

	var t1 = 1;
    setInterval(function(){

    t1 = 1;
    t1++;

    
    if (t1 == 1) {
		$("img.proizvod").removeClass("active_zpr");
		$("img.proizvod.zpr1_pr1").addClass("active_zpr");  	
	};

 	if (t2 == 2) {
		$("img.proizvod").removeClass("active_zpr");
		$("img.proizvod.zpr1_pr2").addClass("active_zpr");  	
	 
	};
 




	}, 1400);






	

    // Fixed headerbar
    var doc     = $(document),
    header  = $('#fixed_block_top');
    doc.on('scroll', function(){
        if(doc.scrollTop() > 325){
            $('.fixed_block_top').fadeIn(280);
        } else {
            $('.fixed_block_top').fadeOut(150);
        }
    });
 



	//Обработка клика на стрелку вправо
	$(document).on('click', ".carousel-button-right",function(){ 
		var carusel = $(this).parents('.carousel');
		right_carusel(carusel);
		return false;
	});
	//Обработка клика на стрелку влево
	$(document).on('click',".carousel-button-left",function(){ 
		var carusel = $(this).parents('.carousel');
		left_carusel(carusel);
		return false;
	});
	function left_carusel(carusel){
	   var block_width = $(carusel).find('.carousel-block').outerWidth();
	   $(carusel).find(".carousel-items .carousel-block").eq(-1).clone().prependTo($(carusel).find(".carousel-items")); 
	   $(carusel).find(".carousel-items").css({"left":"-"+block_width+"px"});
	   $(carusel).find(".carousel-items .carousel-block").eq(-1).remove();    
	   $(carusel).find(".carousel-items").animate({left: "0px"}, 255); 
	   
	}
	function right_carusel(carusel){
	   var block_width = $(carusel).find('.carousel-block').outerWidth();
	   $(carusel).find(".carousel-items").animate({left: "-"+ block_width +"px"}, 255, function(){
		  $(carusel).find(".carousel-items .carousel-block").eq(0).clone().appendTo($(carusel).find(".carousel-items")); 
	      $(carusel).find(".carousel-items .carousel-block").eq(0).remove(); 
	      $(carusel).find(".carousel-items").css({"left":"0px"}); 
	   }); 
	}
	
	$(function() {
	//Раскомментируйте строку ниже, чтобы включить автоматическую прокрутку карусели
	//	auto_right('.carousel:first');
	})
	
	// Автоматическая прокрутка
	function auto_right(carusel){
		setInterval(function(){
			if (!$(carusel).is('.hover'))
				right_carusel(carusel);
		}, 500)
	}
	// Навели курсор на карусель
	$(document).on('mouseenter', '.carousel', function(){$(this).addClass('hover')})
	//Убрали курсор с карусели
	$(document).on('mouseleave', '.carousel', function(){$(this).removeClass('hover')})
	

	$("#scroll_to_top").click(function (){
		$("body,html").animate({
			scrollTop:0
		}, 800);
		return false;
	});

 	$(".button_goto_cart").click(function (){
		$("body,html").animate({
			scrollTop:0
		}, 200);
		return false;
	});




});

 












</script>
<?if($NoIndex==1)
{
echo "<noindex>";
}
?>
	<div class="fixed_block_top">
		<center>
		<div class="center_top_blck_fix">
			<div class="left_cen_top_block">
				<a href="/kontakti.php" class="top_fix_hrefs" id="toper_href_1">Как нас найти</a>
				<a href="/oplata.php"   class="top_fix_hrefs" id="toper_href_2">Оплата</a>
				<a href="/dostavka.php" class="top_fix_hrefs" id="toper_href_3">Доставка</a>
				<a href="/kontakti.php" class="top_fix_hrefs" id="toper_href_4">Контакты</a>
			</div>

			 
			<div class="center_cen_top_fix" id="scroll_to_top">
				<center>
				<img src="/filpannext/FilpanDesign/PageImages/up_to_top.png" class="up_to_top_icon">
				</center>
			</div> 

			<div class="right_cen_top_block">

				<!-- <div class="top_count_prod_cart_2"> 3 товара(ов) </div> -->
				<div class="button_goto_cart">
					<img src="/filpannext/FilpanDesign/PageImages/cart_go_to.png" class="right_block">
					<span class="text_cart_top_button">Оформить заказ</span>
				</div>

				<div class="tell_block_top_fix">
					<img src="/filpannext/FilpanDesign/PageImages/top_tell.png" class="top_tell_fix_icon">
					<div class="span_top_fix">(495) 943-07-73</div>
				</div>


			</div>
		</div>
		</center>
	</div>
<?
if($NoIndex==1)
{
echo "</noindex>";
}
?>


<div class="new_header">
	<div class="left_logo_block">
		<a href="/"><img src="/filpannext/FilpanDesign/PageImages/logo.png"></a>
	</div>
	

	<div class="center_slider">
		<div class="">
		   <div class="carousel shadow"> 
		      <div class="carousel-button-left"><a href="#"></a></div> 
		      <div class="carousel-button-right"><a href="#"></a></div> 
				<div class="carousel-wrapper"> 
				   <div class="carousel-items"> 

					 		<div class="carousel-block">
							<img src="/filpannext/FilpanDesign/PageImages/b1.jpg" alt="" />
					 		</div>

					 		<div class="carousel-block">
							<img src="/filpannext/FilpanDesign/PageImages/b2.jpg" alt="" />
					 		</div>

					 		<div class="carousel-block">
							<img src="/filpannext/FilpanDesign/PageImages/b3.jpg" alt="" />
					 		</div>
 			 							 		

				   </div>
				</div>
		   </div>
		</div>	
	</div>
	

	<div class="right_contact_block">
		<div class="right_title_block">Позвоните нам!</div>

		<div class="block_cont"> 
			<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/icon_tel.png" class="con_tell"></div> 
			<a href="tel:+74959430773"><div class="blcok_text_Con">8 (495) 943-07-73</div></a>
		</div>
		<div class="block_cont"> 
			<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/icon_tel.png" class="con_tell"></div> 
			<a href="tel:+74957760570"><div class="blcok_text_Con">8 (495) 776-05-70</div></a>
		</div>
		<div class="block_cont"> 
			<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/icon_nail.png" class="con_mail"></div> 
			<a href="mailto:filpan@yandex.ru"><div class="blcok_text_Con">filpan@yandex.ru</div></a>
		</div>
		<div class="block_cont"> 
			<div class="block_ico_con"> <img src="/filpannext/FilpanDesign/PageImages/icon_skype.png" class="con_skype"></div> 
			<a href="tel:jarosss333"><div class="blcok_text_Con">jarosss333</div></a>
		</div>

		<div class="date_time_work">
			<div class="data_work_1">ПН - ПТ с 9-00 до 18-00</div>
			<div class="data_work_2">СБТ с 11-00 до 15-00 </div>
			<div class="data_work_3">(по договоренности) </div>
			<div class="data_work_4">ВСК - выходной </div>
		</div>

	</div>
</div>



<div class="new_top_menu">
	<?if($NoIndex==1)
{
echo "<noindex>";
}
?>
	<ul class="menu_top">
		<a href="/"><li class="menu_top_level_1"> <img src="/filpannext/FilpanDesign/PageImages/homee.png" class="home_icon"> </li></a>
		<a href="/kontakti.php"><li class="menu_top_level_1"> <div class="menu_text_1">  КОНТАКТЫ  </div>  <div class="menu_text_2">Как к нам проехать</div>  </li></a>
		<a href="/oplata.php"><li class="menu_top_level_1"> Оплата </li></a>
		<a href="/dostavka.php"><li class="menu_top_level_1"> Доставка </li></a>
		<a href="/zapravka-kartridzhej-v-moskve"><li class="menu_top_level_1"> Заправка картриджей</li></a>
		<a href="/statyi.php"><li class="menu_top_level_1"> Важно знать </li></a>
	</ul>


			<?echo sprintf('<form id="FormaPiska" action="%sPoiskPoSaytu">'."\r\n",$_WEB_ROOT_HREF);?>
				<?echo sprintf('<input name="StrokaPoiska" type="text" id="StrokaPoiska" value="%s" placeholder="Что будем искать ?">'."\r\n",$StrokaPoiska);?>
				<input type="submit" class="OrangevayaKnopkaRezinovaya" value="Найти">
			</form>

<?
if($NoIndex==1)
{
echo "</noindex>";
}
?>
</div>
