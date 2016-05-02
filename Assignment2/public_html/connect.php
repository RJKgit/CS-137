<?php
$servername = 'sylvester-mccoy-v3.ics.uci.edu';
$username = 'inf124grp06';
$password = 'secret';
$dbname = "inf124grp06";
// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);
// Error for bad connection
if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
} 
?>
