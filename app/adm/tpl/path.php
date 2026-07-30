<?

mysql_connect("127.0.0.1","u3558310_filpan","filpan") or die ("Îøèáêà");
mysql_select_db("u3558310_filpan") or die ("Îøèáêà1");

mysql_query("CREATE TABLE tprub (
id INT NOT NULL AUTO_INCREMENT,
rub CHAR(250) NOT NULL, 
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE subtprub (
id INT NOT NULL AUTO_INCREMENT,
idrub INT(5) NOT NULL, 
rub CHAR(250) NOT NULL, 
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE proiz (
id INT NOT NULL AUTO_INCREMENT,
idrub INT(5) NOT NULL, 
rub CHAR(250) NOT NULL, 
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE func (
id INT NOT NULL AUTO_INCREMENT,
idrub INT(5) NOT NULL, 
rub CHAR(250) NOT NULL, 
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE usltprub (
id INT NOT NULL AUTO_INCREMENT,
rub CHAR(250) NOT NULL, 
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE uslsodraz(
id INT NOT NULL  AUTO_INCREMENT,
raz INT(5) NOT NULL,
idraz INT(5) NOT NULL,
nazv CHAR(250) NOT NULL, 
descr LONGTEXT NOT NULL, 
xcl LONGTEXT, 
price CHAR(10) NOT NULL, 
papka CHAR(2) NOT NULL,
pict CHAR(20) NOT NULL,
pict1 CHAR(20) NOT NULL,
super INT(2) NOT NULL,
proiz INT(2) NOT NULL,
func INT(2) NOT NULL,
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE sodraz(
id INT NOT NULL  AUTO_INCREMENT,
raz INT(5) NOT NULL,
idraz INT(5) NOT NULL,
nazv CHAR(250) NOT NULL, 
descr LONGTEXT NOT NULL, 
xcl LONGTEXT, 
price CHAR(10) NOT NULL, 
papka CHAR(2) NOT NULL,
pict CHAR(20) NOT NULL,
pict1 CHAR(20) NOT NULL,
super INT(2) NOT NULL,
proiz INT(2) NOT NULL,
func INT(2) NOT NULL,
PRIMARY KEY (id) 
)");
			
mysql_query("CREATE TABLE korzin ( 
id INT NOT NULL AUTO_INCREMENT, 
sessid CHAR(50), 
nazv CHAR(250) NOT NULL, 
cena CHAR(100),
log CHAR (250), 
pass CHAR(100),
kolvo INT(10), 
permission INT(1), 
dat CHAR(100), 
datcode CHAR(100), 
code CHAR(100),
codepr CHAR(100),
status INT(5),
perprod INT(5),
perpok INT(5),
PRIMARY KEY (id) 
)");  

mysql_query("CREATE TABLE reg ( 
id INT NOT NULL AUTO_INCREMENT, 
name CHAR(150), 
log CHAR(50), 
pas CHAR(100), 
email CHAR(150),
tel CHAR(150),
ad LONGTEXT NOT NULL,
permission INT(1), 
PRIMARY KEY (id) 
)");  

mysql_query("CREATE TABLE pages(
id INT NOT NULL  AUTO_INCREMENT,
page CHAR(50) NOT NULL, 
ssil CHAR(50) NOT NULL, 
text LONGTEXT NOT NULL,
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE subscribe(
id INT NOT NULL  AUTO_INCREMENT,
thema CHAR(100) NOT NULL, 
email CHAR(50) NOT NULL, 
cont CHAR (250) NOT NULL,
permission INT(2) NOT NULL,  
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE uslproiz (
id INT NOT NULL AUTO_INCREMENT,
idrub INT(5) NOT NULL, 
rub CHAR(250) NOT NULL, 
idraz INT(5) NOT NULL, 
PRIMARY KEY (id) 
)");

mysql_query("CREATE TABLE uslfunc (
id INT NOT NULL AUTO_INCREMENT,
idrub INT(5) NOT NULL, 
rub CHAR(250) NOT NULL, 
idraz INT(5) NOT NULL, 
PRIMARY KEY (id) 
)");

//mysql_query("ALTER TABLE subtprub ADD idraz INT(5) AFTER rub");

//$pp=mysql_query("UPDATE subtprub SET idraz=\"1\"");


$result=mysql_query("SELECT * FROM sodraz");
$fields=mysql_num_fields($result);
while ($Row=mysql_fetch_row($result)){	
		for($i=0;$i<$fields;$i++){	
			echo "$Row[$i]<br>";
		}
	}
echo mysql_errno().": ".mysql_error()."<br>";

?>