<?php
    $isUserPage = false;
    $pageTitle = "Login";
    include "includes/header.php";
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
            <div class="mt-4 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                <a  class="btn float-end fs-5" data-bs-toggle="modal" data-bs-target="#forgetPasswordToggle">
                  Forget Password
                </a>

            </div>
            <div class="my-4 form-group">
                <input name="login" id="login" type="submit" value="Login" class="form-control btn btn-primary" required>
            </div>
            <div class="my-4">
                <p class="text-center">Don`t have an acount please <a href="templates/register.php">Register</a></p>
            </div>
        </form>
        <!-- Forgert password Modals -->

        <!--first modal to verify if email exit-->
        <div class="modal fade" id="forgetPasswordToggle" data-bs-backdrop="static" aria-hidden="true"  tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Enter Your Email Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST">
                <div class="modal-body">
                  <div class="my-4 form-group">
                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter your Exiting Email" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" id="verifyEmail" data-bs-target="#verifyEmailToggle" data-bs-toggle="modal">Verify</button>
                </div>
              <form>
            </div>
          </div>
        </div>

        <!--second modal to set new password-->

        <div class="modal fade" data-bs-backdrop="static" id="verifyEmailToggle" aria-hidden="true" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Set Your New Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST">
                <div class="modal-body">
                  <div class="my-4 form-group">
                      <label for="pass" class="form-label">New Password</label>
                      <input name="pass" id="pass" type="password" class="form-control" required>
                  </div>
                  <div class="my-4 form-group">
                      <label for="pass" class="form-label">Confirm New Password</label>
                      <input name="pass" id="pass" type="password" class="form-control" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-dismiss="modal">Set Password</button>
                </div>
              <form>
            </div>
          </div>
        </div>
      <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>          
</body>
</html>
<!-- <form method="POST" class="fs-4" >
                  
                  
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
              </form> -->