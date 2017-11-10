<?php
session_start();
include("config/config.php");
if(!$_SESSION['user_id']){
    header('location:signin.php');die;

}
$user_id = $_SESSION['user_id'];
$img_id = $_GET['img_id'];
$img_name = $_GET['img_name'];


$sql = "DELETE FROM `user` WHERE `id`='$img_id ' AND `avatar`='$img_name '";
$sql = "UPDATE `user` SET `avatar` = 'NULL' WHERE  `id`='$user_id  '";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
unlink('uploads/'.$img_name);

if($result){
    header('Location:profile.php');
}

