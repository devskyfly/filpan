<script>
function delite_gift(id)
{

$.ajax
	 (
		 {
		   type: "POST",
		   url: "tools/delite_gift.php",
		    async:false,
		   data:"id="+id+"&"+"komanda="+"udaleniye",
		   success: function(msg)
				   {
				   //alert(msg);
				   }
		}
	)

	 $.ajax
	 (
		 {
		   type: "POST",
		   url: "shablon/mag_middle_content.php",
		   async:false,
		   data:"AJAX=1",
		   success: function(msg)
				   {
					 //alert(msg);
					 element=document.getElementById("korz_mag");
					 element.innerHTML=msg;
				   }
		}
	)
	
	$.ajax
	 (
		 {
		   type: "POST",
		   url: "tools/items.php",
		   async:false,
		   date:"AJAX=1",
		   success: function(msg)
				   {
					 
var arr=msg.split('&');

document.getElementById("kolvo").innerHTML =arr[0];					 
document.getElementById("price").innerHTML =arr[1];
document.getElementById("kolvo_gifts").innerHTML =arr[2];					 
document.getElementById("price_gifts").innerHTML =arr[3];
					 
					}
		}
	)
}
</script>