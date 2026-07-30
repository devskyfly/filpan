<?php  function katalog_tov(){
$db= new date_base();
@$db->find_element('filpan_db','tprub','id,rub');
for($i=0;$db->out_inform[$i];$i++)
{
echo "<img src=images/left_part/bullet.gif hspace=5><a class=\'left_spisok\' href=uslfind.php?id=".$db->out_inform[$i]['id']."&sub=1>".iconv("windows-1251", "UTF-8", $db->out_inform[$i]['rub'])."</a><br>";
}
}?>