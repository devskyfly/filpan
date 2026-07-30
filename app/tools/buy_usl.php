<?
class user
{
//#-#
//#;#
function user()
{

}



function buy_usl($id,$name,$kolichestvo,$cena)
{
$kolvo=0;
$price=0;



if ($kolichestvo<=0)
{
$kolichestvo=1;

}
//
$kolvo=$kolichestvo;
$price=$cena;
//

$gifts = explode("#;#",$_COOKIE['usl']);
$gifts_nums=count($gifts);





if($gifts_nums&&!empty($_COOKIE['usl']))
{
$gifts_for_cook=array();
$poziciya_naydena=0;
							for($iterator=0;$iterator<$gifts_nums;$iterator++)
							{
							$assos_row=explode("#-#",$gifts[$iterator]);
							$assos_gifts[$iterator]['id']=$assos_row[0];
							$assos_gifts[$iterator]['name']=$assos_row[1];
											if($assos_row[0]==$id)
											{
											$poziciya_naydena=1;
											$assos_gifts[$iterator]['colichestvo']=$assos_row[2]+$kolichestvo;
											}
											else
											{
											$assos_gifts[$iterator]['colichestvo']=$assos_row[2];
											}
							$assos_gifts[$iterator]['cena']=$assos_row[3];
							

							$gifts_for_cook[$iterator]=implode("#-#",$assos_gifts[$iterator]);
							//
			
							$kolvo=$kolvo+$assos_row[2];
							$price_now=$assos_row[2]*$assos_row[3];
							$price=$price+$price_now;

							//
							}
	
	if($poziciya_naydena)
	{
	$gifts_for_cook=implode("#;#",$gifts_for_cook);
	}
	else
	{
	$gifts_for_cook=implode("#;#",$gifts_for_cook);
	$gifts_for_cook=$gifts_for_cook."#;#".$id."#-#".$name."#-#".$kolichestvo."#-#".$cena;
	}
	if(!SetCookie("usl",$gifts_for_cook,time()+10000,'/'))
	{ echo $gifts_nums."?<br>\n";
	echo "Cook ne vstal<br>\n";
	}			
}
else
{
$gifts_for_cook=$id."#-#".$name."#-#".$kolichestvo."#-#".$cena;
			if(!SetCookie("usl",$gifts_for_cook,time()+10000,'/'))
				{ echo $gifts_nums."?<br>\n";
				echo "Cook ne vstal<br>\n";
				}
}
//print_r($gifts_for_cook);
//echo "_?_$gifts_nums<br>\n";
//print_r($_COOKIE['usl']);


								
echo "OK&$kolvo&$price";
}

}

if ($_REQUEST['komanda']=="pokupka")
{
$user=new user;
$user->buy_usl($_REQUEST['id'],$_REQUEST['name'],$_REQUEST['kolichestvo'],$_REQUEST['cena']);
}


?>