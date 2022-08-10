<?php

$patientname = $_POST["patientname"];
$dateofBirth = $_POST["dateofBirth"];
$nationality = $_POST["nationality"];
$diseases = $_POST["diseases"];
$gender = $_POST["gender"];
$residence = $_POST["residence"];
$comments = $_POST["comments"];


// echo $patientname."<br>";
// echo $dateofBirth."<br>";
// echo $nationality."<br>";
// echo $diseases."<br>";
// echo $gender."<br>";
// echo $residence."<br>";
// echo $comments."<br>";


// $sql = "INSERT INTO patient VALUES(NULL,'$patientname','$dateofBirth','$nationality','$diseases','$gender','$residence','$comments')";

$mysqli = mysqli_connect("localhost","root","","patient");

if($mysqli->connect_error){
    die('Connection Fails Again : '.$mysqli->connect_error);
}else{
    $stmt = $mysqli->prepare(("insert into patient(patientname, dateofBirth, nationality, diseases, gender, residence, comments) values(?,?,?,?,?,?,?)"));
    $stmt->bind_param("sdsssss",$patientname, $dateofBirth, $nationality, $diseases, $gender, $residence, $comments);
    $stmt->execute();
    echo "Thanks for registering";
    $stmt->close();
    $mysqli->close();
}

?>