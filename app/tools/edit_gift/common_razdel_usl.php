<?require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$spisok_podrazdelov=new podrazdel_usl(0,$_POST['raz']);
$spisok_podrazdelov->show();
?>