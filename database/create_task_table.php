<?php
include "../config/db.php";

$sql = "CREATE TABLE tasks(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    discription VARCHAR(100),
    status VARCHAR(15) NOT NULL
)";

if(mysqli_query($conn, $sql)) {
    echo "Create project table successfully".PHP_EOL;
} else {
    echo "Error creating project table" . mysqli_error($conn).PHP_EOL;
}

mysqli_close($conn);
?>