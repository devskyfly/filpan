<?
if (!$QUERY_STRING) {
	if (@$sb){
		$oname=$name."-".$pass;
		if ($oname==$AdminPass ) {	
			//Заносим данные в куки
			$lifetime=time()+86400*365;
			setcookie("usercookie", $oname, $lifetime);	

			require("tpl/headadm.txt");		
			echo "<table width=100% border=0 cellpadding=1 cellspacing=0 bgcolor=#000000>
  				<tr>
				<td>
				<table width=100% border=0 cellpadding=0 cellspacing=0>
				<tr><ul>
				<td width=153 bgcolor=#9ebac9 align=right valign=top><br>
				<table width=97% border=0 cellpadding=0 cellspacing=0><tr><td valign=top>";
			echo "<a href=adm.php?parametr=statyi class=textadm><li>Редактировать статьи</a><br><br>";	
			echo "<a href=adm.php?parametr=inf_podrazdel class=textadm><li>Редактировать статьи в подразделах</a><br><br>";	
			echo "<a href=adm.php?redus class=textadm><li>Редактировать содержание раздела КАТАЛОГ УСЛУГ</a><br><br>";
			echo "<a href=adm.php?redpr&us=1 class=textadm><li>Редактировать производителя услуги</a><br><br>";
			echo "<a href=adm.php?redf&us=1 class=textadm><li>Редактировать функциональность услуги</a><br><hr><br>";

			echo "<a href=adm.php?reds class=textadm><li>Редактировать содержание раздела КАТАЛОГ ТОВАРОВ</a><br><br>";
			echo "<a href=adm.php?redpr class=textadm><li>Редактировать производителя товара</a><br><br>";
			echo "<a href=adm.php?redf class=textadm><li>Редактировать функциональность товара</a><br><hr><br>";
			
			echo "<a href=adm.php?redv class=textadm><li>Редактировать курс валют</a><br><br>";
			echo "<a href=adm.php?redsup class=textadm><li>Редактировать суперпредложения</a><br><hr><br>";
			
			//echo "<a href=adm.php?redpag class=textadm><li>Редактировать страницы</a><hr><br>";
			echo "<a href=adm.php?prov class=textadm><li>Подписаться на проверочную рассылку</a><br><br>";
			echo "<a href=adm.php?rass class=textadm><li>Автоматическая рассылка</a><br><br>";
			echo "<a href=adm.php?zakem class=textadm><li>Закачать e-mail для рассылки коммерческого предложения</a><br><br>";
			echo "<hr><a href=adm.php?catraz class=textadm><li>Редактировать разделы каталога</a><br>";
			echo "<a href=adm.php?catrub class=textadm><li>Редактировать подразделы каталога</a><br>";
			echo "<a href=adm.php?yandexmrk class=textadm><li>Публикации товаров на Yandex Market</a><br>";
			echo "<a href=adm.php?yandexmrk_usl class=textadm><li>Публикации услуг на Yandex Market</a><br>";
			//echo "<a href=adm.php?catkat class=textadm><li>Редактировать категории каталога</a><br>";
			echo "</td></tr></table>
				<br></td>
				</ul>
				<TD bgColor=#ffffff valign=top>
        			<table width=\"97%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\">
        			 <tr> 
        			 <td>";
			echo "Добро пожаловать на страницу администратора";
			echo "</td></tr>
 				<tr><td bgcolor=\"#99CCCC\" height=1>
				</td></tr>";
		}
		else {
			require("tpl/headadm.txt");
			echo "<center><h5>Неправильный пароль или логин или не заполнены поля</h5></center>";
			echo "</body></html>\n";
			exit();
		}
	}
	else {
		require("tpl/headadm.txt");
		require("tpl/formpass.txt");
		echo "</body></html>\n";
		exit();
	}
}	
else {
	require("tpl/headadm.txt");	
		echo "<table width=100% border=0 cellpadding=1 cellspacing=0 bgcolor=#000000>
  		<tr>
		<td>
		<table width=100% border=0 cellpadding=0 cellspacing=0>
		<tr><ul>
		<td width=153 bgcolor=#9ebac9 align=right valign=top><br>
		<table width=97% border=0 cellpadding=0 cellspacing=0><tr><td valign=top>";
		echo "<a href=adm.php?parametr=statyi class=textadm><li>Редактировать статьи</a><br><br>";	
		echo "<a href=adm.php?parametr=inf_podrazdel class=textadm><li>Редактировать статьи в подразделах</a><br><br>";	
		echo "<a href=adm.php?redus class=textadm><li>Редактировать содержание раздела КАТАЛОГ УСЛУГ</a><br><br>";
		echo "<a href=adm.php?redpr&us=1 class=textadm><li>Редактировать производителя услуги</a><br><br>";
		echo "<a href=adm.php?redf&us=1 class=textadm><li>Редактировать функциональность услуги</a><br><hr><br>";

		echo "<a href=adm.php?reds class=textadm><li>Редактировать содержание раздела КАТАЛОГ ТОВАРОВ</a><br><br>";
		echo "<a href=adm.php?redpr class=textadm><li>Редактировать производителя товара</a><br><br>";
		echo "<a href=adm.php?redf class=textadm><li>Редактировать функциональность товара</a><br><hr><br>";
		
		echo "<a href=adm.php?redv class=textadm><li>Редактировать курс валют</a><br><br>";
		echo "<a href=adm.php?redsup class=textadm><li>Редактировать суперпредложения</a><br><hr><br>";
			
		//echo "<a href=adm.php?redpag class=textadm><li>Редактировать страницы</a><hr><br>";
		echo "<a href=adm.php?prov class=textadm><li>Подписаться на проверочную рассылку</a><br><br>";
		echo "<a href=adm.php?rass class=textadm><li>Автоматическая рассылка</a><br><br>";
		echo "<a href=adm.php?zakem class=textadm><li>Закачать e-mail для рассылки коммерческого предложения</a><br><br>";
		echo "<hr><a href=adm.php?catraz class=textadm><li>Редактировать разделы каталога</a><br>";
			echo "<a href=adm.php?catrub class=textadm><li>Редактировать подразделы каталога</a><br>";
			echo "<a href=adm.php?yandexmrk class=textadm><li>Публикации товаров на Yandex Market</a><br>";
			echo "<a href=adm.php?yandexmrk_usl class=textadm><li>Публикации услуг на Yandex Market</a><br>";
			//echo "<a href=adm.php?catkat class=textadm><li>Редактировать категории каталога</a><br>";
			echo "</td></tr></table>
		<br></td>
		</ul>
		<TD bgColor=#ffffff valign=top>
        	<table width=\"97%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\">
        	 <tr> 
        	 <td>";
		if ($QUERY_STRING) {
			//$msg=$QUERY_STRING;
			list($msg)=explode("&",$QUERY_STRING,2);
			if ($msg=="redus") {echo "Редактирование содержания раздела КАТАЛОГ УСЛУГ";}
			if ($msg=="reds") {echo "Редактирование содержания раздела КАТАЛОГ ТОВАРОВ";}
			if ($msg=="redv") {echo "Редактирование курса валют";}
			if ($msg=="redsup") {echo "Редактирование супер предложений";}
			if ($msg=="redpr") {echo "Редактирование производителя";}
			if ($msg=="redf") {echo "Редактирование функциональности";}
			if ($msg=="redpag") {echo "Редактирование страниц";}
			if ($msg=="prov") {echo "Подписаться на проверочную рассылку";}
			if ($msg=="rass") {echo "Автоматическая рассылка";}
			if ($msg=="zakem") {echo "Закачивание e-mail для рассылки коммерческого предложения";}
			if ($msg=="catraz") {echo "Редактирование раздела каталога";}
			if ($msg=="catrub") {echo "Редактирование подразделов каталога";}
			if ($msg=="catkat") {echo "Редактирование категорий каталога";}
			
			
		}
		else {	echo "Добро пожаловать на страницу администратора";}
		
		echo "</td></tr>
 		<tr><td bgcolor=\"#99CCCC\" height=1>
		</td></tr>";
	
}
?>

