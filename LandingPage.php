<?php
include_once 'connect.php';

if(isset($_GET["id"])){
  $user_id= $_GET["id"];
}
if(!isset($_GET["id"])){
  $shoppath= 'ProductsPage.php';
  $categorypath= 'CategoriesPage.php?';
  $cartpath= 'other/cart.php';
}else{
  $shoppath= 'ProductsPage.php?id='.$user_id;
  $categorypath= 'CategoriesPage.php?id='.$user_id.'&';
  $cartpath= 'other/cart.php?id='.$user_id;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/LandingPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ccfa87eec6.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <!-- //////////////////Header//////////////////// -->
    <header>
        <nav>
        <div id="navdiv">
            <div id="navdiv1" class="col-6">
                <img src="./Images/logo.png">
                <a href="">Home</a>
                <a href="<?php echo $shoppath; ?>">Shop</a>
                <a href="<?php echo $cartpath; ?>">Cart</a>
                <a href="aboutUs.html">About Us</a>
                <a href="contactUs.html">Contact Us</a>
            </div>
            
            <div id="navdiv2" class="col-2">
              <?php
              if(!isset($_GET["id"])){
                echo '<a href="login.php">Login</a>
                      <a href="signup.php">Register</a>';
              }else{
                echo '<a href="userpage.php?id='.$user_id.'">Account</a>';
                echo '<a href="LandingPage.php">Log Out</a>';
              }
                ?>
            </div>
        </div>
        </nav>
        <div>
            <h1 id="headerh1">Welcome to Beauty Care Store</h1>
            <p id="headerp">Explore your beauty with our magnificent products</p>
            <a class="button" href="<?php echo $shoppath; ?>">Explore Our Products</a>
        </div>
    </header>


    <!-- //////////////////Body//////////////////// -->
    <h1 id="categories-h1">Categories</h1>
    <div id="categories">
        <a class="button" href="<?php echo $categorypath.'cat_id=2' ?>">Fragrance</a>
        <a class="button" href="<?php echo $categorypath.'cat_id=3' ?>">Makeup</a>
        <a class="button" href="<?php echo $categorypath.'cat_id=1' ?>">Hair products</a>
        <a class="button" href="<?php echo $categorypath.'cat_id=4' ?>">Skin Care</a>
    </div>

    <h1 id="discount-h1">Discount Section</h1>
    <div id="discount" class="container">
        <div class="col-3">
            <img src="./Images/Product1.jpg">
            <h4>Ariana Grande Cloud Eau de Parfum Spray</h4>
            <p>$55.99</p>
        </div>

        <div class="col-3">
            <img src="./Images/Product2.jpg">
            <h4>VERSACE Eros Eau De Parfum Spray for Women
            </h4>
            <p>$99.99</p>
        </div>

        <div class="col-3">
            <img src="./Images/Product3.jpg">
            <h4>Versace Versace Dylan Blue Pour Femme</h4>
            <p>$160</p>
        </div>
    </div>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="./Images/Slider1.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: black;">Get your beloved one the best gift ever</h3>
              <p></p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="./Images/Slider2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: black;">Treat yourself with our high quality products</h3>
              <p></p>
            </div>
          </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="./Images/Slider3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: white;">Make your world more colorful</h3>
              <p></p>
            </div>
          </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- //////////////////Footer//////////////////// -->
    <footer>
    <div id="footerdiv">
        <div class="col-3">
            <img src="./Images/logo.png">
        </div>
        <div class="col-3">
            <h1 style="text-align: center;">Follow US</h1><br>
            <p style="text-align: center;">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-linkedin"></i>
            </p>
            <br>
            <p style="text-align: center;">copyright <i class="fa-solid fa-copyright"></i> 2022 BeautyCare</p>
        </div>
        <div class="col-3">
            <a href="">Home</a>
            <a href="">Shop</a>
            <a href="">Contact Us</a>
            <a href="">Login</a>
            <a href="">Register</a>
        </div>
    </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>