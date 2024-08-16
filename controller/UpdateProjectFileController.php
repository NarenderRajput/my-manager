<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";
include "ProjectFileUpload.php";
$conn = db_connect();

$project_id = $_GET["id"];
unset($_SESSION["errors"]);

$name = $lastname = $url = $discription = $price = $deadline = $data = "";

$_SESSION["errors"] = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["name"])) {
        $_SESSION["errors"]["nameErr"] = "Name is require";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $_SESSION["errors"]["nameErr"] = "Only letters and white space allowed";
        } else {
            $data .= "projectname='$name',";
        }
    }

    if (empty($_POST["url"])) {
        $data .= "url='',";
    } else {
        $url = trim($_POST["url"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            $_SESSION["errors"]["urlErr"] = "Invalid URL";
        } else {
            $data .= "url='$url',";
        }
    }

    if (empty($_POST["discription"])) {
        $data .= "discription='',";
    } else {
        $discription = test_input($_POST["discription"]);
        $data .= "discription='$discription',";
    }

    if (empty($_POST["price"])) {
        $_SESSION["errors"]["priceErr"] = "Price is require";
    } else {
        $price = test_input($_POST["price"]);
        $data .= "price='$price',";
    }

    if (empty($_POST["deadline"])) {
        $_SESSION["errors"]["deadlineErr"] = "Deadline is require";
    } else {
        $deadline = test_input($_POST["deadline"]);
        $data .= "deadline='$deadline'";
    }

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === 0) {
        if (!empty($_POST["old_photo"]) && file_exists("../uploads/" . $_POST["old_photo"])) {
            unlink("../uploads/" . $_POST["old_photo"]);
        }
    }

    $file_name = upload_file();
    if ($file_name) {
        $data .= ",photo='$file_name'";
    }

    if (count($_SESSION["errors"]) > 0) {
        header("location: ../projects/edit_project.php");
    } else {

        update_data($conn, $data, $project_id);
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function update_data($conn, $data, $project_id)
{
    $sql = "UPDATE projects SET " . $data . " WHERE id = " . $project_id;
    
    if (mysqli_query($conn, $sql)) {
        header("location: ../projects/project_listing.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
