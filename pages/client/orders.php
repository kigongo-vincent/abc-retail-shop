<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/index.css">
    <title>Order History</title>
</head>




<body>

    <!-- navbar  -->
    <?php include("../../components/navbar.php") ?>
    <!-- end navbar  -->

    <?php

include("../../utilities/GET_SPECIFIC_ORDERS.php");

include("../../components/connect.php");

$response = GET_SPECIFIC_ORDERS($db_connection, $_SESSION["user_id"]);

$orders = [];

if($response["status"] == 200){

$orders = $response["data"];

}


?>

    <!-- header  -->
    <div class="mt-2 container">
        <p class="h2 text-primary">Order History</p>
        <p>These list entails products previously ordered for</p>
    </div>
    <!-- end header  -->

    <div class="container">
        <!-- list of orders  -->
        <table class="bg-bright mt-2 p-2 w-100 shadow">

            <tr>
                <td>Product</td>
                <td >Transaction ID</td>
                <td>price</td>
                <td>Date of Order</td>
                <td>Date of Delivery</td>
                <td>Delivery status</td>
            </tr>

            <!-- single order details  -->
            <?php foreach($orders as $order): ?>

                <tr>
                <td >
                   
                        <?php echo $order[8]; ?>
                        
                </td>
                <td >
                   
                        <?php echo $order[1]; ?>
                        
                </td>
                <td>$<?php echo $order[9]; ?></td>
                <td><?php echo $order[2]; ?></td>
                <td><?php echo $order[3]; ?></td>
                <td>
                    <?php if($order[6] =="pending"): ?>

                        <div class="flex align-center btn-warning">
                        <img height="20px" src="../../assets/icons/spinner.svg" alt="">
                        <span class="mx">Not yet delivered</span>
                    </div>

                    <?php else: ?>

                        <div class="flex align-center btn-success">
                        <img height="20px" src="../../assets/icons/circle-check.svg" alt="">
                        <span class="mx">delivered</span>
                    </div>

                    <?php endif; ?>
                </td>
            </tr>

            <?php endforeach; ?>
            <!-- end single order details  -->
        </table>
    </div>

    <!-- order modal  -->
    <?php include("../../components/modal.php"); ?>
    <!-- end order modal  -->

    <!-- script  -->
    <script src="../../assets/js/index.js"></script>

</body>

</html>