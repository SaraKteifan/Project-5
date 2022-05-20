<?php
include_once 'connect.php';

if(isset($_GET["id"])){
    $id= $_GET["id"];
    $loginpath= "&id=".$id;
    $cart = "other/cart.php?id=$id";
}else{
    $loginpath= "";
    $cart = "login.php";
}
if(isset($_GET["id"])){
    if(isset($_GET["add"])){
        $pro_id = $_GET['pro_id'];//$
        $query2= "SELECT * FROM cart WHERE product_id=$pro_id AND user_id=$id;";
        $result2= mysqli_query($conn, $query2);
        $resultcheck = mysqli_num_rows($result2);
        $row3 = mysqli_fetch_assoc($result2);
            if($resultcheck > 0)
            {
                $increase= $row3['quantity'] + 1;
                $query4= "UPDATE cart SET quantity= $increase WHERE product_id=$pro_id AND user_id=$id;";
                $result4= mysqli_query($conn, $query4);
            }else{
                $query5= "INSERT INTO cart(product_id, quantity, user_id) VALUES('$pro_id', 1, '$id');";
                $result5= mysqli_query($conn, $query5);
            }
    }
}
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
            <a href="<?php echo $cart;  ?>">CART</a>
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
                        if(isset($_GET["id"])){
                        $id= $_GET["id"];
                        $cartpath= 'ProductsPage.php?pro_id='.$row['id'].'&id='.$id.'&add=1';
                    }else{
                        $cartpath= "login.php";
                    }
                        echo '<div>
                        <a href="Product.php?pro_id='.$row["id"].$loginpath.'"><img src="'.$row["image"].'" alt="Product"></a>
                        <h5>'.$row["category_name"].'</h5>
                        <a href="Product.php?pro_id='.$row["id"].$loginpath.'"><h3>'.$row["name"].'</h3></a>
                        <h3>$'.$row["price"].'</h3>
                        <a href='.$cartpath.' id="addtocart">Add to Cart</a>
                        </div>';
                    }
                    }
           ?>
       
    </div>
</body>
</html>