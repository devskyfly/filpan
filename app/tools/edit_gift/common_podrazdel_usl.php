<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$spisok_proiz=new proiz_usl(0,$_POST['raz']);
$spisok_proiz->show();
?>