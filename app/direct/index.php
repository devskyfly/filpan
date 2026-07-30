<script type="text/javascript" src="jquery-1.7.1.js"></script>	

<!-- jAlert -->
<script src="alert_mess/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="alert_mess/jquery.alerts.js" type="text/javascript"></script>
<link href="alert_mess/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />	

<script type="text/javascript">
$(document).ready(function() {
	$('input:checkbox').click(function(){
		
		var parent=$(this).attr('name');
	
		if($(this).prop("checked"))
		{
			$(this).next('ul').find('input').prop('checked', this.checked);
		}
		else
		{
			$(this).next('ul').find('input').prop('checked', this.checked);	
		}
	});

	$('.plus').click(function(){
		if($(this).next().next().is(":visible"))
		{
		$(this).next().next().fadeOut();
		$(this).html('<span class="plus">+</span>');
		}
		else
		{
		$(this).next().next().fadeIn();
		$(this).html('<span class="minus">-</span>');
		}
	});

	

//export	
	$('.start').click(function(){
	var i=0;
	var arr=new Array();
		$("input:checkbox:checked").each(function() {
		var name=$(this).attr("name");
		//console.log(name);
		if(name>=28)
		{
		arr[i]=name;
		i++;
		}
		});

		var Direct=$('#direct').prop('checked');

		var ok= function(msg)
		{
			if(msg!="")
			{
			window.location.href = msg;
			jOk('Файл успешно создан!', "Получилось!");
			}
			else
			{
			jAlert('Что-то пошло не так!', "Ошибка!");
			jAlert(msg, "Ошибка!");
			}
		}
		
		$.post(
		  "menu_actions.php",
		  { 
			  arr: arr,
			  direct:Direct
		  },
		  ok
		);
	});
});
</script>

<style>
.plus
{
cursor:pointer;
font-weight:bold;
}
.minus
{
cursor:pointer;
font-weight:bold;
position: relative;
bottom: 2px;
}
.start
{
width: 200px;
height: 40px;
background-color: #FFC107;
border: 1px solid grey;
margin-left: 25px;
color: #452121;
font-size: 30px;
line-height: 40px;
text-align: center;
cursor: pointer;
}
.import
{
width: 200px;
height: 40px;
background-color: #FFC107;
border: 1px solid grey;
margin-left: 25px;
color: #452121;
font-size: 30px;
line-height: 40px;
text-align: center;
cursor: pointer;
}
</style>

<?php

ini_set('display_errors','On');
error_reporting('E_ALL');

$link = mysql_connect("127.0.0.1","u3558310_filpan","filpan") or die ("error");
mysql_select_db("u3558310_filpan") or die ("error");

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");

//LOGIN
if(isset($_POST['export_login']) && isset($_POST['export_pass']))
{
	if($_POST['export_login']=='Jarosss')
	{
	SetCookie("login_export",$_POST['export_login'],0,"/direct/");
	}
	if($_POST['export_pass']=='chislopi314')
	{
	SetCookie("pass_export",$_POST['export_pass'],0,"/direct/");
	}
	header("Location: /direct/index.php");
}

//Test cookie
if($_COOKIE['login_export']=='Jarosss' && $_COOKIE['pass_export']=='chislopi314')
{


//if upload OK
if($_GET[ok]==1)
{
echo'<script type="text/javascript">
$(document).ready(function() {
jOk("Данные успешно обновлены!", "Получилось!");
});
</script>';
}

$menus=mysql_query("SELECT * FROM `filpan_new_menu`");

if(mysql_num_rows($menus) > 0){
    $cats = array();
    while($cat =  mysql_fetch_assoc($menus)){
        $cats_ID[$cat['id']][] = $cat;
        $cats[$cat['roditel']][$cat['id']] =  $cat;
    }
}

function build_tree($cats,$parent_id,$only_parent = false){
    if(is_array($cats) and isset($cats[$parent_id])){
	
		if($parent_id==0)
		{
        $tree = '<ul>';
		}
		else
		{
		$tree = '<ul style="display:none;">';
		}
		
        if($only_parent==false){
            foreach($cats[$parent_id] as $cat){
			
                $tree .= '<li><span class="plus">+</span><input type="checkbox" name="'.$cat['id'].'">'.$cat['nazvanie'];
				
				$menus=mysql_query("SELECT * FROM `filpan_new_tovari_uslugi` WHERE `menu_id`='$cat[id]'");
				$count=mysql_num_rows($menus);
					if($count>0)
					{
					$tree .= '( '.$count.' )';
					}
				
                $tree .=  build_tree($cats,$cat['id']);
                $tree .= '</li>';
				
            }
        }elseif(is_numeric($only_parent)){
            $cat = $cats[$parent_id][$only_parent];
            $tree .= '<li><span class="plus">+</span><input type="checkbox" name="'.$cat['id'].'">'.$cat['nazvanie'];
            $tree .=  build_tree($cats,$cat['id']);
            $tree .= '</li>';
        }
        $tree .= '</ul>';
    }
    else return null;
    return $tree;
}
echo '<div><input type="checkbox" id="direct">Direct</div>';
echo'<div style="float:left;">';

echo build_tree($cats,0);

echo'<div class="start">Выгрузить!</div>

</div>';
}
else
{
echo"<form action='index.php' method=post>Логин <input type='text' name='export_login'><br><br>Пароль <input type='text' name='export_pass'><br><br><input type='submit'></form>";
}
?>
