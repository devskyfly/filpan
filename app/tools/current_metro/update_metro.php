<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$update_query=new db_connection();

$request=sprintf("UPDATE metro SET metro='%s', streets='%s', text='%s', keywords='%s', description='%s', title='%s'  WHERE id=%s",
iconv( "utf-8","cp1251",$_POST['metro']),
iconv( "utf-8","cp1251",$_POST['streets']),
iconv( "utf-8","cp1251",$_POST['text']),
iconv( "utf-8","cp1251",$_POST['keywords']),
iconv( "utf-8","cp1251",$_POST['description']),
iconv( "utf-8","cp1251",$_POST['title']),
iconv( "utf-8","cp1251",$_POST['id']));

//echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
