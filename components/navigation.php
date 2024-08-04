<nav class="bg-light">

        <?php 
        
        if(!isset($_SESSION["name"]) || $_SESSION["role"] != "admin"){

            header("Location: ../auth/splash.php");

        }

        ?>

        <!-- navigation brand  -->
        <a href="dashboard.php" style="color:#333; font-weight: 600">ABC Retail shop</a>

        <!-- navigation menu  -->
        <ul class="text-dark flex align-center">
            <!-- view selected products  -->
            <a href="orders.php" class="mx flex align-center">
            <li class="text-light flex align-center">
                <img width="20px" src="../../assets/icons/folder-cart.svg" alt="" class="mr">
                <small>Orders from clients</small>
            </li>
            </a>

            <!-- logout link  -->
            <li role="button" class="mx pointer flex align-center" onclick="Logout()">
                <img src="../../assets/icons/sign-out.svg" alt="">
                <b class="mx">Signout</b>
            </li>
        </ul>
    </nav>
