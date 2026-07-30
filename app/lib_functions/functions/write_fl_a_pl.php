<?
function write_fl_a_pl($fl_name,$text)
{
$handle = fopen($fl_name, "a+");

if (fwrite($handle ,$text) === FALSE) {
        echo "Не могу произвести запись в файл ($filename)";
        exit;
    }

fclose($handle);
}
?>