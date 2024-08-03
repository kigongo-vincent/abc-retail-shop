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
    include("../../utilities/FILTER.php");


    $products_available = 0;

    $products_sold = 0;

    $users = 0;

    $users_results = FILTER($db_connection, "users", "role", "client");

    $products_available_results = FILTER($db_connection, "products", "status", "available");

    $products_sold_results = FILTER($db_connection, "products", "status", "sold");

    if($users_results["status"] != 400){

        $users = $users_results["count"];

    }

    if($products_available_results["status"] != 400){

        $products_available = $products_available_results["count"];

    }

    if($products_sold_results["status"] != 400){

        $products_sold = $products_sold_results["count"];

    }

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
                <img onclick="toggleProfileVisibility()" src="../../assets/icons/user-dark.svg" alt="">
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
    <div class="container mt-2">

        <div class="bg-light p-2">

            <div class="h2">Hello, System Admin</div>

            <p class="mt-2">What would you wish to do today?</p>

            <div class="flex align-center mt-2">

                <div role="button" onclick="toggleAddProductModal()" class="linear-gradient pointer p-normal rounded mr-large">
                    Add a new product
                </div>

                <a href="/abc retaill shop/pages/admin/orders.php">
                    <div role="button" class="p-normal pointer rounded bg-dark  mr-large">
                        View all orders made
                    </div>
                </a>

                <a href="/abc retaill shop/pages/admin/products.php">
                    <div class="p-normal rounded bg-very-dark">
                        View all products
                    </div>
                </a>

            </div>

        </div>

        <div class="bg-image rounded mt-2  p-2">

            <h4>Statistics report</h4>

            <div class="flex align-start mt-2">
                <div class="mr-large blurred p-2">
                    <div class="h1"><?php echo $products_available; ?></div>
                    <br>
                    <small>Products available</small>
                </div>
                <div class="mr-large blurred p-2">
                    <div class="h1"><?php echo $users; ?></div>
                    <br>
                    <small>Customers</small>
                </div>
                <div class="mr-large blurred p-2">
                    <div class="h1"><?php echo $products_sold; ?></div>
                    <br>
                    <small>Products sold</small>
                </div>
            </div>

        </div>



    </div>

    <!-- add product modal  -->
    <form enctype="multipart/form-data" method="post" action ="../../controllers/AddProduct.php" class="dialog" id="productAdditionModal">

        <div class="dialog-content">

            <div class="dialog-header">
                <span>Add a product</span>
                <img role="button" onclick="toggleAddProductModal()" width="15px" height="15px" src="../../assets/icons/x.svg" alt="">
            </div>

            <div class="file-input">
                <div class="bg-bright p-normal max-content flex flex-column align-center">
                    <img id="image-display" style="border-radius: 4px;" width="80px" height="100px"
                        src="../../assets/icons/img.svg" alt="">
                    <p class="my">Photo of the product</p>
                </div>
                <input required onchange="displaySelectedImage()" accept=".jpg, .png, .jpeg" type="file" name="image" id="files">
            </div>

            <input required type="text" name="name" placeholder="Name of the product">

            <select required  name="category" id="categories">

            </select>

            <input required type="number" name="price" placeholder="price of the product (in USD)" id="">

            <input type="submit" name ="submit" value="Add product">
            
        </div>
</form>

    </div>
    <!-- end add product modal  -->

    
    <script src="../../assets/js/admin.js"></script>

    <script src="../../assets/js/index.js"></script>

    </script>

</body>

</html>