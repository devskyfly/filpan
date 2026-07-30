<?$kurs=new file;
$kurs_val=$kurs-> get_kurs();?>

<?
unset($kurs);
		if(isset($proizvoditel)&&(!(empty($proizvoditel)))){

	$input_array=array();
	$db->db_current_proizvoditel(&$input_array,$parametr_array['podrazdel'],$proizvoditel);
	echo "<span style=\"font-size:20px;color:#9C9C9C;\">Вы находитесь в разделе:&nbsp</span><span style=\"color:#FF6600;font-size:20px\">".$current_podrazdel."</span>
	<BR><span style=\"font-size:20px;color:#9C9C9C;\">Подраздел:&nbsp</span><span style=\"color:#FF6600;font-size:20px\">".$current_podpunkt."</span>";
	echo "<BR><span style=\"font-size:20px;color:#9C9C9C;\">Производитель:&nbsp</span> <span style=\"color:#FF6600;font-size:20px\">".$input_array[0]['text_podpunkt']."</span>";
		echo "<BR>";	echo "<BR>";
	}
	else{
	if(isset($current_podpunkt)){
	

	echo "<span style=\"font-size:20px;color:#9C9C9C;\">Вы находитесь в разделе:&nbsp</span>
	<span style=\"color:#FF6600;font-size:20px\">".$current_podrazdel."</span>
	<BR><span style=\"font-size:20px;color:#9C9C9C;\">Подраздел:&nbsp</span>
	<span style=\"color:#FF6600;font-size:20px\">".$current_podpunkt."</span>";
		echo "<BR>";	echo "<BR>";
	}
	else{
	if(isset($current_podrazdel)){

	echo "<span style=\"font-size:20px;color:#9C9C9C;\">Вы находитесь в разделе:&nbsp<span style=\"color:#FF6600;font-size:20px\">".$current_podrazdel."</span></span>";
		echo "<BR>";	echo "<BR>";
	}
	}
	}
	echo '<div class=\'find_el\'>';
	echo "</div>";
	
	echo '<div class=\'find_el\' style=\'width:600px\'>';
	echo "<br><span style=\"font-size:20px;color:#9C9C9C;margin-left:170px;\"> Искать по производителю:</span>&nbsp;<br><br>";
	$h=0;
	if(isset($podpunkt)){
	echo "<div class='proiz' style='width:600px'>";
	while($massiv_proizvoditeley_podpunkt[$h]){
	echo $massiv_proizvoditeley_podpunkt[$h].' &nbsp <span style=\'color:#fd670b;\'>|&nbsp </span> ';
	$h++;
	}
	echo "</div>";
	}
	else
	{
	echo "<div class='proiz' style='width:600px'>";
	while($massiv_proizvoditeley[$h]){
	echo $massiv_proizvoditeley[$h].'&nbsp<span style=\'color:#fd670b;\'>|&nbsp</span>  ';
	$h++;
	}
	echo "</div>";
	}

	
	unset($input_array_funkcionalnost);
	echo "</div>";
	?><br><?
	/*
	$db->db_funkcionalnost(&$input_array_funkcionalnost,$vibranniy_podrazdel_mas['podrazdel_name']);
	echo "<br>По функционалности:&nbsp;";
	$h=0;
	
	while($input_array_funkcionalnost[$h]){
	echo '<a>'.$input_array_funkcionalnost[$h]['text_podpunkt'].'</a>&nbsp;|&nbsp;';
	$h++;
	}
*/
	unset($input_array_podrazdel);
	echo '<div class=\'find_el\'>';
	echo '<img src=\'http://www.kartridgemaster.ru/img/feed-icon-14x14.png\'>&nbsp<span class=\'zagolovok\' style=color:#9C9C9C;>&nbsp'.$vibranniy_podrazdel_mas['name'].'</span><br><br>'; 
	echo "</div>";
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
			//$javascript=printf(onClick="window.open('http://www.kartridgemaster.ru/korzina.php','Korzina')");
			
			
			
			
			 if (($h%2)==0) {
			     echo '<div class=\'find_el\'>';
			echo '<div class=\'find_el_left\'><a style=\'border:0px;padding:0px;margin:0px;\' href=find_tovar.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'><img border=0 vspace=0 hspace=0   width=130 style="margin-top:5px;margin-left:5px;" src=http://www.filpan.ru/img/'.$input_array_podrazdel[$h]['picture'].' alt='.$input_array_podrazdel[$h]['name'].'></a></div>
			<div class=\'find_el_right\'><div><a class=\'centr_spisok\' href=find_tovar.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'>'.$input_array_podrazdel[$h]['name'].'</a></div>';
				if($razdel=='razdel_2'){
					
					$val2=1.1*($kurs_val*$input_array_podrazdel[$h]['price']);
				$cena_old=$val2;
				echo '<br><div>Старая цена:&nbsp<span class=\'cena_old\'>'.$cena_old.' руб.</span></div>';
				echo '<div style="float:left" >цена:&nbsp<span class=\'cena\'>'.$kurs_val*$input_array_podrazdel[$h]['price'].' руб.</span></div>';
				}
				else{
				echo $input_array_podrazdel[$h]['price'].' руб.';
				}
				echo '<div class=\'div_kupit\' ><span class=\'kupit\' onClick="window.open(\'http://www.kartridgemaster.ru/korzina.php?razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')" >Купить</span> <img class=\'korzina\' src=\'images/right_part/korz.gif\' vspace=\'0\' hspace=\'0\' border=\'0\' onClick="window.open(\'http://www.kartridgemaster.ru/korzina.php?razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')"></div>';
				echo "</div>";
			echo "</div>";
			
			    }
			    else {
			    echo '<div class=\'find_el_n\'>';
			echo '<div class=\'find_el_left\'><a style=\'border:0px;padding:0px;margin:0px;\' href=find_tovar.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'><img border=0 vspace=0 hspace=0   width=130 style="margin-top:5px;margin-left:5px;" src=http://www.filpan.ru/img/'.$input_array_podrazdel[$h]['picture'].' alt='.$input_array_podrazdel[$h]['name'].'></a></div>
			<div class=\'find_el_right\'><div><a class=\'centr_spisok\' href=find_tovar.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'>'.$input_array_podrazdel[$h]['name'].'</a></div>';
				if($razdel=='razdel_2'){
					
					$val2=1.1*($kurs_val*$input_array_podrazdel[$h]['price']);
				$cena_old=$val2;
				echo '<br><div>Старая цена:&nbsp<span class=\'cena_old\'>'.$cena_old.' руб.</span></div>';
				echo '<div style="float:left">цена:&nbsp<span class=\'cena\'>'.$kurs_val*$input_array_podrazdel[$h]['price'].' руб.</span></div>';
				}
				else{
				echo $input_array_podrazdel[$h]['price'].' руб.';
				}
				echo '<div class=\'div_kupit\' ><span class=\'kupit\' onClick="window.open(\'http://www.kartridgemaster.ru/korzina.php?razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')" >Купить</span> <img class=\'korzina\' src=\'images/right_part/korz.gif\' vspace=\'0\' hspace=\'0\' border=\'0\' onClick="window.open(\'http://www.kartridgemaster.ru/korzina.php?razdel='.$razdel.'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&id_tov='.$input_array_podrazdel[$h]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')"></div>';
				echo "</div>";
			echo "</div>";
			    }
			
			
			$h++;
			}	


	
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
	
	
	if(isset($podrazdel)&&(!isset($podpunkt))&&isset($proizvoditel)&&(!isset($funkcionalnost)))
	{
	//echo 1;
	$jj=1;
	for($i=1;$i<=$i_usl;$i++)
	{
	echo '<td class=\'yacheyka\'><a  href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&proizvoditel='.$parametr_array['proizvoditel'].'&num_stranici='.$i.'>'.$i.'</a></td>';
	$jj++;
	if($jj==26)
	{echo '</tr><tr>';
	$jj=1;}
	}
	}
	
			//vibran proizvoditel i podrazdel i podpunkt i funkcionalnost 
			elseif(isset($podrazdel)&&isset($podpunkt)&&isset($proizvoditel)&&(!isset($funkcionalnost)))
			{
			//echo 2;
			$jj=1;
			for($i=1;$i<=$i_usl;$i++)
			{
			echo '<td class=\'yacheyka\'><a  href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&num_stranici='.$i.'>'.$i.'</a></td>';
			$jj++;
			if($jj==26)
			{echo '</tr><tr>';
			$jj=1;}
			}
			}
					
					//vibran proizvoditel i podrazdel i podpunkt ETO USLOVIYE NE NUGNO
					elseif(isset($podrazdel)&&isset($podpunkt)&&isset($proizvoditel)&&(!isset($funkcionalnost)))
					{
					//echo 3;
					$jj=1;
					for($i=1;$i<=$i_usl;$i++)
					{
					echo '<td class=\'yacheyka\'><a  href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&proizvoditel='.$parametr_array['proizvoditel'].'&num_stranici='.$i.'>'.$i.'</a></td>';
					$jj++;
					if($jj==26)
					{echo '</tr><tr>';
					$jj=1;}
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
							echo '<td class=\'yacheyka\'><a  href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&podpunkt='.$parametr_array['podpunkt'].'&num_stranici='.$i.'>'.$i.'</a></td>';
							$jj++;
							if($jj==26)
							{echo '</tr><tr>';
							$jj=1;}
							}
							}
									
									
									elseif(isset($podrazdel)&&(!isset($podpunkt))&&(!isset($funkcionalnost))&&(!isset($proizvoditel)))
									{
									//echo 5;
									$jj=1;
									for($i=1;$i<=$i_usl;$i++)
									{
									echo '<td class=\'yacheyka\'><a  href=find.php?razdel='.$parametr_array['razdel'].'&podrazdel='.$parametr_array['podrazdel'].'&num_stranici='.$i.'>'.$i.'</a></td>';
									$jj++;
									if($jj==26)
									{echo '</tr><tr>';
									$jj=1;}
									}
									}
										else{}
										echo '</table>'
	 
	
	
	
	
	
	?>
	
