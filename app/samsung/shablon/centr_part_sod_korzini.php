<?php okantovka_top('Zakr_vneshne','100%',17,15,'#FFFFFF'); ?> 
<div id='centr_part' style=" height:100%"> 

<?
//print_r($_REQUEST['del']);
if(!$_REQUEST['pereschet']){
//echo '1';
$db->db_korzina($_SESSION['id'],&$sod_korzini);
}
else
{
//echo '2';
$sod_korzini=$_SESSION['korzina'];
//print_r($_SESSION['korzina']);
//print_r($sod_korzini);
$db->db_korzina_pereschet(&$sod_korzini,$_REQUEST['new_kol'],$_REQUEST['del']);
$sod_korzini=array();
$db->db_korzina($_SESSION['id'],&$sod_korzini);
}
$_SESSION['korzina']=array();
$_SESSION['korzina']=$sod_korzini;
//print_r($_SESSION['korzina']);
?>

<?
?>
</div>
<?php okantovka_bottom('Zakr_vneshne',17,15);?>  