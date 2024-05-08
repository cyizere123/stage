<?php
include('db.php');
if(isset($_POST['signin'])){
    $fullname=$_POST['fullname'];
    $enterpassword=$_POST['enterpassword'];
    $insert="INSERT INTO `shopkeeper` VALUES ('','$fullname','$enterpassword')";
    if(mysqli_query($con,$insert)){
        header('location:login.php');
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <title>Document</title>
</head>


    <ul>
        <li>
            <a href="product.php">product</a>
        </li>
        <li>
        <a href="#">shopkeeper</a>
        </li>
        <li>
        <a href="productin.php">productin</a>
        </li>
        <li>
        <a href="productout.php">productout</a>
        </li>
    </ul>
<body><center>
    <form action="" method="post">
        <h1>create account</h1>
        <input type="text" name="fullname" placeholder="fullname"><br><br>
        <input type="password" name="enterpassword" placeholder="enterpassword"><br><br>
        <input type="submit" value="signin" name="signin">
     
    </form>
</center>
</body>
</html>