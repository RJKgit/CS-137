<?php
$servername = "localhost";
$username = "inf124grp06";
$password = "#e4ubreF";
$db = "inf124grp06";

try {

    $pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
//$pdo = null;
?>

