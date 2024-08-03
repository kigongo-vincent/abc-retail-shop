<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page for ABC Retail shop</title>

    <!-- css  -->
    <link rel="stylesheet" href="../../assets/styles/splash.css">

</head>

<body>

    <!-- main container  -->
    <div>

        <!-- splash image  -->
        <img loading="lazy" src="../../assets/images/spash.png" alt="">

        <!-- welcome message  -->
        <div class="flex align-center bg-warning text-light p-normal my rounded">
            <img height="20px" src="../../assets/icons/circle-info.svg" alt="">
            <span class="mx w-100">Welcome back, kigongo, please provide your password to continue</span>
        </div>

        <!-- email input  -->
        <form action="">
            <div>
                <img height="15px" src="../../assets/icons/key.svg" alt="">
                <input type="password" placeholder="your password" required>
            </div>

            <div>
                <u>proceed as guest</u>
                <input type="submit" value="Continue">
            </div>
        </form>


    </div>

    <!-- js  -->
    <script src="../js/index.js"></script>

</body>

</html>