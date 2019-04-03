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
$bello = $conn->insert_id;

$keywords;
preg_match_all('/#(\w+)/',$content,$matches);
foreach($matches[1] as $match){

    $stmt = $conn->prepare("INSERT INTO hashtags (content) VALUES (?)");
    $stmt->bind_param("s", $match);
    $stmt->execute();

    $stmt->close();

    $hello = $conn->insert_id;
    $yolo = $conn->prepare("INSERT INTO hashtagstotweets (tweetid,hashtagid) VALUES (?,?)");
    $yolo->bind_param("ii", $bello, $hello);
    $yolo->execute();
}

foreach($keywords as $key){

}

header("Location:home.php");

?>
