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
    <nav class="bg-light">

        <!-- navigation brand  -->
        <a href="">ABC Retail shop</a>

        <!-- navigation menu  -->
        <ul class="text-dark">
            <!-- view selected products  -->
            <li class="text-light flex align-center">
                <img src="../../assets/icons/folder-cart.svg" alt="" class="mr">
                <small>Orders from clients</small>
            </li>

            <!-- view user profile and order history  -->
            <li role="button" class="popover-parent">
                <img onclick="toggleProfileVisibility()" src="../../assets/icons/user.svg" alt="">
                <div class="popover-child">
                    <span class="flex justify-end align-center">
                        <img onclick="toggleProfileVisibility()" src="../../assets//icons/x.svg" width="10px"
                            height="10px">
                    </span>
                    <p> Hi, <b>Vincent</b></p>
                </div>
            </li>

            <!-- logout link  -->
            <li>
                <img src="../../assets/icons/log-out.svg" alt="">
            </li>
        </ul>
    </nav>
    <!-- end navbar  -->

    <!-- header  -->
    <div class="mt-2 container">
        <p class="h2 text-primary">Orders</p>
        <p>These list entails incoming orders from clients</p>
    </div>
    <!-- end header  -->

    <div class="container">
        <!-- list of orders  -->
        <table class="bg-light mt-2 p-2 w-100 shadow">

            <tr>
                <td>Client's Name</td>
                <td >Product</td>
                <td>price</td>
                <td>Date of Order</td>
                <td>Date of Delivery</td>
                <td>Delivery status</td>
            </tr>

            <!-- single order details  -->
            <tr>
                <td>Kigongo vincent</td>
                <td >
                    product
                </td>
                <td>$400,000</td>
                <td><span>21 <sup>st</sup> june, 2020</span></td>
                <td>22 <sup>nd</sup> jan 2019</td>
                <td>
                    <div class="linear-gradient p-normal rounded">mark delivered</div>
                </td>
            </tr>
            <!-- end single order details  -->
        </table>
    </div>

    <!-- script  -->
    <script src="../../assets/js/admin.js"></script>

</body>

</html>