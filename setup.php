
<?php
require_once 'functions.php';

createTable('enquiries','id INT NOT NULL AUTO_INCREMENT,primary key (id),Name varchar(60),Email varchar(40),City varchar(30), MoveIn varchar(20), TeamSize varchar(30), MoveInDate varchar(30), Company varchar(40), phone varchar(15), Location varchar(20), AdditionalNotes varchar(200), Seen varchar(10)');

createTable('mailingList','email varchar(40) NOT NULL UNIQUE ,INDEX(email(20)),id int not null auto_increment,primary key (id),Seen varchar(10)');

createTable('contactUs','Name varchar(60),Subject varchar(80),Email varchar(40), Phone varchar(15), Message varchar(2000),id int not null auto_increment,primary key (id),Seen varchar(10)');

createTable( 'status', 'changed varchar(10), enquiries varchar(10), mailingList varchar(10), contactUs varchar(10)');
$result = queryMysql("INSERT INTO status (changed, enquiries, mailingList, contactUs) values('false','0', '0', '0' )");

?>
