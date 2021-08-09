<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login-user.php" method="POST" id="Form"  onsubmit="return form(Form)">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                    <script src="javascript files/forms.js"></script>
                </form>
            </div>
        </div>
    </div>
    <?php
    mysqli_close($con);
    ?>
</body>
</html>