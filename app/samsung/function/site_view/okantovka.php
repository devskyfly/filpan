<?php
function okantovka_top($dir,$width,$img_width,$img_height,$back_gr_col)
{
echo 
"<table cellpadding='0' cellspacing='0' border='0' width='".$width."'>
<tr >
<td width='".$img_width."' height='".$img_height."' background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-top-left.gif' > 
</td>
<td  height='".$img_height."' background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-top-line.gif'>
</td>
<td width='".$img_width."' height='".$img_height."' background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-top-right.gif'>
</td>
</tr>
<tr>
<td width='".$img_width."' background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-line-left.gif' > 
</td>
<td bgcolor='".$back_gr_col."'>";
}


function okantovka_bottom($dir,$img_width,$img_height)
{
echo 
"</td>
<td width='".$img_width."'  background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-line-right.gif'>
</td>
</tr>

<tr >
<td width='".$img_width."' height='".$img_height."' background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-bottom-left.gif' > 
</td>
<td height='".$img_height."' background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-bottom-line.gif'>
</td>
<td width='".$img_width."' height='".$img_height."' background='http://samsung.filpan.ru/images/okantovka/".$dir."/smooth-bottom-right.gif'></td>
</tr>

</table>";
}
?>
