<?php okantovka_top('Zakr_vneshne','100%',17,15,'#FFFFFF'); ?> 
<div id='centr_part' style="height:1200px;"> 
<?if(($send!=1)||($send==2)){?>
<form action="http://www.samsung.filpan.ru/send.php">
<table style="width:100%;border:1px;border-style:solid">
			<?if($send==2){?>
			<CAPTION><H1>Заполните все поля</H1><BR>Для того, чтобы Вы своевременно и правильно получили заказ, заполните, пожалуйста, форму</CAPTION>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">Получатель (Ф.И.О)</td>
				<td ><input name="pokupatel" type="text" size="40" <?echo 'value=\''.$_REQUEST['pokupatel'].'\'';?> style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">E-mail</td>
				<td><input name="mail" type="text" size="40" <?echo 'value=\''.$_REQUEST['mail'].'\'';?> style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">Контактный номер телефона</td>
				<td ><input name="telefon" type="text" size="40" <?echo 'value=\''.$_REQUEST['telefon'].'\'';?> style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">Адресс доставки</td>
				<td ><input name="adress" type="text" size="40" <?echo 'value=\''.$_REQUEST['adress'].'\'';?> style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid"><input  type="submit" value="Отправить">&nbsp <input type="reset" value="Очистить"></td>
				<td></td>
			</tr>
			<?
			}
			else
			{
			?>
			<CAPTION>Для того, чтобы Вы своевременно и правильно получили заказ, заполните, пожалуйста, форму</CAPTION>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">Получатель (Ф.И.О)</td>
				<td ><input name="pokupatel" type="text" size="40"  style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">E-mail</td>
				<td><input name="mail" type="text" size="40"  style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">Контактный номер телефона</td>
				<td ><input name="telefon" type="text" size="40"  style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid">Адресс доставки</td>
				<td ><input name="adress" type="text" size="40"  style="border:1px;border-style:solid;background-color:#D4D0C8;"></td></tr>
			<tr>
				<td style="width:30%;border:1px;border-style:solid"><input  type="submit" value="Отправить">&nbsp <input type="reset" value="Очистить"></td>
				<td></td>
			</tr>
			<?
			}
			?>

</table>
<input name="send" type="hidden" value="1">
</form>
<?}
else{


if($_REQUEST['pokupatel']&&$_REQUEST['mail']&&$_REQUEST['telefon']&&$_REQUEST['adress'])
		{
    $to= $_REQUEST['mail'];
	
	$subject = 'Уведомление от Филпан';
	$header="Content-type: text/html; charset=\"UTF-8\"\r\n";
	$header.="From: Filpan <filpan@yandex.ru>". "\r\n" 
	."Content-Type: text/html; charset=utf-8 \r\n'".
			'Reply-To: filpan@yandex.ru' . "\r\n" .
			'X-Mailer: PHP/' . phpversion()."\r\n".'Subject:'.$subject;
	
	$message = 'Ваш заказ был принят';
   
if(mail($to, $subject, $message, $header))
{
//echo $to, $subject, $message, $header ;

echo '<P align=centr>Уважаемый '.$_REQUEST['pokupatel'].'!</p>

<p align=centr>На Ваш адрес направлено письмо с параметрами заказа</p>

<p align=centr>Благодарим за покупку!</p>';
}
else
{
echo 'Заказ не принят<br>';
}

//posilka 2go pisma
sleep(1);


		//formirovaniye tablici pisma
		$message='<table border=1><CAPTION>Информация о покупателе:'.$_REQUEST['pokupatel'].'</CAPTION>';
		$message.='<tr><td>Ф.И.О:</td><td>'.$_REQUEST['pokupatel'].'</td></tr>';
		$message.='<tr><td>E-mail:</td><td>'.$_REQUEST['mail'].'</td></tr>';
		$message.='<tr><td>Телефон:</td><td>'.$_REQUEST['telefon'].'</td></tr>';
		$message.='<tr><td>Адресс:</td><td>'.$_REQUEST['adress'].'</td></tr>';
		$message.='</table>';
		$message.='<table border=1><CAPTION>Корзина</CAPTION>';
		$i=0;
		while($_SESSION['korzina'][$i])
		{
		$message.='<tr><td>'.$_SESSION['korzina'][$i]['name'].'</td><td>'.$_SESSION['korzina'][$i]['price'].'</td><td>'.$_SESSION['korzina'][$i]['kol_vo'].'</td></tr>';

		$i++;
		}
		$message.='</table>';



		$to= "filpan@yandex.ru";

 

		$subject = 'Заказ от '.$_REQUEST['pokupatel'];
		$header = 'From: filpan@yandex.ru'. "\r\n" ."Content-Type: text/html; charset=utf-8 \r\n'".
			'Reply-To: filpan@yandex.ru' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
   
   
//mb_internal_encoding("UTF-8"); //это нужная херня-принудительно выставляем кодировку
if(mail ($to,$subject,$message,$header))
{
}
else
{
echo 'Заказ не принят';
}
		}
		else
		{
		echo('<script>location.href=\'http://www.samsung.filpan.ru/send.php?send=2&pokupatel='.$_REQUEST['pokupatel'].'&mail='.$_REQUEST['mail'].'&telefon='.$_REQUEST['telefon'].'&adress='.$_REQUEST['adress'].'\'</script>');
		}


}?>
</div>

 
<?php okantovka_bottom('Zakr_vneshne',17,15);?>  