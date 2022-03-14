<?php
    session_start();
    include_once "config/config.php";
    include "libraries/Database.php";
    $db = new Database();
    $login = false;
    if (isset($_POST['login'])) {
        $email = $db->escapeString($_POST['email']);
        $password = $db->escapeString($_POST['pass']);
        
        $login = true;
        // login validation
        $errors = array();
        // Check if email address do not exit 
        $result = $db->fetchUserInfo($email);
        $num_of_rows = $result->num_rows;
        if($num_of_rows == 0){
            array_push($errors,"Email address do not exit!");
        }else {
            // put result into associative array
            $row = $result->fetch_assoc();
            // check if password match email address
            if ($password !== $row["Pass_word"]) {
                array_push($errors,"Incorrect password!");
            }
        }
        
        // login user if no error
        $errors_length = count($errors);
        if ($errors_length < 1) {
            // storing user information to be used in home page.
            $db->storeUserInfo($row["Username"],$row["Email"]);
            header("location:templates/userPage.php");
        }
    }
    include_once "templates/login.php";
?>