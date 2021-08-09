<?php
include('includes/navbar.php');
include('connection.php');
$copy_of_receipt="";
$number=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css files/receipt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
<br>
<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="website logo/logo.jpg" style="width: 150%; max-width: 180px" />
								</td>
								<td>
									Invoice #:<?php $t=time();
									 echo $row=rand(1000,9000);?><br />
									order_date:<?php echo (date("Y-m-d",$t));?> <br />                              
									Due: February 1, 2015
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Old scroll, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, CA 12345
								</td>
								<td>
									Acme Corp.<br />
									John Doe<br />
									john@example.com
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading">
					<td>Payment Method</td>
                     
					<td>Check #</td>
				</tr>

				<tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr>
              
				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>
                <?php
               $total=0;
               $res=0;	

              foreach($_SESSION["shopping_cart"] as $keys => $values)
               {
               ?>
				<tr class="item">
					<td><?php echo $values["item_name"];?></td>

					<td><?php echo $values["item_price"];?>$</td>
				</tr>
              <?php
                $total+=$values["item_price"]*$values["item_quantity"];
               }
              ?>
				<tr class="total">
					<td></td>
					<td>Total:<?php echo $total;?></td>
				</tr>
			</table>
		</div>
		<br>
		<center>
		<h4>rate your book here by clicking on the down button</h4>
		<a href="rate.php">
		<button  type="submit" name="rate"  class="w3-button w3-orange" >rate</button>
		</a>
        </center>
		<?php
		  	// $query="SELECT * from books where books_isbn='$values['book_isbn']";
			//  $sql=mysqli_query($con,$query); 
			// while($row=mysqli_query($sql))
			// {
		?>
		<?php
		 foreach($_SESSION["shopping_cart"] as $keys => $values)
		 {
			if($values['item_cat']=='h_digital_romantic_books' || $values['item_cat']=='E_digital_history_books' || $values['item_cat']=='E_digital_religion_books' || $values['item_cat']=='h_translate_books')
			{
		 ?>
		 <a href="download.php?id=<?php echo $values["item_isbn"];?>">
		     <?php echo $values['item_name'];?>
            <button type="submit"   name="download"  class = "btn">download</button>
            </a>

			<?php
			}
		 }
			?>
	

			
		
</body>
</html>
<?php
include('includes/footer.php');
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		unset($_SESSION["shopping_cart"][$keys]);
	}
}
mysqli_close($con);
?>