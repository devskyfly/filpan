<?
//usl			  
			  $kolvo=$kolichestvo;
			  $price=$cena;
				
$gifts = explode("#;#",$_COOKIE['usl']);
$gifts_nums=count($gifts);

for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$kolvo=$kolvo+$assos_row[2];
							$price_now=$assos_row[2]*$assos_row[3];
							$price=$price+$price_now;
							}
							
//gifts							
							
$kolvo_gifts=$kolichestvo;
$price_gifts=$cena;
				
$gifts = explode("#;#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);

for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$kolvo_gifts=$kolvo_gifts+$assos_row[2];
							$price_now=$assos_row[2]*$assos_row[3];
							$price_gifts=$price_gifts+$price_now;
							}
	echo"$kolvo&$price&$kolvo_gifts&$price_gifts"
?>