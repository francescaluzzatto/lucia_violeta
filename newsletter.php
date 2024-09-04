<html>
    <head>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
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
.newsletterform {
    margin-top: 100px
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

<div class="newsletterform">
    
<form id="contactForm" onsubmit="" method="post" action="">
    <h1>Sign up here to get your monthly newsletter</h1>
    <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
    <div class="d-grid"><input type="submit" class="btn btn-primary btn-xl" id="submitButton" type="submit" name="SubmitButton"/></div>
</form>
</div>

<?php 

if(isset($_POST["SubmitButton"])){
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


$email= $_POST["email"];

$sql = mysqli_query($conn, "INSERT INTO `newsletter` (`email`) 
VALUES ('$email')");
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
};

?>
<script type="text/javascript" src="https://form.jotform.com/jsform/241684528722058"></script>
</html>