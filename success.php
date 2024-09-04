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

$paymentId = $_GET['paymentId'];
$user_session = session_id();

// Retrieve cart items
$sql = "SELECT cart.id, product.id AS product_id, product.productname, product.price, cart.quantity 
        FROM cart 
        JOIN product ON cart.product_id = product.id 
        WHERE cart.user_session = '$user_session'";
$result = $conn->query($sql);

// Create order
$order_sql = "INSERT INTO orders (payment_id, user_session) VALUES ('$paymentId', '$user_session')";
$conn->query($order_sql);
$order_id = $conn->insert_id;

// Insert order items
while ($row = $result->fetch_assoc()) {
    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $order_item_sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
    $conn->query($order_item_sql);
}

// Clear cart
$clear_cart_sql = "DELETE FROM cart WHERE user_session = '$user_session'";
$conn->query($clear_cart_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Payment Successful</h1>
    <p>Thank you for your purchase! Your payment ID is <?php echo $paymentId; ?>.</p>
    <a href="index.php">Continue Shopping</a>
</body>
</html>