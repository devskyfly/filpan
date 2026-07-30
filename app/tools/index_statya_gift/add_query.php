<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$update_query=new db_connection();
$statyi=new index_statyi_gift();
$new_order=$statyi->get_max_order()+1;
$request=sprintf("INSERT INTO index_statyi_gift (name_statyi, date, text_statyi,ord ) VALUES('%s','%s','%s','%s')",

iconv( "utf-8","cp1251",$_POST['name_statyi']),
iconv( "utf-8","cp1251",$_POST['date']),
iconv( "utf-8","cp1251",$_POST['text_statyi']),
iconv( "utf-8","cp1251",$new_order));

//echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$id=mysql_insert_id();
echo $id;
$update_query->close_connection();
