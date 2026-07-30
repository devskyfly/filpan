<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

echo $_POST['sort_by_name'];

if($_POST['sort_by_name']=='true')
{
$sub_gifts=new gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page'],1);
}
elseif($_POST['sort_by_name']=='false')
{
$sub_gifts=new gifts($_POST['raz'],$_POST['podraz'],$_POST['proiz'],$_POST['page']);
}
$sub_gifts->show_mass_gifts_table($_POST['raz'],$_POST['podraz'],$_POST['proiz'],array());


?>