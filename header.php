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
?>

<!DOCTYPE html>

<html>
<head>
    <head>
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">
            <!--Header-->
            <header>
                <div class="container">
                    <nav class="nav">
                        <a class="" href="index.php">
                            <img class="" src="logo.png" alt="" />
                        </a>
                        <ul class="menu" style="display:flex;">
                            <li class="menuItem">
                                <a href="index.php" class="menuText">Home</a>
                            </li>
                            <li class="menuItem">
                                <a class="menuText" href="about.php">About Us</a>
                            </li>
                            <li class="menuItem">
                                <a class="menuText" href="games.php">Games</a>
                            </li>
                            <li class="menuItem">
                                <a class="menuText" href="search.php">Search</a>
                            </li>
                        </ul>
                        <div class="menuItem" style="display: block">
                            <a class="menuText" href="login.php">Sign In</a>
                        </div>
                    </nav>
                </div>
            </header>