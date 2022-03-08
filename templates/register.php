<?php
    include "../connection.php";
    if (isset($_POST['register'])) {
        $username = $_POST['Uname'];
        $email = $_POST['email'];
        $password1 = $_POST['pass1'];
        $password2 = $_POST['pass2'];

        // check if database contains exiting email address
        $check_sql = "SELECT * FROM logins WHERE Email = '$email'";
        $result = $dbconn->query($check_sql);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows == 1) {
            $error_message = sprintf('<div class="alert alert-danger" role="alert"> Email address already taken!</div>');
            echo $error_message;  
        }else{
            $sql = "INSERT INTO logins (Username,Email,Pass_word) VALUES ('$username','$email','$password1')";
            
            if ($dbconn->query($sql) === TRUE) {
                echo "New record inserted";
            }else {
                echo "Failed to insert a record". $db->error;
            }
        }
    }
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
          <a class="navbar-brand text-white fs-4" href="#">Login and Register System</a>
        </div>
    </nav>
    <div class="mt-5 container border border-2 rounded-3" style="width: 40%;">
        <h1 class="text-center">Register</h1>
        <form method="post" class="fs-5">
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
                <input name="pass1" id="pass" type="password" class="form-control" required>
            </div>
            <div class="mt-4 form-group">
                <label for="pass" class="form-label">Comfirm Password</label>
                <input name="pass2" id="pass2" type="password" class="form-control" required>
            </div>
            <div class="my-4 form-group">
                <input id="register" type="submit" value="Register" name="register" class="form-control btn btn-primary" required>
            </div>
            <div class="my-4">
                <p class="text-center">Have an acount please <a href="../index.php">Login in</a></p>
            </div>
        </form>
    </div>
</body>
</html>