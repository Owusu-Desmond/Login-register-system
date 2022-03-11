<?php 
    session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['username'])){
?>
        <?php 
            $isUserPage = true;
            $pageTitle = "User Page";
            include_once "../includes/header.php"; 
        ?>
            <div class=" ps-5 container-fiuld fs-3 py-2 bg-dark">
                <i class="bi bi-gear"></i>Welcome <?php echo strtok($_SESSION['username'], " ");?><a href="../index.php" class="btn me-4 btn-info  float-end">Logout<i class="bi bi-box-arrow-left"></i></a>
            </div>
        </body>
        </html>
<?php
    }else{
       header("Location:../index.php");
       exit();
    }
?>