<script>
function delete_usl(id_inf,
sop_tov,
sop_usl
)
{

sop_tov_str='';
sop_usl_str='';

for (elem in sop_tov)
{
sop_tov_str=sop_tov_str+sop_tov[elem]+';';
}
for (elem in sop_usl)
{
sop_usl_str=sop_usl_str+sop_usl[elem]+';';
}


$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "delete_usl.php",
		   data: 
		   "&id="+id_inf[0].value+
		   "&soptov="+sop_tov_str+
		   "&sopuslugi="+sop_usl_str,
		   success: function(msg)
				   {
					//alert(msg);
					alert('Позиция удалена');
					http="http://www.filpan.ru/tools/edit_uslugi";
					window.location=http;
				   }
		}
  )
}
</script>

