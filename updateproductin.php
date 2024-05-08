
<?php
include('db.php');


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
      

        <?php
            $id = $_GET['id'];
            $sel = "SELECT * FROM `productin` WHERE `productin_id` = '$id'";
            $qry = mysqli_query($con,$sel);
            $row = mysqli_fetch_array($qry);
        ?>
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
        <input type="date" value="<?php echo $row[1] ?>" name="date" placeholder="date"><br><br>
        <input type="number" value="<?php echo $row[2] ?>" name="quantity" placeholder="quantity"><br><br>
        <input type="number" value="<?php echo $row[3] ?>" name="unique_price" placeholder="unique_price"><br><br>
        <input type="submit" value="send" name="send">

        <?php
    if(isset($_POST['send'])){
        $pr_name = $_POST['p'];
        $date=$_POST['date'];
        $quantity=$_POST['quantity'];
        $unique_price=$_POST['unique_price'];
        $tot = $quantity * $unique_price;
    
         $insert="UPDATE `productin` SET `productin_id`='$pr_name',`date`='$date',`quantity`='$quantity',`unique_price`='$unique_price',`totalprice`='$tot' WHERE  `productin_id` ='$id'";
         if(mysqli_query($con,$insert)){
           header('location:productin.php');
         }else{
            echo"ensert failed";
         }
    }
        ?>
    </form>
   
</body>
</html>

