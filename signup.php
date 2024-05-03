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
    <title>Document</title>
</head>
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