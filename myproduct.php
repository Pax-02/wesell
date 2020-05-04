<?php
session_start();
include('includes/log_check.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.html');
}

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Seller_user</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/SellerIndex.css">
    </head>
    <body>
        <header>
            <img class="logo" src="images/logo.png" style="width:50px;height:50px;">
            <ul class="option_links">
            <?php if (isset($_SESSION["user"])): ?>
                <li><a href="myproduct.php">My product</li>
                <li><a href="#">Sold Product</li>
                <li><a href="seller_index.php">Add Product</li>
                
                <?php endif ?>
                
            </ul>
            <Strong><a href="#">User: <?php echo $_SESSION['user']; ?></Strong>
            <Strong><a href="seller_index.php?logout="1">Log out<Strong>
            
        </header>

        <footer>
            <div id="product-view">
                <?php 
                    include('includes/functions.php');
                    $username=$_SESSION['user'];
                    $conn = DBConnect($GLOBALS['dbhost'], $GLOBALS['dbuser'], $GLOBALS['dbpass'], $GLOBALS['dbname']);
                    $query= "SELECT * FROM products WHERE username='$username'";
                    $result=mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div id='img_div'>";
                            echo "<div class=product-box>";
                                echo "<h2>".$row['product_name']."</h2>";
                                echo "<img src='uploads/".$row['image']."' >";
                                echo "<p>".$row['product_description']."</p>";
                            echo "</div>";
                        echo "</div>";
                      }                
                ?>
            </div>

        </footer>

        <script src="./seller_index.js"></script>
    </body>
</html>

