<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page for ABC Retail shop</title>

    <!-- css  -->
    <link rel="stylesheet" href="../../assets/styles/splash.css">

</head>

<?php

$name = "";

$email = "";

$has_account = "";

if(isset($_GET["name"])){

    $email = $_GET["name"];

}

if(isset($_GET["email"]) && isset($_GET["has_account"])){

    $email = $_GET["email"];

    $has_account = $_GET["has_account"];

}

?>

<body>

    <!-- main container  -->
    <div>

        <!-- splash image  -->
        <img loading="lazy" src="../../assets/images/spash.png" alt="">

        <!-- welcome message  -->
        <?php if($has_account == "true"): ?>

            <div class="flex align-center bg-warning text-light p-normal my rounded">
            <img height="20px" src="../../assets/icons/circle-info.svg" alt="">
            <span class="mx w-100">Welcome back <?php echo $name ?>, please provide your password to continue</span>
        </div>

        <?php else: ?>

            <div class="flex align-center bg-warning text-light p-normal my rounded">
            <img height="20px" src="../../assets/icons/circle-info.svg" alt="">
            <span class="mx w-100">You are most welcome, please provide the password you would wish to use when signing in. you are almost there!</span>
        </div>

        <?php endif; ?>    

        <!-- email input  -->
        <form method="post" action="<?php if($has_account == "true"): ?> <?php echo "../../controllers/signin.php"; ?> <?php else: ?> <?php echo "../../controllers/signup.php"; ?>  <?php endif; ?>">

            <div>
                <img height="15px" src="../../assets/icons/key.svg" alt="">
                <input type="email" hidden value="<?php echo $email ?>" name="email">
                <input type="password" name="password" placeholder="your password" required>
            </div>

            <div>
                <u>proceed as guest</u>
                
                <?php if($has_account == "true"): ?>

                    <input name = "submit" type="submit" value="Signin">

                <?php else: ?>    

                    <input name = "submit" type="submit" value="Signup">

                <?php endif ?>    
            </div>
        </form>


    </div>

    <!-- js  -->
    <script src="../js/index.js"></script>

</body>

</html>