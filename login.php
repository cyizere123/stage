<?php
include('db.php');
session_start();
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $select="SELECT * FROM `shopkeeper` WHERE `username`='$username' AND `password`='$password'";
    $query = mysqli_query($con,$select);
    if($query){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $row['username'];
        header('location:dashboard.php');
    }else{
        echo "not martching";
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