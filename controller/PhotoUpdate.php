<?php
include "../config/app.php";
include "../helper/common.php";


$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$findError = 1;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $findError = 1;
    } else {
      echo "File is not an image.";
      $findError = 0;
    }
  }

  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $findError = 0;
  }
// size in bytes
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $findError = 0;
}
  
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $findError = 0;
}

if ($findError == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tem_name"], $target_file)) {
        echo "The file" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) ."has been uploaded";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>