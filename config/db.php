<?php

define('DB', 'mymanager');

function connect(
    $dbname = null,
    $servername = "localhost",
    $username = "root",
    $password = ""
) {

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("connection failed:" . mysqli_connect_error());
    }
    //echo "Connected successfully" . PHP_EOL;
    return $conn;
}

function db_connect() {
    return connect(DB);
}
