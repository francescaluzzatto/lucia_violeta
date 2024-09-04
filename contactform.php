<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="luciavioleta";
#$servername = "31.11.39.154";
#$username = "Sql1794371";
#$password = "LuvFral9012!";
#$database = "Sql1794371_1";

$conn = mysqli_connect($servername, $username, $password, $dbname);
 //Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connection succeeded!";

$name= $_POST["fullname"];
$email= $_POST["email"];
$phonenumber= $_POST["phonenumber"];
$message= $_POST["message"];
error_reporting(E_ALL);

$sql = mysqli_query($conn, "INSERT INTO `contact` (name, email, phonenumber, message) 
VALUES ('$name', '$email', '$phonenumber', '$message')");
error_reporting(E_ALL);

//$to = "flwebdesignanddevelopment@gmail.com";
//$subject = "My subject";
//$txt = "Hello Lucia! Here is the contact information and email sent to you from the home page of your website:<br>
//name:".$name." email:".$email."phone number:".$phonenumber."<br>message:".$message;
//$sender = "postmaster@luciavioleta.it";
//$headers = "From: $sender\n";

//if (mail($to, $subject, $txt, $headers,"-f$sender")) {
//    echo "Mail inviata correttamente!";
//} else {
//    echo "<br><br>Recapito e-Mail fallito!";
//}
//mail($to,$subject,$txt);

$conn->close();

?>