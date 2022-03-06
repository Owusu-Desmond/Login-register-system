<?php
    include "connection.php";
    // if (!isset($_POST['login'])) {
    //     echo "hi here";
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/solar/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand text-white fs-5" href="#">Login and Sign Up System</a>
        </div>
    </nav>
    <div class="mt-5 container border border-2 rounded-3" style="width: 40%;">
        <h1 class="text-center"> Login</h1>
        <form method="POST" class="fs-4" action="register.php">
            <div class="mt-4 form-group">
                <label for="Uname" class="form-label">Username</label>
                <input name="Uname" id="Uname" type="text" class="form-control" required>
            </div>
            <div class="mt-4 form-group">
                <label for="email" class="form-label">Email</label>
                <input name="email" id="email" type="email" class="form-control" required>
            </div>
            <div class="mt-4 form-group">
                <label for="pass" class="form-label">Password</label>
                <input name="pass" id="pass" type="password" class="form-control" required>
            </div>
            <div class="my-4 form-group">
                <input name="login" id="login" type="submit" value="Login" class="form-control btn btn-primary" required>
            </div>
            <div class="my-4">
                <p class="text-center">Don`t have an acount please <a href="templates/register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>