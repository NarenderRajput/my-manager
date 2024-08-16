<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";

$conn = db_connect();
$member_id = $_GET["id"];

unset($_SESSION["errors"]);

$firstname = $lastname = $email = $password = $data = "";
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

    if(empty($_POST["lastname"])) {
        $data .= "lastname='',";
    } else {
        $lastname = test_input($_POST["lastname"]);
        $data .= "lastname='$lastname',";
    }

    if (empty($_POST["email"])) {
        $_SESSION["errors"]["emailErr"] = "Email must required";
    } else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors"]["emailErr"] = "Invalid Email format";
          } else {
            $data .= "email='$email',";
          }
    }

    if (empty($_POST["password"])){
        $_SESSION["errors"]["emailErr"] = "Password must required";
    } else {
        $password = test_input($_POST["password"]);
        $data .= "password='$password'";
    }

    if (count($_SESSION["errors"]) > 0) {
        header("location: ../team/edit_member.php");
    } else {
        update_member($conn, $data, $member_id);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return  $data;
}

function update_member($conn, $data, $member_id) {
    $sql = "UPDATE users SET " . $data . " WHERE id =" . $member_id;
    
    if (mysqli_query($conn, $sql)) {
        header("location: ../team/member_listing.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>