<?php

function sendTestMail(){
    $to = "oggybuddy10@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";

    mail($to,$subject,$txt,$headers);
}

function sendMail($to, $from, $subject, $txt){
    $to = "oggybuddy10@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";

    mail($to,$subject,$txt,$headers);
}
function sendMailText($txt){
    $to = "oggybuddy10@gmail.com";
    $subject = "My subject";
    $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";
    mail($to,$subject,$txt,$headers);
}

sendTestMail();

?>