<script>
function update_usl_resave(id_inf,
title_inf,
name_inf,
price_inf,
razdel,
podrazdel,
proiz,
super_inf,
market_inf,
nazakaz_inf,
local_del_inf,
bid_inf,
meta_description_inf,
meta_keywords_inf,
ref_1c_inf,
description_inf,
add_description_inf,
podrobno_inf,
add_podrobno_inf,
text_modul_inf,
add_text_modul_inf,
word_key_inf,
picture_inf,
gift_order,
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





sp=0;
if(super_inf[0].checked==true)
{
sp=1;
}



mk=0;
if(market_inf[0].checked==true)
{
mk=1;
}

nz=0;
if(nazakaz_inf[0].checked==true)
{
nz=1;
}


$.ajax
	 (
		 {
		   type: "POST",
		   async:false,
		   url: "update_usl.php",
		   data: 
		   "&id="+id_inf[0].value+
		   "&title="+title_inf[0].value+
		   "&nazv="+name_inf[0].value+
		   "&price="+price_inf[0].value+
		   "&raz="+razdel[0].value+
		   "&idraz="+podrazdel[0].value+
		   "&proiz="+proiz[0].value+
		   "&super="+sp+
		   "&mark="+mk+
		  "&nazakaz="+nz+
		   "&local_del="+local_del_inf[0].value+
		   "&bid="+bid_inf[0].value+
		   "&db_description="+encodeURIComponent(meta_description_inf[0].value)+
		   "&db_keywords="+encodeURIComponent(meta_keywords_inf[0].value)+
		    "&ref_1c="+encodeURIComponent(ref_1c_inf[0].value)+
		   "&descr="+encodeURIComponent(description_inf.getData()+add_description_inf.getData())+
		   "&xcl="+encodeURIComponent(podrobno_inf.getData()+add_podrobno_inf.getData())+
		   "&text_modul="+encodeURIComponent(text_modul_inf.getData()+add_text_modul_inf.getData())+
		   "&word_key="+encodeURIComponent(word_key_inf[0].value)+
		   "&picture_inf="+encodeURIComponent(picture_inf[0].value)+
		   "&gift_order="+encodeURIComponent(gift_order[0].value)+
		   "&soptov="+sop_tov_str+
		   "&sopuslugi="+sop_usl_str,
		   success: function(msg)
				   {
				//	alert(msg);
					alert('Позиция сохранена');
				   }
		}
  )
}
</script>

