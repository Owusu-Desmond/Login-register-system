<?php
    $serverName = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "users";

    $db = new mysqli($serverName,$dbUser,$dbPass,$dbName);

    if ($db->connect_error) {
        echo "Connection Fails " . $db->connect_error;
    }else{
        echo "Connection Successfully";
    }
    