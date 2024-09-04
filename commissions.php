<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

.divbody{
  display:flex
}

#commissionsform {
  background-color: #FFFAF0;
  width:50%;
  border-radius:30px;
  padding:50px;
  margin-left:100px
}

@media (max-width: 600px) {
#commissionsform {
  margin: 0 auto;
}
}

#submit {
  margin-top:30px
}

.image{
  width:20%;
  height:30%;
  margin-top:50px;
  margin-left:50px
}

@media (max-width:600px){
  .image {
    width:80%;
    margin: 0 auto;
    margin-left:30px
  }
  .divbody{
    display:block
  }
}

#examplesheading{
  margin-top:-580px;
  margin-left:420px
}

#successp{
  background-color:#FFFAF0;
  padding:100px;
}

.formsent {
  background-color:#FFFAF0;
  padding:100px;
  float:left;
}

#footer {
  width:100%; 
  bottom:0;
}
.footer-section {
  margin-top:1000px;
  float:left;
  width:33%;
  background-color:#D8BFD8;
  height:150px;
  color:#FFF0F5;

}

        </style>
    </head>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index1.php" style="color:#D8BFD8">Lucia Violeta</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="aboutme.php">About me</a></li>
                        <li class="nav-item"><a class="nav-link" href="commissions.php">Commissions</a></li>
                        <li class="nav-item"><a class="nav-link" href="digital.php">Digital</a></li>
                        <li class="nav-item"><a class="nav-link" href="prints.php">Prints</a></li>
                        <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
                    </ul>
                </div>
            </div>
        </nav>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('menu');

    hamburger.addEventListener('click', function() {
        menu.classList.toggle('open');
    });
});
    </script>

<?php 
if(isset($_POST["SubmitButton"])){
  $hide=1;
  echo '<div class="formsent"> Your form has been submitted.</div>';
}
?>
<div class="divbody">
  <?php if(!isset($hide)) { ?>
<div class= "divform">
  <form id="commissionsform" onsubmit="" method="post" action="" >
    <p>What kind of drawing do you want? </p> <br>
    <input type="text" name="kindofdrawing"/><br>
    <p> Email: </p> 
    <input type="text" name= "email"/>
    <input id="submit" type="submit" onclick= "" name="SubmitButton"/>
</form>
<p id="successp" style="display:none"> Thank you for submitting! We will get back to you shortly </p>
</div>
<?php } ?>

<script>
function hideForm() {
  event.preventDefault();
  var cform = document.getElementById("commissionsform");
  cform.style.display="none";
  var psuccess= document.getElementById("successp");
  psuccess.style.display="block";
};
</script>

<?php 

if(isset($_POST["SubmitButton"])){
$servername="localhost";
$username="root";
$password="";
$dbname="luciavioleta";

$conn = mysqli_connect($servername, $username, $password, $dbname);
 //Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "";

$kindofdrawing= $_POST["kindofdrawing"];
$email= $_POST["email"];

$sql = mysqli_query($conn, "INSERT INTO `commissionsform` (kindofdrawing, email) VALUES ('$kindofdrawing', '$email')");
$conn->close();
};


#CONNECT TO MAIL SERVER
#if(isset($_POST['SubmitButton'])){
#mail("flwebdesignanddevelopment@gmail.com", "Commissions", "Here is the output of the commissions form:");
#};
?>


<img class="image" src="photo1.png">
<img class="image" src="photo2.png">


</div>
<img class="image" src="photo3.png">
<img class="image" src="photo4.png">
<img class="image" src="photo5.png">
<h1 id="examplesheading">Examples:</h1>

<footer id="footer">
  <div class="footer-section">LOGO</div>
  <div class="footer-section"><p>Lucia Villegas Art Production<br>Phone number <br> Address <br> Email</p></div>
  <div class="footer-section">drawing</div>
</footer>
</body>

</html>