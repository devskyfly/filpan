<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
$yml=new yml_request();
$yml_usl=new yml_request_usl();
write_yml($yml,$yml_usl);
?>