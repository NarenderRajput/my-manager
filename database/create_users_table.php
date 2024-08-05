<?php


$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30),
    email VARCHAR(191) NOT NULL,
    password VARCHAR(191) NOT NULL,
    parent_id INT(6) UNSIGNED,
    photo VARCHAR(191),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
