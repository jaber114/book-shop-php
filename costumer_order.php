<?php
include('connection.php');
require('includes/login_info.php');
include('includes/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>

<div class="container">
    <center>
    <div class="row header" style="margin-left:300px;color:orange">  
        <h1>costumers order table</h1>   
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>order name</th>
                <th>order isbn</th>
                <th>order quantity</th>
                <th>order price</th>
                <th>order number</th>
                <th>order image</th>
                <th>order_date</th>
                <th>cancel order</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $name=$fetch_info['email'];
            $sql="SELECT * FROM user_order Where costumer_email='$name'";
            $query=mysqli_query($con,$sql);
            $sum=0;
            while($row=mysqli_fetch_array($query))
            {
             ?>
                 
                <td><?php echo $row['order_name'];?></td>
                <td><?php echo $row['order_isbn'];?></td>
                <td><?php echo $row['order_quantity'];?></td>
                <td><?php echo $row['order_price'];?>₪</td>
                <td><?php echo $row['order_number'];?></td>
                <td>
                <img style="width:41px;" src="books_images/<?php echo $row['order_cat'];?>/<?php echo $row['order_image'];?>"
                >
                </td>
                <td><?php echo $row['order_date'];?></td>
                <td>
                    <a href="cancel_order.php?id=<?php echo $row['order_number'];?>">cancel order</a>
                </td>
               
            </tr>
            <?php
            $sum+=$row["order_price"]*$row["order_quantity"];
            }
            ?>
        </tbody>
       
    </table>
</div>   
</body>
</html>
<?php
echo '<h4>';

echo '<center>';
echo "total sum of you orders is".'&nbsp'; 
echo $sum;
echo '</center>'; 
echo '</h4>';
?>
<?php 
include('includes/footer.php');
mysqli_close($con);
?>
