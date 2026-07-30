
<?php okantovka_top('Zakr_vneshne','100%',17,15,'#FFFFFF'); ?> 
<div id='centr_part' style=" height:100%">
 <?
//SELECT * FROM razdel_2_podrazdel_1 WHERE name LIKE '%hp%7115%'
$search = substr($search, 0, 64);
$search = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $search);
$good = trim(preg_replace("/\s(\S{1,2})\s/", " ", ereg_replace(" +", "  "," $search ")));
$good = ereg_replace(" +", " ", $good);
//print_r($good);

unset($db);
 $db=new date_base;
 
 //obrashaemsiya k baze s zaprosom razdelov(Tovara/Uslugi)
 $db->db_katalog(&$input_array_razdel);
 $i=0;
 
while($input_array_razdel[$i]){

						$db->db_razdel(&$array_podrazdel,$input_array_razdel[$i]['razdel_name']);
						$j=0;
				
											while($array_podrazdel[$j]){
				
				
			
											//echo '<br>'.$search_spisok[$j]['podrazdel_name'];
											
											//echo $array_podrazdel[$j]['podrazdel_name'].' '.$input_array_razdel[$i]['razdel_name'].'<br>';
											$db->db_search(&$search_spisok,$good,'name',$array_podrazdel[$j]['podrazdel_name'],$input_array_razdel[$i]['razdel_name']);
											//echo '<br><br><br>';
											//$search_spisok,$good,$field,$table,$razdel
											
											$j++;
											}
$i++;
}

//print_r($search_spisok);
//echo '<br>'.count($search_spisok);
$i=0;

echo "<table class='table_find'>";
	echo "<caption>Результат поиска по запросу: ".$good."</caption>"; 
while($search_spisok[$i])
{
//echo $search_spisok[$i]['id'].'  '.$search_spisok[$i]['name'].'  '.$search_spisok[$i]['price'].'<br>';

echo '<tr class=find>
			<td class=find width=150><img width=150 height=150 src=http://www.filpan.ru/img/'.$search_spisok[$i]['picture'].' alt='.$search_spisok[$i]['name'].'></td>
			<td class=find><a href=find_tovar.php?razdel='.$search_spisok[$i]['razdel'].'&podrazdel='.$search_spisok[$i]['podrazdel'].'&id_tov='.$search_spisok[$i]['id'].'>'.$search_spisok[$i]['name'].'</a></td>
			<td class=find width=300>
				<table class=table_cena_right>';
				
				
				
				echo '<tr><td width=50%>Цена:</td><td width=50%>'.$search_spisok[$i]['price'].' руб.</td></tr>';
				
				echo '<tr><td width=50%>Количество</td><td width=50%></td></tr>
				<tr><td width=50%></td>
				<td width=50%>Купить <img class=\'korzina\' src=\'images/right_part/korz.gif\' vspace=\'0\' hspace=\'0\' border=\'0\' onClick="window.open(\'http://www.samsung.filpan.ru/korzina.php?razdel='.$search_spisok[$i]['razdel'].'&podrazdel='.$search_spisok[$i]['podrazdel'].'&id_tov='.$search_spisok[$i]['id'].'\',\'_blank \',\'toolbar=0,titlebar=0,resizable=0,width=300,height=300,location=0,directories=0 \')"></td></tr>
				</table>
			</td>
			</tr>';

$i++;

}
echo '</table>';
?>
</div>

 
<?php okantovka_bottom('Zakr_vneshne',17,15);?>  