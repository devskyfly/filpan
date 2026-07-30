<?$kurs=new file;
$kurs_val=$kurs-> get_kurs();
unset($kurs);
?>
<?php okantovka_top('Zakr_vneshne','100%',17,15,'#FFFFFF'); ?> 
<div id='centr_part' style=" height:100%"> 
	<?
	echo "По производителю:";
	$h=0;
	if(isset($proizvoditel)){
	//echo 'DA';
	while($massiv_proizvoditeley[$h]){
	echo $massiv_proizvoditeley[$h];
	$h++;
	}
	}
	else
	{
	//echo 'NET';
	while($massiv_proizvoditeley[$h]){
	echo $massiv_proizvoditeley[$h];
	$h++;
	}
	}
					unset($input_array_funkcionalnost);
					$db->db_funkcionalnost(&$input_array_funkcionalnost,$vibranniy_podrazdel_mas['podrazdel_name']);
					echo "<br>По функционалности:";
					
					$h=0;
							while($input_array_funkcionalnost[$h]){
							echo '<a>'.$input_array_funkcionalnost[$h]['text_podpunkt'].'</a>|';
							$h++;
							}

	unset($input_array_podrazdel);
	$db->db_poisk_tovara(&$input_array_podrazdel,$razdel,$podrazdel,$id_tov);
	if(isset($podrobnosti)&&$podrobnosti==1)
	{
	echo "<table class='table_find'>";
	echo '<caption>'.$input_array_podrazdel[0]['name'].'</caption>'; 							
			$h=0;
			while($input_array_podrazdel[$h]){
			
			echo '<tr>
			<td width=150 valign=top><div><img width=250 height=250S src=http://www.filpan.ru/img/'.$input_array_podrazdel[$h]['picture'].' alt='.$input_array_podrazdel[$h]['name'].'><div >';
			 if($razdel=='razdel_2'){
			 echo 'Цена:<span class=right_cena>'.$kurs_val*$input_array_podrazdel[$h]['price'].' руб.';}
			 else{echo 'Цена:<span class=right_cena>'.$input_array_podrazdel[$h]['price'].' руб.';}
			echo '</span></div>
			<div>Купить 
			
			<img class=\'korzina\' src=\'images/right_part/korz.gif\' vspace=\'0\' hspace=\'0\' border=\'0\' onClick="window.open(\'http://www.samsung.filpan.ru/korzina.php?&razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')">
			
			</div></div></td>
			<td>'.$input_array_podrazdel[$h]['opisaniye'].'<br><table style="border-style:solid;border-width:3px 3px 3px 3px;width:100%"><tr><td>'.$input_array_podrazdel[$h]['excell_text'].'</table></td>
			</tr>';
			$h++;
			}	
	echo '</table>';
	}
	
	else{
	echo "<table class='table_find'>";
	echo '<caption>'.$input_array_podrazdel[0]['name'].'</caption>'; 							
			$h=0;
			while($input_array_podrazdel[$h]){
			
			echo '<tr>
			<td width=150 valign=top><img width=250 height=250 src=http://www.filpan.ru/img/'.$input_array_podrazdel[$h]['picture'].' alt='.$input_array_podrazdel[$h]['name'].'>
			<div >';
			if($razdel=='razdel_2'){
			 echo'Цена:<span class=right_cena>'.$kurs_val*$input_array_podrazdel[$h]['price'].' руб.';}
			 else{echo'Цена:<span class=right_cena>'.$input_array_podrazdel[$h]['price'].' руб.';}
			echo '</span></div>
			<div>Купить 
			
			<img class=\'korzina\' src=\'images/right_part/korz.gif\' vspace=\'0\' hspace=\'0\' border=\'0\' onClick="window.open(\'http://www.samsung.filpan.ru/korzina.php?&razdel='.$razdel.'&razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')">
			
			</div></div>
			</td>
			
			<td>'.$input_array_podrazdel[$h]['opisaniye'].'<br><a href=find_tovar.php?&razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'&podrobnosti=1>Подробно...</a></td>
			</tr>';
			$h++;
			}	
	echo '</table>';
	}
	
	?>
</div>

 
<?php okantovka_bottom('Zakr_vneshne',17,15);?>  