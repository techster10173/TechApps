<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<nav class="navbar navbar-light bg-light justify-content-between">
  <form class="form-inline">
      <a class="navbar-brand">
          <?php
          $uname = $_GET["name"];

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
          session_start();
          echo "@" . $_GET["name"];
          $_SESSION["dude"] = $_GET["name"];

          $pql = "SELECT id FROM users WHERE username='" . $_GET["name"]."'";
          $besult=$conn->query($pql);
          $temp;

          while($row = $besult->fetch_assoc()){
              $temp = $row["id"];
          }

          echo "<button type='button' class='btn btn-secondary'>";
          $sql = "SELECT COUNT(followers.followee) FROM followers WHERE followers.followee!=" . $temp;
          $result = $conn->query($sql);

          while($row = $result->fetch_array()){
              echo $row[0];
          }

          echo " Following</button>";

          echo "<button type='button' class='btn btn-secondary'>";
          $sql = "SELECT COUNT(followers.followee) FROM followers WHERE followers.followee=" . $temp;
          $result = $conn->query($sql);

          while($row = $result->fetch_array()){
              echo $row[0];
          }

          echo " Followers</button>";
          ?>
      </a>
  </form>
  <form action="follow.php" method="post">
        <button type="submit" class="btn btn-primary">Follow</button>
  </form>
  <form action="unfollow.php" method="post">
        <button type="submit" class="btn btn-primary">UnFollow</button>
  </form>
</nav>
<div class="card-deck">
<?php

$stmt=$conn->prepare("SELECT users.username,tweets.content,tweets.timer FROM tweets INNER JOIN users ON tweets.userid=users.id WHERE users.username = ?");
$stmt->bind_param("s", $uname);
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
</div>
