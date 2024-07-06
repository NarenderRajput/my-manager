<?php
include "../config/app.php";
include "../config/db.php";
include "../helper/common.php";

$task_id = $_GET["id"];
unset($_SESSION["edit_errors"]);

$title = $discription = $member_id = $status = $data = "";


$_SESSION["edit_errors"] = [];

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if(empty($_POST["name"])) {
        $_SESSION["edit_errors"]["nameErr"] = "Title is required";
    } else {
        $title = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $title)) {
            $_SESSION["errors"]["nameErr"] = "Only letters and white space allowed";
        } else {
            $data .= "title='$title',";
        }
    }

    if(empty($_POST["discription"])){
        $data .= "discription='',";
    } else {
        $discription = test_input($_POST["discription"]);
        $data .= "discription='$discription',";
    }

    if(empty($_POST["member_id"])) {
        $_SESSION["edit_errors"]["member_id"] = "Member ID is required";
    } else {
        $member_id = test_input($_POST["member_id"]);
        $data .= "member_id='$member_id',";
    }

    if(empty($_POST["status"])) {
        $_SESSION["edit_errors"]["statusErr"] = "Status is required";
    } else {
        $status = test_input($_POST["status"]);
        $data .= "status='$status'";
    }

    if(count($_SESSION["edit_errors"]) > 0) {
        header("location: ../views/task/edit_task.php");
    } else {
        
        update_task($conn, $data, $task_id);
    }
}



function test_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function update_task($conn, $data, $task_id) {
    $sql = "UPDATE tasks SET " . $data . "WHERE id =" . $task_id;

    if (mysqli_query($conn, $sql)) {
        header("location: ../views/task/task_listing.php");
    } else {
        echo "Error" . $sql . mysqli_error($conn);
    }

    mysqli_close($conn);
}


?>