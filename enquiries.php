<?php
require_once 'functions.php';
header("Access-Control-Allow-Origin: *");


if( $_POST["email"] ) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $movein = $_POST["movein"];
    $teamsize = $_POST["teamsize"];
    $moveindate = $_POST["moveindate"];
    $company = $_POST["company"];
    $mobile = $_POST["mobile"];
    $area = $_POST["area"];
    $additionalNotes = $_POST["additionalnotes"];
//   echo $name .'    '. $email .'    '.  $city .'    '.  $movein .'    '.  $teamsize .'    '.  $moveindate .'    '.  $company .'    '.  $mobile .'    '.  $area .'    '.  $additionalNotes ;

    $result = queryMysql("INSERT INTO enquiries (name, email, city, MoveIn, TeamSize,MoveInDate,Company, phone, Location,AdditionalNotes, Seen ) values('$name', '$email', '$city', '$movein', '$teamsize', '$moveindate','$company','$mobile','$area', '$additionalNotes' ,'false' )");
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