<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/lib_functions/functions/read_fl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib_functions/functions/write_fl.php');
 function jsOnResponse($obj)  
 {  
 echo ' 
 <script type="text/javascript"> 
 window.parent.onResponse("'.$obj.'"); 
 </script> 
 ';  
 }  
  
 

$number=read_fl($_SERVER['DOCUMENT_ROOT'].'/site_information/img_name.txt');
$new_number=$number+1;
write_fl($_SERVER['DOCUMENT_ROOT'].'/site_information/img_name.txt',$new_number);

 $dir = $_SERVER['DOCUMENT_ROOT'].'/img/'; // путь к каталогу загрузок на сервере  
 $name = basename($_FILES['loadfile']['name']);  
 $file = $dir.$new_number.'.jpg'; 
 
 $new_file_name= $new_number.'.jpg';
  
 $success = move_uploaded_file($_FILES['loadfile']['tmp_name'], $file);  
 //jsOnResponse("{'filename':'" . $name . "', 'success':'" . $success . "'}");  
 jsOnResponse("{'newfilename':'" .$new_file_name . "', 'filename':'" .$name . "', 'success':'" . $success . "'}");  
?>