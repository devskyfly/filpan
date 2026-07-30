<?
function write_fl($fl_name,$text)
{
$handle = fopen($fl_name, "w");

if (fwrite($handle ,$text) === FALSE) {
        echo "Не могу произвести запись в файл ($filename)";
        exit;
    }

fclose($handle);
}
?>