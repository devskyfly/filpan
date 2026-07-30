<?php
function okantonka_top_h100($dir,$width)
{
echo 
"<table cellpadding='0' style='height:100%;background-color:#FFFFFF' cellspacing='0' border='0' width='".$width."'>
<tr >
<td width='17' height='15' background='images/okantovka/".$dir."/smooth-top-left.gif' > 
</td>
<td  height='15' background='images/okantovka/".$dir."/smooth-top-line.gif'>
</td>
<td width='17' height='15' background='images/okantovka/".$dir."/smooth-top-right.gif'>
</td>
</tr>
<tr>
<td width='17' background='images/okantovka/".$dir."/smooth-line-left.gif' > 
</td>
<td>";
}


function okantonka_bottom_h100($dir)
{
echo 
"</td>
<td width='17'  background='images/okantovka/".$dir."/smooth-line-right.gif'>
</td>
</tr>

<tr >
<td width='17' height='15' background='images/okantovka/".$dir."/smooth-bottom-left.gif' > 
</td>
<td height='15' background='images/okantovka/".$dir."/smooth-bottom-line.gif'>
</td>
<td width='17' height='15' background='images/okantovka/".$dir."/smooth-bottom-right.gif'></td>
</tr>

</table>";
}
?>
