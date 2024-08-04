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

session_start();

if(isset($_SESSION["name"])){

    if($_SESSION["role"] == "admin"){
    
        header("Location: ./pages/admin/dashboard.php");
    
    }else{
    
        header("Location: ./pages/client/dashboard.php");
    
    }
}

?>

<body>

    <!-- main container  -->
    <div>

        <!-- splash image  -->
        <img loading="lazy" src="../../assets/images/spash.png" alt="">

        <!-- welcome message  -->
         <p>Welcome to ABC retail shop</p>

         <!-- email input  -->
        <form action="../../controllers/verifyEmail.php" method="post">

            <div>

                <img  src="../../assets/icons/email.svg" alt="">

                <input type="email" name="email" placeholder="your email" required>

            </div>

            <div>

                <u>proceed as guest</u>

                <input type="submit" name="submit" value="Continue">

            </div>

        </form>


    </div>

    <!-- js  -->
     <script src="../js/index.js"></script>
     
</body>

</html>