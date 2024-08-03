<?php

$sql = "CREATE TABLE tasks(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(60) NOT NULL,
    member_id INT(6) UNSIGNED,
    discription VARCHAR(255),
    status VARCHAR(15) NOT NULL
)";

if(mysqli_query($conn, $sql)) {
    echo "Create project table successfully".PHP_EOL;
} else {
    echo "Error creating project table" . mysqli_error($conn).PHP_EOL;
}


?>