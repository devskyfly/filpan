<script>
function send_mail()
{
user_name=document.getElementById('name');
user_mail=document.getElementById('mail');
user_phone=document.getElementById('phone');
user_adres=document.getElementById('adres');



if(user_name.value.length==0)
{
user_name.style.backgroundColor="#c0c0c0";
alert('Введите имя покупателя');
return;
}
else if(user_mail.value.length==0)
{
user_mail.style.backgroundColor="#c0c0c0";
alert('Введите e-mail');
return;
}
else if(user_phone.value.length==0)
{
user_phone.style.backgroundColor="#c0c0c0";
alert('Введите номер телефона');
return;
}
else if(user_adres.value.length==0)
{
user_adres.style.backgroundColor="#c0c0c0";
alert('Введите адрес');
return;
}



$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "tools/send_mail.php",
		   data: "user_name="+user_name.value+"&"+"user_mail="+user_mail.value+"&"+"user_phone="+user_phone.value+"&"+"user_adres="+user_adres.value+"&"+"komanda="+"send",
		   success: function(msg)
				   {
					 element=document.getElementById("korz_mag");
					 element.innerHTML=msg;
				   }
		}
	)
}
</script>