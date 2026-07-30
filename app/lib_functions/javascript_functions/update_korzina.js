<script>
function update_korzina()
{

simpleArray=Array();

 answer=document.getElementsByName('kolichestvo_gift'); 
 simpleArray=Array();
 for (iterator=0;iterator<answer.length;iterator=iterator+1)
 {
 $.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "tools/update_gift.php",
		   data: "id="+answer[iterator].id+"&kolichestvo="+answer[iterator].value+"&komanda="+"obnovit",
		   success: function(msg)
				   {
					// alert( msg );
				   }
		}
	)
 
 
 }
 
 answer=document.getElementsByName('kolichestvo_usl'); 
 simpleArray=Array();
 for (iterator=0;iterator<answer.length;iterator=iterator+1)
 {
 $.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "tools/update_usl.php",
		   data: "id="+answer[iterator].id+"&kolichestvo="+answer[iterator].value+"&komanda="+"obnovit",
		   success: function(msg)
				   {
					// alert( msg );
				   }
		}
	)
 
 
 }
	
}


</script>

