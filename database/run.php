<?php

include_once __DIR__.'/../config/db.php';
$conn = db_connect();

$tables = [
    'users', 'projects', 'tasks'
];

foreach ($tables as $table) {
    $sql = "DROP TABLE IF EXISTS ".$table;

    if(mysqli_query($conn, $sql)) {
        echo "removed $table table successfully".PHP_EOL;
    } else {
        echo "Error creating $table table" . mysqli_error($conn).PHP_EOL;
    }
}

include_once "create_projects_table.php";
include_once "create_users_table.php";
include_once "create_task_table.php";

mysqli_close($conn);
