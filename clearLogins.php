<?php
$servername = "localhost";
$username = "a6c2c0fcb394";
$password = "c898120599e04cd7";
$dbname = "gamestart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "TRUNCATE TABLE logins";
                    
$result = $conn->query($sql);

$conn->close();

echo "<script>location.href='admin.php';</script>";

?>