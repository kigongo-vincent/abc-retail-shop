<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../assets/styles/admin.css">

</head>

<?php

include("../../components/connect.php");

include("../../utilities/GET.php");

$response = GET($db_connection, "products", TRUE);

$products = $response["data"];

$number_of_products = $response["count"];

?>

<body>

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

    <!-- main  -->


    <div class="mt-2 container">
        <u><h4>Products</h4></u>
        <div class="mt-2 render-products  flex align-center flex-wrap">

        <?php if( $number_of_products == 0): ?>
            
            <p>No products found</p>

        <?php endif; ?>

        <?php foreach ($products as $product): ?>

                <div class="card bg-light w-400">

                <div class="image">

                    <img src="../../uploads/<?php echo $product[3]?>" alt="">

                </div>

                <div>

                    <p><?php echo $product[1]?></p>

                    <footer class="flex align-center justify-between">

                        <p><?php echo $product[2]?></p>

                        <?php if( $product[4] == "sold"): ?>
                            
                            <div class="bg-dark contain rounded">sold</div>

                        <?php endif; ?>


                    </footer>

                </div>

                </div>

        <?php endforeach; ?>

        </div>
    </div>

    <!-- add product modal  -->

    <script src="../../assets/js/admin.js"></script>

    <script src="../../assets/js/index.js"></script>

    </script>

</body>

</html>