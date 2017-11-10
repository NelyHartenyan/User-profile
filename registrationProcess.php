<?php
session_start();
include("functions.php");
if (isset($_POST["register"])) {
//    $rpassword = $_POST["rpassword"];
//    $password = $_POST["password"];
//    $gender = $_POST["gender"];
    if (isset($_POST["firstname"]) && !empty($_POST["firstname"])) {
        $firstname = mysqli_real_escape_string($conn, strip_tags($_POST["firstname"]));
        unset($_SESSION["error"]["firstname"]);
        $_SESSION["firstname"] =  $firstname;
       // unset($_SESSION["firstname"]);
    } else {
        unset($_SESSION["firstname"]);
        $_SESSION["error"]["firstname"] = "Firstname is missing";
    }
    
    if (isset($_POST["lastname"]) && !empty($_POST["lastname"])) {
        $lastname = mysqli_real_escape_string($conn, strip_tags($_POST["lastname"]));
        unset($_SESSION["error"]["lastname"]);
        $_SESSION["lastname"] = $_POST["lastname"];
        //  unset($_SESSION["lastname"]);
    } else {
        unset($_SESSION["lastname"]);
        $_SESSION["error"]["lastname"] = "Lastname is missing";
    }

    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $_SESSION["email"] = $_POST["email"];
        if (preg_match("/[a-zA-Z0-9.-_]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]/", $_POST["email"])) {
            $email = mysqli_real_escape_string($conn, strip_tags($_POST["email"]));
            unset($_SESSION["error"]["email"]);
            $_SESSION["email"] = $email;
              unset($_SESSION["email"]);
        } else {
            $_SESSION["error"]["email"] = "email is not valid";
        }

    } else {
        unset($_SESSION["email"]);
        $_SESSION["error"]["email"] = "email is missing";
    }

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = mysqli_real_escape_string($conn, strip_tags($_POST["password"]));
        unset($_SESSION["error"]["password"]);
        $_SESSION["password"] = $_POST["password"];
        if (isset($_POST["rpassword"]) && $_POST["password"] == $_POST["rpassword"]) {
            unset($_SESSION["error"]["password_match"]);
              unset($_SESSION["password"]);
        } else {
            $_SESSION["error"]["password_match"] = "password and repat password does not much";
        }
    } else {
        unset($_SESSION["password"]);
        $_SESSION["error"]["password"] = "password is missing";
    }

    if (isset($_POST["rpassword"]) && !empty($_POST["rpassword"])) {
        unset($_SESSION["error"]["rpassword"]);
        $_SESSION["rpassword"] = $_POST["rpassword"];
          unset($_SESSION["rpassword"]);
    } else {
        unset($_SESSION["rpassword"]);
        $_SESSION["error"]["rpassword"] = "password is missing";
    }


    if (isset($_POST["gender"]) && !empty($_POST["gender"])) {
        $gender = mysqli_real_escape_string($conn, strip_tags($_POST["gender"]));
        unset($_SESSION["error"]["gender"]);
        $_SESSION["gender"] = $_POST["gender"];
          unset($_SESSION["gender"]);
    } else {
//        unset($_SESSION["firstname"]);
        $_SESSION["error"]["gender"] = "gender is missing";
    }

    if(isset($email)) {
        $where = ["email" => $email];
        $result = select('users', '', $where);
        if (!$result->num_rows) {
            unset($_SESSION["error"]["rpassword"]);
            if (empty($_SESSION["error"])) {
                $password_hash = crypt($password);

                $data = [
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "gender" => $gender,
                    "email" => $email,
                    "password" => $password_hash
                ];

                $result = insert("user", $data);

                if ($result) {
                    header('Location: signin.php');
                    exit;
                }
            }


        } else {

            $_SESSION["error"]["email"] = "this email already exists";

        }
    }

    header('Location:index.php');
    exit;
}
?>
