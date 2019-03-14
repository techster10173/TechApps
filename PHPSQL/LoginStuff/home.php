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
      <a class="navbar-brand">Thank you for logging in
          <?php
                echo $_SESSION["kyahaiuser"];
          ?>
      </a>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" type="button">Make Tweet</a>
    <a href="logout.php"><button class="btn btn-outline-success" type="button">Logout</button></a>

  </form>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Tweet!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="makeTweet.php" method="post">
            <div class="form-group">
                <textarea name="tweetMaker" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary float-right" type="submit">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php

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

$sql = "SELECT tweets.id,users.username,tweets.content,tweets.timer FROM tweets INNER JOIN users ON tweets.userid=users.id";
// this is just a string

$result = $conn->query($sql);
date_default_timezone_set('UTC');
while($row = $result->fetch_assoc()){
    echo "<div class='card text-white bg-primary mb-5' style='max-width: 18rem;'>";
    echo "<div class='card-header'><a style='color:white' href='user.php?name=" . $row["username"] . "'>" . "@" . $row["username"] . "</a></div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>" . $row["content"] . "</h5>";
    echo "<p>" . date($row["timer"]) . "</p>";
    echo "<a style='color:white' href='tweets.php?id=" . $row["id"] . "'>See Full</a>";
    echo "</div></div>";
}

?>
