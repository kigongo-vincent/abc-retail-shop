<?php

include("../utilities/UPLOAD_PNG.php");

include("../utilities/POST.php");


if(isset($_POST["submit"])){

    $image = "";

    $image_upload_results = UPLOAD_PNG($_FILES["image"]["tmp_name"]);

    if($image_upload_results["status"] == 201){

        $image = $image_upload_results["data"];

    }

    $data = [

        "name" => $_POST['name'],

        "price" => $_POST['price'],

        "category"=> NULL,

        "image" => $image,
        
        "status" => "available"
    
        ];

    $response = POST("products", $data);

    if($response["status"] == 201){

        header("Location: ../pages/admin/products.php");

    }
    else{

        header("Location: ../pages/admin/dashboard.php");

    }

}

?>