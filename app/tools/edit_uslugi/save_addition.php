<?

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

$current_element=new usl_gift_element($_POST['id']);

if( $_POST['checkbox_name']=='true')
{
$update_query=new db_connection();
$descr_text=str_replace('_***_',$current_element->f_array[0]['word_key'], iconv( "utf-8","cp1251",$_POST['name']));
$request=sprintf("UPDATE uslsodraz SET nazv='%s' WHERE id=%s",$descr_text,$_POST['id']);
echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
}

if( $_POST['checkbox_title']=='true')
{
$update_query=new db_connection();
$descr_text=str_replace('_***_',$current_element->f_array[0]['word_key'], iconv( "utf-8","cp1251",$_POST['title']));
$request=sprintf("UPDATE uslsodraz SET title='%s' WHERE id=%s",$descr_text,$_POST['id']);
echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
}

if( $_POST['checkbox_descr']=='true')
{
$update_query=new db_connection();
$descr_text=str_replace('_***_',$current_element->f_array[0]['word_key'], iconv( "utf-8","cp1251",$_POST['descr']));
$request=sprintf("UPDATE uslsodraz SET descr='%s' WHERE id=%s",$descr_text,$_POST['id']);
echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
}

if( $_POST['checkbox_podrobno']=='true')
{
$update_query=new db_connection();
$podrobno_text=str_replace('_***_',$current_element->f_array[0]['word_key'], iconv( "utf-8","cp1251",$_POST['podrobno']));
$request=sprintf("UPDATE uslsodraz SET xcl='%s' WHERE id=%s",$podrobno_text,$_POST['id']);
echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
}

if( $_POST['checkbox_description']=='true')
{
$update_query=new db_connection();
$description_text=str_replace('_***_',$current_element->f_array[0]['word_key'], iconv( "utf-8","cp1251",$_POST['description']));
$request=sprintf("UPDATE uslsodraz SET db_description='%s' WHERE id=%s",$description_text,$_POST['id']);
echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
}

if( $_POST['checkbox_keywords']=='true')
{
$update_query=new db_connection();
$keywords_text=str_replace('_***_',$current_element->f_array[0]['word_key'], iconv( "utf-8","cp1251",$_POST['keywords']));
$request=sprintf("UPDATE uslsodraz SET db_keywords='%s' WHERE id=%s",$keywords_text,$_POST['id']);
echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();
}


$update_query=new db_connection();
$request=sprintf("UPDATE uslsodraz SET word_key='%s', price=%s,  mark=%s, nazakaz=%s WHERE id=%s",iconv( "utf-8","cp1251",$_POST['keyword']),$_POST['price'],$_POST['mark'],$_POST['nazakaz'],$_POST['id']);
echo $request;
$update_query->query=$request;
$update_query->db_connection();
$update_query->current_datebases();
$update_query->set_query();
$update_query->close_connection();




?>