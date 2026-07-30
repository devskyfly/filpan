<script>
function add_index_statya( 
name_statyi_inf,
date_inf,
text_statyi_inf,
way
)
{


$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "add_query.php",
		   data: 
		   "&name_statyi="+encodeURIComponent(name_statyi_inf[0].value)+
		   "&date="+encodeURIComponent(date_inf[0].value)+
		   "&text_statyi="+encodeURIComponent(text_statyi_inf.getData()),
		   success: function(msg)
				   {
				  // alert(msg);
				   alert('Позиция сохранена');
				  window.location=way+msg;
					
				   }
		}
  )
}
</script>

