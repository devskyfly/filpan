<?
$browser= explode(' ',user_browser($_SERVER['HTTP_USER_AGENT']));
//echo $browser[0];
if($browser[0]=="Chrome")
{?>
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/middle_content_korzina_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/bottom_style.css" /><?
}
elseif($browser[0]=="Firefox")
{?>

<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/middle_content_korzina_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/bottom_style.css" /><?
}
elseif($browser[0]=="Safari")
{?>
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/middle_content_korzina_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/bottom_style.css" /><?
}
else
{?>

<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/middle_content_korzina_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/bottom_style.css" /><?
}
?>


<!-- BEGIN JIVOSITE CODE {literal}-->
<script type="text/javascript">
(function() {
var widget_id = '4872';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.ru/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss); })();
</script>
<!-- {/literal} END JIVOSITE CODE -->