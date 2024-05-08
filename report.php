<?php
include 'db.php';

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

<form action="" method="post">
    <label for="">start</label>
    <input type="date" name="date1" id="">
    <label for="">end</label>
    <input type="date" name="date2" id="">
    <input type="submit" value="generate" name="save">
</form>
    <table>
        <tr>
            <th>#</th>
            <th>product name</th>
            <th>date</th>
            <th>quantity</th>
            <th>unique price</th>
            <th>total price</th>
        </tr>
        <?php
        if(isset($_POST['save'])){

            $date_1  = $_POST['date1'];
            $date_2 = $_POST['date2'];
            $select = "SELECT * FROM `product` INNER JOIN productin ON product.product_id = productin.productin_id
             WHERE productin.date BETWEEN '$date_1' AND '$date_2'";
            $qury=mysqli_query($con,$select);
            while($row = mysqli_fetch_array($qury)){ ?>

            <tr>
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row[1] ?></td>
                <td><?php echo $row[3] ?></td>
                <td><?php echo $row[4] ?></td>
                <td><?php echo $row[5] ?></td>
                <td><?php echo $row[6] ?></td>
            </tr>

                <?php
            }
             
            
            }
        ?>
    </table>
</body>
</html>