<?php
include("config/config.php");
session_start();

if(isset($_POST["upload"])) {


    $user_id = $_SESSION['user_id'];
    /*
    echo '<pre>';
    var_dump($_FILES);
    echo '</pre>';*/

    $target_dir = "uploads/";
    $target_file_name = uniqid() . basename($_FILES["img_file"]["name"]);
//var_dump($target_file_name);
    $target_file = $target_dir . $target_file_name;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["upload"])) {
        $check = getimagesize($_FILES["img_file"]["tmp_name"]);
        if ($check) {
            //  echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["img_file"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img_file"]["tmp_name"], $target_file)) {

            $query = "UPDATE `user` SET `avatar`='$target_file_name' WHERE `id`='$user_id' ";
            if (isset($_POST['cuurrent-image']) && !empty($_POST['cuurrent-image'])) {
                if (file_exists($target_dir . $_POST['cuurrent-image'])) {
                    unlink($target_dir . $_POST['cuurrent-image']);
                }
            }
            $result = mysqli_query($conn, $query);
            if ($result) {
                header('Location:profile.php');
            } else {
                unlink($target_file);
                header('Location:profile.php');
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}