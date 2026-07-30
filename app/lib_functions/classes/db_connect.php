<?
class db_connect
{
function db_connect()
{
$this->password=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/password.txt");
$this->user=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/user.txt");
$this->server=read_fl($_SERVER['DOCUMENT_ROOT']."/site_information/server.txt");

$this->link = mysql_connect($this->server, $this->user, $this->password)
        or die("Could not connect: " . mysql_error());
}

mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");

function set_query($query)
{
$this->query=$query;
}

function close_connect()
{
mysql_close($this->link);
}

protected:
var $link;
var $server;
var $user;
var $password;
var $query;
}
?> 
