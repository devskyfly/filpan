<?
class user
{
//#-#
//#;#
function user()
{

}


function update_gift($id,$kolichestvo)
{
$gifts = explode("#;#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);
$gifts_for_cook=array();
$poziciya_naydena=0;
							for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							
							
							$assos_gifts[$iterator]['id']=$assos_row[0];
							$assos_gifts[$iterator]['name']=$assos_row[1];
											if($assos_row[0]==$id)
											{
											$poziciya_naydena=1;
											$assos_gifts[$iterator]['colichestvo']=$kolichestvo;
											}
											else
											{
											$assos_gifts[$iterator]['colichestvo']=$assos_row[2];
											}
							$assos_gifts[$iterator]['cena']=$assos_row[3];
							
							
							$gifts_for_cook[$iterator]=implode("#-#",$assos_gifts[$iterator]);
							
							}
	
	

	$gifts_for_cook=implode("#;#",$gifts_for_cook);
	
	
	if(!SetCookie("gifts",$gifts_for_cook,time()+10000,'/'))
	{ echo $gifts_nums."?<br>\n";
	echo "Cook ne vstal<br>\n";
	}			
}


function update_usl($id,$kolichestvo)
{
$gifts = explode("#;#",$_COOKIE['usl']);
$gifts_nums=count($gifts);

if($gifts_nums&&!empty($_COOKIE['usl']))
{
$gifts_for_cook=array();
$poziciya_naydena=0;
							for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							
							
							$assos_gifts[$iterator]['id']=$assos_row[0];
							$assos_gifts[$iterator]['name']=$assos_row[1];
											if($assos_row[0]==$id)
											{
											$poziciya_naydena=1;
											$assos_gifts[$iterator]['colichestvo']=$kolichestvo;
											}
											else
											{
											$assos_gifts[$iterator]['colichestvo']=$assos_row[2];
											}
							$assos_gifts[$iterator]['cena']=$assos_row[3];
							

							$gifts_for_cook[$iterator]=implode("#-#",$assos_gifts[$iterator]);
							}
	
	if($poziciya_naydena)
	{
	$gifts_for_cook=implode("#;#",$gifts_for_cook);
	}
	else
	{
	$gifts_for_cook=implode("#;#",$gifts_for_cook);
	$gifts_for_cook=$gifts_for_cook."#;#".$id."#-#".$name."#-#".$kolichestvo."#-#".$cena;
	}
	if(!SetCookie("usl",$gifts_for_cook,time()+10000,'/'))
	{ echo $gifts_nums."?<br>\n";
	echo "Cook ne vstal<br>\n";
	}			
}
else
{
$gifts_for_cook=$id."#-#".$name."#-#".$kolichestvo."#-#".$cena;
			if(!SetCookie("usl",$gifts_for_cook,time()+10000,'/'))
				{ echo $gifts_nums."?<br>\n";
				echo "Cook ne vstal<br>\n";
				}
}
}









function delite_gift($id)
{
$gifts = explode("#;#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);
$gifts_for_cook=array();
$poziciya_naydena=0;
$new_iterator=0;
							for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							
							
							
											if($assos_row[0]==$id)
											{
											 
											}
											else
											{
											$assos_gifts[$new_iterator]['id']=$assos_row[0];
										    $assos_gifts[$new_iterator]['name']=$assos_row[1];
											$assos_gifts[$new_iterator]['colichestvo']=$assos_row[2];
											$assos_gifts[$new_iterator]['cena']=$assos_row[3];
											$gifts_for_cook[$iterator]=implode("#-#",$assos_gifts[$new_iterator]);
											$new_iterator++;
											}
							
							
							
							
							
							}
	
	

	$gifts_for_cook=implode("#;#",$gifts_for_cook);
	
	
	if(!SetCookie("gifts",$gifts_for_cook,time()+10000,'/'))
	{ echo $gifts_nums."?<br>\n";
	echo "Cook ne vstal<br>\n";
	}			
}


function delite_usl($id)
{
$gifts = explode("#;#",$_COOKIE['usl']);
$gifts_nums=count($gifts);
$gifts_for_cook=array();
$poziciya_naydena=0;
$new_iterator=0;
							for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							
							
							
											if($assos_row[0]==$id)
											{
											 
											}
											else
											{
											$assos_gifts[$new_iterator]['id']=$assos_row[0];
										    $assos_gifts[$new_iterator]['name']=$assos_row[1];
											$assos_gifts[$new_iterator]['colichestvo']=$assos_row[2];
											$assos_gifts[$new_iterator]['cena']=$assos_row[3];
											$gifts_for_cook[$iterator]=implode("#-#",$assos_gifts[$new_iterator]);
											$new_iterator++;
											}
							
							
							
							
							
							}
	
	

	$gifts_for_cook=implode("#;#",$gifts_for_cook);
	
	
	if(!SetCookie("usl",$gifts_for_cook,time()+10000,'/'))
	{ echo $gifts_nums."?<br>\n";
	echo "Cook ne vstal<br>\n";
	}		
}

function clear_gifts()
{
SetCookie("gifts",'',time()+10000,'/');
}
function clear_usl()
{
SetCookie("usl",'',time()+10000,'/');
}


function get_array_all_gifts()
{

if(mb_strlen($_COOKIE['gifts'])==0){return array();}
$gifts = explode("#;#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);


							for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$assos_gifts[$iterator]['id']=$assos_row[0];
							$assos_gifts[$iterator]['name']=$assos_row[1];
							$assos_gifts[$iterator]['colichestvo']=$assos_row[2];
							$assos_gifts[$iterator]['cena']=$assos_row[3];
							}
							//print_r($assos_gifts);
							//print_r($assos_gifts);
							return $assos_gifts;
}

function get_array_all_usl()
{
if(mb_strlen($_COOKIE['usl'])==0){return array();}
$gifts = explode("#;#",$_COOKIE['usl']);
$gifts_nums=count($gifts);


							for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$assos_gifts[$iterator]['id']=$assos_row[0];
							$assos_gifts[$iterator]['name']=$assos_row[1];
							$assos_gifts[$iterator]['colichestvo']=$assos_row[2];
							$assos_gifts[$iterator]['cena']=$assos_row[3];
							}
							//print_r($assos_gifts);
							return $assos_gifts;
}

function show_korzina()
{
$usl=$this->get_array_all_usl();
$gifts=$this->get_array_all_gifts();




$size_usl=count($usl);
$size_gift=count($gifts);

if (($size_usl==0) and ($size_gift==0))
{
echo "<span class=\"text4\">Ваша корзина пуста </span>";
return;
}
else
{
//echo "Uslugi:".count($usl) ."Tovari".count($gifts);


echo "<table class=\"catalog_table\">\n";
echo "<tr>\n";
echo "<th width=\"10%\">Артикул</th>\n";
echo "<th >Наименование</th>\n";
echo "<th width=\"35%\">Кол-во</th>\n";
echo "<th width=\"7%\">Цена</th>\n";
echo "<th width=\"7%\">Сумма</th>\n";
echo "<th width=\"7%\">Удалить</th>\n";
echo "</tr>\n";


$summa=0;
foreach($usl as $row)
{
echo "<tr>\n";
echo "<td><span class=\"catalog_table_price_1\">Артикул</span></td>";
echo "<td ><a href=\"http://www.filpan.ru/uslfind.php?id=".$row['id']."&view=1&usl=1\" class=\"modal_text\">".$row['name']."</span></a></td>\n";
echo "<td align=\"center\">




<span class=\"minus\" onclick=\"minus(".$row['id'].")\"><input type=\"submit\" value=\"-\" style=\"width:25Px;height:25Px\"/></span>

<input type=\"text\"  onchange=\"reload_mag()\"  name=\"kolichestvo_usl\" type=\"text\" id=\"".$row['id']."\" size=\"3\" value=\"".$row['colichestvo']."\" style=\"width:20px; border:1px sold #CCCCCC;\" />

<span class=\"minus\" onclick=\"plus(".$row['id'].")\"><input type=\"submit\" value=\"+\" style=\"width:25Px;height:25Px\"/></span>

<span class=\"catalog_table_price_1\"> шт.</span></td>\n";





echo "<td><span class=\"catalog_table_price_1\">".$row['cena']." руб.</span></td>\n";   
echo "<td><span class=\"catalog_table_price_1\">".($row['colichestvo']*$row['cena'])." руб.</span></td>\n";
    
echo"<td ><span onclick=\"delite_usl(".$row['id'].")\" style=\"padding:5px;margin-right:10px;float:right;background-color:#FF6600;color:#FFFFFF;border-radius:10px;cursor:pointer;\">Удалить</span></a> </td>\n";

echo"</tr>";
$summa=$summa+($row['colichestvo']*$row['cena']);
}

foreach($gifts as $row)
{

echo "<tr>\n";
echo "<td><span class=\"catalog_table_price_1\">Артикул</span></td>";
echo "<td><a href=\"http://www.filpan.ru/find.php?id=".$row['id']."&view=1\" class=\"modal_text\">".$row['name']."</a></td>\n";
echo "<td align=\"center\">

<span class=\"minus\" onclick=\"minus(".$row['id'].")\"><input type=\"submit\" value=\"-\" style=\"width:25Px;height:25Px\" /></span>

<input type=\"text\"  onchange=\"reload_mag()\"  name=\"kolichestvo_gift\" type=\"text\" id=\"".$row['id']."\" size=\"3\" value=\"".$row['colichestvo']."\" style=\"width:20px; border:1px sold #CCCCCC;\" />

<span class=\"minus\" onclick=\"plus(".$row['id'].")\"><input type=\"submit\" value=\"+\" style=\"width:25Px;height:25Px\"/></span>

<span class=\"catalog_table_price_1\"> шт.</span> </td>\n";

echo "<td><span class=\"catalog_table_price_1\">".$row['cena']." руб.</span></td>\n";   
echo "<td><span class=\"catalog_table_price_1\">".($row['colichestvo']*$row['cena'])." руб.</span></td>\n";
    
echo"<td ><span onclick=\"delite_gift(".$row['id'].")\" style=\"padding:5px;margin-right:10px;float:right;background-color:#FF6600;color:#FFFFFF;border-radius:10px;cursor:pointer;\">Удалить</span></a> </td>\n";

echo"</tr>";

$summa=$summa+$row['colichestvo']*$row['cena'];
}

echo "<tr>\n";
echo "<td colspan=\"6\" class=\"order_total\">";
echo"<span class=\"catalog_table_price\">Всего к оплате:&nbsp;<span name=\"order_total\" id=\"order_total\" >$summa </span> руб.</span>";
echo"</td></tr>";


echo '<tr><td colspan=\"3\">';

$url=$_COOKIE['korz_url'];
if (preg_match("/find.php/i",$url) or preg_match("/search.php/i",$url)) {
echo'<a href="http://www.filpan.ru'.$url.'&send_mail=1#win2" style="text-decoration:none;"><div class="button_korz"  style="padding:5px;background-color:#FF6600;color:#FFFFFF;border-radius:10px;cursor:pointer;">Продолжить оформление</div></a></td>';  }					

else{				
echo'<a href="http://www.filpan.ru'.$url.'?send_mail=1#win2" style="text-decoration:none;"><div class="button_korz"  style="padding:5px;background-color:#FF6600;color:#FFFFFF;border-radius:10px;cursor:pointer;">Продолжить оформление</div></a></td>'; 
}  	


echo '<td colspan=\"3\"><div class="button_korz" onclick="delite_korzina()" style="background-color:#FF6600;color:#FFFFFF;border-radius:10px;cursor:pointer;padding:5px;">Очистить корзину</div>';


echo "</td></tr></table>\n";
}
}



function korz_answer()
{
$usl=$this->get_array_all_usl();
$gifts=$this->get_array_all_gifts();

$summa=0;
$kolichestvo=0;
foreach($usl as $row)
{
$summa=$summa+$row['colichestvo']*$row['cena'];
$kolichestvo=$kolichestvo+$row['colichestvo'];
}

foreach($gifts as $row)
{
$summa=$summa+$row['colichestvo']*$row['cena'];
$kolichestvo=$kolichestvo+$row['colichestvo'];
}


}


function korz_answer_text()
{
$usl=$this->get_array_all_usl();
$gifts=$this->get_array_all_gifts();



if((count($usl)!=0)||(count($gifts)!=0))
{




SetCookie("korz_url",'',time()+10000);
$url=$_SERVER['REQUEST_URI'];
$suri = $_SERVER['PHP_SELF'];

$url=str_replace('&send_mail=1','',$url);

//$url=str_replace('&rand=','',$url);

SetCookie("korz_url",$url,time()+10000);
		
				
$rand=rand(100000,999999);						

if($suri=='/find.php' or $suri=='/uslfind.php')
{

echo '<a href="http://www.filpan.ru'.$url.'&rand='.$rand.'#win2"  class="perxod_korz" >Перейти в корзину покупок<img style="marginlleft:6px;" src="http://www.filpan.ru/images/header/img-9.png"></a>';
}					
else{				
echo'<a href="http://www.filpan.ru'.$url.'?rand='.$rand.'#win2"  class="perxod_korz" >Перейти в корзину покупок<img style="marginlleft:6px;" src="http://www.filpan.ru/images/header/img-9.png"></a>'; 
}  


}
else
{
}

}



function show_korzina_mail()
{
$usl=$this->get_array_all_usl();
$gifts=$this->get_array_all_gifts();


$size_usl=count($usl);
$size_gift=count($gifts);


$message='';


$message.= "<table border=\"1\" cellpadding=\"2\" cellspacing=\"2\">\n";
$message.= "<tr>\n";
$message.= "<td class=\"name_cap\">".Наименование."</td>\n";
$message.= "<td class=\"colichestvo_cap\">Кол-во </td>\n";
$message.= "<td class=\"cena_cap\">Цена</td>\n";
$message.= "<td class=\"summa_cap\">Сумма</td>\n";
$message.= "</tr>\n";


$summa=0;
foreach($usl as $row)
{
$message.= "<tr>\n";
$message.= "<td class=\"name\">".$row['name']."</td>\n";
$message.= "<td class=\"colichestvo\">".$row['colichestvo']." шт.</td>\n";
$message.= "<td class=\"cena\">".$row['cena']." руб.</td>\n";
$message.= "<td class=\"summa\">".($row['colichestvo']*$row['cena'])." руб. </td>\n";
$message.= "</tr>\n";
$summa=$summa+$row['colichestvo']*$row['cena'];
}

foreach($gifts as $row)
{
$message.= "<tr>\n";
$message.= "<td class=\"name\">".$row['name']."</td>\n";
$message.= "<td class=\"colichestvo\">".$row['colichestvo']." шт.</td>\n";
$message.= "<td class=\"cena\">".$row['cena']." руб.</td>\n";
$message.= "<td class=\"summa\">".($row['colichestvo']*$row['cena'])." руб. </td>\n";
$message.= "</tr>\n";
$summa=$summa+$row['colichestvo']*$row['cena'];
}
$message.= "<tr class=\"\">\n";
$message.= "<td class=\"name\" colspan=\"3\">Общая сумма</td>\n";
$message.= "<td class=\"summa\">$summa руб.</td>\n";
$message.= "</tr>\n";
$message.= "</table>\n";
$message.= '</div>';

return $message;
}

function show_blank()
{
$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";

$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_select_db($database, $db);

//usl

$kolvo=0;
$price_usl=0;				
				
$zapr=0;			
$prosh=0;				
$all_dost_usl=0;

$gifts = explode("#-#",$_COOKIE['usl']);
$gifts_nums=count($gifts);
if($gifts_nums>3)
{		
				
$gifts = explode("#;#",$_COOKIE['usl']);
$gifts_nums=count($gifts);

for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$kolvo=$kolvo+$assos_row[2];
							$price_now=$assos_row[2]*$assos_row[3];
							$price_usl=$price_usl+$price_now;
							
								$res = mysql_query("SELECT * FROM uslsodraz WHERE id=$assos_row[0]");
								$ar=mysql_fetch_array($res);
								if($ar[17]==0)
								{
									if (preg_match("/Заправка/", $assos_row[1]))
									{
									$zapr=$zapr+$assos_row[2];}
									if (preg_match("/Прошивка/", $assos_row[1]))
									{$prosh=$prosh+1;}
								}
								else{$all_dost_usl=$all_dost_usl+($ar[17]*$assos_row[2]);}
							}

$zapr_dost=$zapr*300;
$prosh_dost=$prosh*500;

$all_dost_usl=$all_dost_usl+$zapr_dost+$prosh_dost;	

$price_all_usl=$price_usl+$all_dost_usl;

}
if($kolvo==0)
{$price_all_usl=0;}


			
//gifts	
$kolvo_gifts=0;
$price_gifts=0;
$all_dost_gifts=0;	
					
$gifts = explode("#-#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);
if($gifts_nums>3)
{	
							
$gifts = explode("#;#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);

for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);					
							$kolvo_gifts=$kolvo_gifts+$assos_row[2];
							$price_now=$assos_row[2]*$assos_row[3];
							$price_gifts=$price_gifts+$price_now;
							
								$res = mysql_query("SELECT * FROM sodraz WHERE id=$assos_row[0]");
								$ar=mysql_fetch_array($res);
								if($ar[17]==0)
								{
								$kolvo_gifts_dost=$kolvo_gifts_dost+1;
								}
								else{$all_dost_gifts=$all_dost_gifts+($ar[17]*$assos_row[2]);}
								
							}

$all_dost_gifts=$all_dost_gifts+($kolvo_gifts_dost*300);
$price_all_gifts=$price_gifts+$all_dost_gifts;
}
//gifts

$price_all_all=$price_all_gifts+$price_all_usl;

$price_all_usl_gifts=$price_usl+$price_gifts;

//1)Start price  2)dostavka gifts  3)
echo'
<INPUT TYPE=HIDDEN id="kolvo_usl" VALUE="'.$kolvo.'"> 
<INPUT TYPE=HIDDEN id="kolvo_gifts" VALUE="'.$kolvo_gifts.'"> 

<INPUT TYPE=HIDDEN id="price_start" VALUE="'.$price_all_usl_gifts.'"> 
<INPUT TYPE=HIDDEN id="price_start_with_dost" VALUE="'.$price_all_all.'"> 

<INPUT TYPE=HIDDEN id="nal_hidden_gifts" VALUE="+ '.$all_dost_gifts.' руб. (за доставку).">
<INPUT TYPE=HIDDEN id="nal_hidden_usl" VALUE="+ '.$all_dost_usl.' руб. (за доставку и работу).">

<INPUT TYPE=HIDDEN id="nal_without_hidden" VALUE="'.$price_all_usl_gifts.'"> 

<INPUT TYPE=HIDDEN id="nal_hidd" VALUE="'.$price_all_all.'">';


echo'	
<div class="cart2">
<span >Оформление заказа</span><br>';

if($kolvo_gifts!==0)
{echo'
<table><tr><td>
Товаров: <span >'.$kolvo_gifts.'</span> шт.
На сумму <span >'.$price_gifts.'</span> руб.
</td>								
<td><span id="nal_gifts">+ '.$all_dost_gifts.' руб. (за доставку).</span>
</td></tr></table>';}
                                                                                                                                                                                                                                                                                                                                                                                                            
if($kolvo!==0)
{echo'

<table><tr><td>Услуг: <span >'.$kolvo.'</span> шт.
На сумму <span >'.$price_usl.'</span> руб.</td>
									
<td><span id="nal">+ '.$all_dost_usl.' руб. (за доставку и работу).</span>
</td></tr></table>';}

echo'
<div id="nal_all">


<table><tr>
<td>Всего к оплате&nbsp;</td>';

echo'<td><span id="all_price">'.$price_all_all.'</span></td>

<td><span> руб.</span></td>
</tr></table>

</div>

</div>	





 <div id="for_basket">
       
   
        <table ><tr>
        <td colspan="3">
         
		
        <table width="100%">
          <tr><td width="50%">
        <div id="Privat" class="catalog_table_price">Частным лицам <input type="radio" name="radio" onchange="javascript:organiz()"  id="Privat" value="radio" checked/></div></td>
        <td width="50%"><div id="Organiz" class="catalog_table_price">Оргинизациям <input type="radio" name="radio" onchange="javascript:privat()"  id="Organiz"/></div>
        </td></tr></table>
	
          
        </td>
        </tr>
		<tr><td colspan="3"><div id="raschet"></div></td></tr>
		        
            <tr><td>Ф.И.О.<span class="red">*</span></td><td><input class="input-text" type="text" name="Name" id="Name" /></td><td></td></tr>
            <tr><td>Телефон<span class="red">*</span></td><td><input type="text" class="input-text"  id="Phone" /></td><td></td></tr>';
           echo" <tr><td>Город<span class=\"red\">*</span></td><td><input type=\"text\" class=\"input-text\"  id=\"City\" value=\"Москва\" onFocus=\"this.value='';\" onBlur=\"if(this.value=='') this.value=\"Москва\"\" /></td><td></td></tr>";




    echo' <td id="red" >Адрес доставки<span class="reds">*</span></td>
      <td><textarea id="Adress"></textarea></td>
      <td>
        Самовывоз&nbsp;<input name="Samovyvoz" id="Samovyvoz" type="checkbox" onchange="javascript:Checked()"/></td>
    </tr><tr>
      <td id="red1">Станция метро<span class="reds">*</span></td>
      <td><select name="Metro" id="Metro" >
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
<option value="Ясенево">Ясенево</option></select></td><td></td></tr>
		
<tr><td>E-mail<span class="red">*</span></td><td>
			
			
			<div><input type="text" class="input-text"  id="Email" /><span id="validEmail"></span></div></td><td></td></tr>
		<tr><td colspan="3"><div id="Beznal"></div></td></tr>';		
		
	$url=$_SERVER['REQUEST_URI'];
	$urls=str_replace('&send_mail=1','',$url);
	$urls=str_replace('?send_mail=1','',$urls);


	echo'<tr><td><a href="http://www.filpan.ru'.$urls.'#win2" class="modal_text">Назад</a></td><td class="submit"><input type="submit" value="Отправить"  onclick="Send_order()" /></td><td></td></tr>
			
			
			
			
			
			<tr><td colspan="2"><div class="t14_js_attantion_block">
                <div class="t14_js_attantion_block_close" title="Закрыть"></div>
                <div class="t14_attantion_block_top"></div>
                <div class="t14_attantion_block_middle attention_text">
                    Внимание! Цена действительна только при заказе товара через
                    интернет-магазин.<br> В розничных магазинах и при заказе по телефону
                    цена может быть другой.
                </div>
                <div class="t14_attantion_block_bottom"></div>
            </div></td><td></td></tr>	
		
		</table></div>';
	
}
}


?>
