<?php
$servername = "sylvester-mccoy-v3.ics.uci.edu";
$username = "inf124grp06";
$password = "#e4ubreF";
$dbname = "inf124grp06";

try {

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$pdo = null;
?>

