<script>
function update_index_statya( 
id_inf,
name_statyi_inf,
date_inf,
text_statyi_inf
)
{


$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "update_statya.php",
		   data: 
		   "&id="+encodeURIComponent(id_inf[0].value)+
		   "&name_statyi="+encodeURIComponent(name_statyi_inf[0].value)+
		   "&date="+encodeURIComponent(date_inf[0].value)+
		   "&text_statyi="+encodeURIComponent(text_statyi_inf.getData()),
		   success: function(msg)
				   {
				  
					alert('Позиция сохранена');
				   }
		}
  )
}
</script>

