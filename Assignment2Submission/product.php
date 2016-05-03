<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
    <link rel="stylesheet" href="product.css">
    <?php include 'connection.php';?>
</head>
<body>
   <div class="nav_bar">
        <ul>
          <li><h1>FOOGLE</h1></li>
          <li><a href="home.html">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="about.html">About Us</a></li>
        </ul>
   </div>
    <?php
    $id = $_GET["id"];

    $sql = ' SELECT * from items where id='. $id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        echo '<form action="order.php" method="GET">
            <h6>$'. $row['price'] .'</h6><input type="hidden" name="id" value="'  .$row['id']. '"></input>
            <input type="hidden" name="price" value="'  .$row['price']. '"></input>
            <input type="hidden" name="product_name" value="'  .$row['name']. '"></input>
            <input type="submit" class="info" value="Purchase"/>
        </form>';

        echo '<div>
            <p>'
                . $row['description'] . '
            </p>
        </div>';

        echo '<center>
        <img src='. $row['image2_url'].' >
        <img src='. $row['image3_url'].' >
        </center>';

    } else
        echo "0 results";

    $conn->close();

    ?>
</body>
</html>

