<?php
$server = "localhost";
$user = "root";
$pass = "usbw";
$db = "loginassignment";

session_start();
$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}

// $blah = $_GET["user"];

$sql = "DELETE FROM followers WHERE followers.followee=" . $_SESSION["myID"];
$result = $conn->query($sql);

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
