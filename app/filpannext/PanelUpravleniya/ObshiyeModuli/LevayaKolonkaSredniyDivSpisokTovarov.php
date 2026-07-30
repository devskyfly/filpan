<div class='ContentLevayaKolonkaSredniyDiv'>
<?
//require_once('Menu.txt');
$DIV[0]['n']="<div class='ContentLevayaKolonkaSredniyDiv'><span  class='ZagolovokContentLevayaKolonkaSredniyDiv TextZagolovokContentLevayaKolonkaSredniyDiv'>%s</span>";
$DIV[0]['k']="</div>";
$UL[1]['n']="<ul class='SpisokSsilokMenu'>\r\n";
$UL[1]['k']="</ul>\r\n";
$UL[2]['n']="<ul class='SpisokSsilokMenu'>\r\n";
$UL[2]['k']="</ul>\r\n";
$LI[1]['n']="<li><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Neaktivnaya'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$LI[1]['n']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Neaktivnaya'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$LI[1]['n']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Neaktivnaya'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$LI[1]['n_aktivnay']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."/Menu%s' class='Aktivnay'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$LI[1]['n']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Neaktivnaya'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$LI[2]['n']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Neaktivnaya'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$LI[1]['n']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Neaktivnaya'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$LI[2]['n_aktivnay']="<li value='%s'><a href='".$_WEB_ROOT_ADMIN_HREF."Menu%s' class='Aktivnay'>%s</a><input class='knopkaViboraElementa' type='button' value='+'><a href='""'>перейти</a></li>\r\n";
$IerarhicheskiySpisok=new Menu();
$IerarhicheskiySpisok->_DIV=$DIV;
$IerarhicheskiySpisok->_UL=$UL;
$IerarhicheskiySpisok->_LI=$LI;
$IerarhicheskiySpisok->_KolichestvoOpisannixUrovneyVlogennosti=2;
$IerarhicheskiySpisok->vibratPoliya('title,ssilka');
$IerarhicheskiySpisok->vivestiDerevom($id);/**/
?>	
</div>