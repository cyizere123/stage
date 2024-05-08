<?php
include('db.php');



session_start();
if(empty($_SESSION['username'])){
    header('location:login.php');
}

if(isset($_POST['send'])){
    $pro_id = $_POST['p'];
    $date=$_POST['date'];
    $quantity=$_POST['quantity'];
    $unique_price=$_POST['unique_price'];
    $tot = $quantity * $unique_price;

     $insert="INSERT INTO `productin` VALUES ('$pro_id','$date','$quantity','  $unique_price','$tot')";
     if(mysqli_query($con,$insert)){
        echo"ensert done";
     }else{
        echo"ensert failed";
     }
}

if (isset($_GET['delete'])) {
    $id=$_GET['delete'];
    $sql="DELETE FROM `productin` WHERE `productin_id`='$id'";
    $res= mysqli_query($con,$sql);
    header("location:productin.php");
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
    <form action="" method="POST">
        <select name="p" id="">
            <option value="">select any product</option>
            <?php 
            $sle = "SELECT * FROM `product`";
            $qry = mysqli_query($con,$sle);
            while($ro = mysqli_fetch_array($qry)){ ?>

            <option value="<?php echo $ro[0] ?>"><?php echo $ro[1] ?></option>

                <?php
            }
            ?>
        </select>
        <input type="date" name="date" placeholder="date"><br><br>
        <input type="number" name="quantity" placeholder="quantity"><br><br>
        <input type="number" name="unique_price" placeholder="unique_price"><br><br>
        <input type="submit" value="send" name="send">
    </form>
    <table border="2">
        
        <tr>
            <td>#</td>
            <td>pro_name</td>
            <td>date</td>
            <td>quantity</td>
            <td>unique_price</td>
            <td>total price</td>
            <td colspan="2">action</td>

            <?php
            $sel="SELECT * FROM `productin` NATURAL JOIN product WHERE productin.productin_id=product.product_id;";
           $query=mysqli_query($con,$sel);
           if(mysqli_num_rows($query) >0){

            while( $row= mysqli_fetch_array($query)){ ?>
                     
                <tr>

            <td><?php echo $row[0]?></td>
            <td><?php echo $row[6]?></td>
            <td><?php echo $row[1]?></td>
            <td><?php echo $row[2]?></td>
            <td><?php echo $row[3]?></td>
            <td><?php echo $row[4]?></td>
            <td><a href="?delete=<?php echo $row[0]?>">delete</a></td>
            <td><a href="updateproductin.php?id=<?php echo $row[0]?>">update</a></td>
        </tr>
            <?php

            }

           }
            ?>
        </tr>
    </table>

</body>
</html>