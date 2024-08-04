<?php

include ("../utilities/GET.php");

include ("../utilities/PATCH.php");

    if(isset($_GET["order"])){

        $order = $_GET["order"];

    if($order){

        PATCH("orders", $order, ["delivery_status" => "delivered"]);

        $path = "http://localhost/abc%20retaill%20shop/pages/admin/orders.php";

        header("Location: " . $path);

    }

    }




?>