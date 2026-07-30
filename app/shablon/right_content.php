<script src="http://cdn.jotfor.ms/static/feedback2.js?3.2.207" type="text/javascript">
new JotformFeedback({
formId:'40161040460336',
base:'http://jotformeu.com/',
windowTitle:'Обратная связь',
background:'#FFA500',
fontColor:'#FFFFFF',
type:false,
height:500,
width:700
});
</script>

<script src="http://cdn.jotfor.ms/static/feedback2.js?3.2.193" type="text/javascript">
new JotformFeedback({
formId:'40151877212348',
base:'http://jotformeu.com/',
windowTitle:'Обратный звонок',
background:'#FFA500',
fontColor:'#FFFFFF',
type:false,
height:350,
width:500
});
</script>
<div class="right_content">
<div class="content-box-links">
    <div><a href="/o nas.php" class="super_link" target='_blank' >Как проехать к нам в офис</a></div>
    <div><a class="lightbox-40161040460336 callback orange_link" >Напишите нам</a></div>
    <div style="text-align:center"><a class="lightbox-40151877212348 orange_link callback">Закажите звонок</a></div>
</div>  
<div class="content-box">
<span class="content_box_title">Суперпредложения</span>
<?

$super_usl=new super_gifts_usl('uslsodraz',$_GET['id'],$_GET['podc'],$_GET['dopp']);
$super_usl->show($_GET['id'],$_GET['podc'],$_GET['dopp']);


$super_gift=new super_gifts('sodraz',$_GET['id'],$_GET['podc'],$_GET['dopp']);
$super_gift->show($_GET['id'],$_GET['podc'],$_GET['dopp']);


?>
</div>
</div>