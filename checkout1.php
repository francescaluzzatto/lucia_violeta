<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Checkout - Simple Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID&currency=USD"></script> <!-- Add your PayPal Client ID here -->
</head>
<body>
<table class="table table-bordered table-striped">
				<thead>
					<th></th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>


<?php
	session_start();
	
	// Check if the cart is not empty
	if(empty($_SESSION['cart'])){
		header('Location: index.php');
		exit();
	}

	$total = 0;

	if(!empty($_SESSION['cart'])){
		// Database connection
		$conn = new mysqli('localhost', 'root', '', 'luciavioleta');

        $index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
		
		$sql = "SELECT * FROM product WHERE id IN (".implode(',',$_SESSION['cart']).")";
		$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									<td>
										<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
									<td><?php echo $row['productname']; ?></td>
									<td><?php echo number_format($row['price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
								</tr>
								<?php
								$index ++;
							}
						}

?>
</tbody>
                    </table>

<div class="container">
	<h1 class="page-header text-center">Checkout</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h4>Cart Total: $<?php echo number_format($total, 2); ?></h4>
			
			<div id="paypal-button-container"></div> <!-- PayPal Button will be rendered here -->
		</div>
	</div>
</div>

<script>
	paypal.Buttons({
		createOrder: function(data, actions) {
			// Set up the transaction
			return actions.order.create({
				purchase_units: [{
					amount: {
						value: '<?php echo number_format($total, 2, '.', ''); ?>' // Use the PHP variable for the total amount
					}
				}]
			});
		},
		onApprove: function(data, actions) {
			// Capture the transaction
			return actions.order.capture().then(function(details) {
				// Redirect or inform the user that payment was successful
				alert('Transaction completed by ' + details.payer.name.given_name);
				window.location.href = "success.php?orderID=" + data.orderID;
			});
		}
	}).render('#paypal-button-container'); // Display PayPal button in the container
</script>
</body>
</html>