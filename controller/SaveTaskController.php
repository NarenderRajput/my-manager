<?php
include "../config/app.php";
include "../config/db.php";
include "../helper/common.php";

unset($_SESSION["errors"]);

$title= $discription = $member_id = $status = $data = "";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["errors"] = [];
    $data .= "'" . $_SESSION["users"]["id"] . "',";

    if(empty($_POST["name"])) {
        $_SESSION["errors"]["nameErr"] = "Title is required";
    } else {
        $title = test_input($_POST["name"]);
        $data .= "'$title',";
    }

    if(empty($_POST["discription"])) {
        //$_SESSION["errors"]["discriptionErr"] = "Discription is required";
        $data .= "'$discription',";
    } else {
        $discription = test_input($_POST["discription"]);
        $data .= "'$discription',";
    }

    if(empty($_POST["member_id"])) {
        $_SESSION["errors"]["member_idErr"] = "member is required";
    } else {
        $member_id = test_input($_POST["member_id"]);
        $data .= "'$member_id',";
    }

    if(empty($_POST["status"])) {
        $_SESSION["errors"]["statusErr"] = "Status is required";
    } else {
        $status = test_input($_POST["status"]);
        $data .= "'$status'";
    }

    if(count($_SESSION["errors"]) > 0) {
        header("location: ../views/task/create_task.php");
    } else {
    
        insert_task($conn, $data);
    }
    
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function insert_task($conn, $data) {
    $sql = "INSERT INTO tasks(user_id, title, discription, member_id, status) VALUES($data)";
    
    if(mysqli_query($conn, $sql)) {
        header("location: ../views/task/task_listing.php");
    } else{
        echo "Error insert data" . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


?>