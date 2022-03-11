<?php
    $serverName = "YOUR SERVER NAME HERE";
    $dbUser = "YOUR DATABASE USERNAME HERE";
    $dbPass = "YOUR DATABASE PASSWORD HERE";
    $dbName = "YOUR DATABASE NAME HERE";

    $dbconn = new mysqli($serverName,$dbUser,$dbPass,$dbName);

    if ($dbconn->connect_error) {
        echo "Connection Fails " . $dbconn->connect_error;
    }