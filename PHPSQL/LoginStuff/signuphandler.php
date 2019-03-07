<?php
$server = "localhost";
$user = "root";
$pass = "usbw";
$db = "loginassignment";


$username = $_POST["usern"];
$password = $_POST["passw"];


$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

 ?>
