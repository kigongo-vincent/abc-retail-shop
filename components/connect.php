<?php

$host = "localhost";

$username = "root";

$password = "";

$db_name = "e-commerce-db";

$db_connection = mysqli_connect($host, $username, $password, $db_name);

if($db_connection){

    // do something

}else{

    echo "failed to connect";

}

?>