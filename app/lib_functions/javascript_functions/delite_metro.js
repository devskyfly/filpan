<script>
function delite_metro(id_inf)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "delite_metro_query.php",
		   data: 
		   "&id="+encodeURIComponent(id_inf),
		   success: function(msg)
				   {
				 //alert(msg);
				   alert('Позиция удалена');
				   window.location="http://www.filpan.ru/tools/metro";
					
				   }
		}
  )
}
</script>