<?php
include_once '../connect.php';
session_start();
$id= $_GET["id"];

if(isset($_GET['del_pro'])){
    $del_pro= $_GET['del_pro'];
    $query2= "DELETE FROM cart WHERE product_id=$del_pro AND user_id=$id;";
    $result2= mysqli_query($conn, $query2);
}

if(isset($_POST['save'])){
    $newquan= $_POST['quan'];
    $quanid= $_POST['quanid'];
    echo $newquan;
    echo "/".$quanid;
    echo "/".$id;
    $query3= "UPDATE cart SET quantity=$newquan WHERE product_id=$quanid AND user_id=$id;";
    $result3= mysqli_query($conn, $query3);
}

if(isset($_POST['checkout'])){

    header("location:checkout.php");
}
$query="SELECT * FROM cart INNER JOIN products WHERE cart.product_id=products.id  AND user_id=$id;";
$result= mysqli_query($conn, $query);
$resultcheck = mysqli_num_rows($result);
                    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <script src="https://kit.fontawesome.com/aca8d5a1fa.js" crossorigin="anonymous"></script>
    <title>Cart</title>
</head>
<body>
    <nav>
        <div class="logo">
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
        <h1 class="bhead">CART</h1>
        <div class="table">
            <div style="margin: auto;">
            <table>
                <tr>
                    <th>PRODUCTS</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>SUBTOTAL</th>
                </tr>
                <?php
                $sum=0;
                if($resultcheck > 0)
                    {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $i=1;
                        // if(!isset($_POST['save'])) {$q= $row['quantity'];}else{$q= $_POST['quan'.$i.''];};
                    echo '<form method="post"><tr>
                    <td style="position: relative;">
                        <div style="left: 0; margin: auto; display: flex; justify-content: space-around; align-items: center; width: 200px;">
                            <a href="cart.php?id='.$id.'&del_pro='.$row['id'].'"><i style="position: absolute; left: 10px;" class="fa-solid fa-circle-xmark"></i></a>
                            <img src=".'.$row['image'].'" width="50px" alt="">
                            <span>'.$row['name'].'</span>
                        </div>
                    </td>
                    <td>$'.$row['price'].'</td>
                    <td>
                        <input type="number" class="num" min="1" placeholder="'.$row['quantity'].'" name="quan" id="">
                        <input type="hidden" value="'.$row['product_id'].'" name="quanid">
                    </td>
                    <td>$'.($row['price']*$row['quantity']).'</td>
                    </tr>';
                    $sum+= ($row['price']*$row['quantity']);
                    $i++;
                    }} 
                    $_SESSION["total"]= $sum;
                    $_SESSION["id"]= $id;
                ?>

                <tr>
                    <td colspan="4" style="text-align: center; margin: auto;">
                        <input type="submit" value="Save Changes" name="save" class="change">
                    </td>
                </tr></form>
            </table>
                
                <div class="total">
                    <h3>CART TOTAL: $<?php echo $sum; ?></h3>
                    <form method="post">
                    <input type="submit" name="checkout" value="Checkout" class="change">
                    </form>
                </div>
            </div>
            
        </div>
    </div>


</body>
</html>
