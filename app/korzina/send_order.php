<?
require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/functions/smtp_mailer.php");

$hostname = "127.0.0.1";
$username = "u3558310_filpan";
$password = "filpan";
$database = "u3558310_filpan";

$db = mysql_connect($hostname, $username, $password) OR DIE("Нет соединения с базой");
mysql_select_db($database, $db);

$Name=$_REQUEST['Name'];
$Organ=$_REQUEST['Organ'];
$Phone=$_REQUEST['Phone'];
$City=$_REQUEST['City'];
$Adress=$_REQUEST['Adress'];
$Metro=$_REQUEST['Metro'];
$Samovyvoz=$_REQUEST['Samovyvoz'];
$Dost_usl=$_REQUEST['Dost_usl'];
$Dost_gifts=$_REQUEST['Dost_gifts'];
$Bnal=$_REQUEST['Bnal'];
$Email=$_REQUEST['Email'];
$Inn=$_REQUEST['Inn'];
$Yuradress=$_REQUEST['Yuradress'];
$Factadress=$_REQUEST['Factadress'];
$Okpo=$_REQUEST['Okpo'];
$Pc=$_REQUEST['Pc'];
$Bank=$_REQUEST['Bank'];
$Bik=$_REQUEST['Bik'];
$Kc=$_REQUEST['Kc'];

$Price=$_REQUEST['Price'];


$res = mysql_query("SELECT * FROM zakaz_number");
$ar=mysql_fetch_array($res);
$number=$ar[1]+1;
$number=str_pad($number, 5, '0', STR_PAD_LEFT);


$message="<strong>Заказ № $number</strong><br>";

$message=$message."Ф.И.О. : $Name<br>";
if($Organ!='undefined')
{
$message=$message."Организация : $Organ<br>";
}
$message=$message."Телефон: $Phone<br>Город: $City<br>Адрес доставки: $Adress<br>Станция метро: $Metro<br>E-mail: $Email<br><br>";


$gifts = explode("#-#",$_COOKIE['usl']);
$usl_nums=count($gifts);

$mess_user="<strong>Заказ № $number</strong><br>";

$mess_user=$mess_user."Уважаемый $Name,благодарим Вас за заказ в нашем магазине.
В ближайшее время наш менеджер свяжется с Вами для уточнения условий заказа.<br>";


$message=$message.'<table width="95%" border="1">';
$mess_user=$mess_user.'<table width="95%" border="1">';

if($usl_nums>3)
{

$message=$message.'<tr>
    <td colspan="5"><div align="center"><strong>Услуги</strong></div></td>
  </tr>
   <tr>
    <td width="16">№</td>
    <td width="401">Наименование</td>
    <td width="64">Кол-во</td>
    <td width="86">Цена</td>
    <td width="244">Сумма</td>
  </tr>';	

$mess_user=$mess_user.'<tr>
    <td colspan="5"><div align="center"><strong>Услуги</strong></div></td>
  </tr>
   <tr>
    <td width="16">№</td>
    <td width="401">Наименование</td>
    <td width="64">Кол-во</td>
    <td width="86">Цена</td>
    <td width="244">Сумма</td>
  </tr>';


$gifts = explode("#;#",$_COOKIE['usl']);
$gifts_nums=count($gifts);


for($iterator=0;$iterator<$gifts_nums;$iterator++)
{
$summa=0;
$assos_row=explode("#-#",$gifts[$iterator]);
$summa=$assos_row[2]*$assos_row[3];		
$it=$iterator+1;	
$message=$message."<tr>
    <td>$it)</td>
    <td>$assos_row[1]</td>
    <td>$assos_row[2] шт.</td>
    <td>$assos_row[3] руб.</td>
    <td><strong>$summa руб</strong></td>
</tr>";	

$mess_user=$mess_user."<tr>
    <td>$it)</td>
    <td>$assos_row[1]</td>
    <td>$assos_row[2] шт.</td>
    <td>$assos_row[3] руб.</td>
    <td><strong>$summa руб</strong></td>
</tr>";				
}


if($Samovyvoz=='no')
{$message=$message.'<tr><td colspan="5"><strong>+ '.$Dost_usl.'</strong></td></tr>';
$mess_user=$mess_user.'<tr><td colspan="5"><strong>+ '.$Dost_usl.'</strong></td></tr>';
}
$message=$message.'</tr></table><br>';
$mess_user=$mess_user.'</tr></table><br>';
}


$gifts = explode("#-#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);


if($gifts_nums>3)
{
$message=$message.'
  <table width="95%" border="1"><tr>
    <td colspan="5"><div align="center"><strong>Товары</strong></div></td>
  </tr>
   <tr>
    <td width="16">№</td>
    <td width="401">Наименование</td>
    <td width="64">Кол-во</td>
    <td width="86">Цена</td>
    <td width="244">Сумма</td>
  </tr>';

 $mess_user=$mess_user.'
  <table width="95%" border="1"><tr>
    <td colspan="5"><div align="center"><strong>Товары</strong></div></td>
  </tr>
   <tr>
    <td width="16">№</td>
    <td width="401">Наименование</td>
    <td width="64">Кол-во</td>
    <td width="86">Цена</td>
    <td width="244">Сумма</td>
  </tr>';
  
$gifts = explode("#;#",$_COOKIE['gifts']);
$gifts_nums=count($gifts);

for($iterator=0;$iterator<$gifts_nums;$iterator++)
{
$summa=0;
$assos_row=explode("#-#",$gifts[$iterator]);
$summa=$assos_row[2]*$assos_row[3];	
$it=$iterator+1;			
$message=$message."
<tr>
    <td>$it)</td>
    <td>$assos_row[1]</td>
    <td>$assos_row[2] шт.</td>
    <td>$assos_row[3] руб.</td>
    <td><strong>$summa руб</strong></td>
</tr>";		

$mess_user=$mess_user."
<tr>
    <td>$it)</td>
    <td>$assos_row[1]</td>
    <td>$assos_row[2] шт.</td>
    <td>$assos_row[3] руб.</td>
    <td><strong>$summa руб</strong></td>
</tr>";			
}

	
if($Samovyvoz=='no')
{$message=$message."<tr><td colspan=\"5\"><strong>+ $Dost_gifts</strong></td></tr>";
$mess_user=$mess_user."<tr><td colspan=\"5\"><strong>+ $Dost_gifts</strong></td></tr>";}	

$message=$message.'</tr></table><br>';
$mess_user=$mess_user.'</tr></table><br>';
}


$message=$message.'<table width="95%" border="1"><tr>
    <td colspan="4">Общая сумма</td>
    <td><strong>'.$Price.' руб</strong></td>
  </tr>
</table>';
$mess_user=$mess_user.'<table width="95%" border="1"><tr>
    <td colspan="4">Общая сумма</td>
    <td><strong>'.$Price.' руб</strong></td>
  </tr>
</table>';


if($Samovyvoz=='yes')
{$message=$message."<br>САМОВЫВОЗ<br>";}

$mess_user=$mess_user.'<br><strong>Благодарим за покупку!</strong>';


$message=$message."<br>Расчёт: ";
if($Bnal=='no')
{$message=$message."Наличный";}
else
{$message=$message."Безналичный<br>
ИНН/КПП: $Inn<br>
Юридический адрес: $Yuradress<br>
Фактический адрес: $Factadress<br>
ОКПО: $Okpo<br>
Р/с: $Pc<br>
Банк: $Bank<br>
БИК: $Bik<br>
К/с: $Kc<br>
";}


//send_user

$date=date("F j, Y, g:i a");
$to = "$Email";
$subject = "Заказ от $date";
$customerEmailSent = true;
$adminEmailSent = true;

try {
    sendSiteSmtpMail($to, $subject, $mess_user);
} catch (Exception $exception) {
    error_log('Order confirmation email failed: ' . $exception->getMessage());
    $customerEmailSent = false;
}

$adminRecipient = "filpan@yandex.ru";
try {
    sendSiteSmtpMail(
        $adminRecipient,
        $subject,
        $message,
        $Email,
        $Name
    );
} catch (Exception $exception) {
    error_log('Order notification email failed: ' . $exception->getMessage());
    $adminEmailSent = false;
}

$res = mysql_query("UPDATE zakaz_number SET number=number+1");

echo $customerEmailSent && $adminEmailSent ? "Yes" : "No";


?>
