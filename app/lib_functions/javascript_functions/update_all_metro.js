<script>
function update_all_metro( 
text_inf,
keywords_inf,
description_inf,
title_inf
)
{


$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "update_all_metro.php",
		   data: 
		   "&keywords="+encodeURIComponent(keywords_inf[0].value)+
		   "&description="+encodeURIComponent(description_inf[0].value)+
		   "&title="+encodeURIComponent(title_inf[0].value)+
		   "&text="+encodeURIComponent(text_inf.getData()),
		   success: function(msg)
				   {
					alert('Генерация прошла успешно');
				   }
		}
  )
}
</script>

