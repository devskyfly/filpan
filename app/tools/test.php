<?
if($_GET['pwd']=="fillll")
{
setcookie("password","fillll",time()+3600*24*365,"/", "filpan.ru");
}
setcookie("Welcome","go4server",time()+3600*24*365,"/", "filpan.ru");
//echo @$_COOKIE['Welcome'];
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"> </script>
<link rel="shortcut icon" href="http://www.filpan.ru/images/favicon.ico" type="image/x-icon">
<meta name="author" content="Filpan" />
<meta name="google-site-verification" content="o6E8RY4YrCvYhU0aikpP7QDtkphMJHZ7Owuu-mWqTt0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<Title>
Административная часть
</Title>

</head> 
<body style="background-color:LightGrey;">

<div id="YMapsID" style="width: 450px; height: 350px;"></div>

<script type="text/javascript">
    var myMap;
    function init() {
        myMap = new ymaps.Map("YMapsID", {
            center: [55.87, 37.66],
            zoom: 10
        }); 
        ...   
    }
</script>

// Сразу после загрузки API будет вызвана функция init. На момент ее исполнения div-контейнер карты уже будет готов.
<script src="http://...?load=package.standard&lang=ru-RU&onload=init">
</script>
</body>

