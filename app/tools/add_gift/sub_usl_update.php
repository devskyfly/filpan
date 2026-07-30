<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$sub_usl=new usl_gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page']);
$sub_usl->show_soput_table($_POST['raz'],$_POST['podraz'],$_POST['proiz'],array());
?>