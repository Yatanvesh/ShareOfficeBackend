<?php
require_once 'functions.php';

if( $_REQUEST["email"] ) {
    $email = $_REQUEST["email"];
    echo "Subscribed for  ". $email ;
    $result = queryMysql("INSERT INTO mailingList (email) values('$email')");
    exit();
}
?>