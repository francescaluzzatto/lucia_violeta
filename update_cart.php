<?php
//header('Content-Type: application/json');

// Database connection
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "luciavioleta";

//$conn = new mysqli($servername, $username, $password, $dbname);

//if ($conn->connect_error) {
//    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
//}

// Read the raw input data
//$input = json_decode(file_get_contents('php://input'), true);

//$itemId = $input['id'];
//$quantity = $input['quantity'];

// Update the cart item quantity
//$stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
//$stmt->bind_param("ii", $quantity, $itemId);

//if ($stmt->execute()) {
//    echo json_encode(['success' => true]);
//} else {
//    echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
//}

//$stmt->close();
//$conn->close();

session_start();
if (!isset($_SESSION['user_session'])) {
    // Generate a new session id if not already set
    $_SESSION['user_session'] = session_id();
}

$session_id = $_SESSION['user_session'];
$product_id = $_POST['product_id'];
$new_quantity = $_POST['quantity'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luciavioleta";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update quantity in the database
$sql = "UPDATE cart SET quantity = ? WHERE user_session = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $new_quantity, $session_id, $product_id);

if ($stmt->execute()) {
    echo "Quantity updated successfully";
} else {
    echo "Error updating quantity: " . $conn->error;
}

$stmt->close();
$conn->close();

?>