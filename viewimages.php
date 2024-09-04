<?php 
session_start();

ini_set('error_reporting', true);
error_reporting(E_ALL);

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

$sql = "SELECT * FROM `product`";
$query= mysqli_query($conn, $sql);
if ($query->num_rows > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) {
        echo $row["productname"]."<br>".$row["productdescription"]."<br>"
        ?>
        <img id= "img"style= "border-radius: 20px; width: 350px" src= "data:image/jpg;charset=utf;base64, <?php  echo base64_encode($row["productimage"]); ?>" />
    <?php
    }
}

?>