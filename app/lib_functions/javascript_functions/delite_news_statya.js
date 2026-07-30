<script>
function delite_news_statya(id_inf)
{
$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "delite_statya_query.php",
		   data: 
		   "&id="+encodeURIComponent(id_inf),
		   success: function(msg)
				   {
				 //alert(msg);
				   alert('Позиция удалена');
				   window.location="http://www.filpan.ru/tools/news_statyi";
					
				   }
		}
  )
}
</script>