<?php 
require "connection.php";
session_start();
$email = "";
$name = "";
$errors = array();
//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
   
    $join=mysqli_real_escape_string($con, $_POST['grp']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }  
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status,group_joining)
                        values('$name', '$email', '$encpass', '$code', '$status','$join')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: oldscroll14@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
    mysqli_close($con);
}
    //if user click verification code submit button
    if(isset($_POST['check']))
    {
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: login-user.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
        mysqli_close($con);
    }
 //this is for contact us reciver from users
   
    if(isset($_POST['button']))
    {
        $user_name=$_POST['name'];
        $user_email=$_POST['email'];
        $user_message=$_POST['message'];
        $message="old scroll website";
        $contect="we will check your report."."\n"."and respond you as soon as possible";
        $query="INSERT INTO users_reports(name,email,message) VALUES ('$user_name','$user_email','$user_message')";
        $res=mysqli_query($con,$query);
        if($res)
        {
           if(mail($user_email,$message,$contect))
           {
            echo "<script> alert('your request sended to company's mail')</script>";

           }
           else
           {
               echo "<script> alert('there was a problem sending the report to the')</script>";

           }
        }
        else
        {
            echo "<script> alert('there was a problem inserting the data into database')</script>";
        }
       
         mysqli_close($con);
    
    }
    

    

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
        mysqli_close($con);
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: oldscroll14@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
        mysqli_close($con);
    }
    

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
        mysqli_close($con);
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
        mysqli_close($con);
    }
    //check for buy now button
    if(isset($_POST['buy_now']))
    {
        echo "<script> alert('good okay')</script>";
          echo $_GET["cid"];
        if(isset($_GET["cid"]))
        {
            $book_id=$_GET["cid"];
            $sql="SELECT * FROM books WHERE book_isbn='$book_id'";
            $query=mysqli_query($con,$sql);
            if($query)
            {
                if($_POST['hidden_qnt'] >0)
                {
                    $qty=$_POST['hidden_qnt']-1;
                    $sql1="update books set book_quantity=$qty where book_isbn=$book_id";
                    $query1=mysqli_query($con,$sql1);
                    if($query1)
                    {
                        echo "<script> alert('okay')</script>";
                        header('location:payment.php?cid='.$book_id.'');
                    }
                    else
                    {
                        echo "<script> alert('not okay')</script>";
                    }


                } else
                {
                    echo "<script> alert('quantity is zero for this selected book')</script>";
                }
            }
            else
            {
                echo "<script> alert('query is not working')</script>";
            }

        }
        else
        {
            echo "<script> alert('fuck')</script>";
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>