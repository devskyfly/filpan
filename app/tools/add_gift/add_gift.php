<?

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$update_query=new db_connection();

$request=sprintf("INSERT INTO sodraz (title, nazv, price, raz, idraz, proiz, super, mark, local_del, bid, db_description, db_keywords, descr, xcl,  word_key, pict, soptov, sopuslugi, text_modul, nazakaz) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',%s)",

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
iconv( "utf-8","cp1251",$_POST['picture_inf']),
iconv( "utf-8","cp1251",$_POST['soptov']),
iconv( "utf-8","cp1251",$_POST['sopuslugi']),
iconv( "utf-8","cp1251",$_POST['text_modul']),
iconv( "utf-8","cp1251",$_POST['nazakaz']));

//echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$id=mysql_insert_id();
echo $id;
$update_query->close_connection();
select_unit($id,'sodraz');


$yml=new yml_request();
$yml_usl=new yml_request_usl();
write_yml($yml,$yml_usl);
?>