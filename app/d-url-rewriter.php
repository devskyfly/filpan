<?php
function file_get_contents_curl($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
curl_setopt($ch, CURLOPT_URL, $url);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}

$del=array(
/*
'/uslfind.php?id=1&dopp=28&podc=31&usl=1',
'/uslfind.php?id=1&dopp=56&podc=31&usl=1',
'/uslfind.php?id=1&dopp=57&podc=31&usl=1',
'/uslfind.php?id=1&dopp=64&podc=31&usl=1',
'/uslfind.php?id=1&dopp=76&podc=31&usl=1',
'/uslfind.php?id=1&dopp=87&podc=31&usl=1',
'/uslfind.php?id=1&dopp=89&podc=31&usl=1',
'/uslfind.php?id=1&dopp=100&podc=31&usl=1',
'/uslfind.php?id=1&dopp=105&podc=31&usl=1',
'/uslfind.php?id=9&dopp=110&podc=78&usl=1',
'/uslfind.php?id=3&podc=93&usl=1',
'/find.php?id=6&podc=20',
'/find.php?id=7&podc=59',
'/find.php?id=8&podc=23',
'/find.php?id=18&podc=48',*/
);

if(in_array($_SERVER['REQUEST_URI'],$del)){
	 header('HTTP/1.1 404 Not found');
	 echo file_get_contents_curl('http://www.filpan.ru/asdasda');
	 die();
}

// Раздел настройки ЧПУ (Все пути начинаются с ведущего слеша от корневой директории)
  $aURLRewriter = array (
  
'/uslfind.php?id=1&usl=1'=>'/zapravka-kartridzhej-v-moskve',
'/uslfind.php?id=1'=>'/zapravka-kartridzhej-v-moskve',
'/uslfind.php?id=1&podc=27&usl=1'=>'/zapravka-lazernyh-kartridzhej',

'/uslfind.php?id=1&dopp=18&podc=27&usl=1'=>'/zapravka-kartridjej-hp',

'/uslfind.php?id=1&dopp=23&podc=27&usl=1'=>'/zapravka-kartridzhej-canon',
'/uslfind.php?id=1&dopp=26&podc=27&usl=1'=>'/zapravka-kartridzhej-samsung',
'/uslfind.php?id=1&dopp=27&podc=27&usl=1'=>'/zapravka-kartridzhej-xerox',
'/uslfind.php?id=1&dopp=28&podc=27&usl=1'=>'/zapravka-kartridzhej-brother',
'/uslfind.php?id=1&dopp=56&podc=27&usl=1'=>'/zapravka-kartridzhej-panasonic',
'/uslfind.php?id=1&dopp=57&podc=27&usl=1'=>'/zapravka-kartridzhej-sharp',
'/uslfind.php?id=1&dopp=63&podc=27&usl=1'=>'/zapravka-kartridzhej-lexmark',
'/uslfind.php?id=1&dopp=64&podc=27&usl=1'=>'/zapravka-kartridzhej-konica-minolta',
'/uslfind.php?id=1&dopp=76&podc=27&usl=1'=>'/zapravka-kartridzhej-kyocera',
'/uslfind.php?id=1&dopp=87&podc=27&usl=1'=>'/zapravka-kartridzhej-epson',
'/uslfind.php?id=1&dopp=89&podc=27&usl=1'=>'/zapravka-kartridzhej-oki',
'/uslfind.php?id=1&dopp=100&podc=27&usl=1'=>'/zapravka-kartridzhej-philips',
'/uslfind.php?id=1&dopp=105&podc=27&usl=1'=>'/zapravka-kartridzhej-ricoh',

'/uslfind.php?id=1&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej',

'/uslfind.php?id=1&dopp=18&podc=31&usl=1'=>'/zapravka-strujnyh-kartridjej-hp',
'/uslfind.php?id=1&dopp=23&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-canon',
'/uslfind.php?id=1&dopp=26&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-samsung',
'/uslfind.php?id=1&dopp=27&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-xerox',
'/uslfind.php?id=1&dopp=28&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-brother',
'/uslfind.php?id=1&dopp=56&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-panasonic',
'/uslfind.php?id=1&dopp=57&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-sharp',
'/uslfind.php?id=1&dopp=63&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-lexmark',
'/uslfind.php?id=1&dopp=64&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-konica-minolta',
'/uslfind.php?id=1&dopp=76&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-kyocera',
'/uslfind.php?id=1&dopp=87&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-epson',
'/uslfind.php?id=1&dopp=89&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-oki',
'/uslfind.php?id=1&dopp=100&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-philips',
'/uslfind.php?id=1&dopp=105&podc=31&usl=1'=>'/zapravka-strujnyh-kartridzhej-ricoh',

'/uslfind.php?id=2&usl=1'=>'/vosstanovka-kartridzhej-v-moskve',
'/uslfind.phpid=2&podc=29&usl=1'=>'/vosstanovka-lazernyh-kartridzhej-v-moskve',

'/uslfind.php?id=3&usl=1'=>'/remont-orgtehniki-v-moskve',

'/uslfind.php?id=3&podc=90&usl=1'=>'/remont-printerov-v-moskve',

'/uslfind.php?id=3&dopp=141&podc=90&usl=1'=>'/remont-printerov-hp',
'/uslfind.php?id=3&dopp=142&podc=90&usl=1'=>'/remont-printerov-canon',
'/uslfind.php?id=3&dopp=143&podc=90&usl=1'=>'/remont-printerov-samsung',
'/uslfind.php?id=3&dopp=144&podc=90&usl=1'=>'/remont-printerov-kyocera',
'/uslfind.php?id=3&dopp=145&podc=90&usl=1'=>'/remont-printerov-konica-minolta',
'/uslfind.php?id=3&dopp=146&podc=90&usl=1'=>'/remont-printerov-sharp',
'/uslfind.php?id=3&dopp=147&podc=90&usl=1'=>'/remont-printerov-oki',
'/uslfind.php?id=3&dopp=148&podc=90&usl=1'=>'/remont-printerov-panasonic',

'/uslfind.php?id=3&podc=91&usl=1'=>'/remont-kopirov-v-moskve',

'/uslfind.php?id=3&dopp=141&podc=91&usl=1'=>'/remont-kopirov-hp',
'/uslfind.php?id=3&dopp=142&podc=91&usl=1'=>'/remont-kopirov-canon',
'/uslfind.php?id=3&dopp=143&podc=91&usl=1'=>'/remont-kopirov-samsung',
'/uslfind.php?id=3&dopp=144&podc=91&usl=1'=>'/remont-kopirov-kyocera',
'/uslfind.php?id=3&dopp=145&podc=91&usl=1'=>'/remont-kopirov-konica-minolta',
'/uslfind.php?id=3&dopp=146&podc=91&usl=1'=>'/remont-kopirov-sharp',
'/uslfind.php?id=3&dopp=147&podc=91&usl=1'=>'/remont-kopirov-oki',
'/uslfind.php?id=3&dopp=148&podc=91&usl=1'=>'/remont-kopirov-panasonic',

'/uslfind.php?id=3&podc=92&usl=1'=>'/remont-mfu-v-moskve',

'/uslfind.php?id=3&dopp=141&podc=92&usl=1'=>'/remont-mfu-hp',
'/uslfind.php?id=3&dopp=142&podc=92&usl=1'=>'/remont-mfu-canon',
'/uslfind.php?id=3&dopp=143&podc=92&usl=1'=>'/remont-mfu-samsung',
'/uslfind.php?id=3&dopp=144&podc=92&usl=1'=>'/remont-mfu-kyocera',
'/uslfind.php?id=3&dopp=145&podc=92&usl=1'=>'/remont-mfu-konica-minolta',
'/uslfind.php?id=3&dopp=146&podc=92&usl=1'=>'/remont-mfu-sharp',
'/uslfind.php?id=3&dopp=147&podc=92&usl=1'=>'/remont-mfu-oki',
'/uslfind.php?id=3&dopp=148&podc=92&usl=1'=>'/remont-mfu-panasonic',

'/uslfind.php?id=3&podc=93&usl=1'=>'/remont-faksov-v-moskve',

'/uslfind.php?id=3&dopp=141&podc=93&usl=1'=>'/remont-faksov-hp',
'/uslfind.php?id=3&dopp=142&podc=93&usl=1'=>'/remont-faksov-canon',
'/uslfind.php?id=3&dopp=143&podc=93&usl=1'=>'/remont-faksov-samsung',
'/uslfind.php?id=3&dopp=144&podc=93&usl=1'=>'/remont-faksov-kyocera',
'/uslfind.php?id=3&dopp=145&podc=93&usl=1'=>'/remont-faksov-konica-minolta',
'/uslfind.php?id=3&dopp=146&podc=93&usl=1'=>'/remont-faksov-sharp',
'/uslfind.php?id=3&dopp=147&podc=93&usl=1'=>'/remont-faksov-oki',
'/uslfind.php?id=3&dopp=148&podc=93&usl=1'=>'/remont-faksov-panasonic',

'/uslfind.php?id=4&usl=1'=>'/obnuleniye-chipov-v-moskve',

'/uslfind.php?id=4&podc=53&usl=1'=>'/obnuleniye-lazernyh-chipov',

'/uslfind.php?id=4&dopp=65&podc=53&usl=1'=>'/obnuleniye-chipov-hp',
'/uslfind.php?id=4&dopp=66&podc=53&usl=1'=>'/obnuleniye-chipov-samsung',
'/uslfind.php?id=4&dopp=67&podc=53&usl=1'=>'/obnuleniye-chipov-xerox',
'/uslfind.php?id=4&dopp=80&podc=53&usl=1'=>'/obnuleniye-chipov-lexmark',
'/uslfind.php?id=4&dopp=88&podc=53&usl=1'=>'/obnuleniye-chipov-epson',
'/uslfind.php?id=4&dopp=90&podc=53&usl=1'=>'/obnuleniye-chipov-oki',

'/uslfind.php?id=9&usl=1'=>'/proshivka-printera',
'/uslfind.php?id=9&podc=78&usl=1'=>'/proshivka-printera/lazernye',

'/uslfind.php?id=9&dopp=93&podc=78&usl=1'=>'/proshivka-printera/lazernye/xerox',
'/uslfind.php?id=9&dopp=94&podc=78&usl=1'=>'/proshivka-printera/lazernye/samsung',
'/uslfind.php?id=9&dopp=110&podc=78&usl=1'=>'/proshivka-printera/lazernye/dell',

'/uslfind.php?id=11&usl=1'=>'/zapravka-printerov/',

'/uslfind.php?id=11&podc=106&usl=1'=>'/zapravka-printerov/lazernye/',
'/uslfind.php?id=11&dopp=149&podc=106&usl=1'=>'/zapravka-printerov/lazernye/canon/',
'/uslfind.php?id=11&dopp=150&podc=106&usl=1'=>'/zapravka-printerov/lazernye/epson/',
'/uslfind.php?id=11&dopp=151&podc=106&usl=1'=>'/zapravka-printerov/lazernye/konica-minolta/',
'/uslfind.php?id=11&dopp=152&podc=106&usl=1'=>'/zapravka-printerov/lazernye/kyocera/',
'/uslfind.php?id=11&dopp=153&podc=106&usl=1'=>'/zapravka-printerov/lazernye/oki/',
'/uslfind.php?id=11&dopp=154&podc=106&usl=1'=>'/zapravka-printerov/lazernye/ricoh/',
'/uslfind.php?id=11&dopp=155&podc=106&usl=1'=>'/zapravka-printerov/lazernye/samsung/',
'/uslfind.php?id=11&dopp=156&podc=106&usl=1'=>'/zapravka-printerov/lazernye/sharp/',

'/find.php?id=1'=>'/kartridzh-dlya-printera',
'/find.php?sub=1&id=1'=>'/kartridzh-dlya-printera',
'/find.php?id=1&podc=1'=>'/kartridzhi-dlya-lazernyh-printerov',
'/find.php?id=1&podc=1&page=0'=>'/kartridzhi-dlya-lazernyh-printerov',

'/find.php?id=1&dopp=3&podc=1'=>'/kartridzh-dlya-printera/lazernye/hp',
'/find.php?id=1&dopp=1&podc=1'=>'/kartridzh-dlya-printera/lazernye/canon',
'/find.php?id=1&dopp=55&podc=1'=>'/kartridzh-dlya-printera/lazernye/brother',
'/find.php?id=1&dopp=38&podc=1'=>'/kartridzh-dlya-printera/lazernye/samsung',
'/find.php?id=1&dopp=4&podc=1'=>'/kartridzh-dlya-printera/lazernye/epson',
'/find.php?id=1&dopp=2&podc=1'=>'/kartridzh-dlya-printera/lazernye/xerox',
'/find.php?id=1&dopp=54&podc=1'=>'/kartridzh-dlya-printera/lazernye/panasonic',
'/find.php?id=1&dopp=82&podc=1'=>'/kartridzh-dlya-printera/lazernye/kyocera',
'/find.php?id=1&dopp=6&podc=1'=>'/kartridzh-dlya-printera/lazernye/oki',
'/find.php?id=1&dopp=5&podc=1'=>'/kartridzh-dlya-printera/lazernye/sharp',

'/find.php?id=1&podc=2'=>'/kartridzhi-dlya-strujnyh-printerov',

'/find.php?id=1&dopp=5&podc=1'=>'/kartridzh-dlya-printera/strujnye/hp',
'/find.php?id=1&dopp=5&podc=1'=>'/kartridzh-dlya-printera/strujnye/canon',
'/find.php?id=1&dopp=5&podc=1'=>'/kartridzh-dlya-printera/strujnye/epson',
'/find.php?id=1&dopp=5&podc=1'=>'/kartridzh-dlya-printera/strujnye/lexmark',

'/find.php?id=1&podc=14'=>'/kartridzhi-dlya-matrichnyh-printerov',
'/find.php?id=1&dopp=6&podc=14'=>'/kartridzh-dlya-printera/matrichnye/oki',

'/find.php?id=1&podc=37'=>'/kartridzhi-dlya-kopirov',

'/find.php?id=1&dopp=55&podc=37'=>'/kartridzhi-dlya-kopirov/brother',
'/find.php?id=1&dopp=1&podc=37'=>'/kartridzhi-dlya-kopirov/canon',
'/find.php?id=1&dopp=2&podc=37'=>'/kartridzhi-dlya-kopirov/xerox',

'/find.php?id=1&podc=38'=>'/kartridzhi-dlya-faxov',

'/find.php?id=1&dopp=54&podc=38'=>'/kartridzhi-dlya-faxov/panasonic',
'/find.php?id=1&dopp=55&podc=38'=>'/kartridzhi-dlya-faxov/brother',
'/find.php?id=1&dopp=1&podc=38'=>'/kartridzhi-dlya-faxov/canon',

'/find.php?id=1&podc=60'=>'/sovmestimye-kartridzhi/',

'/find.php?id=1&dopp=38&podc=60'=>'/sovmestimye-kartridzhi/samsung',
'/find.php?id=1&dopp=2&podc=60'=>'/sovmestimye-kartridzhi/xerox',
'/find.php?id=1&dopp=3&podc=60'=>'/sovmestimye-kartridzhi/hp',
'/find.php?id=1&dopp=1&podc=60'=>'/sovmestimye-kartridzhi/canon',
'/find.php?id=1&dopp=55&podc=60'=>'/sovmestimye-kartridzhi/brother',
'/find.php?id=1&dopp=82&podc=60'=>'/sovmestimye-kartridzhi/kyocera',

'/find.php?id=29'=>'/mfu',
'/find.php?id=29&podc=105'=>'/mfu/lazernye',

'/find.php?id=29&dopp=134&podc=105'=>'/mfu/lazernye/kyocera',
'/find.php?id=29&dopp=138&podc=105'=>'/mfu/lazernye/samsung',
'/find.php?id=29&dopp=131&podc=105'=>'/mfu/lazernye/canon',
'/find.php?id=29&dopp=140&podc=105'=>'/mfu/lazernye/xerox',
'/find.php?id=29&dopp=132&podc=105'=>'/mfu/lazernye/epson',
'/find.php?id=29&dopp=130&podc=105'=>'/mfu/lazernye/brother',
'/find.php?id=29&dopp=133&podc=105'=>'/mfu/lazernye/hp',
'/find.php?id=29&dopp=139&podc=105'=>'/mfu/lazernye/sharp',
'/find.php?id=29&dopp=137&podc=105'=>'/mfu/lazernye/oki',
'/find.php?id=29&dopp=135&podc=105'=>'/mfu/lazernye/ricoh',
'/find.php?id=29&dopp=136&podc=105'=>'/mfu/lazernye/panasonic',

'/find.php?id=2'=>'/kopiry',

'/find.php?id=2&podc=10'=>'/kopiry/a3',
'/find.php?id=2&dopp=9&podc=10'=>'/kopiry/a3/canon',

'/find.php?id=2&podc=12'=>'/kopiry/a4',

'/find.php?id=2&dopp=9&podc=12'=>'/kopiry/a4/canon',
'/find.php?id=2&dopp=39&podc=12'=>'/kopiry/a4/samsung',
'/find.php?id=2&dopp=74&podc=12'=>'/kopiry/a4/brother',
'/find.php?id=2&dopp=109&podc=12'=>'/kopiry/a4/xerox',

'/find.php?id=3'=>'/printery',

'/find.php?id=3&podc=6'=>'/printery/lazernye',
'/find.php?id=3&dopp=12&podc=6'=>'/printery/lazernye/hp',
'/find.php?id=3&dopp=14&podc=6'=>'/printery/lazernye/canon',
'/find.php?id=3&dopp=13&podc=6'=>'/printery/lazernye/samsung',
'/find.php?id=3&dopp=75&podc=6'=>'/printery/lazernye/brother',
'/find.php?id=3&dopp=127&podc=6'=>'/printery/lazernye/xerox',
'/find.php?id=3&dopp=15&podc=6'=>'/printery/lazernye/epson',
'/find.php?id=3&dopp=128&podc=6'=>'/printery/lazernye/kyocera',
'/find.php?id=3&dopp=129&podc=6'=>'/printery/lazernye/oki',

'/find.php?id=3&podc=7'=>'/printery/strujnye',

'/find.php?id=3&dopp=14&podc=7'=>'/printery/strujnye/canon',
'/find.php?id=3&dopp=15&podc=7'=>'/printery/strujnye/epson',
'/find.php?id=3&dopp=12&podc=7'=>'/printery/strujnye/hp',

'/find.php?id=3&podc=8'=>'/printery/sumlimacionnye',
'/find.php?id=3&dopp=14&podc=8'=>'/printery/sumlimacionnye/canon',

'/find.php?id=3&podc=32'=>'/printery/matrichnye',
'/find.php?id=3&dopp=15&podc=32'=>'/printery/matrichnye/epson',

'/find.php?id=3&podc=61'=>'/printery/dlya-nakleek',
'/find.php?id=3&dopp=75&podc=61'=>'/printery/dlya-nakleek/brother',

'/find.php?id=6'=>'/faxy',

'/find.php?id=6&podc=17'=>'/faxy/na-termobumage',
'/find.php?id=6&dopp=40&podc=17'=>'/faxy/na-termobumage/sharp',

'/find.php?id=6&podc=18'=>'/faxy/na-termoplyonke',
'/find.php?id=6&dopp=47&podc=18'=>'/faxy/na-termoplyonke/canon',

'/find.php?id=6&podc=19'=>'/faxy/lazernye',
'/find.php?id=6&dopp=47&podc=19'=>'/faxy/lazernye/canon',

'/find.php?id=6&podc=20'=>'/faxy/strujnye',

'/find.php?id=7'=>'/skanery',
'/find.php?id=7&podc=59'=>'/skanery/a4',
'/find.php?id=7&podc=58'=>'/skanery/a3',
'/find.php?id=7&dopp=42&podc=58'=>'/skanery/a3/canon',

'/find.php?id=8'=>'/tonery',

'/find.php?id=8&podc=21'=>'/tonery/dlya-kopirov',

'/find.php?id=8&dopp=30&podc=21'=>'/tonery/dlya-kopirov/canon',
'/find.php?id=8&dopp=37&podc=21'=>'/tonery/dlya-kopirov/mita',
'/find.php?id=8&dopp=35&podc=21'=>'/tonery/dlya-kopirov/sharp',
'/find.php?id=8&dopp=32&podc=21'=>'/tonery/dlya-kopirov/epson',
'/find.php?id=8&dopp=91&podc=21'=>'/tonery/dlya-kopirov/kyocera',
'/find.php?id=8&dopp=92&podc=21'=>'/tonery/dlya-kopirov/ricoh',
'/find.php?id=8&dopp=36&podc=21'=>'/tonery/dlya-kopirov/minolta',
'/find.php?id=8&dopp=104&podc=21'=>'/tonery/dlya-kopirov/toshiba',
'/find.php?id=8&dopp=33&podc=21'=>'/tonery/dlya-kopirov/xerox',

'/find.php?id=8&podc=22'=>'/tonery/dlya-printerov',
'/find.php?id=8&dopp=31&podc=22'=>'/tonery/dlya-printerov/hp',
'/find.php?id=8&dopp=34&podc=22'=>'/tonery/dlya-printerov/samsung',
'/find.php?id=8&dopp=33&podc=22'=>'/tonery/dlya-printerov/xerox',
'/find.php?id=8&dopp=30&podc=22'=>'/tonery/dlya-printerov/canon',
'/find.php?id=8&podc=23'=>'/tonery/dlya-faxov',

'/find.php?id=18'=>'/fotobarabany',
'/find.php?id=18&podc=47'=>'/fotobarabany/dlya-printerov/',

'/find.php?id=18&dopp=60&podc=47'=>'/fotobarabany/dlya-printerov/hanp',
'/find.php?id=18&dopp=61&podc=47'=>'/fotobarabany/dlya-printerov/mitsubishi',
'/find.php?id=18&dopp=85&podc=47'=>'/fotobarabany/dlya-printerov/samsung',
'/find.php?id=18&dopp=84&podc=47'=>'/fotobarabany/dlya-printerov/hp',

'/find.php?id=18&podc=48'=>'/fotobarabany/dlya-kopirov',

'/find.php?id=20'=>'/bumaga',

'/find.php?id=20&podc=49'=>'/bumaga/dlya-pechati',
'/find.php?id=20&dopp=58&podc=49'=>'/bumaga/dlya-pechati/svetogorsk',

'/find.php?id=20&podc=50'=>'/bumaga/dlya-fotopechati',
'/find.php?id=20&dopp=59&podc=50'=>'/bumaga/dlya-fotopechati/lomond',

'/find.php?id=21'=>'/chernila-dlya-printerov',
'/find.php?id=21&podc=55'=>'/chernila-dlya-printerov/zapravochnye-stancii',
'/find.php?id=21&dopp=68&podc=55'=>'/chernila-dlya-printerov/zapravochnye-stancii/canon',
'/find.php?id=21&dopp=69&podc=55'=>'/chernila-dlya-printerov/zapravochnye-stancii/hp',

'/find.php?id=21&podc=54'=>'/chernila-dlya-printerov/chernila',
'/find.php?id=21&dopp=68&podc=54'=>'/chernila-dlya-printerov/chernila/canon',
'/find.php?id=21&dopp=69&podc=54'=>'/chernila-dlya-printerov/chernila/hp',
'/find.php?id=21&dopp=70&podc=54'=>'/chernila-dlya-printerov/chernila/lexmark',

'/find.php?id=27'=>'/chipy-dlya-kartridzhey',
'/find.php?id=27&podc=86'=>'/chipy-dlya-kartridzhey/lazernye',

'/find.php?id=27&dopp=96&podc=86'=>'/chipy-dlya-kartridzhey/lazernye/hp',
'/find.php?id=27&dopp=99&podc=86'=>'/chipy-dlya-kartridzhey/lazernye/samsung',
'/find.php?id=27&dopp=101&podc=86'=>'/chipy-dlya-kartridzhey/lazernye/philips',
'/find.php?id=27&dopp=102&podc=86'=>'/chipy-dlya-kartridzhey/lazernye/xerox',
	

	
	//непродвигаемые


  );
//Сквозные редиректы
  $aR301SkipCheck = array (
	//'/zapravka-kartridzhej-filips'=>'/zapravka-kartridzhej-philips',
	//	'/uslfind.php?usl=1&id=1&dopp=23&podc=27'=>'/zapravka-kartridzhej-canon',
	//	'/uslfind.php?id=1&podc=27&usl=1'=>'/zapravka-lazernyh-kartridzhej',
	//'/uslfind.php?id=3&podc=90&usl=1'=>'/remont-printerov-v-moskve',
	'/uslfind.php?id=312&view=1&usl=1'=>'/uslfind.php?id=312&raz=9&podc=78&dopp=93&view=1&usl=1',
	//'/find.php?id=1&podc=1&page=0'=>'/kartridzhi-dlya-lazernyh-printerov',
	//'/find.php?sub=1&id=1'=>'/kartridzh-dlya-printera',
    //'/uslfind.php?id=1'=>'/zapravka-kartridzhej-v-moskve',
    '/find.php?id=1&page=0'=>'/kartridzh-dlya-printera',
  );
//Удаленные страницы
  $a410Response = array (
    '/test3',
  );
  $a404Response = array (
    '/test4',
  );
// Только замена ссылок
  $aURLRewriterOnly = array (
'/uslfind.php?id=1&dopp=56&podc=27&usl=1'=>'/zapravka-kartridzhej-panasonic',
	'/uslfind.php?id=1&dopp=76&podc=27&usl=1'=>'/zapravka-kartridzhej-kyocera',
  );

  
  define('DUR_DEBUG', 0);                   //Включение режима отладки (вывод инфо в конце исходного текста на странице)
  define('DUR_PREPEND_APPEND', 0);          //Единая точка входа (.htaccess) Не рекомендуется
  define('DUR_BASE_ROOT', 0);               //Прописать принудительно <base href="http://domain.com/"> Бывает полезно при ссылках вида href="?page=2". При указании строки, пропишет ее
  define('DUR_LINK_PARAM', 0);              //Дописать путь перед ссылками вида href="?page=2"
  define('DUR_ANC_HREF', 0);                //Пофиксить ссылки вида href="#ancor"
  define('DUR_ROOT_HREF', 1);               //Пофиксить ссылки вида href="./"
  define('DUR_REGISTER_GLOBALS', 0);        //Регистрировать глобальные переменные
  define('DUR_SKIP_POST', 1);               //Не выполнять подмену при запросе POST
  define('DUR_CMS_TYPE', 'NONE');           //Включение особенностей для CMS, возможные значения: NONE, NETCAT, JOOMLA, HTML, DRUPAL, WEBASYST, ICMS
  define('DUR_OUTPUT_COMPRESS', 'SKIP');    //Сжатие выходного потока, возможные значения: NONE, GZIP, DEFLATE, AUTO, SKIP
  define('DUR_SUBDOMAINS', 0);              //Обрабатывать поддомены, указываем здесь основной домен!
  define('DUR_SKIP_USERAGENT', '#^(|mirror)$#'); //Не выполнять редиректы при указанном HTTP_USER_AGENT (регулярка)
  define('DUR_SKIP_URLS', '#^/_?(admin|manag|bitrix|indy|cms|phpshop|varvara.php|captcha|jscripts/|modules|includes|templates|wp-admin)#siU');  //Skip URLS
  define('DUR_FIX_CONTLEN', 0);             //Фиксить Content-Length
  define('DUR_PATHINFO', 0);                //Регистрировать переменные для передачи вида /index.php/uri

///new
  define('DUR_FIX_RELATIVE', 1);            //Фиксить относительные ссылки (только для DUR_MAIN_CYCLE = ortodox)
  define('DUR_FIX_DOTTED', 0);              //Фиксить ссылки от "./" (только для DUR_MAIN_CYCLE = ortodox)
  define('DUR_FIX_HTTP_HOST', 'www.filpan.ru');           //Фиксить HTTP_HOSTв ссылках, прописываем, например, значение "www.mysite.ru", чтобы сократить количество host-зависимых подмен ссылок
  define('DUR_CACHE_REWRITED', 0);          //Кэшировать все замены в этом рерайтере, должна быть создана папка d-cache в корне с правами на запись
  define('DUR_CACHE_MEMORY', 40960000);            //Критическая масса кеша (в байтах), при превышении этого значения кеш очищается
  define('DUR_CACHE_TIME', 3);              //Критическое время жизни кеша, при превышении этого значения кеш очищается
  define('DUR_MAIN_CYCLE', 'ortodox');    //Константа для выбора типа основного цикла, значения: callback, str_replace, ortodox





















// Раздел обработки
  define('DUR_TIME_START', microtime(true));
  define('DUR_REQUEST_URI', $_SERVER['REQUEST_URI']);
  define('DUR_HTTP_HOST', $_SERVER['HTTP_HOST']);
  define('DUR_FULL_URI', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  define('BX_COMPRESSION_DISABLED', true); //Hack for bitrix
  define('DUR_SKIP_THIS', preg_match(DUR_SKIP_URLS, DUR_REQUEST_URI, $aM));
  define('DUR_SKIP_R301', !isset($_SERVER['HTTP_USER_AGENT']) || preg_match(DUR_SKIP_USERAGENT, $_SERVER['HTTP_USER_AGENT']));
  if (defined('DUR_DEBUG') && DUR_DEBUG) {
    ini_set('display_errors', 1);
    ini_set('error_reportings', E_ALL);
  }
  if (isset($_GET['_openstat'])) {
    unset($_GET['_openstat']);
    unset($_REQUEST['_openstat']);
    unset($HTTP_GET_VARS['_openstat']);
    $_SERVER['REQUEST_URI'] = preg_replace('%[&?]_openstat=[^&]+(&|$)%siU', '', $_SERVER['REQUEST_URI']);
  }
  if (isset($a410Response[$_SERVER['REQUEST_URI']]) && !DUR_SKIP_THIS) {
    header('HTTP/1.0 410 Gone');
    echo '<h1 style="font-size: 18pt;">Ошибка 410</h1><p>Страница удалена</p><p style="text-align: right; margin: 10px;"><a href="/">На главную</a></p>';
    exit;
  }
  if (in_array($_SERVER['REQUEST_URI'], $a404Response) && !DUR_SKIP_THIS) {
    dur404native();
  }
  if (isset($aR301SkipCheck[$_SERVER['REQUEST_URI']]) && !DUR_SKIP_THIS && !DUR_SKIP_R301) {
    if (!defined('DUR_SKIP_POST') || !DUR_SKIP_POST || (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST')) {
      header('Location: ' . $aR301SkipCheck[$_SERVER['REQUEST_URI']], true, 301);
      exit;
    }
  }
  foreach ($aURLRewriter as $sKey => $sVal) {
    $aURLRewriter[$sKey] = str_replace(
      array('р', 'у', 'к', 'е', 'н', 'х', 'в', 'а', 'о', 'ч', 'с', 'м', 'и', 'т', ' '),
      array('p', 'y', 'k', 'e', 'h', 'x', 'b', 'a', 'o', '4', 'c', 'm', 'n', 't', '_'),
      $sVal
    );
    if (!defined('DUR_SEO_REQUEST_URI') && ($sVal == $_SERVER['REQUEST_URI'])) {
      define('DUR_SEO_REQUEST_URI', $sKey);
    }
  }
  $aURFlip = array_flip($aURLRewriter);
  //Многократная вложенность замен (до 10)
  for ($i = 0; $i < 10; $i++) {
    foreach ($aURLRewriter as $sFrom => $sTo) {
      if (isset($aURLRewriter[$sTo])) {
        $aURLRewriter[$sFrom] = $aURLRewriter[$sTo];
        $aURFlip[$aURLRewriter[$sTo]] = $sFrom;
      }
    }
  }
  //Joomla hack! (Против защиты от register globals)
  if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'JOOMLA')) {
    $_SERVER['dur'] = array($aURLRewriter, $aURFlip, $aURLRewriterOnly);
  }
  //Единая точка входа
  if (defined('DUR_PREPEND_APPEND') && DUR_PREPEND_APPEND && !DUR_SKIP_THIS) {
    durRun ();
  }


// Функции
  function durRun () {
    if (defined('DUR_RUNNED')) return;
//    if (isset())
    define('DUR_RUNNED', 1);
    durR301();
    ob_start('durLinkChanger');
    durIFRewrite();
  }

  function dur404 () {
    $aPages404 = array('404.php', '404.html', '404.htm', 'index.php', 'index.html', 'index.htm');
    header('HTTP/1.1 404 Not found');
    foreach ($aPages404 as $sPage404) {
      if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $sPage404)) {
        include($_SERVER['DOCUMENT_ROOT'] . '/' . $sPage404);
        exit;
      }
    }
    echo '<h1>Ошибка 404</h1><p>Страница не найдена</p><p style="text-align: right; margin: 10px;"><a href="/">На главную</a></p>';
    exit;
  }
  function dur404native() {
	$_SERVER['REQUEST_URI'] = '/thispagewasdeleted';
	$_GET = $_REQUEST = array(); 
    }
  function durRewrite ($sURL) {
    global $QUERY_STRING, $REQUEST_URI, $REDIRECT_URL, $HTTP_GET_VARS;
    define('DUR_DEBUG_BEFORE', "SERVER:\n" . durDebugVar($_SERVER) . "\n\nGET:\n" . durDebugVar($_GET) . "\n\nREQUEST:\n" . durDebugVar($_REQUEST) . "\n");
    if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'WEBASYST')) {
      $sURL = '/?__furl_path=' . substr($sURL, 1) . '&frontend=1';
    }
    if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'ICMS')) {
      $sURL = '/index.php?path=' . substr($sURL, 1, -5) . '&frontend=1';
    }
    $QUERY_STRING = strpos($sURL, '?') ? substr($sURL, strpos($sURL, '?') + 1) : '';
    $REQUEST_URI = $sURL;
    $REDIRECT_URL = $sURL;
    $_SERVER['QUERY_STRING'] = $QUERY_STRING;
    $_SERVER['REDIRECT_URL'] = $sURL;
    $_SERVER['REQUEST_URI'] = $sURL;
    if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'NETCAT')) {
      putenv('REQUEST_URI=' . $sURL);
    }
    if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'DRUPAL')) {
      $_GET['q'] = substr($sURL, 1);
      $_REQUEST['q'] = substr($sURL, 1);
    }
    if (preg_match_all('%[\?&]([^\=]+)\=([^&]*)%', $sURL, $aM)) {
      $aParams = array();
      foreach ($aM[1] as $iKey => $sName) {
        $sVal = urldecode($aM[2][$iKey]);
        if (preg_match('#^(.+)\[\]$#siU', $sName, $aMatch)) {
          $aParams[$aMatch[1]][] = $sVal;
        }
        elseif (preg_match('#^(.+)\[([\w-]+)\]$#siU', $sName, $aMatch)) {
          $aParams[$aMatch[1]][$aMatch[2]] = $sVal;
        }
        else {
          $aParams[$sName] = $sVal;
        }
      }
      foreach ($aParams as $sKey => $mVal) {
        $_GET[$sKey] = $mVal;
        $HTTP_GET_VARS[$sKey] = $mVal;
        $_REQUEST[$sKey] = $mVal;
        if (defined('DUR_REGISTER_GLOBALS') && DUR_REGISTER_GLOBALS) {
          global $$sKey;
          $$sKey = $mVal;
        }
      }
    }
    if (defined('DUR_PATHINFO') && DUR_PATHINFO) {
      $_SERVER['PATH_INFO'] = substr($sURL, 1);
      $_SERVER['PHP_SELF'] = $sURL;
    }
    if (DUR_CMS_TYPE == 'HTML') {
      $sFName = $sURL;
      if ($iPos = strpos($sFName, '?')) {
        $sFName = substr($sFName, 0, $iPos);
      }
      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $sFName)) {
        include($_SERVER['DOCUMENT_ROOT'] . $sFName);
        exit;
      }
      else {
        dur404();
      }
    }
  }

  function durIFRewrite () {
    global $aURFlip, $aURLRewriter;
    if (DUR_SKIP_THIS) return;
    $sKey = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
    if (defined('DUR_SUBDOMAINS') && DUR_SUBDOMAINS && isset($aURFlip[$sKey])) {
      if (!defined('DUR_ORIG_RURI')) {
        define('DUR_ORIG_RURI', $aURFlip[$sKey]);
      }
      durRewrite ($aURFlip[$sKey]);
    }
    elseif (isset($aURFlip[$_SERVER['REQUEST_URI']])) {
      if (!defined('DUR_ORIG_RURI')) {
        define('DUR_ORIG_RURI', $aURFlip[$_SERVER['REQUEST_URI']]);
      }
      durRewrite ($aURFlip[$_SERVER['REQUEST_URI']]);
    }
    elseif (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'HTML')) {
      if (file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
	  
        durRewrite ($_SERVER['REQUEST_URI']);
      }
      else {
        dur404();
      }
    }
  }

  function durR301 () {
  
    global $aURFlip, $aURLRewriter;
    if (DUR_SKIP_THIS || DUR_SKIP_R301) return;
    if (defined('DUR_SKIP_POST') && DUR_SKIP_POST && (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')) {
      return;
    }
    if (isset($aURLRewriter[$_SERVER['REQUEST_URI']])) {
      if ('http://' . DUR_HTTP_HOST == trim($aURLRewriter[$_SERVER['REQUEST_URI']], '/')) {
        return;
      }
      header('Location: ' . $aURLRewriter[$_SERVER['REQUEST_URI']], true, 301);
      exit;
    }
  }

  function durRExpEscape ($sStr) {
    return str_replace(array('?', '.', '-', ':', '%', '[', ']', '(', ')'), array('\\?', '\\.', '\\-', '\\:', '\\%', '\\[', '\\]', '\\(', '\\)'), $sStr);
  }

  function durReplaceOnceLink ($sLink, $sNewLink, $sContent) {
    $sContent = preg_replace('%(href\s*=\s*[\'"]?)\s*' . durRExpEscape ($sLink) . '([#\'"\s>])%siU', '$1' . $sNewLink . '$2', $sContent);
    if (strpos($sLink,'&'))
      $sContent = preg_replace('%(href\s*=\s*[\'"]?)\s*' . durRExpEscape (str_replace('&', '&amp;', $sLink)) . '([#\'"\s>])%siU', '$1' . $sNewLink . '$2', $sContent);
    return $sContent;
  }

  function durReplaceLink ($sHost, $sBase, $sFrom, $sTo, $sContent) {
    $sNewLink = $sTo;
//  Link type: "http://domain/link"
    $sContent = durReplaceOnceLink ('http://' . $sHost . $sFrom, $sNewLink, $sContent);
//  Link type: "https://domain.com/link"
//     $sContent = durReplaceOnceLink ('https://' . $sHost . $sFrom, $sNewLink, $sContent);
//  Link type: "//domain.com/link"
//     $sContent = durReplaceOnceLink ('//' . $sHost . $sFrom, $sNewLink, $sContent);
    if (!defined('DUR_FIRST_TIC'))
      {
//    Link type: "/link"
      $sContent = durReplaceOnceLink ($sFrom, $sNewLink, $sContent);
//    Link type: "./link"
      if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
        $sContent = durReplaceOnceLink ('.' . $sFrom, $sNewLink, $sContent);
      }
      if (defined('DUR_FIX_RELATIVE') && DUR_FIX_RELATIVE) {
      // Link type: "link" (Calc fromlink)
	$aLink = explode('/', $sFrom);
	$aBase = empty($sBase) ? array('') : explode('/', str_replace('//', '/', '/' . $sBase));
	$sReplLnk = '';
	for ($i = 0; $i < max(count($aLink), count($aBase)); $i++) {
	  if (isset($aBase[$i]) && isset($aLink[$i])) {
	    if ($aLink[$i] == $aBase[$i]) {
	      continue;
	    }
	    else {
	      for ($j = $i; $j < count($aBase); $j++) {
		$sReplLnk .= '../';
	      }
	      for ($j = $i; $j < count($aLink); $j++) {
		$sReplLnk .= $aLink[$j] . '/';
	      }
	      break;
	    }
	  }
	  elseif (isset($aLink[$i])) {
	    $sReplLnk .= $aLink[$i] . '/';
	  }
	  elseif (isset($aBase[$i])) {
	    $sReplLnk .= '../';
	  }
	}
	$sReplLnk = preg_replace('%/+%', '/', $sReplLnk);
	$sReplLnk2 = trim($sReplLnk, '/');
	$sReplLnk3 = rtrim($sReplLnk2, '.');
	if (strlen($sReplLnk) > 1) {
	  $sContent = durReplaceOnceLink ($sReplLnk, $sNewLink, $sContent);
	  if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
	    $sContent = durReplaceOnceLink ('./' . $sReplLnk, $sNewLink, $sContent);
	  }
	}
	if (($sReplLnk2 != $sReplLnk) && (strlen($sReplLnk2) > 1)) {
	  $sContent = durReplaceOnceLink ($sReplLnk2, $sNewLink, $sContent);
	  if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
            $sContent = durReplaceOnceLink ('./' . $sReplLnk2, $sNewLink, $sContent);
	  }
	}
	if (($sReplLnk3 != $sReplLnk2) && (strlen($sReplLnk3) > 1)) {
	  $sContent = durReplaceOnceLink ($sReplLnk3, $sNewLink, $sContent);
	  if (defined('DUR_FIX_DOTTED') && DUR_FIX_DOTTED) {
            $sContent = durReplaceOnceLink ('./' . $sReplLnk3, $sNewLink, $sContent);
	  }
	}
      }
    }
    return $sContent;
  }

  function durGZDecode($sS) {
    $sM = ord(substr($sS,2,1)); $iF = ord(substr($sS,3,1));
    if ($iF & 31 != $iF) return null;
    $iLH = 10; $iLE = 0;
    if ($iF & 4) {
      if ($iL - $iLH - 2 < 8) return false;
      $iLE = unpack('v',substr($sS,8,2));
      $iLE = $iLE[1];
      if ($iL - $iLH - 2 - $iLE < 8) return false;
      $iLH += 2 + $iLE;
    }
    $iFCN = $iFNL = 0;
    if ($iF & 8) {
      if ($iL - $iLH - 1 < 8) return false;
      $iFNL = strpos(substr($sS,8+$iLE),chr(0));
      if ($iFNL === false || $iL - $iLH - $iFNL - 1 < 8) return false;
      $iLH += $iFNL + 1;
    }
    if ($iF & 16) {
      if ($iL - $iLH - 1 < 8) return false;
      $iFCN = strpos(substr($sS,8+$iLE+$iFNL),chr(0));
      if ($iFCN === false || $iL - $iLH - $iFCN - 1 < 8) return false;
      $iLH += $iFCN + 1;
    }
    $sHCRC = '';
    if ($iF & 2) {
      if ($iL - $iLH - 2 < 8) return false;
      $calccrc = crc32(substr($sS,0,$iLH)) & 0xffff;
      $sHCRC = unpack('v', substr($sS,$iLH,2));
      $sHCRC = $sHCRC[1];
      if ($sHCRC != $calccrc) return false;
      $iLH += 2;
    }
    $sScrc = unpack('V',substr($sS,-8,4));
    $sScrc = $sScrc[1];
    $iSZ = unpack('V',substr($sS,-4));
    $iSZ = $iSZ[1];
    $iLBD = $iL-$iLH-8;
    if ($iLBD < 1) return null;
    $sB = substr($sS,$iLH,$iLBD);
    $sS = '';
    if ($iLBD > 0) {
      if ($sM == 8) $sS = gzinflate($sB);
      else return false;
    }
    if ($iSZ != strlen($sS) || crc32($sS) != $sScrc) return false;
    return $sS;
  }

  function durGZDecode2($sS) {
    $iLen = strlen($sS);
    $sDigits = substr($sS, 0, 2);
    $iMethod = ord(substr($sS, 2, 1));
    $iFlags  = ord(substr($sS, 3, 1));
    if ($iFlags & 31 != $iFlags) return false;
    $aMtime = unpack('V', substr($sS, 4, 4));
    $iMtime = $aMtime[1];
    $sXFL   = substr($sS, 8, 1);
    $sOS    = substr($sS, 8, 1);
    $iHeaderLen = 10;
    $iExtraLen  = 0;
    $sExtra     = '';
    if ($iFlags & 4) {
      if ($iLen - $iHeaderLen - 2 < 8) return false;
      $iExtraLen = unpack('v', substr($sS, 8, 2));
      $iExtraLen = $iExtraLen[1];
      if ($iLen - $iHeaderLen - 2 - $iExtraLen < 8) return false;
      $sExtra = substr($sS, 10, $iExtraLen);
      $iHeaderLen += 2 + $iExtraLen;
    }
    $iFilenameLen = 0;
    $sFilename = '';
    if ($iFlags & 8) {
      if ($iLen - $iHeaderLen - 1 < 8) return false;
      $iFilenameLen = strpos(substr($sS, $iHeaderLen), chr(0));
      if ($iFilenameLen === false || $iLen - $iHeaderLen - $iFilenameLen - 1 < 8) return false;
      $sFilename = substr($sS, $iHeaderLen, $iFilenameLen);
      $iHeaderLen += $iFilenameLen + 1;
    }
    $iCommentLen = 0;
    $sComment = '';
    if ($iFlags & 16) {
      if ($iLen - $iHeaderLen - 1 < 8) return false;
      $iCommentLen = strpos(substr($sS, $iHeaderLen), chr(0));
      if ($iCommentLen === false || $iLen - $iHeaderLen - $iCommentLen - 1 < 8) return false;
      $sComment = substr($sS, $iHeaderLen, $iCommentLen);
      $iHeaderLen += $iCommentLen + 1;
    }
    $sCRC = '';
    if ($iFlags & 2) {
      if ($iLen - $iHeaderLen - 2 < 8) return false;
      $sCalcCRC = crc32(substr($sS, 0, $iHeaderLen)) & 0xffff;
      $sCRC = unpack('v', substr($sS, $iHeaderLen, 2));
      $sCRC = $sCRC[1];
      if ($sCRC != $sCalcCRC) return false;
      $iHeaderLen += 2;
    }
    $sDataCRC = unpack('V', substr($sS, -8, 4));
    $sDataCRC = sprintf('%u', $sDataCRC[1] & 0xFFFFFFFF);
    $iSize = unpack('V', substr($sS, -4));
    $iSize = $iSize[1];
    $iBodyLen = $iLen - $iHeaderLen - 8;
    if ($iBodyLen < 1) return false;
    $sBody = substr($sS, $iHeaderLen, $iBodyLen);
    $sS = '';
    if ($iBodyLen > 0) {
      switch ($iMethod) {
        case 8: $sS = gzinflate($sBody); break;
        default: return false;
      }
    }
    $sCRC  = sprintf('%u', crc32($sS));
    $bCRCOK = ($sCRC == $sDataCRC);
    $bLenOK = ($iSize == strlen($sS));
    if (!$bLenOK || !$bCRCOK) return false;
    return $sS;
  }

  function durGZCheck ($sContent) {
    $iLen = strlen($sContent);
    if ($iLen < 18 || strcmp(substr($sContent, 0, 2), "\x1f\x8b")) {
      return $sContent;
    }
    $sData = durGZDecode2($sContent);
    if (!$sData) {
      $sData = durGZDecode($sContent);
    }
    return $sData ? $sData : $sContent;
  }

  function durOutputCompress ($sContent) {
    if (!defined('DUR_OUTPUT_COMPRESS')) {
      define('DUR_OUTPUT_COMPRESS', 'SKIP');
    }
    if (DUR_OUTPUT_COMPRESS == 'SKIP') {
      return $sContent;
    }
    $aAccept = array();
    if (isset($_SERVER['HTTP_ACCEPT_ENCODING'])) {
      $aAccept = array_map('trim', explode(',', strtolower($_SERVER['HTTP_ACCEPT_ENCODING'])));
    }
    $bGZIP = in_array('gzip', $aAccept) && function_exists('gzencode');
    $bDEFL = in_array('deflate', $aAccept) && function_exists('gzdeflate');
    $sCompress = DUR_OUTPUT_COMPRESS;
    if ((!$bGZIP && !$bDEFL) || (!$bGZIP && ($sCompress == 'GZIP')) || (!$bDEFL && ($sCompress == 'DEFLATE'))) {
      $sCompress = 'NONE';
    }
    if ($sCompress == 'AUTO') {
      $sCompress = $bGZIP ? 'GZIP' : ($bDEFL ? 'DEFLATE' : 'NONE');
    }
    switch ($sCompress) {
      case 'GZIP':
        header('Content-Encoding: gzip');
        $sContent = gzencode($sContent);
        break;
      case 'DEFLATE':
        header('Content-Encoding: deflate');
        $sContent = gzdeflate($sContent, 9);
        break;
      default:
        //header('Content-Encoding: none');
    }
    return $sContent;
  }

  function durDebugEscape ($sText) {
    return str_replace(array('--', '-->'), array('==', '==}'), $sText);
  }

  function durDebugVar ($mVar, $sPref = '  ') {
    $Ret = '';
    foreach ($mVar as $sKey => $sVal) {
      $Ret .= "{$sPref}{$sKey} => ";
      if (is_array($sVal)) {
        $Ret .= "ARRAY (\n" . durDebugVar($sVal, $sPref.'  ') . "{$sPref})\n";
      }
      else {
        $Ret .= "{$sVal}\n";
      }
    }
    return durDebugEscape($Ret);
  }




 function durLinkChanger ($sContent) {
    global $aURFlip, $aURLRewriter, $aURLRewriterOnly;

    if (DUR_SKIP_THIS) return $sContent;
    if (strlen($sContent) < 500) return $sContent;
    if (DUR_CACHE_REWRITED && file_exists($_SERVER['DOCUMENT_ROOT'].'/d-cache')) {
    
    /// Модуль кеширования контента - start
    
      $aDataStore = array();
      
      $icachedays = DUR_CACHE_TIME*60*60*24;
      
      $sMD5Content = md5($sContent); // MD5 от контента составляет часть имени файла кэша; это значение нужно для поиска готового к выводу контента в кеше
      $sCacheFName = $_SERVER['DOCUMENT_ROOT'].'/d-cache/'.$sMD5Content.'.html.cache'; // имя файла кеша текущего контента
      $sTimeFName = $_SERVER['DOCUMENT_ROOT'].'/d-cache/time.cache'; // имя файла данных кеша
	
      $aStoredData = array();
      $aStoredData = unserialize(file_get_contents($sTimeFName)); // массив из файла данных кеша
      $timestamp = $aStoredData['d_scripts_time']; // время последнего изменения файлов d-seo и d-url-rewriter
      $tOverallLenght = $aStoredData['cache_weight']; // Занимаемое кешем место на диске
      $tLastClear = $aStoredData['last_clear_time'];
      

      
      $dtimestamp = filemtime($_SERVER['DOCUMENT_ROOT'].'/d-url-rewriter.php'); // время изменения d-url-rewriter

 // если есть файл d-seo, то берем его время изменения и записываем в переменную $dtimestamp максимум от времени последнего изменения скриптов
      if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php')) {
	    $dTMPtimestamp = filemtime($_SERVER['DOCUMENT_ROOT'].'/d-seo.php');
	    if ($dTMPtimestamp > $dtimestamp) 
		  $dtimestamp = $dTMPtimestamp;
      }
      
      
      
 // если время последнего изменения, записанное в файл данных кеша отличается от реального, чистим весь кеш.
      if ($timestamp != $dtimestamp || $tOverallLenght > DUR_CACHE_MEMORY || time() - $tLastClear > $icachedays) {
	if($dh = @opendir($_SERVER['DOCUMENT_ROOT'].'/d-cache/')) {
	  while (($obj = readdir($dh)) !== false) {
	    if($obj=='.' || $obj=='..') continue;
	    @unlink($_SERVER['DOCUMENT_ROOT'].'/d-cache/'.$obj);
	  }
	  closedir($dh);
	}
	$aDataToStore['d_scripts_time'] = $dtimestamp; // записываем в массив время последнего изменения файлов d-seo и d-url-rewriter
 	$aDataToStore['last_clear_time'] = $tLastClear = time();
 	$aDataToStore['cache_weight'] = $tOverallLenght = 0;
	file_put_contents($sTimeFName,serialize($aDataToStore));
      }
      }
 // если есть соотв. файл в кеше, записываем его содержимое в $sContent
	if (isset($sCacheFName) && file_exists($sCacheFName)) {
	    $sContent = file_get_contents($sCacheFName);
	}
	
    /// Модуль кеширования контента - break
    
    else {
    
    $iTimeStart = microtime(true);
    $sContent = durGZCheck($sContent);
    if (defined('DUR_CMS_TYPE') && (DUR_CMS_TYPE == 'JOOMLA') && isset($_SERVER['dur'])) {
      $aURLRewriter = $_SERVER['dur'][0];
      $aURFlip = $_SERVER['dur'][1];
      $aURLRewriterOnly = $_SERVER['dur'][2];
      unset($_SERVER['dur']);
    }
    $aURLRewriter = array_merge($aURLRewriter, $aURLRewriterOnly);
    //Base path
    if (preg_match('%<[^<>]*base[^<>]*href=[\'"]?([\w_\-\.\:/]+)[\'"\s>][^<>]*>%siU', $sContent, $aM)) {
      $sBase = $aM[1];
      $sBaseHref = $aM[1]; 
    }
    else {
      $sBase = 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));
      $sBaseHref = ''; 
    }
    $sBase = trim(str_replace(array('http://', 'https://'), '', $sBase), '/');
    $aHosts = array($_SERVER['HTTP_HOST']);
    if (substr($_SERVER['HTTP_HOST'], 0, 4) == 'www.') {
      $aHosts[] = substr($_SERVER['HTTP_HOST'], 4);
    }
    if (defined('DUR_SUBDOMAINS') && DUR_SUBDOMAINS) {
      $sExtHost = str_replace('www.www.', 'www.', 'www.' . DUR_SUBDOMAINS);
      $aHosts[] = $sExtHost;
      $aHosts[] = str_replace('www.', '', $sExtHost);
    }
    $aHosts = array_unique($aHosts);
    $sBase = str_replace($aHosts, '', $sBase);
    //href="?..."
    if (defined('DUR_LINK_PARAM') && defined('DUR_ORIG_RURI') && DUR_LINK_PARAM) {
      $sContent = preg_replace('%(href\s*=\s*[\'"]?)\s*([?#].*[#\'"\s>])%siU', '$1' . DUR_ORIG_RURI . '$2', $sContent);
    }
    
    
    if (defined('DUR_FIX_HTTP_HOST') && DUR_FIX_HTTP_HOST) {
      $aHosts = array(DUR_FIX_HTTP_HOST);
      $sFalseHost = str_replace('www.www.','','www.'.DUR_FIX_HTTP_HOST);
      $sContent = str_replace('http://'.$sFalseHost, 'http://'.DUR_FIX_HTTP_HOST, $sContent);
      
    }
   
    //Main cicle

  if (defined('DUR_MAIN_CYCLE'))
    {
    if (DUR_MAIN_CYCLE == 'str_replace' || DUR_MAIN_CYCLE == 'callback') 
      {
///Нормализация ссылок, все ссылки на сайте должны прийти к виду href="http://HTTP_HOST/REQUEST_URI"   , т.е. в кавычках, без пробелов и с хостом
///Опасносте начинается здесь
      $sContent = preg_replace('#href\s*=[\s]?([A-Za-z0-9\?\/][^\s]*)(\s|/>|>)#siU','href="http://'.DUR_FIX_HTTP_HOST.'/$1"$2',$sContent);
      $sContent = preg_replace('#href\s*=[\s]?"([A-Za-z0-9\?\/][^"]*)"#siU','href="http://'.DUR_FIX_HTTP_HOST.'/$1"',$sContent);
      $sContent = str_replace(
	array(
		'http://'.DUR_FIX_HTTP_HOST.'/http://'.DUR_FIX_HTTP_HOST.'',
		'http://'.DUR_FIX_HTTP_HOST.'//',
		'http://'.DUR_FIX_HTTP_HOST.'/http',
		'http://'.DUR_FIX_HTTP_HOST.'/mailto:',
		'http://'.DUR_FIX_HTTP_HOST.'/javascript',
),
	array(
		'http://'.DUR_FIX_HTTP_HOST.'',
		'http://'.DUR_FIX_HTTP_HOST.'/',
		'http',
		'mailto:',
		'javascript',
	),
	$sContent
	);
/// - end  
      }
    if (DUR_MAIN_CYCLE == 'str_replace')
      {
	foreach ($aURLRewriter as $sFrom => $sTo) {
	  if (strpos($sContent, 'href="http://'.DUR_FIX_HTTP_HOST.$sFrom.'"')) 
	    $sContent = str_replace('href="http://'.DUR_FIX_HTTP_HOST.$sFrom.'"','href="http://'.DUR_FIX_HTTP_HOST.$sTo.'"',$sContent);
	}
      }
    else if(DUR_MAIN_CYCLE == 'callback')  
      {
	function durMainCycleCallback($href) {
	  global $aURLRewriter;
	  if (isset($aURLRewriter[$href[1]])) return 'href="http://'.DUR_FIX_HTTP_HOST.$aURLRewriter[$href[1]].'"';
	  else return $href[0];
	}
      $sContent = preg_replace_callback('#href="http://'.DUR_FIX_HTTP_HOST.'([^"]*)"#siU','durMainCycleCallback',$sContent);
      }
    else if(DUR_MAIN_CYCLE == 'ortodox')  
      {
	foreach ($aHosts as $sHost) {
	  foreach ($aURLRewriter as $sFrom => $sTo) {
	    $sContent = durReplaceLink ($sHost, $sBase, $sFrom, $sTo, $sContent);
	  }
	if (!defined("DUR_FIRST_TIC")) define("DUR_FIRST_TIC", true);
	}
      }
    else {$sContent .= "<!--Nothing to do here!-->";}
    }

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php')) {
      include_once($_SERVER['DOCUMENT_ROOT'] . '/d-seo.php');
    }
    if ((defined('DUR_BASE_ROOT') && DUR_BASE_ROOT) || !empty($sBaseHref)) {
      if (strlen(DUR_BASE_ROOT) > 7) {
        $sBaseHref = DUR_BASE_ROOT;
      }
      else {
        $sBaseHref = (empty($sBaseHref) ? 'http://' . $aHosts[0] : $sBaseHref) . '/';
      }
      $sBaseHref = trim($sBaseHref, '/') . '/';
      $sBaseHref = '<base href="' . $sBaseHref . '">';
      $sContent = preg_replace('%<base[^>]+href[^>]+>%siU', '', $sContent);
      $sContent = preg_replace('%(<head[^>]*>)%siU', "$1" . $sBaseHref, $sContent);
    }
    if (defined('DUR_ANC_HREF') && DUR_ANC_HREF) {
      $sContent = preg_replace('%(href\s*=\s*["\']+)(#\w)%siU', '$1' . DUR_REQUEST_URI . '$2', $sContent);
    }
    if (defined('DUR_ROOT_HREF') && DUR_ROOT_HREF) {
      $sContent = preg_replace('%(href\s*=\s*["\']*)\./(\w)%siU', '$1http://' . $_SERVER['HTTP_HOST'] . $sBase . '/$2', $sContent);
    }
    if (function_exists('durOtherReplacer')) {
      $sContent = durOtherReplacer ($sContent);
    }
    }
    
    if (DUR_CACHE_REWRITED && file_exists($_SERVER['DOCUMENT_ROOT'].'/d-cache')) {
      /// Модуль кеширования контента - continue
      file_put_contents($sCacheFName, $sContent);
//       $aDataToStore = $aStoredData;
      $aDataToStore['last_clear_time'] = $tLastClear;
      $aDataToStore['d_scripts_time'] = $dtimestamp;
      $aDataToStore['cache_weight'] = (int)$tOverallLenght + (int)strlen($sContent);
      file_put_contents($sTimeFName,serialize($aDataToStore));
      /// Модуль кеширования контента - end   
    }
    
    
    if (defined('DUR_DEBUG') && DUR_DEBUG) {
      $sContent .= "\n<!--\n";
      if (defined('DUR_DEBUG_BEFORE') && DUR_DEBUG_BEFORE) {
        $sContent .= " ===== VARS BEFORE REWRITE =====\n\n" . DUR_DEBUG_BEFORE;
      }
      $sContent .= "===== VARS AFTER REWRITE =====\n\nSERVER:\n" . durDebugVar($_SERVER) . "\n\nGET:\n" . durDebugVar($_GET) . "\n\nREQUEST:\n" . durDebugVar($_REQUEST) . "\n";
      $sContent .= "\nCONSTANTS:\n" .
                   '  DUR_REQUEST_URI     => ' . durDebugEscape(DUR_REQUEST_URI) . "\n" .
                   '  DUR_HTTP_HOST       => ' . durDebugEscape(DUR_HTTP_HOST) . "\n" .
                   '  DUR_FULL_URI        => ' . durDebugEscape(DUR_FULL_URI) . "\n" .
                   '  DUR_ORIG_RURI       => ' . (defined('DUR_ORIG_RURI') ? durDebugEscape(DUR_ORIG_RURI) : 'NOT-SET') . "\n" .
                   '  DUR_SEO_REQUEST_URI => ' . (defined('DUR_SEO_REQUEST_URI') ? durDebugEscape(DUR_SEO_REQUEST_URI) : 'NOT-SET') . "\n";
                   
      $iTimeNow = microtime(true);
      $iTimeAll = ($iTimeNow - DUR_TIME_START) / 1000;
      $iTimeContent = ($iTimeStart - DUR_TIME_START) / 1000;
      $iTimeLinks = ($iTimeNow - $iTimeStart) / 1000;
      $sContent .= "\nTIME:\n" . 
                   '  ALL: ' . number_format($iTimeAll, 8) . " sec. (100%)\n" .
                   '  CMS: ' . number_format($iTimeContent, 8) . ' sec. (' . number_format($iTimeContent / $iTimeAll * 100, 2)  . "%)\n" . 
                   '  DUR: ' . number_format($iTimeLinks, 8) . ' sec. (' . number_format($iTimeLinks / $iTimeAll * 100, 2)  . "%)\n";
             
      $sContent .= "\nD-Data:\n" . durDebugVar($aDataToStore);
      $sContent .= '-->';
    }
     header('Content-Type: text/html; charset=utf-8');
    $sContent = durOutputCompress($sContent);
    if (defined('DUR_FIX_CONTLEN') && DUR_FIX_CONTLEN) {
      header('Content-Length: ' . strlen($sContent));
    }
    
    

 
    return $sContent;
  }

  function durOtherReplacer ($sContent) {
  

function outerlinks($matches){
$sEq = false; //есть ли совпадения
$res = $matches[0];
$arMassNotNoindex = array(
'%demis.ru%siU',
'%\shref\s*=\s*[\'"]https?:\/\/[A-Za-z0-9-]*\.?'.DUR_FIX_HTTP_HOST.'%siU', 
); 
foreach($arMassNotNoindex as $item){
if (preg_match($item,$matches[0])) {$sEq = true; break;}
}
if (!$sEq){ // если совпадений не нашлось
// $res = '<noindex>'.$matches[0].'</noindex>';

//если отсутствует rel, то добавляем его 
if (!strpos($res, 'rel=')){
$res = str_replace('<a ','<a rel=nofollow ',$res);
}
}
return $res;
}
//закрываем исходящие ссылки в ноиндекс и нофоллоу
//$sContent = preg_replace_callback('%<a[^>]*href=[\'"]?https?://.*</a>%siU','outerlinks',$sContent);


//$sContent = str_replace(array('<b>','</b>','<u>','</u>',),array('<span style="font-weight: bold;">','</span>','<span style="text-decoration: underline;">','</span>',),$sContent);


	$sContent=str_replace('<strong><span','<span style="font-weight:bold;"><span',$sContent);
	$sContent=str_replace('<strong><a class="mail_link"','<span style="font-weight:bold;"><a class="mail_link"',$sContent);
	$sContent=str_replace('</span></a></strong>','</span></a></span>',$sContent);
	$sContent=str_replace('</span></strong>','</span></span>',$sContent);
	$sContent=str_replace('</strong><span ','</span><span ',$sContent);
	$sContent=str_replace('</strong></span>','</span></span>',$sContent);
	

	/*if ($_SERVER["REQUEST_URI"]=="/")
 $sContent =str_replace('Copyright © Филпан, 1992-2013</div>', 'Copyright © Филпан, 1992-2013</div>
 <span style="font-size:12px; color:#89898A;">Раскрутка сайта</span> <a style="font-size:12px" href="http://www.demis-promo.ru/">от  Demis GroUp.</a> ', $sContent);*/
 
 $sContent=str_replace('Copyright © Филпан, 1992-2013</div>','<a style="font-family: Arial,Helvetica,sans-serif;
font-size: 12px;
font-weight: bold;
color: #89898A;" href="/sitemap.php">Карта сайта</a>&nbsp;&nbsp;Copyright © Филпан, 1992-2013</div>',$sContent);

$dels=array(
/*
'/uslfind.php?id=1&dopp=28&podc=31&usl=1',
'/uslfind.php?id=1&dopp=56&podc=31&usl=1',
'/uslfind.php?id=1&dopp=57&podc=31&usl=1',
'/uslfind.php?id=1&dopp=64&podc=31&usl=1',
'/uslfind.php?id=1&dopp=76&podc=31&usl=1',
'/uslfind.php?id=1&dopp=87&podc=31&usl=1',
'/uslfind.php?id=1&dopp=89&podc=31&usl=1',
'/uslfind.php?id=1&dopp=100&podc=31&usl=1',
'/uslfind.php?id=1&dopp=105&podc=31&usl=1',
'/uslfind.php?id=9&dopp=110&podc=78&usl=1',
'/uslfind.php?id=3&podc=93&usl=1',
//'/uslfind.php?id=3&podc=92&usl=1',
'/find.php?id=6&podc=20',
'/find.php?id=7&podc=59',
'/find.php?id=8&podc=23',
'/find.php?id=18&podc=48',*/
);

foreach($dels as $links){
	$links=str_replace(array('.','?','&'),array('\.','\?','\&'),$links);
	$sContent=preg_replace('%<li>\s+<a [^>]*href="http://www\.filpan\.ru'.$links.'">[^<]*</a>\s+</li>%siU','',$sContent);
}



$count_h1=substr_count($sContent, "<h1");

if($count_h1>1){
	
	$sContent=preg_replace('%<h1 class="big_orange">(.*)</h1>%siU','<div class="big_orange" style="font-weight:bold;font-size:1.5em;">$1</div>',$sContent);
	
}

  $sContent = str_replace('<a class="links_in_menu_selected" href="'.DUR_REQUEST_URI.'">', '<a class="links_in_menu_selected">', $sContent);
  $sContent = str_replace('<a href="http://www.filpan.ru'.DUR_REQUEST_URI.'"  class="header_middle_top_link">', '<a class="header_middle_top_link">', $sContent);
  $sContent=str_replace('&page=0"','"',$sContent);
  $sContent=str_replace('<img src="http://www.filpan.ru/img/1345619017.jpg"','<img src="http://www.filpan.ru/img/nofoto.jpg"',$sContent);

    return $sContent;
  }






/* Подключение в начале файла

// ЧПУ ---
  if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-url-rewriter.php')) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/d-url-rewriter.php');
    durRun ();
  }
// --- ЧПУ

/* Для поддоменов неплохо было прописывать

RewriteCond %{HTTP_HOST} ^www.(.{4,}.nickon.ru)$
RewriteRule ^(.*)$ http://%1/$1 [R=301,L]

RewriteCond %{HTTP_HOST} ^(.{4,}).nickon.ru$
RewriteRule ^robots\.txt$ robots-%1.txt [L]

*/


/* Подключение с единой точкой входа
RemoveHandler .html .htm
AddType application/x-httpd-php .php .htm .html .phtml
php_value auto_prepend_file "d-url-rewriter.php"
*/

////////
