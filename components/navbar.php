<nav class="shadow">

        <!-- navigation brand  -->
        <a href="dashboard.php">ABC Retail shop</a>

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
                    <a href="./orders.php" style="color: black">
                    <div class="bg-light fade flex align-center p my rounded">
                        <img class="mr" height="15px" src="../../assets/icons/clock.svg" alt="">
                        <p>Your order history</p>
                    </div>
                    </a>
                </div>
            </li>

            <!-- logout link  -->
            <li onclick="Logout()" role="button">
                <img src="../../assets/icons/log-out.svg" alt="">
            </li>
        </ul>
    </nav>