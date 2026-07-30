<?$kurs=new file;
$kurs_val=$kurs-> get_kurs();
unset($kurs);
?>
<?php okantovka_top('Zakr_vneshne','100%',17,15,'#F6F6F6'); ?> 
<div id='right_part'> 

<?

?>
<div class='right_superpredlogeniye'>Суперпредложение</div>
<?
  $db->db_katalog(&$input_right_array_razdel);
 //obrashaemsiya k baze s zaprosom razdelov(Tovara/Uslugi)
 
 $i=1;
 
while($input_right_array_razdel[$i]){
		
		
		//vivodim nazvaniya razdelov v cikle
		//echo $input_right_array_razdel[$i]['name'].'<br>';
		
		//obrashaemsiya k baze s zaprosom podrazdelov(Kartridgi,Kopiri...)
				
				
				
				$db->db_razdel(&$input_right_array_podrazdel,$input_right_array_razdel[$i]['razdel_name']);
				$j=0;
				
				
				
				while($input_right_array_podrazdel[$j]){
				//vivodim PODRAZDELI
				//echo $input_array_podrazdel[$j]['name']."<br>";
				unset($input_right_array_super);
				$db->db_poisk_super_tovara(&$input_right_array_super,$input_right_array_podrazdel[$j]['podrazdel_name']);
				
							$k=0;
							while($input_right_array_super[$k])
							{?>
							<div class='right_super'>
							<?
							//echo '$i='.$i.'$j='.$j.'$k='.$k.' '.$input_array_super[$k]['name'].'<BR><BR>';
							echo "<img width=100  src=http://www.filpan.ru/img/".$input_right_array_super[$k]['picture']."   alt=".($input_right_array_super[$k]['name']).">";
							?>
							<div>
							<?
							echo '<a class=right_super_gipertext href=find_tovar.php?razdel='.$input_right_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_right_array_podrazdel[$j]['podrazdel_name'].'&id_tov='.$input_right_array_super[$k]['id'].'>'.$input_right_array_super[$k]['name'].'</a>';
							?>
							</div>
							<div>
							<?
							/*  //var_dump($input_right_array_super[$k]['opisaniye']);
							echo  utf8_encode($input_right_array_super[$k]['opisaniye']);
							 $simbol=0;
							while(($simbol<160)&&isset($input_right_array_super[$k]['opisaniye'][$simbol])){
							//echo iconv("UNICODE" ,"UTF-8", $input_right_array_super[$k]['opisaniye'][$simbol]);
;							//echo $input_right_array_super[$k]['opisaniye'][$simbol];
							$simbol=$simbol+1;
							}   */
							
							mb_internal_encoding("UTF-8"); //это нужная херня-принудительно выставляем кодировку
							
							
							 $checksum = $input_right_array_super[$k]['opisaniye'];

							 $out_104=mb_substr($checksum ,0,105);
							
							echo $out_104; 
							echo '...';
							
							
							
							
							?>
							</div>
							<br>
							Цена: <span class='right_cena'><?if($input_right_array_razdel[$i]['razdel_name']=='razdel_2'){$cena_rub=$kurs_val*$input_right_array_super[$k]['price'];echo $cena_rub.' руб.';}
							else{echo $input_right_array_super[$k]['price'].' руб.';}?></span>
							<br>
							<span class='kupit' <? echo 'onClick="window.open(\'http://www.samsung.filpan.ru/korzina.php?razdel='.$input_right_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_right_array_podrazdel[$j]['podrazdel_name'].'&podpunkt='.$input_right_array_podrazdel['podpunkt'].'&proizvoditel='.$input_right_array_podrazdel['proizvoditel'].'&id_tov='.$input_right_array_super[$k]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')"'?>>Купить</span> <span class='korzina'><? echo '<img class=\'korzina\' src=\'images/right_part/korz.gif\' vspace=\'0\' hspace=\'0\' border=\'0\' onClick="window.open(\'http://www.samsung.filpan.ru/korzina.php?razdel='.$input_right_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_right_array_podrazdel[$j]['podrazdel_name'].'&podpunkt='.$input_right_array_podrazdel['podpunkt'].'&proizvoditel='.$input_right_array_podrazdel['proizvoditel'].'&id_tov='.$input_right_array_super[$k]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')">'?></span><br>
							<img src='images/right_part/smoth-bottom-left.gif' vspace='0' hspace='0' border='0' align='bottom'>
							</div>
							<br>
							<?
							$k++;
							}
			
							$j++;
							}
							
$i--;

}

?>
       	</div>	
             
<?php okantovka_bottom('Zakr_vneshne',17,15);?>  