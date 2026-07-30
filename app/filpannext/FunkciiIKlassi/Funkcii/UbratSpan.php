<?
function UbratSpan($string)
 {
		//print_r($string); 
		$expr='/<span data-scayt_word="([\S]*)" data-scaytid="[\d]*">[\S]*?<\/span>/';
		//echo "\r\n  Шаблон:";
		//print_r($expr);
		preg_match_all($expr, $string, $matches); 
		//echo "\r\n";
		//print_r($matches); 
		//			echo "\r\n";
		$KolichestvoSovpadeniy=count($matches[0]);
			if ($KolichestvoSovpadeniy>0) {
				for($iterator=0;$iterator<$KolichestvoSovpadeniy;$iterator++)
					{

					//echo sprintf('Ключ: %s;%s --- %s',$key,$matches[0][$iterator], $matches[1][$iterator]);
					$string=str_replace($matches[0][$iterator], $matches[1][$iterator], $string);
					}
			}

	return $string;
 }
?>