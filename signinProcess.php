<?php
session_start();
include('config/config.php');
$email = $_POST['email'];
$password = $_POST['password'];


if(!isset($_POST['email']) || !isset($_POST['password'])){
    header('location:signin.php');
    die;
}

$email = trim($email);
$password = trim($password);



$query = "SELECT * FROM `user` WHERE `email`='$email' LIMIT 1";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result)){
    $user_data = mysqli_fetch_assoc($result);
    if (crypt($user_data["password"], crypt($password, $user_data["password"]))) {
        $_SESSION['user_id'] = $user_data['id'];
        header('location:profile.php');
    }
}else{
    $_SESSION['res'] = 'Account is invalid';
    header('location:signin.php');die;
}



