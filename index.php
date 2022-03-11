<?php
    session_start();
    include_once "connection.php";
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
        
        // storing user information to be used in home page.
        $_SESSION['email'] = $row["Email"];
        $_SESSION['username'] = $row["Username"];
        // check if password match email address
        if ($password !== $row["Pass_word"]) {
            array_push($errors,"Incorrect password!");
        }
        // login user if no error
        $errors_length = count($errors);
        if ($errors_length < 1) {
            header("location:templates/userPage.php");
        }
    }
    include_once "templates/login.php";
?>