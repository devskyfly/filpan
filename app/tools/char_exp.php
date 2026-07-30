<?echo $_SERVER['DOCUMENT_ROOT'];
$str="../'t.txt'";
$code_str="";
$iterator=0;
while($str[$iterator])
{
if($iterator==0)
{
$code_str.="char(".ord($str[$iterator]);
}
else
{
$code_str.=",".ord($str[$iterator]);
}
$iterator++;
}
$code_str.=")";
echo $code_str;?>