<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/styles/index.css">
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

    <main>
        <!-- options  -->
        <div class="options">
            <small>loading...</small>
        </div>

        <!-- products  -->
        <div class="products">
            <p>loading...</p>
        </div>
    </main>

    <!-- order modal  -->
    <div class="modal" id="selected_products_modal">

        <div class="modal-content">

            <div class="modal-header">

                <p>Products that you selected</p>

                <img onclick="toggleProductsModalVisibility()" src="../../assets/icons/x.svg" alt="" width="15px"
                    height="15px">

            </div>

            <div class="selected_products">

                <p class="text-pale">Loading please wait...</p>

            </div>

            <div class="modal-footer">

                <p>
                    you are about to spend <u class="text-pale total">$500,000</u>
                </p>


                <button class="primary-btn" onclick ="placeOrder()">

                    <p>place order</p>
                    <img src="../../assets/icons/triangle-right.svg" alt="" height="15px">

                </button>

            </div>

        </div>

    </div>
    <!-- end order modal  -->

    <!-- script  -->
    <script src="../../assets/js/index.js"></script>

</body>

</html>