<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luciavioleta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_session = session_id();
$sql = "SELECT cart.id, product.productname, product.price, cart.quantity, product.productimage 
        FROM cart 
        JOIN product ON cart.product_id = product.id 
        WHERE cart.user_session = '$user_session'";
$result = $conn->query($sql);
$total = 0;

while ($row = $result->fetch_assoc()) {
    $total += $row['price'] * $row['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script>
    <style>
        h1{text-align:center}
        .cart {
            display: flex; justify-content: center; 
        }
        .cart-item {
            margin: 0 auto
        }
        .form-container{display:flex;justify-content: center}
        #checkout-form{
            margin: 0 auto
        }

    </style>
</head>
<body>
    <h1>Checkout</h1>
    <div class="cart">
        <?php
        $result->data_seek(0); // Reset result set pointer
        while ($row = $result->fetch_assoc()): ?>
            <div class="cart-item">
            <img id="img" style="border-radius:20px;width:150px" src="data:image/jpg;charset=utf;base64, <?php echo base64_encode($row["productimage"]); ?>"/>
                <h2><?php echo $row['productname']; ?></h2>
                <p>Price: $<?php echo $row['price']; ?></p>
                <p>Quantity: <?php echo $row['quantity']; ?></p>
                <p>Subtotal: $<?php echo $row['price'] * $row['quantity']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
    <h2>Total: $<?php echo $total; ?></h2>
   
        <h1> Pay here:  </h1>
    <div class="form-container">
        <p>Enter your contact information and address so we know where to find you!</p>
        <form id="checkout-form">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Physical Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="zip">ZIP Code</label>
                <input type="text" id="zip" name="zip" required>
            </div>
            <div id="paypal-button-container"></div>
        </form>
    </div>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                const form = document.getElementById('checkout-form');
                    const formData = new FormData(form);
                    const email = formData.get('email');
                    const address = formData.get('address');
                    const city = formData.get('city');
                    const state = formData.get('state');
                    const zip = formData.get('zip');
                    
                    // Normally, you'd send this data to your server here
                    console.log("Email: ", email);
                    console.log("Address: ", address);
                    console.log("City: ", city);
                    console.log("State: ", state);
                    console.log("ZIP: ", zip);
                return actions.order.create({
                
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>'
                        }
                        shipping: {
                                address: {
                                    address_line_1: address,
                                    admin_area_2: city,
                                    admin_area_1: state,
                                    postal_code: zip,
                                    country_code: 'US' // Replace with the actual country code
                                }
                            }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    window.location.href = 'success.php?paymentId=' + details.id;
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>