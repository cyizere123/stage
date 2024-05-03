<?php
include('db.php');
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $select="SELECT * FROM `shopkeeper` WHERE `username`='$username' AND `password`='$password'";
    if(mysqli_query($con,$select)){
        header('location:dashboard.php');
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
    <center>
<form action="" method="post">
        <h1>LOGin</h1>
        <input type="text" name="username" placeholder="username"><br><br>
        <input type="password" name="password" placeholder="password"><br><br>
        <input type="submit" value="login" name="login">

    </form>
</center>
</body>
</html>