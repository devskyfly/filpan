<script>
function delite_korzina()
{
	 $.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "tools/delite_korzina.php",
		   data: "komanda="+"ochistit_korzinu",
		   success: function(msg)
				   {
					 //alert( msg );
				   }
		}
	)
	
	
	$.ajax
	 (
		 {
		   type: "POST",
		   url: "shablon/mag_middle_content.php",
		   async:false,
		   data:"show_korzina=1",
		   success: function(msg)
				   {
					 element=document.getElementById("korz_mag");
					 element.innerHTML="<span class=\"text4\">Ваша корзина пуста </span>";
					 //if(bit=true)
					// {
					// element.innerHTML=msg;
					 //}
document.getElementById("kolvo").innerHTML =0;					 
document.getElementById("price").innerHTML =0;
document.getElementById("kolvo_gifts").innerHTML =0;					 
document.getElementById("price_gifts").innerHTML =0;

				   }
		}
	)
}
</script>