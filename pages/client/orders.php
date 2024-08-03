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
    <nav class="shadow">

        <!-- navigation brand  -->
        <a href="">ABC Retail shop</a>

        <!-- navigation menu  -->
        <ul class="text-dark">
            <!-- view selected products  -->
            <li id="selected_products_count">
                <img onclick="toggleProductsModalVisibility()" src="../../assets/icons/cart.svg" alt="">
            </li>

            <!-- view user profile and order history  -->
            <li role="button" class="popover-parent">
                <img onclick="toggleProfileVisibility()" src="../../assets/icons/user.svg" alt="">
                <div class="popover-child">
                    <span class="flex justify-end align-center">
                        <img onclick="toggleProfileVisibility()" src="../../assets//icons/x.svg" width="15px"
                            height="15px">
                    </span>
                    <p> Hi, <b>Vincent</b></p>
                    <div class="bg-light fade flex align-center p my rounded">
                        <img class="mr" height="15px" src="../../assets/icons/clock.svg" alt="">
                        <p>Your order history</p>
                    </div>
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
        <p class="h2 text-primary">Order History</p>
        <p>These list entails products previously ordered for</p>
    </div>
    <!-- end header  -->

    <div class="container">
        <!-- list of orders  -->
        <table class="bg-bright mt-2 p-2 w-100 shadow">

            <tr>
                <td class="p-2">Products</td>
                <td>Total price</td>
                <td>Date of Order</td>
                <td>Date of Delivery</td>
                <td>Delivery status</td>
            </tr>

            <!-- single order details  -->
            <tr>
                <td class="mr-1 pr-1">
                    <ul class="bg-light p-2">
                        <li>Chevrolet</li>
                        <li>Pair of jeans</li>
                        <li>Navy blue shirt</li>
                        <li>Headsets</li>
                    </ul>
                </td>
                <td>$400,000</td>
                <td><span>21 <sup>st</sup> june, 2020</span></td>
                <td>22 <sup>nd</sup> jan 2019</td>
                <td>
                    <div class="flex align-center btn-success">
                        <img height="20px" src="../../assets/icons/circle-check.svg" alt="">
                        <span class="mx">delivered</span>
                    </div>
                </td>
            </tr>
            <!-- end single order details  -->
        </table>
    </div>

    <!-- script  -->
    <script src="../../assets/js/index.js"></script>

</body>

</html>