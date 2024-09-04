<?php
// Start the session
session_start();

// Predefined username and password (In a real application, retrieve this from a database)
$valid_username = 'admin';
$valid_password = 'password123';

// Get the submitted username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the submitted credentials match the predefined ones
if ($username === $valid_username && $password === $valid_password) {
    // Set session variables
    $_SESSION['username'] = $username;
    echo "<p> Login successful! Welcome," . $_SESSION['username']."</p>";
    // Redirect to a protected page (e.g., dashboard.php)
    // header("Location: dashboard.php");
} else {
    // Invalid credentials
    echo "Invalid username or password.";
}
?>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body{
            height:100%;
            width:100%;
            margin:0
        }
        body{display:flex;
            font-family:Georgia, serif}
p{margin:auto}
a, button{margin:auto}

    </style>
    </head>
    <body>
    <a href="dashboard.php"><button>go to dashboard </button></a>
</body>
    </html>