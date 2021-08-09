<?php
include('includes/navbar.php');
?>
<?php
    if(isset($_POST["submit"]))
    {
    header('location:cart.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css files/payment.css">
</head>
<body>
<br>
<center>
<h2>please fill your billing and shipping address to complete your order</h2>
</center>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post" >
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="">
            <label for="adr"><i class="fa fa-address-card-o"></i> pick up Address</label>
            <input type="text" id="adr" name="address" placeholder="">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="">
            <label for="city"><i style="font-size:24px" class="fa">&#xf11d;</i> country</label>
            <input type="text" id="city" name="country" placeholder="">

            <div class="row">
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container1">
            <i class="fa fa-cc-visa" style="color:navy;"></i>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="icon-container1">
            <i class="fa fa-cc-amex" style="color:blue;"></i>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="icon-container1">
            <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="icon-container1">
            <i class="fa fa-cc-discover" style="color:green;"></i>
            </div>
           
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn1">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container"   >
    <?php
      if (isset($_SESSION['shopping_cart']))
      {
        $count = count($_SESSION['shopping_cart']);
        
       
   
    ?>
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";?>
</b></span></h4>
      <?php
        } else{
          echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
      }
      ?>
     
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
    
    
      <hr>
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div>
  
<?php
include('includes/footer.php');
?>
</body>
</html>