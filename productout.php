<?php
include('db.php');



session_start();
if(empty($_SESSION['username'])){
    header('location:login.php');
}



if(isset($_POST['save'])){
    $prot_name=$_POST['b'];
    $date=$_POST['date'];
    $quantity=$_POST['quantity'];
    $unique_price=$_POST['unique_price'];
    $tot=$quantity*$unique_price;
    
    $insert="INSERT INTO `productout` VALUES ('$prot_name','$date','$quantity','$unique_price','$tot')";
    if(mysqli_query($con,$insert)){
        echo"done";
    }
    else{
        echo"failed";
    }
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $dele="DELETE FROM `productout` WHERE `productout_id`='$id'";
    $sql=mysqli_query($con,$dele);
    header("location:productout.php");
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
            <a href="signup.php">shopkeeper</a>
        </li>
        <li>
            <a href="productin.php">productin</a>
        </li>
        <li>
            <a href="productout.php">productout</a>
        </li>
    </ul>
    <form action="" method="post">
    <select name="b" id="">
            <option value="">select from above</option>
            <?php
            $sel="SELECT * FROM `product`";
            $qry=mysqli_query($con,$sel);
            while($row = mysqli_fetch_array($qry)){?>
            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php
            }

            ?>
         </select>        
            
    <input type="date" name="date" placeholder="date"><br><br>
        <input type="number" name="quantity" placeholder="quantity"><br><br>
        <input type="number" name="unique_price" placeholder="unique_price"><br><br>
        <input type="submit" value="save" name="save">
    </form>
    <table>
        <tr>
            <td>#</td>
            <td>pro_name</td>
            <td>date</td>
            <td>quantity</td>
            <td>unique_price</td>
            <td>total price</td>
            <td colspan="2">action</td>
            <?php
            $sel="SELECT * FROM `productout` INNER JOIN product WHERE productout.productout_id=product.product_id; ";
            $query=mysqli_query($con,$sel);
            if(mysqli_num_rows($query) >0){
                while($row=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[6]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
                    <td><?php echo $row[4]?></td>
                    <td><a href="updateproductout.php?id=<?php echo $row[0] ?>">update</a></td>
                    <td><a href="?delete=<?php echo $row[0]?>">delete</a></td>
                </tr>
                <?php

                }
            }
            ?>
        </tr>
    </table>
</body>
</html>