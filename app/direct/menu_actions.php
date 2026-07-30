<?php
ini_set('display_errors','On');
error_reporting('E_ALL');

require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/*$link = mysql_connect("127.0.0.1","u3558310_filpan","filpan") or die ("error");
mysql_select_db("u3558310_filpan",$link) or die ("error");

mysql_query("SET NAMES 'utf8'",$link);
mysql_query("SET CHARACTER SET 'utf8'",$link);*/

$direct=isset($_POST['direct'])?$_POST['direct']:false;
$arr=$_POST['arr'];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$iterator = 1;
//Set titles.
$sheet->setCellValue('A1', 'Заголовок 1');
$sheet->setCellValue('B1', 'Заголовок 2');	
$sheet->setCellValue('C1', 'Ссылка');

foreach ($arr as $p => $v) {
	$SpisokTovarov=new TovariUslugi();
	$SpisokTovarov->vibratPoliya('id');
	
	$MassivKriteriev=array();
	//if($direct) $MassivKriteriev['direct']=1;
	$MassivKriteriev['menu_id']=$v;
	$SpisokTovarov->poluchitPoKriteriyu($MassivKriteriev);

    if ($SpisokTovarov->poluchitKolichestvoElementovMassivaInformacii()>0) {
        while ($SpisokTovarov->poluchitSleduyushiy()) {
			$iterator++;
            $ElementTovar=new ElementTovarovUslug();
            $ElementTovar->poluchit($SpisokTovarov->_TekushiyElement['id']);
			
			$nazvanie = $ElementTovar->poluchitSvoystvo('nazvanie');
			$zagolovok1 = $nazvanie;
			$zagolovok2 = $nazvanie;

			$link = YandexString($_WEB_ROOT_HREF.$ElementTovar->poluchitSvoystvo('ssilka'));
			$sheet->setCellValue('A'.$iterator, $nazvanie);
			$sheet->setCellValue('B'.$iterator, $nazvanie);
			$sheet->setCellValue('C'.$iterator, $link);
        }
    }
}



try {
    $writer = new Xlsx($spreadsheet);
	$path= __DIR__.'/direct.xlsx';
	
	$writer->save($path);
	echo 'direct.xlsx';
}
catch(\Exception $e){
	
}

//
?>