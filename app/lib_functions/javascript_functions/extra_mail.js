<script>
function extra_mail(zakaz_txt,tel_num,FIO)
{
	 $.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "tools/extra_mail.php",
		   data: "zakaz_txt="+zakaz_txt+"&"+"tel_num="+tel_num+"&"+"FIO="+FIO+"&"+"komanda="+"send",
		   success: function(msg)
				   {
					 alert( "Ваш заказ успешно отправлен" );
				   }
		}
	)
}
</script>