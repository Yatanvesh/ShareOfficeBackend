<?php
require_once 'functions.php';
header("Access-Control-Allow-Origin: *");


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

    $result = queryMysql("INSERT INTO enquiries (name, email, city, MoveIn, TeamSize,MoveInDate,Company, phone, Location, Seen ) values('$name', '$email', '$city', '$movein', '$teamsize', '$moveindate','$company','$mobile','$area', '$additionalNotes' ,'false' )");
    $result2 = queryMysql("UPDATE status SET changed = 'true', enquiries = '1'");

    echo "Enquiry Received" ;

    $mailText = <<<EOD
    Name: $name
    Email: $email
    City: $city
    Moving in Date: $movein         $moveindate
    Team size: $teamsize
    Company: $company
    Phone: $mobile
    Area: $area
    Additional Notes: 
    $additionalNotes
    
EOD;
    echo "\n\n $mailText";
    sendMail('oggybuddy10@gmail.com', $email, 'New Enquiry > ' . $name, $mailText);
    exit();
}
?>