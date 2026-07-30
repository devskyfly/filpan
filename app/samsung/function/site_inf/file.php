<?class file
{
function __construct() 
{
}


function get_kurs()
{
$handle = fopen("http://www.filpan.ru/adm/tpl/kurs.txt", "r");
$contents = fread($handle, 100);
list($per,$rasr)=split("##",$contents);
fclose($handle);
return strval($per);
}


function __destruct() 
{
}
}
?>