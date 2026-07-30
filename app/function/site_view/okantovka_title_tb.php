<?php
function okantovka_title_top_tb($dir,$width,$top_width,$top_height,$img_width,$img_height,$back_gr_col,$back_gr_color_title,$title,$al='left')
{
echo 
"<table cellpadding='0' cellspacing='0' border='0' width='".$width."'>






<tr>
		<td width='".$top_width."' height='".$top_height."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-top-left.gif' ></td>
		
		
		<td  height='".$top_height."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-top-line.gif'></td>

		
		<td width='".$top_width."' height='".$top_height."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-top-right.gif'></td>
</tr>


<tr>

		<td width='".$top_width."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/left_under_corner.gif'></td>
		<td align=".$al."  bgcolor='".$back_gr_color_title."'>". $title." </td>
		<td width='".$top_width."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/right_under_corner.gif'></td>
		
</tr>



<tr>
<td width='".$img_width."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-line-left.gif' > </td>
<td bgcolor='".$back_gr_col."'>";
}


function okantovka_title_bottom_tb($dir,$img_width,$img_height)
{
echo 
"</td>
<td width='".$img_width."'  background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-line-right.gif'>
</td>
</tr>

<tr >
		<td width='".$img_width."' height='".$img_height."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-bottom-left.gif' > 
		</td>
		<td height='".$img_height."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-bottom-line.gif'>
		</td>
		<td width='".$img_width."' height='".$img_height."' background='http://kartridgeclub.ru/images/okantovka/".$dir."/smooth-bottom-right.gif'></td>
</tr>

</table>";
}
?>
