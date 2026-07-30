<div class='ContentLevayaKolonkaSredniyDiv'>
<?
//require_once('Menu.txt');
$DIV[0]['n']="<div class='ContentLevayaKolonkaSredniyDiv'><span value='%s' class='ZagolovokContentLevayaKolonkaSredniyDiv TextZagolovokContentLevayaKolonkaSredniyDiv'><input class='knopkaViboraElementaIzZagolovka' type='button' value='+'>%s</span>";
$DIV[0]['k']="</div>";
$UL[1]['n']="<ul class='SpisokSsilokMenu'>\r\n";
$UL[1]['k']="</ul>\r\n";
$UL[2]['n']="<ul class='SpisokSsilokMenu'>\r\n";
$UL[2]['k']="</ul>\r\n";

$LI[1]['n_aktivnay']="<li value='%s'><span class='Aktivnay'>%s</span></li>\r\n";
$LI[1]['n']="<li value='%s'><span  class='Neaktivnaya'>%s</span></li>\r\n";
$LI[2]['n']="<li value='%s'><span  class='Neaktivnaya'>%s</span></li>\r\n";
//$LI[1]['n']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Neaktivnaya'>%s</span>6</li>\r\n";
$LI[2]['n_aktivnay']="<li value='%s'><span class='Aktivnay'>%s</span></li>\r\n";
$IerarhicheskiySpisok=new Menu();
$IerarhicheskiySpisok->_DIV=$DIV;
$IerarhicheskiySpisok->_UL=$UL;
$IerarhicheskiySpisok->_LI=$LI;
$IerarhicheskiySpisok->_KolichestvoOpisannixUrovneyVlogennosti=2;
$IerarhicheskiySpisok->vibratPoliya('title,ssilka');
$IerarhicheskiySpisok->vivestiDerevomDliyaRedaktirovaniyaSoputstvuyushixTovarov($id_menu);/**/


$TekushiyElementMenu=new ElementMenu();
$TekushiyElementMenu->poluchit($id_menu);
?>	
</div>