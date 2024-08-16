<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";
include "ProjectFileUpload.php";

$conn = db_connect();

unset($_SESSION["errors"]);

$name = $url = $discription = $price = $deadline = $data = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["errors"] = [];
    $data .= "'".$_SESSION["users"]['id']."',";

    if (empty($_POST["name"])) {
        $_SESSION["errors"]["nameErr"] = "Name is require";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $_SESSION["errors"]["nameErr"] = "Only letters and white space allowed";
        } else {
            $data .= "'$name',";
        }
    }

    if (empty($_POST["url"])) {
        //$_SESSION["errors"]["urlErr"] = "URL is require";
        $data .= "'',";
    } else {
        $url = trim($_POST["url"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            $_SESSION["errors"]["urlErr"] = "Invalid URL";
        } else {
            $data .= "'$url',";
        }
    }

    if (empty($_POST["discription"])) {
        //$_SESSION["errors"]["discriptionErr"] = "Discription is require";
        $data .= "'',";
    } else {
        $discription = test_input($_POST["discription"]);
        $data .= "'$discription',";
    }

    if (empty($_POST["price"])) {
        $_SESSION["errors"]["priceErr"] = "Price is require";
    } else {
        $price = test_input($_POST["price"]);
        $data .= "'$price',";
    }

    if (empty($_POST["deadline"])) {
        $_SESSION["errors"]["deadlineErr"] = "Deadline is require";
    } else {
        $deadline = test_input($_POST["deadline"]);
        $data .= "'$deadline',";
    }

    $file_name = upload_file();
    if ($file_name) {
        $data .= "'$file_name'" ;
    }
    
    if(count($_SESSION["errors"]) > 0) {
        header("location: ../projects/create_project.php");
    } else {

        insert_data($conn, $data);
    }
}






    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function insert_data($conn, $data) {
        
        $sql = "INSERT INTO projects(user_id, projectname, url, discription, price, deadline, photo) VALUES($data)";
        
        if(mysqli_query($conn, $sql)) {
            header("location: ../projects/project_listing.php");
        } else {
            echo "Error insert data: " . $sql . "<br>" . mysqli_error($conn);
        }
    }