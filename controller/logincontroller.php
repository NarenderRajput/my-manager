<?php
include __DIR__."/../config/app.php";
include __DIR__."/../helper/common.php";
include __DIR__."/../config/db.php";

$conn = db_connect();

$email = $password = $check_b = $data = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $_SESSION["emailErr"] = "Email is Required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["emailErr"] = "Invalid email Format";
        } else {
            $data .= "'$email',";
        }
    }

    if (empty($_POST["password"])) {
        $_SESSION["passwordErr"] = "Password is Required";
    } else {
        $password = test_input($_POST["password"]);
        $data .= "'$password'";
    }


    if (isset($_SESSION['emailErr']) && isset($_SESSION['passwordErr']) && isset($_SESSION["check_bErr"])) {
        header('location: '.ROOT.'/login.php');
    } else {
        check_data($email, $password, $conn);
    }

}


function test_input($data) {
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function check_data($email, $password, $conn) {
    $sql = "SELECT * FROM users where email = '$email'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['users'] = $user;
            header('location: '.ROOT.'/dashboard.php');

            mysqli_close($conn);
            exit;
        }     
    }
    
    echo "Failed to Login";
    mysqli_close($conn);
}

?>