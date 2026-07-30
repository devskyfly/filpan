<?php
function okantovka_title_top($dir,$width,$top_width,$top_height,$img_width,$img_height,$back_gr_col,$title,$al='left')
{
echo 
"<table cellpadding='0' cellspacing='0' border='0' width='".$width."'>
<tr >
<td width='".$top_width."' height='".$top_height."' background='http://filpan.ru/images/okantovka/".$dir."/smooth-top-left.gif' ></td>
<td align=$al height='".$top_height."' background='http://filpan.ru/images/okantovka/".$dir."/smooth-top-line.gif'>
". 
$title.
"
</td>
<td width='".$img_width."' height='".$img_height."' background='http://filpan.ru/images/okantovka/".$dir."/smooth-top-right.gif'>
</td>
</tr>
<tr>
<td width='".$img_width."' background='http://filpan.ru/images/okantovka/".$dir."/smooth-line-left.gif' > 
</td>
<td bgcolor='".$back_gr_col."'>";
}


function okantovka_title_bottom($dir,$img_width,$img_height)
{
echo 
"</td>
<td width='".$img_width."'  background='http://filpan.ru/images/okantovka/".$dir."/smooth-line-right.gif'>
</td>
</tr>

<tr >
<td width='".$img_width."' height='".$img_height."' background='http://filpan.ru/images/okantovka/".$dir."/smooth-bottom-left.gif' > 
</td>
<td height='".$img_height."' background='http://filpan.ru/images/okantovka/".$dir."/smooth-bottom-line.gif'>
</td>
<td width='".$img_width."' height='".$img_height."' background='http://filpan.ru/images/okantovka/".$dir."/smooth-bottom-right.gif'></td>
</tr>

</table>";
}
?>
