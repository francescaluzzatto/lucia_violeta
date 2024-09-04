<!DOCTYPE html>
<html>
    <head>
        <title>Lucia Violeta's Art</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

.bannerimage {
    height:500px;
    width:100%;
    background-color: #FFFAF0;
    margin-top:-100px
}
#loginbutton {
  position:relative;
  margin-left:90%;
  margin-top:-150px;
  background-color:#D8BFD8;
  border-radius:50px;
  border:1.5px solid black
}
.divcontainer{
  width:100%; 
  margin-top:100px;
  position:relative;
  display:flex;
}

#div1, #div2, #div3 {
margin:auto
}

#div1{
    height:150px;
    width:150px;
    float:left;
    border:solid 5px black;
    border-radius:30px;
    /*margin-left:27%;*/
    margin-right:50px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);}
#div2{
    height:150px;
    width:150px;
    float:left;
    border:solid 5px black;
    border-radius:30px;
    margin-right:50px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);}
#div3{
    height:150px;
    width:150px;
    float:left;
    border:solid 5px black;
    border-radius:30px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);}
.divp{
    margin-top:120px;
    background-color:#D8BFD8;
    padding:20px;
    padding-left:30px;
    border-radius: 30px
}

@media screen and (max-width: 800px){

    #div1, #div2, #div3 {
      margin:0 auto;
    margin-top:100px;}
}

.newsletterdiv{
    width:100%;
    text-align:center
}

#newsletterbutton{
  margin-top:200px;
  background-color:#8fbc8f;
  border-radius:50px;
  border:1.5px solid black;
  padding:30px;
  color:#fffaf0;
  font-family: Georgia, serif;
  font-size:23px
}
#newsletterlink {
    color:white;
    text-decoration:none
}

.socialmediadiv{text-align:center;
margin-top:150px}

#footer {
  width:100%; 
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('menu');

    hamburger.addEventListener('click', function() {
        menu.classList.toggle('open');
    });
});
    </script>


<a href="login.php"><button id="loginbutton">Log In </button></a>

<div class= "bannerimage">
</div>

<div class= "divcontainer" data-aos="fade-down">
    <div id ="div1"><img><p class="divp">About Me</p></div>
    <div id="div2"><img><p class="divp">Shop</p></div>
    <div id= "div3"><img><p class="divp">Portfolio</p></div>
</div>
<br>

<div class="newsletterdiv"> 
<a id="newsletterlink" href="newsletter.php"><button id="newsletterbutton">Sign up for our newsletter!</a></button>
</div>

<div class="socialmediadiv">
<a href="https://wa.me/whatsappphonenumber" target="_blank"><i class="fa fa-whatsapp" style="font-size:36px;color:green"></i></a>
<a href="https://www.instagram.com/luciavioleta.illos/"><i class="fa fa-instagram" style="font-size:36px;color:#FF1493"></i></a>
</div>

<div id="footer">
  <div class="footer-section">LOGO</div>
  <div class="footer-section"><p>Lucia Villegas Art Production<br>Phone number <br> Address <br> Email</p></div>
  <div class="footer-section">drawing</div>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>