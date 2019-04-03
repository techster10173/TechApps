<?php
    session_start();
    if($_SESSION["kyahaiuser"] == ""){
        header("Location:landing.html");
    }
?>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<nav class="navbar navbar-light bg-light justify-content-between">
  <form class="form-inline">
      <a class="navbar-brand">
          Who Am I Following?
      </a>
  </form>
</nav>
<?php
$server = "localhost";
$user = "root";
$pass = "usbw";
$db = "loginassignment";


$conn = new mysqli($server, $user, $pass, $db);

if($conn->connect_error)
{
    die("Connection Failed: " . $conn->connect_error);
}


$sql = "SELECT users.id,users.username FROM users INNER JOIN followers ON followers.followee=users.id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<div class='card text-white bg-primary mb-5' style='max-width: 18rem;'>";
    echo "<div class='card-header'><a style='color:white' href='user.php?name=" . $row["username"] . "'>" . "@" . $row["username"] . "</a></div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'><a href='unfollow.php?user=" . $row["id"] . "'><button class='btn btn-secondary'>Unfollow</button></a></h5>";
    echo "</div></div></div>";
}



?>
