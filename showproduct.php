<?php
	session_start();
	//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	//unset qunatity
	unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
          html, body{
    height:100%;
    width:100%
  }
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

        .productdiv{
            float:left;
            margin-left:150px;
            margin-top:100px
        }
        #img {
        float:left;
    }
        .productdescription{
            float:right;
            margin-left:20px;
            background-color: #fffaf0;
            padding-top:20px;
            padding-left:20px;
            padding-right:200px;
            padding-bottom: 130px;
            border-radius: 50px
        }
        #productname {
            font-size:50px
        }

        @media (max-width: 600px) {
    
                .productdiv{
                    margin-left:0px;
        
                }
                #img{width:100px}
        }
        #footer {
  width:100%; 
  margin-top:600px
}

.footer-section {
  float:left;
  width:33%;
  margin-top:200px;
  background-color:#D8BFD8;
  height:150px;
  color:#FFF0F5
}
    </style>
</head>
<body>
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
    <ul class="nav navbar-nav navbar-right">
	      	<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	      </ul>
    <?php

if(isset($_SESSION['message'])){
    ?>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            <div class="alert alert-info text-center">
                <?php echo $_SESSION['message']; ?>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['message']);
}

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
 
     if (isset($_GET['id'])) {
         $id = intval($_GET['id']);
         $sql = "SELECT * FROM product WHERE id = $id";
         $result = $conn->query($sql);
 
         if ($result->num_rows > 0) {
             // Output data of each row
             while($row = $result->fetch_assoc()) {
                ?> <div class="productdiv">
                     <img id="img" style="border-radius:20px;width:350px" src="data:image/jpg;charset=utf;base64, <?php echo base64_encode($row["productimage"]); ?>"/>
                     <?php
                echo "<div class='productdescription'> <p id='productname'>".$row["productname"]."</p><br>
                 ".$row["productdescription"]."</div>"; ?>
                <form action="view_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                 <button>Add to cart</button>
             </form>
             <div class="row product_footer">
							<p class="pull-left"><b><?php echo $row["price"]; ?></b></p>
							<span class="pull-right"><a href="add_cart.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
						</div>
                </div>
                <?php
             }
         } else {
             echo "0 results";
         }
     } else {
         //echo "No ID specified.";
     }

    $conn->close();
    ?>
    <div id="footer">
  <div class="footer-section">LOGO</div>
  <div class="footer-section"><p>Lucia Villegas Art Production<br>Phone number <br> Address <br> Email</p></div>
  <div class="footer-section">drawing</div>
</div>
</body>
</html>