<script>
function sop_usl_update(obj,id)
{
/*
str='';
for(elem in sop_usl)
{
str=str+'+'+sop_usl[elem];
}
		alert(str);*/

if(obj.checked==true)
{
str='';
		for(elem in sop_usl)
		{
				if(sop_usl[elem]==id)
				{
				str=str+'__'+sop_usl[elem];
				//alert(str);
				return;
				}
		}
	sop_usl.push(id);
	str='';
	for(elem2 in sop_usl)
		{
		str=str+'__'+sop_usl[elem2];
		}
	//alert(str);
	return;
}
//TRUE  END
if(obj.checked==false)
{
finded=0;
	for(elem in sop_usl)
	{
		if(sop_usl[elem]==id)
		{
		ar=sop_usl.splice(elem,1);
		str='';
			for(elem1 in sop_usl)
				{
				str=str+'__'+sop_usl[elem1];
				}
		//alert(str);
		return;
		}
	}
}
//FALSE  END	
}
</script>



