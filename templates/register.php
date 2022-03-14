<?php
    session_start();
    include_once "../config/config.php";
    include "../libraries/Database.php";
    $db = new Database();
    $register = false;
    if (isset($_POST['register'])) {
        $username = $db->escapeString($_POST['Uname']);
        $email = $db->escapeString($_POST['email']);
        $password1 = $db->escapeString($_POST['pass1']);
        $password2 = $db->escapeString($_POST['pass2']);

        $register = true;
        // form validation
        $errors = array();
        // check if database contains exiting email address
        $result = $db->fetchUserInfo($email);
        $number_of_rows = $result->num_rows;
        if ($number_of_rows == 1) {
            $error_message = "Email address already taken!";
            array_push($errors,$error_message);  
        }
        // check if passeords match or not
        if ($password1 !== $password2){
            $error_message = "Passwords do not match!";
            array_push($errors,$error_message);
        }
        // register user if no error
        $errors_length = count($errors);
        if($errors_length < 1){
            $db->storeUserInfo($username,$email);
            $db->registerUser($username,$email,$password1);
        }
    }
    $isUserPage = false;
    $pageTitle = "Register";
    include_once "../includes/header.php";
?>
<?php 
        if($register){
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
        <h1 class="text-center">Register</h1>
        <form method="post" class="fs-5" action="<?php echo htmlspecialchars("register.php");?>">
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