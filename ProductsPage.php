<?php
include_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/ProductsPage.css">
    <script src="https://kit.fontawesome.com/aca8d5a1fa.js" crossorigin="anonymous"></script>
    <title>Products</title>
</head>
<body>
    <nav>
        <div class="logodiv">
            <img src="./images/logo.png" width="200px" alt="">
        </div>
        <div class="tab1">
            <a href="">HOME</a>
            <a href="">PRODUCTS</a>
            <a href="">CART</a>
            <a href="">CONTACT US</a>
            <a href="">ABOUT US</a>
        </div>
        <div class="tab2">
            <a href="">LOGIN</a>
            <a href="">REGISTER</a>
        </div>
    </nav>

    <div class="board">
        <h1 class="bhead">Products</h1>
            <br>
        <div id="parent">
            <?php
            $query= "SELECT * FROM products INNER JOIN categories WHERE products.category_id = categories.category_id;";
            $result= mysqli_query($conn, $query);
            $resultcheck = mysqli_num_rows($result);
                    if($resultcheck > 0)
                    {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<div>
                        <a href="Product.php?pro_id='.$row["id"].'"><img src="'.$row["image"].'" alt="Product"></a>
                        <h5>'.$row["category_name"].'</h5>
                        <a href=""><h3>'.$row["name"].'</h3></a>
                        <h3>$'.$row["price"].'</h3>
                        <input type="submit" value="Add to Cart">
                        </div>';
                    }
                    }
           ?>
       
    </div>
</body>
</html>