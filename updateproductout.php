<?php
include('db.php');
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
        <?php
        $id= $_GET['id'];
        $sel="SELECT * FROM `productout` WHERE `productout_id`='$id'";
        $qry=mysqli_query($con,$sel);
        $tak=mysqli_fetch_array($qry);
        ?>
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



    <input type="date" name="date" value="<?php echo $tak[1] ?>" placeholder="date"><br><br>
        <input type="number" name="quantity" value="<?php echo $tak[2] ?>" placeholder="quantity"><br><br>
        <input type="number" name="unique_price" value="<?php echo $tak[3] ?>"  placeholder="unique_price"><br><br>
        <input type="submit" value="save" name="save">
    </form>
    <?php
    if(isset($_POST['save'])){
    $pro_name=$_POST['b'];
    $date=$_POST['date'];
    $quantity=$_POST['quantity'];
    $unique_price=$_POST['unique_price'];
    $tot=$quantity*$unique_price;
    
    $update="UPDATE `productout` SET `productout_id`=' $pro_name',`date`='$date',`quantity`='$quantity',`unique_price`='$unique_price',`totalprice`='$tot'
     WHERE `productout_id`='$id'";
    if(mysqli_query($con,$update)){
        header("location:productout.php");
    }
    else{
        echo"failed";
    }
}
        ?>  
</body>
</html>