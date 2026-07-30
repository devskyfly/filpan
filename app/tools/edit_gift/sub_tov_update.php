<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

$sub_gifts=new gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page']);
$gift=new gift_element($_POST['id']);

	
	$sop_tov=explode(";",$gift->f_array[0]['soptov']);
	$sub_gifts->show_soput_table($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$sop_tov);


?>