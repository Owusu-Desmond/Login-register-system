<?php
    include "config/config.php";
    $serverName = DB_HOST;
    $dbUser = DB_USER;
    $dbPass = DB_PASS;
    $dbName = DB_NAME;

    $dbconn = new mysqli($serverName,$dbUser,$dbPass,$dbName);

    if ($dbconn->connect_error) {
        echo "Connection Fails " . $dbconn->connect_error;
    }