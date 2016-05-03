<!doctype html>
<html>

<head>
    <title>Process Order</title>
    <style type="text/css">
            input {
                    padding: 5px;
                    margin: 5px;
            }
            form {
                    margin-top: 100px;
                    border: ridge;
                    border-color: #4CAF50;
                    padding: 20px;

            }
            .nav_bar {

                        position:absolute;
                        z-index:0;
                        left:0;
                        top:0;
                        width:100%
                }

                .nav_bar ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    overflow: auto;
                    background-color: #333;
                }

                .nav_bar li {
                    float: left;
                }

                .nav_bar li h1 {
                    color: orange;
                    padding: 10px;
                }

                .nav_bar li a {
                    display: block;
                    color: white;
                    text-align: center;
                    padding: 40px 20px;
                    text-decoration: none;
                }

                 .nav_bar a:hover:not(.active) {
                    background-color: #111;
                }

    </style>
    <script src="order.js"></script>
</head>

<body>
	<div class="nav_bar">
	            <ul>
	              <li><h1>FOOGLE</h1></li>
	              <li><a  href="home.html">Home</a></li>
	              <li><a href="products.html">Products</a></li>
	              <li><a href="about.html">About Us</a></li>
	            </ul>
       	 </div>
    <form action="confirmation.php" name="emailForm" onsubmit="return(validateForm());" method="POST">
            <fieldset>
                <legend>Product Information</legend>
                <table>
                    <tr>
                        <td>ID</td>
                        <td><?php echo $_GET['id'];?></td>    
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $_GET['product_name'];?></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>$<?php echo $_GET['price'];?></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td><input type="number" name="quantity" value="1" min="0" autofocus/></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Personal Information</legend>
                <table>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="first" value="Amit"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="last" value="Dhingra"/></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value="ad@yahoo.com"/></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><input type="text" name="phone" value="9493885267"/></td>
                    </tr>
                    <tr>
                        <td>Credit Card Number</td>
                        <td><input type="text" name="card" value="1234567891234567" maxLength="16" placeholder="16 digits"/></td>
                    </tr>
                    <tr>
                        <td>Street Address</td>
                        <td><input type = "text" name="street" value="1010 king"/></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input type = "text" name="city" value="Alameda"/></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><input type = "text" name="state" value="CA" maxlength="2" placeholder="eg. 'CA'"/></td>
                    </tr>
                    <tr>
                        <td>Zip Code</td>
                        <td><input type = "text" name="zip" value="94501" maxlength="5"/></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Shipping Information</legend>
                <table>
                    <tr>
                        <td>Shipping Method</td>
                        <td>
                            <input type="radio" name="ship" value="Overnight"/>Overnight ($99.99)<br/>
                            <input type="radio" name="ship" value="Two-Day"/>2-Day ($74.99)<br/>
                            <input type="radio" name="ship" value= "Standard" checked/>Standard ($24.99)<br/>
                        </td>
                    </tr>
                </table>
            </fieldset><br/>
            <div id="total">TOTAL: </div><br/>
            <label id="errorMsg" style="visibility: hidden; color: red;"></label><br/>
            <input type="submit" value="Process Order"/>
            <?php
                $name = $_GET['product_name'];
                $name = str_replace(' ', '_', $name);
                echo '<input type="hidden" name="id" value='.$_GET['id'].'></input>';
                echo '<input type="hidden" name="price" value='.$_GET['price'].'></input>';
                echo '<input type="hidden" name="product" value='.$name.'></input>';
            ?>

	</form>
</body>


</html>









