<?php
    $serverName = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "users";

    $dbconn = new mysqli($serverName,$dbUser,$dbPass,$dbName);

    if ($dbconn->connect_error) {
        echo "Connection Fails " . $dbconn->connect_error;
    }