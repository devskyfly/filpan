<?
// ЧПУ ---
 if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/d-url-rewriter.php')) {
 include_once($_SERVER['DOCUMENT_ROOT'] . '/d-url-rewriter.php');
 durRun ();
  }
// --- ЧПУ

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/read_fl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/array_order.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/back_link.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/write_yml.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/write_yml_to_tools.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/write_fl_a_pl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/user_browser.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/chpu.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/access.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/db_connection.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/db_connection_1251.php");


//korzina
//require_once($_SERVER['DOCUMENT_ROOT']."/korzina/modal_window.php");
//korzina

require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/menu_1level.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/menu_2level.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/menu_3level.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/menu_1level_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/menu_2level_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/menu_3level_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/super_gifts.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/super_gifts_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/gifts.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/usl_gifts_inf.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/usl_gifts.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/gift_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/usl_gift_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/user.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/search_gifts.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/razdel_gift.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/podrazdel_gift.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/proiz_gift.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/razdel_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/podrazdel_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/proiz_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/razdel_gift_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/podrazdel_gift_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/proiz_gift_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/razdel_usl_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/podrazdel_usl_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/proiz_usl_element.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/yml_request.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/yml_request_usl.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/yml_request_1251.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/yml_request_usl_1251.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/news_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/news_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/left_menu_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/left_menu_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/kontakti_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/kontakti_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/nashi_partnery_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/nashi_partnery_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/vagno_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/vagno_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/dostavka_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/dostavka_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/oplata_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/oplata_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/garantiya_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/garantiya_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/index_statyi.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/index_statya.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/index_statyi_gift.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/index_statya_gift.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/index_statyi_free.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/index_statya_free.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/statya_tov.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/katalog.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/metro.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/classes/current_metro.php");


?>
