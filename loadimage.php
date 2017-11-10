<?php
session_start();
include("config/config.php");

$userId = $_SESSION["user_id"];

if(!$userId){
    header("Location:index.php");
}

if(isset($_POST["load"])){
    $target_dir = "gallery/";
    $fileName = uniqid().basename($_FILES["img"]["name"]);
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check file size
    if ($_FILES["img"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            /*unlink*/
//            $sql = "UPDATE `gallery` SET img='$fileName' WHERE id='$userId'";
            $sql = "INSERT INTO `gallery` (`img_name`,`user_id`) VALUES
            ('$fileName','$userId')";
            $upload = mysqli_query($conn,$sql);
            if($upload){
                header("Location:gallery.php");
            }
        } else {
            header("Location:gallery.php");
        }
// if everything is ok, try to upload file
    } else {
        header("Location:gallery.php");
    }

}