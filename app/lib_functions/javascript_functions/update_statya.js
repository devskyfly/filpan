<script>
function update_statya( 
id_inf,
name_statyi_inf,
date_inf,
meta_keywords_inf,
meta_descr_inf,
title_inf,
html_title_inf,
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
		   "&meta_keywords="+encodeURIComponent(meta_keywords_inf[0].value)+
		   "&meta_descr="+encodeURIComponent(meta_descr_inf[0].value)+
		   "&title="+encodeURIComponent(title_inf[0].value)+
		   "&html_title="+encodeURIComponent(html_title_inf[0].value)+
		   "&text_statyi="+encodeURIComponent(text_statyi_inf.getData()),
		   success: function(msg)
				   {
				   alert(msg);
					alert('Позиция сохранена'+msg);
				   }
		}
  )
}
</script>

