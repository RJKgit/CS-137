<?php
$servername = 'localhost';
$username = 'inf124grp06';
$password = '#e4ubreF';
$dbname = "inf124grp06";
// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);
// Error for bad connection
if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
} 
?>
