<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
          body {
  margin: 0;
  font-family: Georgia, serif;
}

.hamburger-menu {
    position: relative;
}

.hamburger {
    cursor: pointer;
    padding: 15px;
}

.hamburger .line {
    width: 30px;
    height: 3px;
    background-color: #333;
    margin: 5px 0;
}

.menu {
    display: none;
    position: absolute;
    top: 50px;
    left: 0;
    width: 100%;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu li {
    border-bottom: 1px solid #ddd;
}

.menu li a {
    display: block;
    padding: 15px;
    text-decoration: none;
    color: #333;
}

.menu .submenu {
    display: none;
    padding-left: 15px;
}

.menu.open {
    display: block;
}

@media (min-width: 600px) {
    .menu {
        display: block;
        position: static;
        box-shadow: none;
        background-color: transparent;
    }

    .menu ul {
        display: flex;
    }

    .menu li {
        border-bottom: none;
        position: relative;
    }

    .menu .submenu {
        display: block;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .menu li:hover .submenu {
        display: block;
    }

    .hamburger {
        display: none;
    }
}

#cartprintsbutton{
    margin-left:20px;
    background-color:#8fbc8f;
  border-radius:50px;
  border:1.5px solid black;
  padding:10px;
  color:#fffaf0;
  font-family: Georgia, serif;
  font-size:15px
}

.paragraph {
    background-color:#FFFAF0;
    padding:50px
}

#footer {
  width:100%; 
}
.footer-section {
  float:left;
  width:33%;
  margin-top:100%;
  background-color:#D8BFD8;
  height:150px;
  color:#FFF0F5
}

#img{float:left;
}

.productdiv{
    vertical-align:top;
 display:inline-block;
 text-align:center;
 padding:20px
}

.pproductname{
display:block
}

.pproductdescription{
    display:block
}
    </style>
</head>

<div class="hamburger-menu">
        <div class="hamburger" id="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="menu" id="menu">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="aboutme.php">About me</a>
                    
                </li>
                <li>
                    <a href="commissions.php">Commissions</a>
                </li>
                <li>
                    <a href="digital.php">Digital</a>
                </li>
                <li>
                    <a href="prints.php">Prints</a>
                </li>
                <li>
                    <a href="portfolio.php">Portfolio</a>
                </li>
            </ul>
        </nav>
    </div>
<p class="paragraph">Lorem Ipsum</p>

<a href="cartprints.php"><button id="cartprintsbutton"> go to cart </button></a>

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

$sql = "SELECT * FROM `product` WHERE selectplace='b' ORDER BY `id` DESC ";
$query= mysqli_query($conn, $sql);
if ($query->num_rows > 0) {
    // output data of each row
    while($row = $query->fetch_assoc()) { ?>
    <div class="productdiv">
      <?php
        ?>
        <img id= "img"style= "border-radius: 20px; width: 350px" src= "data:image/jpg;charset=utf;base64, <?php  echo base64_encode($row["productimage"]); ?>" />
    <?php echo "<span class='pproductname'>".$row["productname"]."</span> <span class='productname'>".$row["productdescription"]."</span>" ?>
      </div>
    <?php
    }
}

?>

<div id="footer">
  <div class="footer-section">LOGO</div>
  <div class="footer-section"><p>Lucia Villegas Art Production<br>Phone number <br> Address <br> Email</p></div>
  <div class="footer-section">drawing</div>
</div>

</html>