<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");


$User=new ElementUserLog();

if($User->VxodVAdminku())
{
$User->ZaregistririvatAdmina();
}
 else {
    echo "
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/>
    </head>
    <body>
        <form action=\"#\">
        Введите имя: <input type=text name=\"Admin\"><br>
        Введите пароль: <input type=text name=\"Password\"><br>
        <input type=submit value=\"GO!\">
        </form>
    </body>
<html>";
    exit();
}




/*
print_r($_SESSION);
echo '<br>';
print_r('Want to redirect.');
echo '<br>';
print_r($_WEB_ROOT_HREF);
*/
$url=$_WEB_ROOT_HREF.'filpannext/PanelUpravleniya/TovariIUslugi/index.php';
header('Location: '.$url);
?>
