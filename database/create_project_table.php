<?php
include '../config/db.php';

$sql = "CREATE TABLE project (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    projectname VARCHAR(30) NOT NULL,
    url VARCHAR(40),
    discription VARCHAR(100),
    price Decimal(8,2) NOT NULL,
    deadline DATETIME NOT NULL,
    photo VARCHAR(50) NOT NULL
)";

if(mysqli_query($conn, $sql)) {
    echo "Create project table successfully".PHP_EOL;
} else {
    echo "Error creating project table" . mysqli_error($conn).PHP_EOL;
}

mysqli_close($conn);
?>