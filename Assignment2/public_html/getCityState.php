<?php
echo "<pre>\n";
require_once "pdo.php";
try {
    
 $zip;//parameter coming from the onblur action of order.html form
 $city;
 $state ;
    
$stmt = $pdo->prepare("SELECT city,state FROM locations WHERE zip = :zipcode");
$query->bindParam(':zipcode', $zip);//First parameter of the method is name of the parameters, second is the value we want to replace with
$query-execute();

//Using the fetch() method will return ONE result from the query
$city= $fetch['city'];
$state=$fetch['state'];



//The PDO::FETCH_ASSOC mode instructs the fetch() method to return a result set as an array indexed by column name.
//$stmt->setFetchMode(PDO::FETCH_ASSOC);
//$zip = $stmt->fetchAll();

}catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

echo "</pre>\n";?>