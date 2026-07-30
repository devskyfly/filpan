<?
	echo mail('filpan@yandex.ru', "Заблокированная почта","Тело письма",
	"Content-type: text/html; charset=UTF-8 \r\n"
		."From: skyflywingforce@gmail.com\r\n"
	."Reply-To: Volkow_M@mail.ru\r\n"
	."X-Mailer: PHP/" . phpversion());
?>
