<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        html, body{
            height:100%;
            width:100%;
            margin:0
        }
        body{display:flex;
        font-family:Georgia, serif}
        .logindiv{
            margin:auto;
            background-color: #fffaf0;
            padding: 50px;
            border-radius:50px;
            border:solid black 1px
        }
        h2{color:#ad83ad}
    </style>
</head>
<body>
    <div class="logindiv">
    <h2>Login Form</h2>
    <form action="login2.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
</body>
</html>