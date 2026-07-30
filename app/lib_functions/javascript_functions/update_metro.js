<script>
function update_metro( 
id_inf,
metro_inf,
streets_inf,
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
		   url: "update_metro.php",
		   data: 
		   "&id="+encodeURIComponent(id_inf[0].value)+
		   "&metro="+encodeURIComponent(metro_inf[0].value)+
		   "&streets="+encodeURIComponent(streets_inf[0].value)+
		   "&keywords="+encodeURIComponent(keywords_inf[0].value)+
		   "&description="+encodeURIComponent(description_inf[0].value)+
		   "&title="+encodeURIComponent(title_inf[0].value)+
		   "&text="+encodeURIComponent(text_inf.getData()),
		   success: function(msg)
				   {
					alert('Позиция сохранена'+msg);
				   }
		}
  )
}
</script>

