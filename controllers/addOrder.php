<?php

include("../utilities/POST.php");
include("../utilities/PATCH.php");

$products = $_GET['products'];

if(!$products){

    header("Location: ../pages/client/dashboard.php");

}

$products = explode(",", $products);

$user = 1;

$transaction_id =  "TX_" . bin2hex(random_bytes(6));

foreach ($products as $product) {

    $data = [

        "transaction_id" => $transaction_id,

        "order_date" => date('Y-m-d'),

        "delivery_date" => NULL,

        "product" => $product,

        "user"=> 1,

        "delivery_status" => "pending"

    ];

    $response = POST("orders", $data);

    if($response["status"] == 201){

        PATCH("products", $product, ["status"=> "sold"]);

        header("Location: ../pages/client/orders.php");

    }else{

        header("Location: ../pages/client/dashboard.php");

    }
    
}

?>