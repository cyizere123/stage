<?php
include('db.php');
if(isset($_POST['send'])){
    $date=$_POST['date'];
    $quantity=$_POST['quantity'];
    $unique_price=$_POST['unique_price'];
    $tot = $quantity * $unique_price;

     $insert="INSERT INTO `productin` VALUES ('','$date','$quantity','$unique_price','$tot')";
     if(mysqli_query($con,$insert)){
        echo"ensert done";
     }else{
        echo"ensert failed";
     }
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="date" name="date" placeholder="date"><br><br>
        <input type="number" name="quantity" placeholder="quantity"><br><br>
        <input type="number" name="unique_price" placeholder="unique_price"><br><br>
        <input type="submit" value="send" name="send">
    </form>
</body>
</html>