<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$update_query=new db_connection();

$request=sprintf("UPDATE index_statyi_gift SET name_statyi='%s', date='%s', text_statyi='%s'  WHERE id=%s",

iconv( "utf-8","cp1251",$_POST['name_statyi']),
iconv( "utf-8","cp1251",$_POST['date']),
iconv( "utf-8","cp1251",$_POST['text_statyi']),
iconv( "utf-8","cp1251",$_POST['id']));


$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
