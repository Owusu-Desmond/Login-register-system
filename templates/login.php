<?php
    $isUserPage = false;
    $pageTitle = "Login";
    include_once "includes/header.php";
?>
        <?php  
            if($login){
                if ($errors_length > 0) {
                    foreach ($errors as $error) { 
        ?>
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