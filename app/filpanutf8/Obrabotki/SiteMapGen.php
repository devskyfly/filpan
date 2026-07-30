<?
set_time_limit(0);
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");


$DliyaZapisi='';

$SpisokSsilok=new Ssilki();

$SpisokSsilok->vibratPoliya('id,ssilka');
$SpisokSsilok->poluchit();

$DliyaZapisi.=sprintf('<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">'."\r\n");

while ($SpisokSsilok->poluchitSleduyushiy()) {
$DliyaZapisi.=htmlspecialchars (sprintf("<url>\r\n<loc>%s</loc>\r\n</url>\r\n",$SpisokSsilok->_TekushiyElement['ssilka']));
}

$DliyaZapisi.=sprintf('</urlset>');

$filename = $_SERVER['DOCUMENT_ROOT'].'/sitemap.xml';

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
    
    echo "Информация записана в файл ($filename)";
    
    fclose($handle);

} else {
    echo "Файл $filename недоступен для записи";
}






?>