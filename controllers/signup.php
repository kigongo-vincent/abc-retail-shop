<?php

session_start();

include("../utilities/POST.php");

include("../utilities/GET_ONE.php");

include("../components/connect.php");

if(isset($_POST["submit"])){

    $data = [

        "name" => explode("@", $_POST["email"])[0],

        "email" => $_POST['email'],

        "role" => "client",

        "password" => password_hash($_POST["password"], PASSWORD_BCRYPT)

    ];

    $response = POST("users", $data);

    if($response["status"] == 201){

        $response = GET_ONE($db_connection, "users", "email", $_POST['email']);

        $_SESSION["name"] = $response["data"]["name"];

        $_SESSION["role"] = $response["data"]["role"];

        $_SESSION["user_id"] = $response["data"]["user_id"];

        header("Location: ../pages/client/dashboard.php");
        
    }else{

        header("Location: ../pages/auth/splash.php");

    }

}

?>