<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

$sub_usl=new usl_gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page']);
$gift=new gift_element($_POST['id']);
//if(count($gift->f_array))
	//{

	//$sop_tov=explode(";",$gift->f_array[0]['sopuslugi']);
	$sop_tov=array();
	$sub_usl->show_soput_table_copy($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$sop_tov);
	//}

?>