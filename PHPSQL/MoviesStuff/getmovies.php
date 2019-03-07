<?php

$server = "localhost";

$user = "root";

$pass = "usbw";

$db = "sakila";

$conn = new mysqli($server, $user, $pass, $db);
// connect to MySQL server

if($conn->connect_error) // check if connection failed
{
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT title,description,release_year FROM film";
// this is just a string

$result = $conn->query($sql);
// query the database
echo "<table>";
while($row = $result->fetch_assoc())
{
    echo "<tr>";
    $title = $row["title"];
    $description = $row["description"];
    $release = $row["release_year"];
    echo "<td>".$title."</td>";
    echo "<td>".$description."</td>";
    echo "<td>".$release."</td>";
    echo "</tr>";
}
echo "</table>";
?>
