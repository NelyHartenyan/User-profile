<?php

include ('config/config.php');

if(isset($_POST['email'])) {

    $email = mysqli_real_escape_string($conn, strip_tags($_POST["email"]));
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = "SELECT * FROM `user` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


    if (mysqli_num_rows($result) > 0) {

        $error = [
            'error' => true,
            'message' => 'This email is  already exist'
        ];

    } else {
        $error = [
            'error' => false,
            'message' => null
        ];
    }
}
else{
    $error = [
        'error' => true,
        'message' => 'Wrong email!'
    ];

}
}

echo json_encode( $error );
