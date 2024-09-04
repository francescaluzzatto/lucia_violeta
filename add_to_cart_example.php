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

$product_id = $_POST['product_id'];
$user_session = session_id();

// Check if the product is already in the cart
$sql = "SELECT * FROM cart WHERE product_id = $product_id AND user_session = '$user_session'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Update quantity if product is already in the cart
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = $product_id AND user_session = '$user_session'";
} else {
    // Add new product to the cart
    $sql = "INSERT INTO cart (product_id, user_session) VALUES ($product_id, '$user_session')";
}

if ($conn->query($sql) === TRUE) {
    echo "Product added to cart";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: cartexample.php');
?>