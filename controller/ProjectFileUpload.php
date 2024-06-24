<?php

if (!isset($_FILES["photo"]) || ($_FILES["photo"]["error"]) > 0) {
    $_SESSION["photoErr"] = "file is missing";
} else {
    $target_dir = "../uploads";
    $file_name = basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        $_SESSION["photoErr"] = "Something went wrong  Uploading photo";
    }

    if (file_exists($target_file)) {
        $_SESSION["photoErr"] = "File already exist";
    }

    if ($_FILES["photo"]["size"] > 500000) {
        $_SESSION["photoErr"] = "File size too large";
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "jng" && $imageFileType != "jpeg" &&
        $imageFileType != "gif"
    ) {
        $_SESSION["photoErr"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        //$data = "photo =" . "'$file_name'";
        $data .= "'$file_name'";
    } else {
        $_SESSION["photoErr"] = "Sorry, there was an error uploading your file.";
    }

}
