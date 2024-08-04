<?php

include("../utilities/GET_ONE.php");

include("../components/connect.php");


if(isset($_POST["submit"])){
    
    $has_account = FALSE;
    
    $email = $_POST["email"];

    $response = GET_ONE($db_connection, "users", "email", $email);

    $status = $response["status"];

    if($status == 200){

        $name = $response["data"]["name"];

        header("Location: ../pages/auth/login.php?has_account=true&&email=" . $email . "&&name=" . $name );

    }else{

        header("Location: ../pages/auth/login.php?has_account=false&&email=" . $email );


    }

    
}else{

    header("Location: ../pages/auth/splash.php" );

}


?>

