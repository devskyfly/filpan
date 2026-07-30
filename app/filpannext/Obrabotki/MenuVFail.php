<?
/*require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$DIV[0]['n']="<div class='ContentLevayaKolonkaSredniyDiv'><span class='ZagolovokContentLevayaKolonkaSredniyDiv TextZagolovokContentLevayaKolonkaSredniyDiv'>%s</span>";
$DIV[0]['k']="</div>";
$UL[1]['n']="<ul class='SpisokSsilokMenu'>\r\n";
$UL[1]['k']="</ul>\r\n";
$UL[2]['n']="<ul class='SpisokSsilokMenu'>\r\n";
$UL[2]['k']="</ul>\r\n";
$LI[1]['n']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Neaktivnaya'>%s</a></li>\r\n";
$LI[1]['n_aktivnay']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Aktivnay'>%s</a></li>\r\n";
$LI[2]['n']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Neaktivnaya'>%s</a></li>\r\n";
$LI[2]['n_aktivnay']="<li value='%s'><a href='".$_WEB_ROOT_HREF."%s' class='Aktivnay'>%s</a></li>\r\n";
$IerarhicheskiySpisok=new Menu();
$IerarhicheskiySpisok->_DIV=$DIV;
$IerarhicheskiySpisok->_UL=$UL;
$IerarhicheskiySpisok->_LI=$LI;
$IerarhicheskiySpisok->_KolichestvoOpisannixUrovneyVlogennosti=2;
$IerarhicheskiySpisok->vibratPoliya('title,ssilka');
$DliyaZapisi=$IerarhicheskiySpisok->vivestiDerevomVFail(-1);


$filename = $_ROOT.'FilpanDesign/ObshiyeModuli/Menu.php';
$somecontent = $DliyaZapisi;

// Вначале давайте убедимся, что файл существует и доступен для записи.
if (is_writable($filename)) {

    // В нашем примере мы открываем $filename в режиме "дописать в конец".
    // Таким образом, смещение установлено в конец файла и
    // наш $somecontent допишется в конец при использовании fwrite().
    if (!$handle = fopen($filename, 'w+')) {
         echo "Не могу открыть файл ($filename)";
         exit;
    }

    // Записываем $somecontent в наш открытый файл.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Не могу произвести запись в файл ($filename)";
        exit;
    }
    
    echo "Ура! Записали ($somecontent) в файл ($filename)";
    
    fclose($handle);

} else {
    echo "Файл $filename недоступен для записи";
}*/
?>