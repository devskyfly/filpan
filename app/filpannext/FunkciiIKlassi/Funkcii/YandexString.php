<?
function YandexString($String)
 {
 	$String = str_replace("\"", "&quot;", $String);
 	$String = str_replace("&", "&amp;", $String);
 	$String = str_replace(">", "&gt;", $String);
 	$String = str_replace("<", "&lt;", $String);
 	$String = str_replace("'", "&apos;", $String);
 	$String = str_replace("\r", "", $String);
 	$String = str_replace("\n", "", $String);
	return $String;
 }
?>