<?php
session_start();

$server = "localhost";
$user = "root";
$pass = "usbw";
$db = "loginassignment";


$content = $_POST["tweetMaker"];
echo $_SESSION["myID"];

$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO tweets (content,userid) VALUES (?,?)");
$stmt->bind_param("si", $content, $_SESSION["myID"]);
$stmt->execute();

preg_match_all('/(#\w+)/', $content, $matches);

header("Location:home.php");

?>
