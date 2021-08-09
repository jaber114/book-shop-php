
<!DOCTYPE html>
<html lang="en">
<head>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="css files/contact1.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="javascript files/form.js"></script>

    <title>Document</title>
</head>
<body>
<?php
include('controllerUserData.php'); 
$email = $_SESSION['email'];
 include('includes/navbar.php');
?>
<div class="wrapper rounded d-flex align-items-stretch">
    <div class="bg-yellow">
        <div class="text-white"> <span class="far fa-envelope"></span> </div>
        <div class="pt-5 cursive"> Please describe your product idea in a nutshell </div>
        <div class="pt-sm-5 pt-5 cursive mt-sm-5"> We need your email to reach you back </div>
    </div>
    <div class="contact-form">
        <div class="h3">contact form</div>
        <script src="javascript files/contact.js"></script>

        <form action="contact.php" method="POST" id="Form" onsubmit="check(Form)">  
            <div class="d-flex align-items-center flex-wrap justify-content-between pt-4">
                <div class="form-group pt-lg-2 pt-3"> <label for="name">Your Name</label>
				 <input type="text" name="name" class="form-control" required>
				 </div>
                <div class="form-group pt-lg-2 pt-3">
					 <label for="email">Your Email</label>
					  <input type="email" name="email" class="form-control" required>
					 </div>
            </div>
			<div class="form-group pt-3">
				 <label for="message">Message</label>
				  <textarea name="message" class="form-control" required>
				  </textarea> 
				</div>
            <div class="d-flex align-items-center flex-wrap justify-content-between pt-lg-5 mt-lg-4 mt-5">
                
                     <input style="color:black; background-color:orange; width: 60px; height:30px;" type="reset" value="Reset">
                
                <input style="color:black; background-color:orange; width: 60px; height:30px;" name="button" type="submit" value="submit" >
            </div>
        </form>
    </div>
</div> 
<br>
</body>
</html>
<?php 
include('includes/footer.php');
?>

