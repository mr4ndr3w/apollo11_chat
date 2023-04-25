<?php
$lnk = mysqli_connect("localhost", "user", "password","chat");


$servername = "localhost";
$username = "user";
$password = "password";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 

