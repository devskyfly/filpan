<script>
function sop_tov_update_with_key_word(obj,id,keyword,price,mark,nazakaz)
{


if(obj.checked==true)
{
str='';
		for(elem in sop_tov)
		{
				if(sop_tov[elem]==id)
				{		
				//alert(str);
				return;
				}
		}
		//alert(keyword);
	sop_tov_price.push(price);	
	sop_tov_keyword.push(keyword);
	sop_tov_mark.push(mark.checked);
	sop_tov_nazakaz.push(nazakaz.checked);
	sop_tov.push(id);
	str='';
	for(elem2 in sop_tov)
		{
		str=str+'__'+sop_tov[elem2];
		}
	//alert(str);
	return;
}
//TRUE  END
if(obj.checked==false)
{
finded=0;
	for(elem in sop_tov)
	{
		if(sop_tov[elem]==id)
		{
		ar=sop_tov_price.splice(elem,1);
		ar=sop_tov_keyword.splice(elem,1);
		ar=sop_tov_mark.splice(elem,1);
	    ar=sop_tov_nazakaz.splice(elem,1);
		ar=sop_tov.splice(elem,1);
		str='';
			for(elem1 in sop_tov)
				{
				str=str+'__'+sop_tov[elem1];
				}
		//alert(str);
		return;
		}
	}
}
//FALSE  END	






}
</script>

