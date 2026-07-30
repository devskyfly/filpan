<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$statyi=new index_statyi();
$statyi->shift_down($_POST['id']);
?>
