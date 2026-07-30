<?$kurs=new file;
$kurs_val=$kurs-> get_kurs();
unset($kurs);
?>
<?php okantovka_top('Zakr_vneshne','100%',17,15,'#FFFFFF'); ?> 
<div id='centr_part' style=" height:100%"> 
	<?	
	echo "По производителю:";
	$h=0;
	if(isset($podpunkt)){
	
	while($massiv_proizvoditeley_podpunkt[$h]){
	echo $massiv_proizvoditeley_podpunkt[$h];
	$h++;
	}
	}
	else
	{
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
	echo "<table class='table_find'>";
	echo "<caption>".$vibranniy_podrazdel_mas['name']."</caption>"; 
	
	//vibran proizvoditel i podrazdel
	if(isset($podrazdel)&&(!isset($podpunkt))&&isset($proizvoditel)&&(!isset($funkcionalnost)))
	{
	
	$db->db_podrazdel_po_proizvoditel(&$input_array_podrazdel,$podrazdel,$proizvoditel);
	}
	
			//vibran proizvoditel i podrazdel i podpunkt i funkcionalnost 
			elseif(isset($podrazdel)&&isset($podpunkt)&&isset($proizvoditel)&&isset($funkcionalnost))
			{
			$db->db_podrazdel(&$input_array_podrazdel,$podrazdel,$podpunkt,$proizvoditel,$funkcionalnost);
			}
					
					//vibran proizvoditel i podrazdel i podpunkt
					elseif(isset($podrazdel)&&isset($podpunkt)&&isset($proizvoditel)&&(!isset($funkcionalnost)))
					{
					$db->db_podrazdel(&$input_array_podrazdel,$podrazdel,$podpunkt,$proizvoditel);
					}
							
							//vibran podrazdel i podpunkt
							elseif(isset($podrazdel)&&isset($podpunkt)&&(!isset($funkcionalnost))&&(!isset($proizvoditel)))
							{
							//$podpunkt=intval($podpunkt);
							$db->db_podrazdel(&$input_array_podrazdel,$podrazdel,$podpunkt);
							}
									
									
									elseif(isset($podrazdel)&&(!isset($podpunkt))&&(!isset($funkcionalnost))&&(!isset($proizvoditel)))
									{
									$db->db_podrazdel(&$input_array_podrazdel,$podrazdel);
									}
										else{}
										
										
										if(isset($num_stranici))
										{
										
										$num_stroki=15*$num_stranici;
										$h=$num_stroki-15;
										
										}
										else{$h=0;$num_stroki=250000;}
		
			while($input_array_podrazdel[$h]&&($h!=$num_stroki)){
			//$javascript=printf(onClick="window.open('http://www.samsung.filpan.ru/korzina.php','Korzina')");
			echo '<tr class=find>
			<td class=find width=150><img width=150 height=150 src=http://www.filpan.ru/img/'.$input_array_podrazdel[$h]['picture'].' alt='.$input_array_podrazdel[$h]['name'].'></td>
			<td class=find><a href=find_tovar.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'>'.$input_array_podrazdel[$h]['name'].'</a></td>
			<td class=find width=300>
				<table class=table_cena_right>';
				if($razdel=='razdel_2'){
				echo '<tr  class=table_cena_right_st><td  class=table_cena_right_st>Цена:</td><td class=table_cena_right_st>'.$kurs_val*$input_array_podrazdel[$h]['price'].' руб.</td></tr>';
				}
				else{
				echo '<tr><td  class=table_cena_right_st>Цена:</td><td  class=table_cena_right_st>'.$input_array_podrazdel[$h]['price'].' руб.</td></tr>';
				}
				echo '<tr><td  class=table_cena_right_st>Количество</td><td  class=table_cena_right_st></td></tr>
				<tr><td width=50%></td>
				<td  class=table_cena_right_st onClick="window.open(\'http://www.samsung.filpan.ru/korzina.php?razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')"><span class=\'kupit\'>Купить <img class=\'korzina\' src=\'images/right_part/korz.gif\' vspace=\'0\' hspace=\'0\' border=\'0\' onClick="window.open(\'http://www.samsung.filpan.ru/korzina.php?razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')"></td></tr>
				</table>
			</td>
			</tr>';
			$h++;
			}	
	echo '</table>';
	
	
	//$col_strok=count($input_array_podrazdel);
	$col_stranic=count($input_array_podrazdel)/15;
	$col_stranic_celoe=floor(count($input_array_podrazdel)/15);
	if($col_stranic>$col_stranic_celoe)
	{
	$i_usl=$col_stranic_celoe+1;
	}
	else
	{
	$i_usl=$col_stranic_celoe;
	}
	?><table class='table_ssilki_na_stranicu'><tr><?
	
	/*
	if($parametr_array['proizvoditel'])
	{
	$jj=1;
	for($i=1;$i<=$i_usl;$i++)
	{
	echo '<td><a href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&num_stranici='.$i.'><td>'.$i.'</a>|</td>';
	$jj++;
	if($jj==30)
	{echo '</tr><tr>';
	$jj=0;}
	}
	}
	else
	{
	$jj=1;
	for($i=1;$i<=$i_usl;$i++)
	{
	echo '<td><a href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&num_stranici='.$i.'>'.$i.'</a>|</td>';
	
	$jj++;
	if($jj==30)
	{echo '</tr><tr>';
	$jj=0;}
	}
	}
	*/
	
	
	
	
	
	if(isset($podrazdel)&&(!isset($podpunkt))&&isset($proizvoditel)&&(!isset($funkcionalnost)))
	{
	//echo 1;
	$jj=1;
	for($i=1;$i<=$i_usl;$i++)
	{
	echo '<td><a href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&proizvoditel='.$parametr_array['proizvoditel'].'&num_stranici='.$i.'>'.$i.'</a>|</td>';
	$jj++;
	if($jj==30)
	{echo '</tr><tr>';
	$jj=0;}
	}
	}
	
			//vibran proizvoditel i podrazdel i podpunkt i funkcionalnost 
			elseif(isset($podrazdel)&&isset($podpunkt)&&isset($proizvoditel)&&(!isset($funkcionalnost)))
			{
			//echo 2;
			$jj=1;
			for($i=1;$i<=$i_usl;$i++)
			{
			echo '<td><a href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&num_stranici='.$i.'>'.$i.'</a>|</td>';
			$jj++;
			if($jj==30)
			{echo '</tr><tr>';
			$jj=0;}
			}
			}
					
					//vibran proizvoditel i podrazdel i podpunkt ETO USLOVIYE NE NUGNO
					elseif(isset($podrazdel)&&isset($podpunkt)&&isset($proizvoditel)&&(!isset($funkcionalnost)))
					{
					//echo 3;
					$jj=1;
					for($i=1;$i<=$i_usl;$i++)
					{
					echo '<td><a href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&num_stranici='.$i.'>'.$i.'</a>|</td>';
					$jj++;
					if($jj==30)
					{echo '</tr><tr>';
					$jj=0;}
					}
					}
							
							//vibran podrazdel i podpunkt
							elseif(isset($podrazdel)&&isset($podpunkt)&&(!isset($funkcionalnost))&&(!isset($proizvoditel)))
							{
							//echo 4;
							//$podpunkt=intval($podpunkt);
							$jj=1;
							for($i=1;$i<=$i_usl;$i++)
							{
							echo '<td><a href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&num_stranici='.$i.'>'.$i.'</a>|</td>';
							$jj++;
							if($jj==30)
							{echo '</tr><tr>';
							$jj=0;}
							}
							}
									
									
									elseif(isset($podrazdel)&&(!isset($podpunkt))&&(!isset($funkcionalnost))&&(!isset($proizvoditel)))
									{
									//echo 5;
									$jj=1;
									for($i=1;$i<=$i_usl;$i++)
									{
									echo '<td><a href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&num_stranici='.$i.'>'.$i.'</a>|</td>';
									$jj++;
									if($jj==30)
									{echo '</tr><tr>';
									$jj=0;}
									}
									}
										else{}
	
	
	
	
	
	
	?>
	</tr></table>
	<?
	//echo count($input_array_podrazdel).'<br>';
	//echo floor(count($input_array_podrazdel)/5);
	?>
</div>

 
<?php okantovka_bottom('Zakr_vneshne',17,15);?>  