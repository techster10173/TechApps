<?php
session_start();

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

        $stmt = $conn->prepare("SELECT username FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();

        $getuser = $conn->prepare("SELECT id FROM users WHERE username=?");
        $getuser->bind_param("s",$username);
        $getuser->execute();
        $getuser->bind_result($row);
        $getuser->fetch();

        if(($stmt->num_rows) > 0) {
            header("Location:home.php");
            $_SESSION["kyahaiuser"] = $username;
            $_SESSION["myID"] = $row;
        }else{
            echo "<script type='text/javascript'>alert('Oops your username or password might be wrong...Try Again?');window.location='landing.html';</script>";
        }

 ?>
