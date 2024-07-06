<?php 
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";

unset($_SESSION["errors"]);

$name = $lastname = $email = $password = $data = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["errors"] = [];
    $data .= "'" . $_SESSION["users"]["id"] . "',";
    
    if(empty($_POST["name"])) {
        $_SESSION["errors"]["nameErr"] = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $_SESSION["errors"]["nameErr"] = "Only letters and white space allowed";
        } else {
            $data .= "'$name',";
            
        }
    }

    if(empty($_POST["lastname"])) {  
        $data .= "'',"; 
    } else {
        $lastname = test_input($_POST["lastname"]);
        $data .= "'$lastname',";
    }

    if(empty($_POST["email"])) {
        $_SESSION["errors"]["emailErr"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors"]["emailErr"] = "Invalid email Format";
        } else {
            $data .= "'$email',";
        }
    }

    if(empty($_POST["password"])) {
        $_SESSION["errors"]["passwordErr"] = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $data .= "'$password'";

    }

    if(count($_SESSION["errors"]) > 0) {
        header("location: ../views/team/create_member.php");
    } else {
        
        insert_member($conn, $data);
    }


}

function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function insert_member($conn, $data){
    $sql = "INSERT INTO users(parent_id, firstname, lastname, email, password) VALUES($data)";
    
    if (mysqli_query($conn, $sql)) {
        header("location: ../views/team/member_listing.php");
    } else {
        echo "Error insert data" . $sql . "<br>" . mysqli_error($conn);
    }
}


?>