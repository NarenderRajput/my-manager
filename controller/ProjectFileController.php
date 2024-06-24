<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";


unset($_SESSION["errors"]);

$name = $url = $discription = $price = $deadline = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["name"])) {
        $_SESSION["errors"]["nameErr"] = "Name is require";
    } else {
        $name = test_input($_post["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $_SESSION["errors"]["nameErr"] = "Only letters and white space allowed";
        } else {
            $data .= "'$name'";
        }
    }

    if (empty($_POST["url"])) {
        $_SESSION["errors"]["urlErr"] = "URL is require";
    } else {
        $url = test_input($_POST["url"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $_SESSION["errors"]["urlErr"] = "Invalid URL";
        } else {
            $data .= "'$url'";
        }
    }

    if (empty($_POST["discription"])) {
        $_SESSION["errors"]["discriptionErr"] = "Discription is require";
    } else {
        $discription = test_input($_POST["discription"]);
        $data .= "'$discription'";
    }

    if (empty($_POST["price"])) {
        $_SESSION["errors"]["priceErr"] = "Price is require";
    } else {
        $price = test_input($_POST["price"]);
        $data .= "'$price'";
    }

    if (empty($_POST["deadline"])) {
        $_SESSION["errors"]["deadlineErr"] = "Deadline is require";
    } else {
        $deadline = test_input($_POST["deadline"]);
        $data .= "'$deadline'";
    }

    include "ProjectFileUpload.php";
    dd($_SESSION["errors"]);
    if(isset($_SESSION["errors"]["nameErr"]) || isset($_SESSION["errors"]["urlErr"]) || isset($_SESSION["errors"]["discriptionErr"]) || isset($_SESSION["errors"]["priceErr"]) || isset($_SESSION["errors"]["deadlineErr"]) || isset($_SESSION["errors"]["photoErr"])) {
        header("location: ../views/projectfile/project_file.php");
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
        $sql = "INSERT INTO project(projectname, url, discription, price, deadline, photo) VALUES($data)";
        if(mysqli_query($conn, $sql)) {
            echo "Insert new record successfully ";
        } else {
            echo "Error insert data: " . $sql . "<br>" . mysqli_error($conn);
        }
    }