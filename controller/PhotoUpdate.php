<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";

$conn = db_connect();

unset($_SESSION['error']);

function redirect($error)
{
  $_SESSION["error"] = $error;
  header("location: ../account/edit_profile.php");
  exit;
}

if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]["error"] > 0) {
  redirect("File is missing");
}

$target_dir = "../uploads/";
$imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
$file_name = time() . "." . $imageFileType;
$target_file = $target_dir . $file_name;

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if ($check === false) {
  redirect("Something went Wrong!");
}

if (file_exists($target_file)) {
  redirect("File already exist");
}
// size in bytes
if ($_FILES["fileToUpload"]["size"] > 500000) {
  redirect("Sorry, your file is too large.");
}

if (
  $imageFileType != "jpg"
  && $imageFileType != "png"
  && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  redirect("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}

if (
  isset($_FILES["fileToUpload"])
  && $_FILES["fileToUpload"]["error"] === 0
) {
  if (
    !empty($_POST["old_photo"])
    && file_exists("../uploads/" . $_POST["old_photo"])
  ) {
    unlink("../uploads/" . $_POST["old_photo"]);
  }
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  $data = "photo =" . "'$file_name'";
  update_photo($conn, $data);
} else {
  redirect("Sorry, there was an error uploading your file.");
}

function update_photo($conn, $data)
{
  $sql = "UPDATE users SET " . $data . " WHERE  id =" . $_SESSION["users"]["id"];
  if (mysqli_query($conn, $sql)) {
    get_user($conn);
  } else {
    redirect("Error: " . $sql . "<br>" . mysqli_error($conn));
  }
  mysqli_close($conn);
}

function get_user($conn)
{
  $sql = "SELECT * FROM users WHERE id =" . $_SESSION["users"]["id"];
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION["users"] = $user;

    header("location: ../account/edit_profile.php");
  } else {
    redirect("Failed to Update user data");
  }
}
