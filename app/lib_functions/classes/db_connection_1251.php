<?php
//Класс позволяет подключаться к серверу, выбирать базу данных указанную в файле date base name.txt 
//и создает ее, если таковой не имеется, и создает структуру таблиц для хранения данных
class db_connection_1251
{

var $link;
var $server;
var $user;
var $password;

var $datebase_name;
var $date_base_is_here;

var $query;

var $result;//резульат заброса
var $f_array;//ассоциативный массив результата запроса




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Конструктор класса
function db_connection_1251()
{
$this->date_base_is_here=false;
$this->password=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/password.txt");
$this->user=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/user.txt");
$this->server=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/server.txt");

$this->link = mysql_connect($this->server, $this->user, $this->password)
        or die("Could not connect: " . mysql_error());
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Проверка на наличие нужной БД
function current_datebases()
{
$db_list = mysql_list_dbs($this->link);
$this->datebase_name=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/datebase name.txt");
//Проверяем какие базы есть
while ($row = mysql_fetch_object($db_list)) 
{
    //echo $row->Database . "<br>\n";
	if($row->Database==$this->datebase_name)
	{
	$this->date_base_is_here=true;
	//echo "База данных:".$this->datebase_name. " -присутствует в списке<br>\n";
	break;
	}
	
}
//Создаем базу данных, если ее нет
	if($this->date_base_is_here==false)
	{
	echo "Создана база данных:".$this->datebase_name. "<br>\n";
	$query="CREATE DATABASE ".$this->datebase_name;
	$result=mysql_query ( $query ,$this->link)
	or die("Invalid query: " . mysql_error());
	}
//Подключаемся к нужной базе данных
	mysql_select_db($this->datebase_name,$this->link) or die ('Can\'t use '.$this->datebase_name.' : ' . mysql_error());
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Посылает запрос к БД и Записывает результат в f_array
function set_query()
{
$this->result=mysql_query($this->query);

$this->f_array=array();
$iterator=0;

if(($this->result)==1)
{

return;
}
	while($row=mysql_fetch_array($this->result))
	{
	$this->f_array[$iterator]=$row;
	
	$size=count($this->f_array[$iterator]);
	$keys=array_keys($this->f_array[$iterator]);
	
	$iterator=$iterator+1;
	}
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Отсоединение от базы
function close_connection()
{
mysql_close($this->link);
}
}

?>
