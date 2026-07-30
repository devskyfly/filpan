<?

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$update_query=new db_connection();

$request=sprintf("INSERT INTO proiz (idrub,rub,idraz) VALUES ('%s','%s',2)",
iconv( "utf-8","cp1251",$_POST['idrub']),
iconv( "utf-8","cp1251",$_POST['rub']));

//echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$id=mysql_insert_id();
echo $id;
$update_query->close_connection();
?>