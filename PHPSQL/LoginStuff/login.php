<?php
$server = "localhost";
$user = "root";
$pass = "usbw";
$db = "loginassignment";


$username = $_POST["userna"];
$password = $_POST["passwo"];


$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}

recordExists();

function recordExists() {
        $query = "SELECT username,password FROM `users` WHERE $username=username AND $password=password";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            header("Location:home.php");
        }else{
            console.log("false");
        }
         // No record found
}

 ?>
