<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not, redirect to the login page
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            height:100%;
            width:100%;
            margin:0
        }
        body{
            display:flex;
            font-family:Georgia, serif
        }
        h1, form, p, input, select {margin:auto}
        .form {background-color: #fffaf0;
        padding:50px;
    border-radius:50px;
border:solid black 1px}
        h1{color:#ad83ad}

</style>
</head>
<body>
<h1>UPLOAD NEW PRODUCT</h1>
<form class= "form" action="productupload.php" method="post" enctype="multipart/form-data">
<p>Upload where?</p>
<select name="selectplace">
    <option value="a">Digital</option>
    <option value="b">Prints</option>
</select>
<p>Upload photo</p> <input type="file" name="productimage" accept="image/png, image/jpeg"/>
<p>Product name </p> <input type="text" name="productname"/>
<p>Description </p><input type="text" name="productdescription"/><br>
<button type="submit" name="submit">submit</button>
</form>
</body>
</html>