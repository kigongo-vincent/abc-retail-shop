<?php

session_start();

if(isset($_SESSION["name"])){

if($_SESSION["role"] == "admin"){

    header("Location: ./pages/admin/dashboard.php");

}else{

    header("Location: ./pages/client/dashboard.php");

}

}else{

    header("Location: ./pages/auth/splash.php");

}

?>
