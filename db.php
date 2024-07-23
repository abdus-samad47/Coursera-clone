<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "coursera_clone";  
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>