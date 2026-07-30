<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$statya=new statya_tov($_POST['katalog'],$_POST['raz'],$_POST['podraz'],$_POST['proiz']);
//echo $_POST['katalog']."-".$_POST['raz']."-".$_POST['podraz']."-".$_POST['proiz'];
$statya->show_text_admin();
?>