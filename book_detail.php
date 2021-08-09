<?php include("includes/navbar.php");
 ?>
<?php
include('connection.php');
function remove_qnt()
{
	include('connection.php');
	$res=$_POST["hidden_qnt"]-$_POST["quantity"];//10 9 1
	$sql1="update books set book_quantity='".$res."'where book_isbn='". $_GET["book_id"]."'";
	$retval = mysqli_query($con, $sql1);
  mysqli_close($con);
}
function check($s)
{
  include('connection.php');
  $flag=0;
  $sql2="SELECT * FROM books Where book_name='$s'";
  $query12=mysqli_query($con,$sql2);
  $path="";
  $path1="";
  while($result=mysqli_fetch_array($query12))
  {
    if($result['book_quantity'] >0)
    {
      // $result['book_quantity']--;
      // $sql5="update books set book_quantity=$result where book_isbn=$book_id";
      // $query5=mysqli_query($con,$sql5);
      $path="payment.php?id=";
      $path.=$result['book_isbn'];
      $flag=1;
     
     
    }
    else
    {
      echo '<script>alert("no more quantity for this item")</script>';
      $path1="book_detail.php?book_id=";
      $path1.=$result['book_isbn'];
      $flag=0;
      
    }
    

  }
  if($flag==1)
  {
    return $path;
  }
  return $path1;
  
}

?>
<?php
if(isset($_POST["add_to_cart"]) )
{
  
  if($_POST["quantity"]>=1)
  {
  if($_POST["hidden_qnt"]>=1 && $_POST["hidden_qnt"]-$_POST["quantity"]>=0) 
   {
	remove_qnt();
  
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["book_id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["book_id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
        'item_quantity'		=>	$_POST["quantity"],
        'item_image'		=>	$_POST["hidden_image"],
        'item_cat'   =>$_POST["hidden_cat"],
		'item_isbn' =>$_POST["isbn"],
		'item_qnt' =>$_POST["hidden"],
    'item_pdf' =>$_POST["pdf"],
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
      
		}
		else
		{
    
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["book_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
      'item_quantity'		=>	$_POST["quantity"],
      'item_image'		=>	$_POST["hidden_image"],
      'item_cat'   =>$_POST["hidden_cat"],
	   'item_isbn' =>$_POST["isbn"],
     'item_qnt' =>$_POST["hidden"],
		);
		$_SESSION["shopping_cart"][0] = $item_array;
    
   
	}
}
else
{
  echo '<script>alert("the quantity of the book is lower than your request quantity")</script>';
}
}
else
{
  echo '<script>alert("enter a valid quanity please")</script>';
}
  
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deatils</title>
    <link rel="stylesheet" href="css files/book_details.css">
    <link rel="stylesheet" href="css files/description.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!--<script src="javascript files/description.js"></script>-->
<script src="javascript files/num_check.js"></script>
    <!--  -->
  </head>
  <body>
      <br>
    <?php
    if(isset($_GET['book_id']))
    {
        $Did=$_GET['book_id'];
    }
    ?>
    <?php
       $query1 = "SELECT * FROM books where book_isbn = '$Did'";
       $sql = mysqli_query($con,$query1);
      
       while($row = mysqli_fetch_array($sql))
       {
    ?>
    <style>
      #img1
      {
        height: 450px;
        width: 150px;
      }
    </style>
<div class = "card-wrapper">
<form method="post">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img id="img1" name="image" src = "books_images/<?php echo $row['book_cat'] ?>/<?php echo $row['book_image'];?>">
            </div>
          </div>
          <div class = "img-select">
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 ><?php echo $row['book_name']; ?></h2>
          <div class = "product-price">
             </span></p>
            <p name="price" class = "last-price">Old Price: <span><?php echo $row['book_price']*2;?>$</span></p>
            <p class = "new-price">New Price: <span><?php echo $row['book_price']; ?>$</span></p>
          </div>
          <div class = "product-detail">
            <ul style="margin-left:-25px;">
            <?php
            $message="";
            if($row['book_quantity']>0)
            {
              $message="in stock";

            }else
            {
              $message="out of stock";

            }
            ?>
              <li>Available: <span><?php echo $message;?></span></li>
              <li name="cat">Category: <span><?php echo $row['book_cat'];?></span></li>
              <li>Shipping Area: <span>All over the world</span></li>
              <li>Shipping Fee: <span>Free</span></li>
              <li>book isbn: <span><?php echo $row['book_isbn'];?></span></li>
            </ul>
          </div>
           <div class = "purchase-info">
           <button id="myBtn" type="button"  class = "btn">Description </button>
                  <div id="myModal" style="margin-left:30px;" class="modal">
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <p><?php echo $row['book_description']; ?></p>
                </div>
              </div>
               <div>
              <button class="btn" onclick="convert(<?php echo $row['book_price'];?>)"  type="button"  >convert price to euro & dollar  </button>
              </div>
           <p style="font: size 15px;">enter quantity</p>
          
            <input type = "number" name="quantity" placeholder="enter quantity">
            <a name="buy_now" href="">
            <button name="buy_now" type="submit" class = "btn" >
              buy now <i class = "fas fa-shopping-cart"></i>
            </button>
            </a>
          
            <a href="cart.php?id=<?php echo $row["book_isbn"];?>">
            <button type="submit"   name="add_to_cart"  class = "btn">add to cart</button>
            </a>
            <input type="hidden" name="hidden_name" value="<?php echo $row["book_name"]; ?>" />
            <input type="hidden" name="hidden_name" value="<?php echo $row["book_name"]; ?>" />
           <input type="hidden" name="hidden_price" value="<?php echo $row["book_price"]; ?>" />
           <input type="hidden" name="hidden_image" value="<?php echo $row["book_image"]; ?>" />
           <input type="hidden" name="hidden_cat" value="<?php echo $row["book_cat"]; ?>" />
           <input type="hidden" name="hidden_qnt" value="<?php echo $row["book_quantity"]; ?>" />
           <input type="hidden" name="hidden" value="<?php echo $row["book_quantity"]; ?>" />
           <input type="hidden" name="isbn" value="<?php echo $row["book_isbn"]; ?>" /> 
           <input type="hidden" name="pdf" value="<?php echo $row["book_pdf"]; ?>" />  
          </div>
        </div>
      </div>
      </form>
      
    </div>
<?php
       }
       ?>
       <script>
function convert(num) 
{
 var dollar=num*3.25;
 var euro=num*3.97;
 alert("the price in dollar is:"+ " "+dollar.toFixed(2)+"$"+"\n"+ "the price in euro is"+" "+euro.toFixed(2)+"€");
}
</script>
<script src="javascript files/description.js"></script>
</body>
</html>
<?php 
include('includes/footer.php');
mysqli_close($con);
?>
