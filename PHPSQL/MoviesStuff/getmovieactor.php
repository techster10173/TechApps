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

$sql = "SELECT first_name,last_name,film_info FROM actor_info";
// this is just a string

$result = $conn->query($sql);
// query the database
echo "<table>";
while($row = $result->fetch_assoc())
{
    echo "<tr>";
    $title = $row["first_name"];
    $description = $row["last_name"];
    $release = $row["film_info"];
    echo "<td>". $title . " " . $description . "</td>";
    echo "<td>".$release."</td>";
    echo "</tr>";
}
echo "</table>";
?>
