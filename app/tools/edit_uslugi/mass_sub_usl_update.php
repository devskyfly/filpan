<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
if($_POST['sort_by_name']=='true')
{
$sub_usl=new usl_gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page'],1);
}
elseif($_POST['sort_by_name']=='false')
{
$sub_usl=new usl_gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page']);
}
//if(count($gift->f_array))
	//{

	$sop_tov=explode(";",$gift->f_array[0]['sopuslugi']);
	$sub_usl->show_mass_usl_table($_POST['raz'],$_POST['podraz'],$_POST['proiz'],array());
	//}

?>