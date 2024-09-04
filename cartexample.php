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
$sql = "SELECT cart.id, product.productname, product.price, cart.quantity, product.productimage, cart.product_id
        FROM cart 
        JOIN product ON cart.product_id = product.id 
        WHERE cart.user_session = '$user_session'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
        .cart {
            display: flex; justify-content: center; 
        }
        .cart-item {
            margin: 0 auto;
            padding:50px;
            background-color: grey;
            shadow:5px;
            border-radius: 50px
        }
        h1 {text-align:center}
        .button-container{display:flex;justify-content:center}
        .button{
            margin:10px;
            display:inline-block;
            background-color:#8fbc8f;
            border-radius:50px;
            border:1.5px solid black;
            padding:10px;
            color:#fffaf0;
            font-family: Georgia, serif;
            font-size:15px}
    </style>

</head>
<body>
    <h1>Your Cart</h1>
    <div class="cart-container" id="cart-container">
    <div class="cart">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="cart-item" id="cart-item" data-product-id=<?php echo $row['product_id'];?>>
                <h2><?php echo $row['productname']; ?></h2>
                <img id="img" style="border-radius:20px;width:150px" src="data:image/jpg;charset=utf;base64, <?php echo base64_encode($row["productimage"]); ?>"/>
                <p>Price: $<?php echo $row['price']; ?></p>
                <div class="quantity-selector"><p>Quantity:</p>
        <button class="minus-btn" onclick="decrement(this)">-</button>
        <input type="number" id="quantity" class="quantity" value="1" min="1">
        <button class="plus-btn" onclick="increment(this)">+</button>
    </div>
                <p>Quantity: <?php echo $row['quantity']; ?></p>
                <span class="quantity">1</span>
                <p>Subtotal: $<?php echo $row['price'] * $row['quantity']; ?></p>
                
            </div>
 
        <?php endwhile; ?>
    </div>
        </div>

    <script>
var item= document.getElementsByClassName("cart-item");

function increment(element) {
    //var quantityInput = document.getElementById('quantity');
    let quantityInput = element.closest("div.cart-item").querySelector(".quantity");
    var productId = element.closest("div.cart-item").getAttribute('data-product-id');
    var currentValue = parseInt(quantityInput.value);
    //var quantitySpan = element.closest("div.cart-item").querySelector('.quantity');
    quantityInput.value = currentValue + 1;
    //var newQuantity = parseInt(quantitySpan.innerText) + 1;
    //updateQuantity(element.closest("div.cart-item").dataset.itemId, quantityInput.value);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the quantity in the UI
            //quantityInput.innerText = quantityInput.value;
            quantityInput.innerText = quantityInput.value;
        }
    };
    xhr.send('product_id=' + productId + '&quantity=' + quantityInput.value);
}

function decrement(element) {
    //var quantityInput = document.getElementById('quantity');
    let quantityInput = element.closest("div.cart-item").querySelector(".quantity");
    var productId = element.closest("div.cart-item").getAttribute('data-product-id');
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
    
    //updateQuantity(element.closest("div.cart-item").dataset.itemId, quantityInput.value);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the quantity in the UI
            quantityInput.innerText = quantityInput.value;
        }
    };
    xhr.send('product_id=' + productId + '&quantity=' + quantityInput.value);
}


//function updateQuantity(itemId, quantity) {
//       let url = "http://localhost/luciavioleta/cartexample.php";
//       window.location.href=url+"?id" +itemId+"&quantity"+quantity;
//       alert("changed quantity");
//    }
function updateQuantity(itemId, quantity) {
        fetch('update_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: itemId, quantity: quantity }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Cart updated successfully');
            } else {
                console.error('Error updating cart:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }


    </script>

    <?php 
    
    
    ?>
    <div class="button-container">
    <a href="index.php" class="button">Continue Shopping</a><br>
    <a href="checkout.php" class="button"> go to checkout </a>
        </div> 
</body>

</html>