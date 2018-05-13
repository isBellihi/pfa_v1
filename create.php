<?php
var_dump($_POST);
exit();
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pfa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO competition (firstname, lastname, email)
VALUES ('" + $_POST['name1'] + "','" + $_POST['name2'] + "');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>