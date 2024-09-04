<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="luciavioleta";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$kindofdrawing= $_POST["kindofdrawing"];
$email= $_POST["email"];

$sql = mysqli_query($conn, "INSERT INTO `commissionsform` (kindofdrawing, email) VALUES ('$kindofdrawing', '$email')");



$conn->close();
?>