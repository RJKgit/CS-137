
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <?php include 'connection.php';?>
</head>
<body>
<?php

    $city = $_GET["city"];
    $state = $_GET["state"];
    $zip = $_GET["zip"];
    $counter = 1;
    $max = 5;
    $hint = "";


    if ($city != "") {
        $sql = ' SELECT distinct city FROM location WHERE city LIKE "'. $city. '%" AND state LIKE "'. $state. '%" AND zip LIKE "' . $zip. '%"';
        $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $hint .= "[ ". $row['city'] . " ] ";

        if ($counter >= $max) {
            break;
        }
        $counter++;
    }
} else if ($state != "") {
    $sql = ' SELECT distinct state FROM location WHERE city LIKE "'. $city. '%" AND state LIKE "'. $state. '%" AND zip LIKE "' . $zip. '%"';
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $hint .= "[ ". $row['state'] . " ] ";

        if ($counter >= $max) {
            break;
        }
        $counter++;
    }
} else if ($zip != "") {
    $sql = ' SELECT distinct zip FROM location WHERE city LIKE "'. $city. '%" AND state LIKE "'. $state. '%" AND zip LIKE "' . $zip. '%"';
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $hint .= "[ ". $row['zip'] . " ] ";

        if ($counter >= $max) {
            break;
        }
        $counter++;
    }
}
//// lookup all hints from array if $q is different from ""
//if ($city !== "") {
//    $city = strtolower($city);
//    $len=strlen($city);
//    foreach($result["city"] as $elem) {
//        if (stristr($city, substr($elem, 0, $len))) {
//            if ($hint === "") {
//                $hint = $elem;
//            } else {
//                $hint .= ", $elem";
//            }
//        }
//    }
//}

// Output "no suggestion" if no hint was found or output correct values
    echo $hint === "" ? "no suggestion" : $hint;
?>

</body>
</html>