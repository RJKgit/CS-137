<style>
	body{
		border-style: dashed;
	}
	h1{
		text-align: center;
		font-size: 50px;
		padding-top: 20px;
	}

	table{
		font-size: 20px;
	}

	#conf{
		padding-left: 5%;
		text-align: left;
		text-indent: 25px;
		font-size: 25px;
		width:75%;
	}

	#error{
		font-size: 40px;
		padding-top: 20px;
		padding-left: 20px;
		font-weight: bold;
	}

</style>

<?php
	$outString = '<h1>Confirmation Page</h1>'.'<div id=conf>';
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
			&& isset($_POST['quantity'])) {

		$firstName = $_POST['first'];
		$lastName = $_POST['last'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$card = $_POST['card'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$ship = $_POST['ship'];
		$quantity = $_POST['quantity'];

		if(!empty($firstName) && !empty($lastName) && !empty($email)
			&& !empty($phone) && !empty($card) && !empty($street) 
			&& !empty($city) && !empty($state) && !empty($zip)
			&& !empty($ship) && !empty($quantity)){
			$credit = substr_replace($card, '************', 0, 12);
			$confNum = str_shuffle('1234567890');
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
									<td>'.$street.'<br>&nbsp&nbsp&nbsp&nbsp'.$city.', '.$state.' '.$zip.'</td
								</tr>
								<tr>
									<td>
										<strong>Shipping type: </strong>
									</td>
									<td>'.$ship.'</td>
								</tr>
							</table></fieldset>';

			$outString.=$end;
			echo $outString;
		} else{
			echo '<div id=error>Invalid input! Please make sure all the fields are filled!</div>';
		}

	}

?>