<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../assets/styles/admin.css">

    <title>Order History</title>

</head>

<?php

    include("../../components/connect.php");
    
    include("../../utilities/GET_ORDERS.php");
    

    $orders_results = GET_ORDERS($db_connection);

    $orders = [];

    if($orders_results["status"] == 200){

    $orders = $orders_results["data"];

    }

?>

<body>

    <!-- navbar  -->
    <?php include("../../components/navigation.php"); ?>
    <!-- end navbar  -->

    <!-- header  -->
    <div class="mt-2 container">

        <p class="h2 text-primary">Orders</p>

        <p>These list entails incoming orders from clients</p>
        
    </div>
    <!-- end header  -->

    <!-- list of orders  -->
    <div class="container">
        <table class="bg-light mt-2 p-2 w-100 shadow">

            <tr>
                <td>Client's Name</td>
                
                <td >Product</td>

                <td >Transaction ID</td>

                <td>price</td>

                <td>Date of Order</td>

                <td>Date of Delivery</td>

                <td>Delivery status</td>

            </tr>

            <!-- single order details  -->
                <?php foreach($orders as $order): ?>

                    <tr>

                    <td><?php echo $order[14] ?></td>
                    
                    <td ><?php echo $order[8] ?> </td>

                    <td ><?php echo $order[1] ?> </td>

                    <td>$<?php echo $order[9] ?></td>

                    <td><span><?php echo $order[2] ?></td>

                    <td><?php echo $order[3] ?></td>

                    <td>
                        <?php if($order[6] == "pending"): ?>

                            <a href="../../controllers/deliverProduct.php/?order=<?php echo $order[0] ?>">
                                    
                                <div  class="bg-warning max-content pointer my p-normal rounded">mark delivered</div>
                                
                            </a>

                        <?php else: ?>

                            <div class="flex align-center btn-success max-content">

                                <img height="20px" src="../../assets/icons/circle-check.svg" alt="">
                                
                                <span class="mx">delivered &nbsp;</span>

                            </div>
                        
                        <?php endif ?>

                    </td>
                    
                </tr>

                <?php endforeach; ?>
            <!-- end single order details  -->
        </table>
    </div>

    <!-- script  -->
    <script src="../../assets/js/admin.js"></script>

</body>

</html>