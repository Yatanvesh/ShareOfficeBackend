<?php
require_once 'functions.php';

if( $_REQUEST["email"] ) {
    $email = $_REQUEST["email"];
    echo "Subscribed for  ". $email ;
    $result = queryMysql("INSERT INTO mailingList (email, seen) values('$email', 'false')");
    $result2 = queryMysql("UPDATE status SET changed = 'true', mailingList = '1'");
    $mailText = <<<EOD
    New Subscriber!
    
    Email: $email
    
EOD;

    sendMail('oggybuddy10@gmail.com', $email, 'New Subscriber! > ' . $email, $mailText);
    exit();
}
?>