<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/lib_functions/functions/read_fl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib_functions/functions/write_fl.php');
 function jsOnResponse($obj)  
 {  
 echo ' 
 <script type="text/javascript"> 
 window.parent.title_load("'.$obj.'"); 
 </script> 
 ';  
 }  
  
  $result = htmlspecialchars_decode (print_r($_FILES['loadfile'], true)); 
  
// write_fl( $_SERVER['DOCUMENT_ROOT'].'/tools/fl.txt', $result );


$descr=iconv( "cp1251","utf-8",read_fl($_FILES['loadfile']['tmp_name']));
//$descr=htmlspecialchars($descr);
$descr=str_replace(sprintf("\r"),"<br>",$descr);
$descr=str_replace(sprintf("\n"),"<br>",$descr);
$descr=str_replace(sprintf("\""),sprintf("\\\""),$descr);
$descr=str_replace(sprintf("'"),sprintf("\\\""),$descr);/**/
//echo "<script>alert(\"".$descr."\")</script>";
 jsOnResponse("{descr:'".$descr."'}");  
?>