<?php
$servername = "localhost";
$username = "root";
$password = ""; // No password
$database = "assignment_db";

$conn = new mysqli($servername, $username, $password, $database, 3307);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
