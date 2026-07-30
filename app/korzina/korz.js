<script type="text/javascript" src="http://www.filpan.ru/korzina/jquery_korz.js"></script>

<script type="text/javascript">

//korz_field 

$(document).ready(function(){

 if($('.korz_s').size()) {
		$(window).scroll(function(){
			var $a = $('.korz_s').offset();
			if ($('.korz_s').scrollTop()-$(window).scrollTop()<0){
				$('.korz_s').addClass('korz_s_fixed');

			jQuery('.text3').css('padding-top', '15px')

			}else{
				$('.korz_s').removeClass('korz_s_fixed');
			jQuery('.text3').css('padding-top', '0px')
			}
		});
	}
 

    jQuery("#korz").hover(function() {
	
	jQuery("#test").css('opacity', '1');
	$("#test").stop(true, true).animate({opacity: "0"}, 300,potom);
	function potom(){
	jQuery('#korz').css('backgroundImage', 'url(http://www.filpan.ru/korzina/gotocart.png)')
		}

	},
	 
	 
	 function() {
	 
	
	$("#test").stop(true, true).animate({opacity: "0.9"}, 300);
 jQuery('#korz').css('backgroundImage', '');
    jQuery('#korz').css('background-color','white');

	});

});

//korz

function plus(id)
{
var kolvo=document.getElementById(id).value;
kolvo++;

document.getElementById(id).value=kolvo;
reload_mag();
}

function minus(id)
{
var kolvo=document.getElementById(id).value;
kolvo--;
if(kolvo<0)
{kolvo=0;}
document.getElementById(id).value=kolvo;
reload_mag();
}



function Checked()
{
var kolvo_usl=$("#kolvo_usl").val();
var kolvo_gifts=$("#kolvo_gifts").val();

var usl_with_dost=$("#nal_hidden_usl").val();
var gifts_with_dost=$("#nal_hidden_gifts").val();

var all_price_with_dost=$("#nal_hidd").val();
var all_price_without_dost=$("#nal_without_hidden").val();


//esli samovyvoz
if($('input[name=Samovyvoz]').is(':checked')==true)
{

//esli beznal	 
	if($('input[id=account_2]').is(':checked')==true)	 
	{	 
	var price_start=$("#price_start").val();
	var new_price=price_start*1.06;

	document.getElementById("all_price").innerHTML=new_price;
		 
	if(kolvo_usl!=0)
	{
	document.getElementById("nal").innerHTML='';
	}
	if(kolvo_gifts!=0)
	{
	document.getElementById("nal_gifts").innerHTML='';
	}
	
		 
	$('.reds').remove();
	
		$("#Metro").attr("disabled","disabled");
					
		$("#Adress").attr('readonly', 'readonly');
	}	
//esli nal	
	else{
	
	if(kolvo_usl!=0)
	{
	document.getElementById("nal").innerHTML='';
	}
	if(kolvo_gifts!=0)
	{
	document.getElementById("nal_gifts").innerHTML='';
	}
	
	document.getElementById("all_price").innerHTML=all_price_without_dost;
		 
	$('.reds').remove();
	
		$("#Metro").attr("disabled","disabled");
					
		$("#Adress").attr('readonly', 'readonly');
	}
}

else
{
	
	if($('input[id=account_2]').is(':checked')==true)	 
	{
	var price_start_with_dost=$("#price_start_with_dost").val();
	var new_price=price_start_with_dost*1.06;
	document.getElementById("all_price").innerHTML=new_price;
	
	$("#red").append("<span class='reds'>*</span>");
	$("#red1").append("<span class='reds'>*</span>");
	
	if(kolvo_usl!=0)
	{
	document.getElementById("nal").innerHTML=usl_with_dost;
	}
	if(kolvo_gifts!=0)
	{
	document.getElementById("nal_gifts").innerHTML=gifts_with_dost;
	}	

	$("#Metro").removeAttr('disabled');
	$("#Adress").removeAttr('readonly');
	}
	else{
	
	$("#red").append("<span class='reds'>*</span>");
	$("#red1").append("<span class='reds'>*</span>");


if(kolvo_usl!=0)
	{
	document.getElementById("nal").innerHTML=usl_with_dost;
	}
if(kolvo_gifts!=0)
	{
	document.getElementById("nal_gifts").innerHTML=gifts_with_dost;
	}	

document.getElementById("all_price").innerHTML=all_price_with_dost;

	$("#Metro").removeAttr('disabled');
	$("#Adress").removeAttr('readonly');
	}
	
}
}

function privat()
{
document.getElementById("raschet").innerHTML='<table width="100%"><tr><td width="50%"><div id="Nal" class="catalog_table_price">Наличный расчет&nbsp;<input type="radio" name="qqqq" value="Наличный" onchange="javascript:Nal()" id="account_1" checked /></div></td><td><div id="Bnal" class="catalog_table_price">Безналичный расчет&nbsp;<input type="radio" name="qqqq" value="Безналичный" onchange="javascript:Bnal()" id="account_2" /></div></td></tr></td></tr></table>';
document.getElementById("org").innerHTML='Организация<span class="red">*</span>';
document.getElementById("org1").innerHTML='<input class="input-text" type="text" name="organ" id="organ" />';
}
function organiz()
{
document.getElementById("org").innerHTML='';
document.getElementById("org1").innerHTML='';

var kolvo_usl=$("#kolvo_usl").val();
var kolvo_gifts=$("#kolvo_gifts").val();
var usl_with_dost=$("#nal_hidden_usl").val();
var gifts_with_dost=$("#nal_hidden_gifts").val();
var all_price_with_dost=$("#nal_hidd").val();

if(kolvo_usl!=0)
	{
	document.getElementById("nal").innerHTML=usl_with_dost;
	}
if(kolvo_gifts!=0)
	{
	document.getElementById("nal_gifts").innerHTML=gifts_with_dost;
	}	

document.getElementById("all_price").innerHTML=all_price_with_dost;



if($('input[name=Samovyvoz]').is(':checked')==true)
{
document.getElementById("Samovyvoz").checked = false;
$("#red").append("<span class='reds'>*</span>");
$("#red1").append("<span class='reds'>*</span>");
}
	


document.getElementById("Beznal").innerHTML='';
document.getElementById("raschet").innerHTML='';


$("#Metro").removeAttr('disabled');
	$("#Adress").removeAttr('readonly');
	


}




function Bnal()
{

document.getElementById("Beznal").innerHTML='<table><tr ><td>ИНН/КПП<span class="red">*</span></td><td><input type="text" class="input-text"  id="Inn" /></td><td></td></tr> <tr ><td>Юридический адрес<span class="red">*</span></td><td><textarea id="Yuradress"></textarea></td><td></td></tr><tr ><td>Фактический адрес<span class="red">*</span></td><td><textarea id="Factadress"></textarea></td><td></td></tr><tr ><td>ОКПО<span class="red">*</span></td><td><input type="text" class="input-text"  id="Okpo" /></td><td></td></tr><tr ><td>Р/с<span class="red">*</span></td><td><input type="text" class="input-text"  id="Pc" /></td><td></td></tr><tr ><td>Банк<span class="red">*</span></td><td><input type="text" class="input-text"  id="Bank" /></td><td></td></tr><tr ><td>БИК<span class="red">*</span></td><td><input type="text" class="input-text"  id="Bik" /></td><td></td></tr><tr ><td>К/с<span class="red">*</span></td><td><input type="text" class="input-text"  id="Kc" /></td><td></td></tr></table>';



var all_price=document.getElementById("all_price").innerHTML;
var all_price_Bnal=all_price*1.04;
document.getElementById("all_price").innerHTML=all_price_Bnal;


}

function Nal()
{
document.getElementById("Beznal").innerHTML='';
var all_price_Bnal=document.getElementById("all_price").innerHTML;
var all_price=all_price_Bnal/104*100;
document.getElementById("all_price").innerHTML=all_price;
}

function Send_order()
{
var Name = $("#Name").val();
var Organ = $("#organ").val();
var Phone = $("#Phone").val();
var City = $("#City").val();
var Adress=document.getElementById('Adress').value;
 

if($('input[name=Samovyvoz]').is(':checked')==true)
{
var Samovyvoz ='yes';
}
else
{Samovyvoz ='no';}

if($('input[id=account_2]').is(':checked')==true)	 
{
var Bnal ='yes';
}
else
{Bnal ='no';
}
var usl_with_dost=$("#nal_hidden_usl").val();
var gifts_with_dost=$("#nal_hidden_gifts").val();

var Metro = $("#Metro").val();
var Email = $("#Email").val();


var Inn = $("#Inn").val();
var Yuradress = $("#Yuradress").val();
var Factadress = $("#Factadress").val();
var Okpo = $("#Okpo").val();
var Pc = $("#Pc").val();
var Bank = $("#Bank").val();
var Bik = $("#Bik").val();
var Kc = $("#Kc").val();

var price=document.getElementById("all_price").innerHTML;


if(Name=='' || Email=='')
{alert('Введите Ф.И.О и Email');}

else{
var email_val=$("#email_val").val();
if(email_val=='No')
{alert('Введите Email правильно');}
else{

 $.ajax
	 (
		 {
		   type: "POST",
		   url: "/korzina/send_order.php",
		   data: "Name="+Name+"&"+"Organ="+Organ+"&"+"Phone="+Phone+"&"+"City="+City+"&"+"Adress="+Adress+"&"+"Samovyvoz="+Samovyvoz+"&"+"Dost_usl="+usl_with_dost+"&"+"Dost_gifts="+gifts_with_dost+"&"+"Bnal="+Bnal+"&"+"Metro="+Metro+"&"+"Email="+Email+"&"+"Inn="+Inn+"&"+"Yuradress="+Yuradress+"&"+"Factadress="+Factadress+"&"+"Okpo="+Okpo+"&"+"Pc="+Pc+"&"+"Bank="+Bank+"&"+"Bik="+Bik+"&"+"Kc="+Kc+"&"+"Price="+price+"&",
		   success: function(msg)
				   {
			
if(msg=='Yes')
{
document.getElementById("korz_mag").innerHTML='<span class="catalog_table_price">Ваш заказ успешно отправлен</span>';
delite_korzina(false);
}
else{
document.getElementById("korz_mag").innerHTML='<span class="catalog_table_price">Ой!Что-то пошло не так. Повторите заказ.</span>';
}
				   }
		}
	)
  }
   }




}    

</script>