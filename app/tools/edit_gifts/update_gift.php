<?

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$update_query=new db_connection();

$request=sprintf("UPDATE sodraz SET title='%s', nazv='%s', price=%s, raz=%s, idraz=%s, proiz=%s, super=%s, mark=%s, local_del=%s, bid=%d, db_description='%s', db_keywords='%s', descr='%s', xcl='%s', word_key='%s', soptov='%s', sopuslugi='%s' WHERE id=%s",

iconv( "utf-8","cp1251",$_POST['title']),
iconv( "utf-8","cp1251",$_POST['nazv']),
iconv( "utf-8","cp1251",$_POST['price']),
iconv( "utf-8","cp1251",$_POST['raz']),
iconv( "utf-8","cp1251",$_POST['idraz']),
iconv( "utf-8","cp1251",$_POST['proiz']),
iconv( "utf-8","cp1251",$_POST['super']),
iconv( "utf-8","cp1251",$_POST['mark']),
iconv( "utf-8","cp1251",$_POST['local_del']),
iconv( "utf-8","cp1251",$_POST['bid']),
iconv( "utf-8","cp1251",$_POST['db_description']),
iconv( "utf-8","cp1251",$_POST['db_keywords']),
iconv( "utf-8","cp1251",$_POST['descr']),
iconv( "utf-8","cp1251",$_POST['xcl']),
iconv( "utf-8","cp1251",$_POST['word_key']),
iconv( "utf-8","cp1251",$_POST['soptov']),
iconv( "utf-8","cp1251",$_POST['sopuslugi']),
iconv( "utf-8","cp1251",$_POST['id']));

echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
?>