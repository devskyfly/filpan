<script>
function buy_gift(id,name,kolichestvo,cena)
{
	 $.ajax
	 (
		 {
		   type: "POST",
		   url: "/tools/buy_gift.php",
		   data: "id="+id+"&"+"name="+name+"&"+"kolichestvo="+kolichestvo+"&"+"cena="+cena+"&"+"komanda="+"pokupka",
		   success: function(msg)
				   {
			
					 
var arr=msg.split('&');
	
if (arr[0]='OK')
{mess='Товар добавлен в корзину'}

document.getElementById("kolvo_gifts").innerHTML =arr[1];					 
document.getElementById("price_gifts").innerHTML =arr[2];
$('#korz').css('visibility', 'visible');


 alert(mess);					 
				   }
		}
	)
}
</script>