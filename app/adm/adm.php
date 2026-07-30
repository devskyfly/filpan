<?
setcookie("update_links","chislopi314",time()+3600,"/");
require("tpl/db.php");
require("tpl/variables.php");
require("tpl"."/"."header_adm.php");

if ($QUERY_STRING){
	list($msg)=explode("&",$QUERY_STRING,2);
	
	if ($_GET['parametr']=="statyi") {require ("statyi.php");	}
	if ($_GET['parametr']=="inf_podrazdel") {require ("inf_podrazdel.php");	}
	if ($msg=="reds") {require ("sodraz.php");	}
	if ($msg=="redus") {require ("uslsodraz.php");	}
	if ($msg=="redv") {require ("kurs.php");	}
	if ($msg=="redsup") {require ("super.php");	}
	if ($msg=="dr") {require ("dobrub.php");	}
	if ($msg=="redpr") {require ("proiz.php");	}
	if ($msg=="redf") {require ("func.php");	}
	if ($msg=="redpag") {require ("redpages.php");	}
	if ($msg=="prov") {require ("prov.php");	}	
	if ($msg=="rass") {require ("rass.php");	}	
	if ($msg=="zakem") {require ("zakem.php");	}	
	if ($msg=="catraz") {require ("catraz.php");	}
	if ($msg=="catrub") {require ("catrub.php");	}
	if ($msg=="catkat") {require ("catkat.php");	}
	if ($msg=="yandexmrk") {require ("yandexmrk.php");	}
	if ($msg=="yandexmrk_usl") {require ("yandexmrk_uslugi.php");	}


}

echo "<a href=http://www.filpan.ru/adm/yml/yml_generat.php><H1>—формировать YML</H1></a></body></html>";
?>
