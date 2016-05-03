<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "inf124grp06";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Error for bad connection
if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
} 
?>