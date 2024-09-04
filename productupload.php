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
//echo "<pre>";
//print_r($_FILES['productimage']);
//echo "</pre>";
$MY_FILE= $_FILES["productimage"]['tmp_name'];
$file = fopen($MY_FILE, 'r');
$file_contents = fread($file, filesize($MY_FILE));
fclose($file);
$file_contents = addslashes($file_contents);

$selectplace = $_POST["selectplace"];
$productname= mysqli_real_escape_string($conn, $_POST["productname"]);

$productdescription= mysqli_real_escape_string($conn, $_POST["productdescription"]);

$sql = mysqli_query($conn, "INSERT INTO `product` (productimage, productname, productdescription, selectplace) VALUES ('$file_contents', '$productname', '$productdescription', '$selectplace')");

?>
<a href="viewimages.php"><button> View Images </button></a>
<a href="digital.php"><button> Go to digitals </button></a>
<a href="prints.php"><button> Go to prints </button></a>
<?php
$conn->close();
?>