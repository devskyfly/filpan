<script>
function sop_tov_update(obj,id)
{
//alert(sop_tov[0])
if(obj.checked==true)
{
str='';
		for(elem in sop_tov)
		{
				if(sop_tov[elem]==id)
				{
				str=str+'__'+sop_tov[elem];
				//alert(str);
				return;
				}
		}
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

