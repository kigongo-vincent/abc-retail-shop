<?php

session_start();

include("../utilities/GET_ONE.php");

include("../components/connect.php");

if(isset($_POST["submit"])){

    $email = $_POST['email'];

    $password = $_POST["password"];

    $response = GET_ONE($db_connection, "users", "email", $email);

    $status = $response["status"];

    if($status == 200){

        $saved_password = $response["data"]["password"];

        if(password_verify($password, $saved_password)){

            $_SESSION["name"] = $response["data"]["name"];

            $_SESSION["role"] = $response["data"]["role"];

            $_SESSION["user_id"] = $response["data"]["user_id"];

            if($response["data"]["role"] == "admin"){

                header("Location: ../pages/admin/dashboard.php");

            }else{

                header("Location: ../pages/client/dashboard.php");

            }

        }else{

            header("Location: ../pages/auth/login.php?has_account=true&&email=" . $email);

        }
        
    }
    else{

        header("Location: ../pages/auth/splash.php");

    }

}

?>