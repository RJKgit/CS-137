<style>

    h1{
    	padding-top: 100px;
    	text-align: center;
    	font-size: 35px;
    }

    table{
    	font-size: 20px;
    }

    #conf {
    	padding-top: 10px;
    	padding-left: 150px;
    	font-size: 25px;
    	width: 70%;
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

<?php
	require 'connect.php';
	$outString = '<div class="nav_bar">
					    <ul>
					      <li><h1>FOOGLE</h1></li>
					      <li><a  href="home.html">Home</a></li>
					      <li><a href="products.html">Products</a></li>
					      <li><a href="about.html">About Us</a></li>
					    </ul>
					</div>';
	$outString .= '<h1>Confirmation Page</h1>'.'<div id=conf>';
	$start = 'Congratulation on making your purchase! Listed below are the details of your order.
	Please review your order to make sure everything is correct and make sure to print a copy for your 
	records. If you have any problems, 
	please send us an email!<br><br>';
	$end = '<br>Thank You for shopping with FOOGLE!</div>';
	$outString .= $start;
	if (isset($_POST['first']) && isset($_POST['last']) 
			&& isset($_POST['email']) && isset($_POST['phone'])
			&& isset($_POST['card']) && isset($_POST['street']) 
			&& isset($_POST['city']) && isset($_POST['state'])
			&& isset($_POST['zip']) && isset($_POST['ship']) 
			&& isset($_POST['quantity'])) 
	{

		$firstName = htmlentities($_POST['first']);
		$lastName = htmlentities($_POST['last']);
		$email = htmlentities($_POST['email']);
		$phone = htmlentities($_POST['phone']);
		$card = htmlentities($_POST['card']);
		$street = htmlentities($_POST['street']);
		$city = htmlentities($_POST['city']);
		$state = htmlentities($_POST['state']);
		$zip = htmlentities($_POST['zip']);
		$ship = htmlentities($_POST['ship']);
		$quantity = htmlentities($_POST['quantity']);
		$id = $_POST['id'];
		$price = $_POST['price'];
		$name = $_POST['product'];
		$name = str_replace('_', ' ', $name);
		$total = $price * $quantity;
		$standard = 24.99;
		$twoDay = 74.99;
		$overnight = 99.99;

		if (strtolower($ship) == 'standard'){
			$total += $standard;
		} else if (strtolower($ship) == 'two-day'){
			$total += $twoDay;
		} else {
			$total += $overnight;
		}

		if(!empty($firstName) && !empty($lastName) && !empty($email)
			&& !empty($phone) && !empty($card) && !empty($street) 
			&& !empty($city) && !empty($state) && !empty($zip)
			&& !empty($ship) && !empty($quantity))
		{
			$credit = substr_replace($card, '************', 0, 12);
			$confNum = str_shuffle('0123456789');
			$outString .= 'Confirmation Number: '.$confNum.'<br><br>';

			$outString .= '<fieldset><table>              
								<tr>
									<td>
										<strong>Purchaser: </strong>
									</td>
									<td>'.$firstName.' '.$lastName.'</td>
								</tr>
								<tr>
									<td>
										<strong>Email Address: </strong>
									</td>
									<td>'.$email.'<td>
								</tr>
								<tr>
									<td>
										<strong>Phone Number: </strong
									</td>
									<td>'.$phone.'</td>
								</tr>	
								<tr>
									<td> 
										<strong>Credit Card: </strong>
									</td>
									<td>'.$credit.'</td
								</tr>
								<tr>
									<td> 
										<strong>Address: </strong>
									</td>
									<td>'.$street.' '.$city.', '.$state.' '.$zip.'</td
								</tr>
								<tr>
									<td>
										<strong>Shipping type: </strong>
									</td>
									<td>'.$ship.'</td>
								</tr>
								<tr>
									<td>
										<strong>Product ID: </strong>
									</td>
									<td>'.$id.'</td>
								</tr>
								<tr>
									<td>
										<strong>Product Name: </strong>
									</td>
									<td>'.$name.'</td>
								</tr>
								<tr>
									<td>
										<strong>Quantity: </strong>
									</td>
									<td>'.$quantity.'</td>
								</tr>
								<tr>
									<td>
										<strong>Shipping Method: </strong>
									</td>
									<td>'.$ship.'</td>
								</tr>
								<tr>
									<td>
										<strong>Total: </strong>
									</td>
									<td>$'.$total.'</td>
								</tr>
							</table></fieldset>';

			$outString.=$end.'<br><br>';
			echo $outString;

			// Storing info to database
			$insert1 = "INSERT INTO customers (id, first_name, last_name, email, phone_number, street_address, city, state, zipcode, creditcard_number) 
					VALUES (NULL, '".$firstName."', '".$lastName."', '".$email."', '".$phone."', '".$street."', '".$city."', '".$state."', '".$zip."', '".$card."')";
		
			if ($conn->query($insert1) === true){
				echo '';
			}
			$select = "(SELECT id FROM customers
						WHERE id = (SELECT MAX(id) FROM customers))";

			$cust = $conn->query($select)->fetch_assoc();
			$cust = $cust['id'];
			$insert2 = "INSERT INTO orders (orderNo, quantity, shipping_method, total, items_id, confirmation_number, customer_id)
						VALUES (NULL, '".$quantity."', '".$ship."', '".$total."', '".$id."', '".$confNum."', '".$cust."')";

			if ($conn->query($insert2) === true){
				echo '';
			}

			$conn->close();
		} 
	}
?>




