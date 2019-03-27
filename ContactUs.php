<?php
require_once 'functions.php';
header("Access-Control-Allow-Origin: *");

if( $_REQUEST["email"] ) {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $subject = "";
    $phone = $_REQUEST["phone"];
    $message = $_REQUEST["message"];

    $result = queryMysql("INSERT INTO contactUs (name, email, subject, phone, message,seen) values('$name','$email', '$subject', '$phone', '$message', 'false'  )");
    $result2 = queryMysql("UPDATE status SET changed = 'true', contactUs = '1'");
    echo "Contact Details Received" ;

    $mailText = <<<EOD
    Name: $name
    Email: $email
    Subject: $subject
    Phone: $phone
    Message: 
    
    $message
EOD;
    echo "\n\n $mailText\n";
    sendMail('oggybuddy10@gmail.com', $email, $subject, $mailText);


    exit();
}
?>