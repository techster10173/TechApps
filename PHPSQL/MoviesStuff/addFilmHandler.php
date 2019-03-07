<?php
$server = "localhost";
$user = "root";
$pass = "usbw";
$db = "sakila";

$name = $_POST["FName"];
$des = $_POST["Description"];
$lang = $_POST["Language"];


$conn = new mysqli($server, $user, $pass, $db);
// connect to MySQL server

if($conn->connect_error)
// check if connection failed
{
    die("Connection Failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO film (title, description, language_id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $name, $des, $lang);
$stmt->execute();
?>
