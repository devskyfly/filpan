<link rel="stylesheet" type="text/css" href="/styles/custom_style.css" />
<!--modal window -->

<img src="http://www.filpan.ru/images/header/img-1.gif"  class="header_logo" usemap ="#logomap">
<map name="logomap">
  <area shape="circle" coords="86,96,80" href="http://www.filpan.ru" alt="Домашняя страница" />
  <area shape="rect" coords="66,199,76,188" href="http://www.filpan.ru" alt="Домашняя страница" />
  <area shape="rect" coords="82,199,95,188" href="mailto:filpan@yandex.ru" alt="Почта" />
  <area shape="rect" coords="100,199,113,188" href="mailto:filpan@yandex.ru" alt="Структура сайта"/>
</map>

            <div class="phones">
                <img src="http://www.filpan.ru/images/header/img-4.gif"  class="header_middle_top_content_img" style="float:left">
                <div class="text1" style="float:left;height:19px;padding-top:4px;">(495) 943-07-73, (495) 776-05-70. Позвоните нам!</div>
                <div class="working_time">Режим работы:<br>
                понедельник-пятница с 9-00 до 18-00;<br>
                в субботу – с 11-00 до 15-00 (по договоренности).</div>
            </div>

<?

//usl			  
			  $kolvo=$kolichestvo;
			  $price=$cena;
				
$gifts = explode("#;#",$_COOKIE['usl']);
$usl_nums=count($gifts);
//echo"$usl_nums<br>";
for($iterator=0;$iterator<$usl_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$kolvo=$kolvo+$assos_row[2];
							$price_now=$assos_row[2]*$assos_row[3];
							$price=$price+$price_now;
							}
							
//gifts							
							
$kolvo_gifts=$kolichestvo;
$price_gifts=$cena;
				
$gifts = explode("#;#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);

for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$kolvo_gifts=$kolvo_gifts+$assos_row[2];
							$price_now=$assos_row[2]*$assos_row[3];
							$price_gifts=$price_gifts+$price_now;
							}
$kolvo_all=$usl_nums+$gifts_nums;						

						              
echo'<a href="#x" class="overlay" id="win2"></a>

<div style="max-height:97%;width: auto;height: auto;';
if($kolvo_all>5)
{echo'overflow:scroll;"';}
else{echo'"';}
echo' class="popup">';

 echo' <div class="modal_korz" id="korz_mag">';
	
	require_once($_SERVER['DOCUMENT_ROOT']."/shablon/mag_middle_content.php");
	
	echo'</div>	

</div>';
?>
<!--modal window -->
	<div class="header_right_content">
			<div class="header_right_top_content">


<?
SetCookie("korz_url",'',time()+10000);
$url=$_SERVER['REQUEST_URI'];
$suri = $_SERVER['PHP_SELF'];

$url=str_replace('&send_mail=1','',$url);
$url=str_replace('?send_mail=1','',$url);
$url=preg_replace('/[\?|\&]rand=\d{6}/','',$url);

SetCookie("korz_url",$url,time()+10000);
		
echo'<img src="http://www.filpan.ru/images/header/img-6.gif"  style="float:left" class="header_right_top_content_img">';
				
$rand=rand(100000,999999);						

if($suri=='/find.php' or $suri=='/uslfind.php'or $suri=='/search.php')
{
$sim='&';
echo'<a href="http://www.filpan.ru'.$url.'&rand='.$rand.'#win2" rel="nofollow" class="callback cart_button">Ваша корзина</a></div>';  }					
else{	
$sim='?';			
echo'<a href="http://www.filpan.ru'.$url.'?rand='.$rand.'#win2" rel="nofollow" class="callback cart_button">Ваша корзина</a></div>'; 
}  	

			$kolvo_al=$kolvo_gifts+$kolvo;


if($kolvo_al==0)
{$vis='style="visibility: hidden;"';}
else{$vis='style="visibility: visible;"';}

echo'

<a style="text-decoration: none;" href="http://www.filpan.ru'.$url.$sim.'rand='.$rand.'#win2" rel="nofollow" >
<div class="korz_s" id="korz" '.$vis.'>

   <div id="test">
    	<div style="text-align:center;">В корзине</div>
        <div>
            <div class="div_s" style="width:60px;">&nbspТоваров:</div>
            <div id="kolvo_gifts" class="div_s" style="width:20px;"> '.$kolvo_gifts.' </div>
            <div class="div_s" style="width:60px;">Сумма:</div>
            <div id="price_gifts" class="div_s" style="width:20px;"> '.$price_gifts.' </div>
        </div>
        <div>
            <div class="div_s" style="width:60px;">&nbspУслуг:</div>
            <div id="kolvo" class="div_s" style="width:20px;"> '.$kolvo.' </div>
            <div class="div_s" style="width:60px;">Сумма:</div>
            <div id="price" class="div_s" style="width:20px;"> '.$price.' </div>
        </div>
    </div>

   
</div>  
</a>';
				  ?>
          
  <div class="header_right_middle_content">

              
			<form action=
			"http://www.filpan.ru/search.php"			method="get">
			    <div class="text3">Поиск по сайту:<br><input name="query" type="text"  class="header_input_window"/><input type="submit" class="header_submit"  value="Ok"/></div>
			</form>
			</div>

          
			<div class="header_right_bottom_content">
			    <a href="http://www.filpan.ru/o nas.php" target='_blank'  class="orange_link"> КАК НАС НАЙТИ</a> <a target='_blank'  href="http://maps.yandex.ru/?text=%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F%2C%20%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%20%D0%AD%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%B4%D0%BD%D1%8B%D0%B9%20%D0%BF%D1%80%D0%BE%D0%B5%D0%B7%D0%B4%2C%2014%D1%812&sll=37.752401%2C55.760661&ll=37.752722%2C55.760061&spn=0.022101%2C0.005384&z=17&l=map" class="orange_link"><img class="kak_nayti" src="http://www.filpan.ru/images/header/img-7.gif">НА КАРТЕ</a>
			</div>
	</div>
	<div class="header_middle_content" >
			<div class="header_middle_top_content" >

			</div>
			<div class="header_middle_middle_content">
			<img src="http://www.filpan.ru/images/header/img-2.gif"  class="header_middle_middle_content_img">
			</div>
	        <div class="header_middle_bottom_content" style="text-align:center;">
               <a href="http://www.filpan.ru/o nas.php" class="orange_link" target='_blank' >
				КАК НАС НАЙТИ </a>
				<a href="http://www.filpan.ru/oplata.php"  class="header_middle_top_link">| Оплата | </a>		
				<a href="http://www.filpan.ru/dostavka.php"  class="header_middle_top_link">Доставка | </a>		
				<a href="http://www.filpan.ru/"  class="header_middle_top_link">Заправка картриджей | </a>		
				<a href="http://www.filpan.ru/statyi.php"  class="header_middle_top_link">Важно знать | </a>		
				<a href="http://www.filpan.ru/o nas.php" class="header_middle_top_link" target='_blank' >Контакты</a>			 
			</div>
	</div>