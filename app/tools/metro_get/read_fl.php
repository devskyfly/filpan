<?
function read_fl($fl_name)
{
$handle = fopen($fl_name, "r");
$buffer="";
/*while (!feof($handle)) {
    $buffer .= fgets($handle, 8000);
 
}*/
$buffer= fread($handle, filesize($fl_name));
fclose($handle);

return $buffer;
}
?>