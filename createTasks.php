<?php
include("config/config.php");

session_start();

if(!$_SESSION['user_id']){
    header('location:signin.php');die;

}
$user_id = $_SESSION['user_id'];

if(isset($_POST['task_btn'])) {

    if (isset($_POST["title"]) && !empty($_POST["title"])) {
        $title = mysqli_real_escape_string($conn, strip_tags($_POST["title"]));
        unset($_SESSION["error"]["title"]);
        $_SESSION["title"] =  $title;
       unset($_SESSION["title"]);
    } else {
        unset($_SESSION["title"]);
        $_SESSION["error"]["title"] = "title is missing";
    }
    if (isset($_POST["description"]) && !empty($_POST["description"])) {
        $description = mysqli_real_escape_string($conn, strip_tags($_POST["description"]));
        unset($_SESSION["error"]["description"]);
        $_SESSION["description"] =  $description;
        unset($_SESSION["description"]);
    } else {
        unset($_SESSION["description"]);
        $_SESSION["error"]["description"] = "description is missing";
    }

    if(isset($title) && isset($description)){
    $query = "INSERT INTO `task` (`title`,`description`,`user_id`) VALUES (
'$title','$description','$user_id')";

    $task = mysqli_query($conn, $query);
    if ($task) {
        header('Location:tasks.php');
    }
}
else{
    header('Location:tasks.php');

}
}
include("layout/header.php");