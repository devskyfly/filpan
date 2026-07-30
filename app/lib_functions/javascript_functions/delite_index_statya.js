<script>
function delite_index_statya(id_inf,way)
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
				   window.location=way;
					
				   }
		}
  )
}
</script>

