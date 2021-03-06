<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<?php
$id = $_GET["id"];

$server = "localhost";

$user = "root";

$pass = "usbw";

$db = "loginassignment";

$conn = new mysqli($server, $user, $pass, $db);
// connect to MySQL server

if($conn->connect_error) // check if connection failed
{
    die("Connection Failed: " . $conn->connect_error);
}

$stmt=$conn->prepare("SELECT users.username,tweets.content,tweets.timer FROM tweets INNER JOIN users ON tweets.userid=users.id WHERE tweets.id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

date_default_timezone_set('UTC');
while($row = $result->fetch_assoc()){
    echo "<div class='card text-white bg-primary mb-5' style='max-width: 18rem;'>";
    echo "<div class='card-header'>" . "@" . $row["username"] . "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . $row["content"] . "</h5>";
    echo "<p>" . date($row["timer"]) . "</p>";
    echo "</div></div>";
}


?>
