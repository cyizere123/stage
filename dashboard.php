<?php
include 'db.php';
session_start();
if(empty($_SESSION['username'])){
    header('location:login.php');
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
<body>
<body>
    <h1>welcome to dashboard</h1>

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
</body>
</html>