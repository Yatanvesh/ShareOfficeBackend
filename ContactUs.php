<?php
require_once 'functions.php';

if( $_REQUEST["Email"] ) {
    $name = $_REQUEST["Name"];
    $email = $_REQUEST["Email"];
    $subject = $_REQUEST["Subject"];
    $phone = $_REQUEST["Phone"];
    $message = $_REQUEST["Message"];

    $result = queryMysql("INSERT INTO contactUs (name, email, subject, phone, message) values('$name','$email', '$subject', '$phone', '$message'  )");
    echo "Contact Details Received" ;
    exit();
}
?>