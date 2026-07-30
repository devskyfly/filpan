<?php okantovka_top('Zakr_vneshne','100%',17,15,'#F6F6F6'); ?> 
<div id='left_part' style="height:100%"> 
<?
 global $massiv_proizvoditeley;
 $db=new date_base;
 
 //obrashaemsiya k baze s zaprosom razdelov(Tovara/Uslugi)
 $db->db_katalog(&$input_array_razdel);
 $i=0;
 
while($input_array_razdel[$i]){
		
		
		//vivodim nazvaniya razdelov v cikle
		
		okantovka_top('Nezakr','100%',17,15,'#FFFFFF');
		//obrashaemsiya k baze s zaprosom podrazdelov(Kartridgi,Kopiri...)
				
				
				
				$db->db_razdel(&$input_array_podrazdel,$input_array_razdel[$i]['razdel_name']);
				$j=0;
				
				
				echo '<div class=\'right_superpredlogeniye\'>'.$input_array_razdel[$i]['name'].'</div>';
				while($input_array_podrazdel[$j]){
				//vivodim PODRAZDELI
				
				
				echo '<img src=http://www.samsung.filpan.ru/images/left_part/bullet.gif width=6 height=6> <a href=http://www.samsung.filpan.ru/find.php?razdel='.$input_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_array_podrazdel[$j]['podrazdel_name'].'&num_stranici=1 >'.$input_array_podrazdel[$j]['name'].'</a><br>';
				
				

							//vvodim usloviye na vxod v podrazdel
							if(isset($podrazdel)&&($podrazdel==$input_array_podrazdel[$j]['podrazdel_name']))
							{
							$vibranniy_podrazdel_mas=$input_array_podrazdel[$j];//inf dliya centr_part_http://www.samsung.filpan.ru/find
							
							
										okantovka_top('Nezakr','100%',17,15,'#FFFFFF'); 
							

							//obrashaemsya k baze s zaprosom podpunktov podrazdelov(struynie,lazerniye...)
										$db->db_podpunkt(&$input_array_podpunkt,$input_array_podrazdel[$j]['podrazdel_name']);


										$g=0;
										while($input_array_podpunkt[$g]){
										//vivodim podpunkti podrazdelov v cikle
										echo '<img src=http://www.samsung.filpan.ru/images/left_part/bullet.gif width=6 height=6> <a href=http://www.samsung.filpan.ru/find.php?razdel='.$input_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_array_podrazdel[$j]['podrazdel_name'].'&podpunkt='.$input_array_podpunkt[$g]['id_podpunkt'].'&num_stranici=1>'.$input_array_podpunkt[$g]['text_podpunkt'].' </a><br>';
										//eta struktura dliya xpraneniya proizvoditeley dannogo podrazdela, esli ne otkrit podpunkt


																$db->db_proizvoditel(&$input_array_proizvoditel,$input_array_podrazdel[$j]['podrazdel_name']);
																
																$h=0;
																
																//kopiruem massiv proizvoditeley
																while($input_array_proizvoditel[$h]){
																$massiv_proizvoditeley[$h]='<a href=http://www.samsung.filpan.ru/find.php?razdel='.$input_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_array_podrazdel[$j]['podrazdel_name'].'&proizvoditel='.$input_array_proizvoditel[$h]['id_podpunkt'].'&num_stranici=1>'.$input_array_proizvoditel[$h]['text_podpunkt'].'</a>|';
																$h++;
																}
																//konec strukturi
																		
												

												
									//vvodim usloviye na vivod podpunktov
									if(isset($podpunkt)&&($podpunkt==$input_array_podpunkt[$g]['id_podpunkt']))
									{
									okantovka_top('Nezakr','100%',17,15,'#FFFFFF');
									$db->db_proizvoditel(&$input_array_proizvoditel,$input_array_podrazdel[$j]['podrazdel_name']);
									$h=0;
									
									
									//print_r($massiv_proizvoditeley);
									
									$massiv_proizvoditeley=array();//kopiruem massiv proizvoditeley
									$massiv_funkcionalnost=array();//kopiruem massiv funkcionalnost			
									while($input_array_proizvoditel[$h]){
									echo '<img src=http://www.samsung.filpan.ru/images/left_part/bullet.gif width=6 height=6> <a href=http://www.samsung.filpan.ru/find.php?razdel='.$input_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_array_podrazdel[$j]['podrazdel_name'].'&podpunkt='.$input_array_podpunkt[$g]['id_podpunkt'].'&proizvoditel='.$input_array_proizvoditel[$h]['id_podpunkt'].'&num_stranici=1>'.$input_array_proizvoditel[$h]['text_podpunkt'].'</a><br>';
									//struktura xraneniya giperssilok na proiznoditelya pri otkritii podpunktov
									$massiv_proizvoditeley[$h]='<a href=http://www.samsung.filpan.ru/find.php?razdel='.$input_array_razdel[$i]['razdel_name'].'&podrazdel='.$input_array_podrazdel[$j]['podrazdel_name'].'&podpunkt='.$input_array_podpunkt[$g]['id_podpunkt'].'&proizvoditel='.$input_array_proizvoditel[$h]['id_podpunkt'].'&num_stranici=1>'.$input_array_proizvoditel[$h]['text_podpunkt'].'</a>|';
									//konec strukturi
									$h++;
									}
									$massiv_proizvoditeley_podpunkt=$massiv_proizvoditeley;//pod drugim imenem ne chitaet(
									
									okantovka_bottom('Nezakr',17,15); 
									}
																	$g++;
																		}
							okantovka_bottom('Nezakr',17,15); 
							}
							else{};
							$j++;
							}
$i++;
okantovka_bottom('Nezakr',17,15); 
}
 require_once($_SERVER['DOCUMENT_ROOT'].'/shablon/left_part_inform.php')
?>
         
				
                
</div>
<?php okantovka_bottom('Zakr_vneshne',17,15);?>  

<a href="http://www.filpan.ru/" class="nevidimiye">картриджи</a>