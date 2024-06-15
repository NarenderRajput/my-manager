<?php
$sql = "CREATE DATABASE db";

if (mysqli_query($conn, $sql)) {
    echo "create database successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>