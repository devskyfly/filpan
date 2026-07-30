<?

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");



$gift=new gift_element($_POST['id']);
$gift->deleting();

$update_query=new db_connection();

$request=sprintf("DELETE FROM sodraz WHERE id=%s",
iconv( "utf-8","cp1251",$_POST['id']));

echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();

//select_unit($_POST['id'],'sodraz');
?>