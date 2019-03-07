<?php
$server = "localhost";
$user = "root";
$pass = "usbw";
$db = "sakila";

$fname = $_POST["ActorFName"];
$lname = $_POST["ActorLName"];


$conn = new mysqli($server, $user, $pass, $db);
// connect to MySQL server

if($conn->connect_error)
// check if connection failed
{
    die("Connection Failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO actor (first_name, last_name) VALUES (?, ?)");
$stmt->bind_param("ss", $fname, $lname);
$stmt->execute();
?>
