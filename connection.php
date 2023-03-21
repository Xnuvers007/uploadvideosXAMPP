<?php

require_once ('config.php');

// $conn = mysqli_connect("127.0.0.1", "root", "", "stream"); # IP, Username, Password, Databases

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

#;var_dump($conn);

?>
