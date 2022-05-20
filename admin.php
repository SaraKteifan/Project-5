<?php
include_once 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/aca8d5a1fa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/Admin.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div id="parent">
            <div class="col-11">
                <img src="./Images/logo.png" alt="logo">
                <span>Admin Dashboard</span>
            </div>
            <div class="col">
                <a href=""><span>Log Out</span></a>
            </div>
        </div>
    </nav>

    <div class="body">
        abc
        <table>
            <tr>
                <th>ID</th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
                <th>USER NAME</th>
            </tr>

            <!-- <tr>
                <td>ID</td>
                <td>PRODUCT NAME</td>
                <td>QUANTITY</td>
                <td>$ PRICE</td>
                <td>USER NAME</td>
            </tr> -->

            <?php
                    switch ('sales') {   
                        case 'sales':
                            $query= "SELECT * FROM `order` INNER JOIN products ON `products`.id = `order`.product_id INNER JOIN user
                            ON user.user_id=order.user_id;";
                            $result= mysqli_query($conn, $query);
                            $resultcheck = mysqli_num_rows($result);
                
                                        
                                    // echo '<table>
                                    // <tr>
                                    //     <th>ID</th>
                                    //     <th>PRODUCT NAME</th>
                                    //     <th>QUANTITY</th>
                                    //     <th>PRICE</th>
                                    //     <th>USER NAME</th>
                                    // </tr>';
                                        if($resultcheck > 0)
                                        {
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        echo '<tr>
                                                <td>'.$row["id"].'</td>
                                                <td>'.$row["name"].' NAME</td>
                                                <td>'.$row["quantity"].'</td>
                                                <td>$'.$row["price"].'</td>
                                                <td>'.$row["first_name"].' '.$row["last_name"].'</td>
                                            </tr>';
                                        }
                                        }
                                        // echo '</table>';
                            break;
                
                        case 'users':
                            # code...
                            break;
                
                        case 'categories':
                            # code...
                            break;
                
                        case 'products':
                            # code...
                            break;
                        
                        // default:
                        //     # code...
                        //     break;
                    }
            ?>

        </table>
    </div>
</body>
</html>