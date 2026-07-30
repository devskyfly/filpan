<div class="middle_content">
<?

$gifts=new gifts($_GET['id'],$_GET['podc'],$_GET['dopp'],$_GET['page']);
//$title=$gifts->show_title();
$menu_tovari->show_title($_GET['id'],$_GET['podc'],$_GET['dopp'],$title_way,$proiz_link,1,$_GET['usl']);

$title_way_size=count($title_way);

for($iterator=0;$iterator<	$title_way_size;$iterator++)
{
if($iterator==(	$title_way_size-1))
{
$caption_link=$caption_link.$title_way[$iterator]['text'];
}
else
{
$caption_link=$caption_link.$title_way[$iterator]['text']."-";
}
}



if(!isset($_GET['page'])||($_GET['page']==0))
{
$statya->show_text();
}
if(is_object($gifts))
{
$gifts->show($_GET['id'],$_GET['podc'],$_GET['dopp'],$way);
}
?>
</div>
