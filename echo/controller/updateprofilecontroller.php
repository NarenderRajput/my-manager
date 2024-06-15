<?php
include "../config/app.php";
include "../config/db.php";
unset($_SESSION['errors']); 
$name = $data = $email = $password = "";
$_SESSION["errors"] = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $_SESSION["errors"]["nameErr"] = "Name is Required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $_SESSION["errors"]["nameErr"]  = "Only letters and white space allowed";
    } else {
      $data .= "firstname =" . "'$name',";
    }
  }


  if (empty($_POST["email"])) {
    $_SESSION["errors"]["emailErr"] = "Email id Is Required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION["errors"]["emailErr"] = "Invalid Email format";
    } else {
      $data .= "email =" . "'$email',";
    }
  }

  if (empty($_POST["password"])) {
    $_SESSION["errors"]["passwordErr"] = "Password is Required ";
  } else {
    $password = test_input($_POST["password"]);
    $data .= "password =" . "'$password'";
  }

 if (count($_SESSION["errors"]) > 0) {
    header('location: /echo/views/account/editProfile.php');
    exit;
  } else {
    update_data($conn, $data);
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function update_data($conn, $data) {
  $sql = "UPDATE users SET " . $data . "WHERE id = " . $_SESSION['users']['id'];

  if (mysqli_query($conn, $sql)) {
    get_user($conn);
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}

function get_user($conn) {
  $sql = "SELECT * FROM users Where id =" . $_SESSION['users']['id'];
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['users'] = $row;
    }
    header('location: ../views/dashboard.php');
  } else {
    echo "Failed to Update user data";
  }
}

?>