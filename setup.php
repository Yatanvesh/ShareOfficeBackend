
<?php
require_once 'functions.php';

createTable('enquiries','Name varchar(60),Email varchar(40),City varchar(30), MoveIn varchar(20), TeamSize varchar(30), MoveInDate varchar(30), Company varchar(40), phone varchar(15), Location varchar(20), AdditionalNotes varchar(200)');

createTable('mailingList','email varchar(40) NOT NULL UNIQUE ,INDEX(email(20))');

createTable('contactUs','Name varchar(60),Subject varchar(80),Email varchar(40), Phone varchar(15), Message varchar(2000)');
?>
