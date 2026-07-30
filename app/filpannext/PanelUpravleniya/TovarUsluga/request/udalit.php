<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$ElementMenu=new ElementTovarovUslug();
$ElementMenu->poluchit($_REQUEST['input_id']);
$ElementMenu->udalit();

$SootvetstviyeTovarSvoystvoZnacheniye=new SootvetstviyeTovarSvoystvoZnacheniye();
$_MassivKriteriev = array();
$_MassivKriteriev['id_tovar'] = $_REQUEST['input_id'];
$SootvetstviyeTovarSvoystvoZnacheniye->udalitPoKriteriyu($_MassivKriteriev);
?>