<?
$browser= explode(' ',user_browser($_SERVER['HTTP_USER_AGENT']));
//echo $browser[0];
if($browser[0]=="Chrome")
{?>
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/content_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Chrome/bottom_style.css" />

<!-- korzina_styles-->
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/modal.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/attention_window.css" />
<!-- korzina_styles-->

<?
}
elseif($browser[0]=="Firefox")
{?>

<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/content_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/Firefox/bottom_style.css" />
<!-- korzina_styles-->
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/modal.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/attention_window.css" />
<!-- korzina_styles-->
<?
}
elseif($browser[0]=="Safari")
{?>
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/content_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/bottom_style.css" />
<!-- korzina_styles-->
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/modal.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/attention_window.css" />
<!-- korzina_styles-->
<?
}
else
{?>

<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/common_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/header_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/left_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/right_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/content_style.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/styles/bottom_style.css" />
<!-- korzina_styles-->
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/modal.css" />
<link rel="stylesheet" type="text/css" href="http://www.filpan.ru/korzina/attention_window.css" />
<!-- korzina_styles-->
<?
}
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43714085-1', 'filpan.ru');
  ga('send', 'pageview');

</script>

<!-- BEGIN JIVOSITE CODE {literal}-->
<script type="text/javascript">
(function() {
var widget_id = '4872';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.ru/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss); })();
</script>
<!-- {/literal} END JIVOSITE CODE -->
