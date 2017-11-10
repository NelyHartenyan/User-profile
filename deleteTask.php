<?php
session_start();
include("config/config.php");

$userId = $_SESSION["user_id"];

if(!$userId){
    header("Location:index.php");
}

$task_id = $_GET['task_id'];

$sql = "DELETE FROM `task` WHERE  `id`='$task_id' AND `user_id`=$userId";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if($result){
    header('location:tasks.php');
}
