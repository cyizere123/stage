<?php
include 'db.php';
session_start();
if(empty($_SESSION['username'])){
    header('location:login.php');
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
   
    <ul>
        <li>
            <a href="product.php">product</a>
        </li>
        <li>
        <a href="signup.php">shopkeeper</a>
        </li>
        <li>
        <a href="productin.php">productin</a>
        </li>
        <li>
        <a href="productout.php">productout</a>
        </li>
    </ul>
    <?php
include('db.php');
if(isset($_POST['ok'])){
    $product_name=$_POST['product_name'];
    $inst="INSERT INTO `product` VALUES ('','$product_name')";
    if(mysqli_query($con,$inst)){
        echo"insert done";
    }else{
        echo"ensert failed";
    }
}

?>

    <form action="" method="post">
    <input type="text" name="product_name" placeholder="product_name"><br><br>
    <input type="submit" value="send" name="ok">
    </form>
<table>
    <tr>
        <th>#</th>
        <th>product_name</th>
        
    </tr>
    <?php
    $sw = "SELECT * FROM `product`";
    $qr = mysqli_query($con,$sw);
    while($row = mysqli_fetch_array($qr)){ ?>
            <tr>
                <td><?php echo $row[0]?></td>
                <td><?php echo $row[1]?></td>
            </tr>
    <?php

    }
    ?>
</table>
</body>
</html>
