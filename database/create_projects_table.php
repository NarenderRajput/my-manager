<?php

$sql = "CREATE TABLE projects (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    projectname VARCHAR(191) NOT NULL,
    url VARCHAR(60),
    discription VARCHAR(255),
    price Decimal(8,2) NOT NULL,
    deadline DATE NOT NULL,
    photo VARCHAR(191) NOT NULL
)";

if(mysqli_query($conn, $sql)) {
    echo "Create project table successfully".PHP_EOL;
} else {
    echo "Error creating project table" . mysqli_error($conn).PHP_EOL;
}


?>