<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";

$mamber_id = $_GET["id"];
unset($_SESSION["errors"]);

$firstname = $email = $password = $data = "";
$_SESSION["errors"] = [];


if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (empty($_POST["name"])) {
        $_SESSION["errors"]["nameErr"] = "Name is require";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $_SESSION["errors"]["nameErr"] = "Only letters and white space allowed";
        } else {
            $data .= "firstname='$name',";
        }
    }

    if(empty($_POST["email"])) {
        $_SESSION["errors"]["emailErr"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors"]["emailErr"] = "Invalid email Format";
        } else {
            $data .= "email='$email',";
        }
    }

    if(empty($_POST["password"])) {
        $_SESSION["errors"]["passwordErr"] = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $data .= "password='password'";

    }

    if(count($_SESSION["errors"]) > 0) {
        header("location: ../views/team/create_mamber.php");
    } else {
        update_mamber($conn, $data, $mamber_id);
    }


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return  $data;
}

function update_mamber($conn, $data, $mamber_id) {
    $sql = "UPDATE users SET " . $data . " WHERE id=" . $mamber_id;
    if (mysqli_query($conn, $sql)) {
        header("location: ../views/team/mamber_listing.php");
    } else {
        echo "Error" . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}





?>