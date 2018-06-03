<?php 
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */
include '../../database/connect_mysql.php';

$sql = "DELETE FROM COMPETITION WHERE ID = " . $_POST["id"] . ";";
$conn->query($sql);
$conn->close();
header("Location: http://localhost/events_app/?p=competitions");

?>