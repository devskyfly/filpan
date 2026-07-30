<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

$sub_gifts=new gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page']);

$sub_gifts->show_gifts_table($_POST['raz'],$_POST['podraz'],$_POST['proiz'],array());


?>