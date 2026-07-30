<?
//require_once($_ROOT."");
//Funkcii
if (empty($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['DOCUMENT_ROOT'] = __DIR__ . "/../../";
}
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/GlobalniyePeremenniye.php");


require_once($_ROOT."/FunkciiIKlassi/Funkcii/preobrazovatMassivVUsloviyeZaprosa.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/preobrazovatMassivVUsloviyeILIZaprosa.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/preobrazovatMassivVParametriInsertZaprosa.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/preobrazovatMassivVParametriUpdateZaprosa.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/preobrazovatMassivVPoliyaZaprosa.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/preobrazovatMassivVINUsloviyeZaprosa.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/preobrazovatMassivSlovVUsloviyePoiskovogoZaprosa.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/get_chpu_url.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/getmicrotime.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/UbratSpan.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/menuVFail.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/BoolToChecked.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/YandexString.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/URLParserForFilpan.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/izmenitGlobalnoeSvoystvo.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/poluchitGlobalnoeSvoystvo.php");
require_once($_ROOT."/FunkciiIKlassi/Funkcii/request_url.php");
//Klassi
require_once($_ROOT."/FunkciiIKlassi/Klassi/MyExc.php");
require_once($_ROOT."/FunkciiIKlassi/GlobalniyePeremenniye.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Zapros/ZaprosNaChteniye.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Zapros/ZaprosNaSozdaniye.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Zapros/ZaprosNaIzmeneniye.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/IerarhicheskiySpisok/IerarhicheskiySpisok.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Menu/Menu.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Spisok/Spisok.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/VidiStatyi/VidiStatyi.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Statyi/Statyi.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/TovariUslugi/TovariUslugi.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Korzina/Korzina.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Ssilki/Ssilki.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Otzivi/Otzivi.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Ceni/Ceni.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementSpiska/ElementSpiska.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementIerarhicheskogoSpiska/ElementIerarhicheskogoSpiska.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementMenu/ElementMenu.php");
///
require_once($_ROOT."/FunkciiIKlassi/Klassi/PanelUpravleniyaMenuPriorityGoods/PanelUpravleniyaMenuPriorityGoods.php");
///
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementStatya/ElementStatya.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementVidStatyi/ElementVidStatyi.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementSsilka/ElementSsilka.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementOtziv/ElementOtziv.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementCena/ElementCena.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/UsersLog/UsersLog.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Pictures/Pictures.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/SoputstvuyushieTovariIUslugi/SoputstvuyushieTovariIUslugi.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementSoputstvuyushyiTovarIUslugi/ElementSoputstvuyushyiTovarIUslugi.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementTovarovUslug/ElementTovarovUslug.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementUserLog/ElementUserLog.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementPicture/ElementPicture.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementSvoystva/ElementSvoystva.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementSvoystvo/ElementSvoystvo.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/Svoystva/Svoystva.php");

require_once($_ROOT."/FunkciiIKlassi/Klassi/ZnacheniyaSvoystv/ZnacheniyaSvoystv.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementZnacheniyeSvoystva/ElementZnacheniyeSvoystva.php");

require_once($_ROOT."/FunkciiIKlassi/Klassi/KategoriiSvoystv/KategoriiSvoystv.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementKategoriyaSvoystva/ElementKategoriyaSvoystva.php");

require_once($_ROOT."/FunkciiIKlassi/Klassi/ElementSootvetstviyeTovarSvoystvoZnacheniye/ElementSootvetstviyeTovarSvoystvoZnacheniye.php");
require_once($_ROOT."/FunkciiIKlassi/Klassi/SootvetstviyeTovarSvoystvoZnacheniye/SootvetstviyeTovarSvoystvoZnacheniye.php");

require_once($_ROOT."/FunkciiIKlassi/Klassi/VxodNaSayt/VxodNaSayt.php");

?>