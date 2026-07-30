<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$statyi=new index_statyi_free();
$statyi->shift_up($_POST['id']);
?>
