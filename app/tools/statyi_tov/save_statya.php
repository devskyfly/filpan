<?

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");


$statya=new statya_tov($_POST['katalog'],$_POST['razdel'],$_POST['podrazdel'],$_POST['proiz']);

if(count($statya->f_array)==1)
{

$update_query=new db_connection();

$request=sprintf("UPDATE  inf_podrazdel SET title='%s', html_title='%s', descr='%s', keywords='%s', text_statyi='%s'  WHERE katalog=%s AND razdel=%s AND podrazdel=%s AND proiz=%s",

iconv( "utf-8","cp1251",$_POST['title']),
iconv( "utf-8","cp1251",$_POST['html_title']),
iconv( "utf-8","cp1251",$_POST['descr']),
iconv( "utf-8","cp1251",$_POST['keywords']),
iconv( "utf-8","cp1251",$_POST['text_statyi']),
iconv( "utf-8","cp1251",$_POST['katalog']),
iconv( "utf-8","cp1251",$_POST['razdel']),
iconv( "utf-8","cp1251",$_POST['podrazdel']),
iconv( "utf-8","cp1251",$_POST['proiz']));

echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();



}
else
{
$update_query=new db_connection();

$request=sprintf("INSERT INTO inf_podrazdel (title, html_title, descr, keywords, text_statyi, katalog, razdel,podrazdel,proiz) VALUES ('%s','%s','%s','%s','%s',%s,%s,%s,%s)",

iconv( "utf-8","cp1251",$_POST['title']),
iconv( "utf-8","cp1251",$_POST['html_title']),
iconv( "utf-8","cp1251",$_POST['descr']),
iconv( "utf-8","cp1251",$_POST['keywords']),
iconv( "utf-8","cp1251",$_POST['text_statyi']),
iconv( "utf-8","cp1251",$_POST['katalog']),
iconv( "utf-8","cp1251",$_POST['razdel']),
iconv( "utf-8","cp1251",$_POST['podrazdel']),
iconv( "utf-8","cp1251",$_POST['proiz']));

echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
}
?>



