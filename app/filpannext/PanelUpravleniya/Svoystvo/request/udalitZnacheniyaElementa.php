<?require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementSvoystva=new ElementSvoystva();
$ElementSvoystva->poluchit($_REQUEST['input_id']);
$ElementSvoystva->udalitZnacheniyaSvoystva();
?>