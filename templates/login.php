<?php
    include "../connection.php";
    $login = false;
    if (isset($_POST['login'])) {
        $email = $dbconn->real_escape_string($_POST['email']);
        $password = $dbconn->real_escape_string($_POST['pass']);

        $login = true;
        // login validation
        $errors = array();
        // Check if email address do not exit 
        $sql = "SELECT * FROM logins where Email = '$email'";
        $result = $dbconn->query($sql);
        $num_of_rows = $result->num_rows;
        if($num_of_rows == 0){
            array_push($errors,"Email address do not exit!");
        }
        // put result into associative array
        $row = $result->fetch_assoc();
        // check if password match email address
        if ($password !== $row["Pass_word"]) {
            array_push($errors,"Incorrect password!");
        }
        // login user if no error
        $errors_length = count($errors);
        if ($errors_length < 1) {
            header("location:userPage.php");
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
          <a class="navbar-brand text-white fs-5" href="#">Login and Sign Up System</a>
        </div>
    </nav>
    <div class="mt-5 container border border-2 rounded-3" style="width: 40%;">
        <?php 
            if($login){
                if ($errors_length > 0) {
                    foreach ($errors as $error) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo $error ?>
                        </div>
                <?php  
                    // break for each statement to echo only one error
                        break;  
                    }
                }
            }
        ?>
        <h1 class="text-center"> Login</h1>
        <form method="POST" class="fs-4" >
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