<?php
require_once 'functions.php';



if( $_REQUEST["email"] ) {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $city = $_REQUEST["city"];
    $movein = $_REQUEST["movein"];
    $teamsize = $_REQUEST["teamsize"];
    $moveindate = $_REQUEST["moveindate"];
    $company = $_REQUEST["company"];
    $mobile = $_REQUEST["mobile"];
    $area = $_REQUEST["area"];
    $additionalNotes = $_REQUEST["additionalnotes"];
//   echo $name .'    '. $email .'    '.  $city .'    '.  $movein .'    '.  $teamsize .'    '.  $moveindate .'    '.  $company .'    '.  $mobile .'    '.  $area .'    '.  $additionalNotes ;

    $result = queryMysql("INSERT INTO enquiries (name, email, city, MoveIn, TeamSize,MoveInDate,Company, phone, Location, AdditionalNotes) values('$name', '$email', '$city', '$movein', '$teamsize', '$moveindate','$company','$mobile','$area', '$additionalNotes'  )");
    echo "Enquiry Received" ;
    exit();
}
?>