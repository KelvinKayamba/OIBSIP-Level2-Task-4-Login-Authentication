<?php  include("connection.php")?>
<?php
error_reporting(0);

session_start();
if(isset($_SESSION['username'])){
    header("Location: login.php");
  }

   if(isset($_POST['submit']))
   {
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = md5($_POST['password']);
       $cpassword = md5($_POST['cpassword']);

       if($password == $cpassword){
           $sql = "INSERT INTO register(username,email,password)
           VALUES('$username','$email','$password')";
           $result = mysqli_query($conn ,$sql);
           if($result){
            header("Location: login.php");
          /* echo "<script>alert('Registration is Successful.')</script>"; */ 
            $username ="";
            $email = "";
            $_POST['password'] ="";
            $_POST['cpassword']="";
           }else{
            echo "<script>alert('Sorry something went wrong')</script>";
           }
       }
       else{
            echo "<script>alert('Password Not Matched.')</script>";
       }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--MAIN CSS-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post" autocomplete="off">
        <div class="container">
            <h1>Register Now</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
             
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="" name="username" value="<?php echo $username; ?>" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="" name="email" value="<?php echo $email; ?>" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="" name="password" value="<?php echo $_POST['password']; ?>" required>

            <label for="cpassword"><b> Confirm Password</b></label>
            <input type="password" placeholder="" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
        
           <button type="submit" name="submit" class="signupbtn">Register</button>
            </div>

           <div class="signin">
                <p>Already have an account? <a href="login.php">Login</a>.</p>
              </div>
    </form>
</body>
</html>