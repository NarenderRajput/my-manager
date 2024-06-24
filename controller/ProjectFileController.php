<?php
include "../config/app.php";
include "../helper/common.php";

$name = $url = $discription = $price = $deadline = "";

dd($_SESSION);
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["name"])) {
        $_SESSION["nameErr"] = "Name is require";
    } else {
        $name = test_input($_post["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $_SESSION["nameErr"] = "Only letters and white space allowed";
        } else {
            $data .= "'$name'";
        }
    }

    if (empty($_POST["url"])) {
        $_SESSION["urlErr"] = "URL is require";
    } else {
        $url = test_input($_POST["url"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $_SESSION["urlErr"] = "Invalid URL";
        } else {
            $data .= "'$url'";
        }
    }

    if (empty($_POST["discription"])) {
        $_SESSION["discriptionErr"] = "Discription is require";
    } else {
        $discription = test_input($_POST["discription"]);
        $data .= "'$discription'";
    }

    if (empty($_POST["price"])) {
        $_SESSION["priceErr"] = "Price is require";
    } else {
        $price = test_input($_POST["price"]);
        $data .= "'$price'";
    }

    if (empty($_POST["deadline"])) {
        $_SESSION["deadlineErr"] = "Deadline is require";
    } else {
        $deadline = test_input($_POST["deadline"]);
        $data .= "'$deadline'";
    }

    include "ProjectFileUpload.php";
    
    if(isset($_SESSION["nameErr"]) || isset($_SESSION["urlErr"]) || isset($_SESSION["discriptionErr"]) || isset($_SESSION["priceErr"]) || isset($_SESSION["deadlineErr"]) || isset($_SESSION["photoErr"])) {
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