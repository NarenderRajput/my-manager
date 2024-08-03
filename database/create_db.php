<?php

include_once __DIR__.'/../config/db.php';
$conn = connect();

$sql = "CREATE DATABASE ".DB;

if (mysqli_query($conn, $sql)) {
    echo "create database successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>