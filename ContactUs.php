<?php
require_once 'functions.php';

if( $_REQUEST["Email"] ) {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $subject = $_REQUEST["subject"];
    $phone = $_REQUEST["phone"];
    $message = $_REQUEST["message"];

    $result = queryMysql("INSERT INTO contactUs (name, email, subject, phone, message) values('$name','$email', '$subject', '$phone', '$message'  )");
    echo "Contact Details Received" ;

//    $mailText =

    exit();
}
?>