<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="products.css">
        <?php include 'connection.php';?>
    </head>
    <body>
        <div class="nav_bar">
            <ul>
                <li><h1>FOOGLE</h1></li>
                <li><a  href="home.html">Home</a></li>
                <li><a class="active" href="products.php">Products</a></li>
                <li><a href="about.html">About Us</a></li>
            </ul>
        </div>
        
        <?php
        
            $sql = 'SELECT * from items';
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                echo '<h3></h3><div class="products"><center><table>';
                
                while($row = $result->fetch_assoc()){
                    $str = "product.php?id=".$row['id'];
                    echo '<tr>';
                    
                    echo '<td><a href='.$str.'><img src='.$row['image1_url'].'></a></td>';
                    echo '<td>';
                    echo 'ID: '.$row['id'].'<br/>';
                    echo 'Name: '.$row['name'].'<br/>';
                    echo 'Material: '.$row['material'].'<br/>';
                    echo '<div class="price">$'.$row['price'].'</div><br/>';
                    echo '<a href='.$str.' class="info">More Info</a>';
                    echo '</td>';
                    
                    echo '</tr>';
                    
                }
                echo '</table></center></div>';
            }
            else{
                echo "0 results";
            }
            $conn->close();
        ?>
    </body>
    
</html>
