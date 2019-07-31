<?php
$servername = "127.0.0.1";
$username = "root";
$password = "password";
<<<<<<< HEAD
$dbname = "lawyer";
=======
$dbname = "todo_list";
>>>>>>> cdc38375574ff869219774eaa9f4112f9c4ba735

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>