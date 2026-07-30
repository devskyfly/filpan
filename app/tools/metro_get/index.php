<?
set_time_limit(0); 
require('read_fl.php');
require('write_fl.php');
$query='';
$text='';
$text=read_fl('metro.txt');
$template='/href=\"([\w|\s|\W|^]*?)\">([\w|\s|\W|^]*?)<\/a>/';
$fl_array = preg_match_all($template, $text,$answer);


$iterator=0;
while($answer[1][$iterator]&&$answer[2][$iterator]  )
{
printf('%s---%s<br>',"http://www.zapravitb-cart.ru/rayoni_moscow/".$answer[1][$iterator],$answer[2][$iterator] );
$text=file_get_contents ("http://www.zapravitb-cart.ru/rayoni_moscow/".$answer[1][$iterator]);

$template_for_text='/ <td width="50%">([\w|\s|\W|^]*?)<\/td>/';
$fl_array = preg_match_all($template_for_text, $text, $answer_text);


$iterator_text=0;
$all_streets='';
while($answer[1][$iterator_text])
{
//printf('%s ',$answer_text[1][$iterator_text]);



$template_for_row="/([\w|\s|\W|^]*?)<br>/";
$fl_array = preg_match_all($template_for_row,$answer_text[1][$iterator_text],$answer_row);

$iterator_row=0;

while($answer_row[1][$iterator_row])
{
$all_streets=$all_streets.$answer_row[1][$iterator_row].";";
//echo $answer_row[1][$iterator_row];
$iterator_row++;
}

$iterator_text++;
}
echo $all_streets;
$templ=array('               ',sprintf('\n'),sprintf('\r'),sprintf('\t'),);
$query.=sprintf("INSERT INTO metro_streets (metro, streets) VALUES ('%s', '%s');\r\n",$answer[2][$iterator],str_replace($templ,'',$all_streets));

//break;
$iterator++;
}

write_fl('out.txt',$query);



?>