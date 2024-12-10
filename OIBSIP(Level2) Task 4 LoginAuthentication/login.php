<?php  include("connection.php")?>
<?php 
  session_start();
  
 error_reporting (0);
 
  if(isset($_SESSION['username'])){
    header("Location: index.php");
  }
 if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $password = md5($_POST['password']);

   $sql ="SELECT * FROM register WHERE email='$email' AND password ='$password'";
   $result = mysqli_query($conn,$sql);
   if($result ->num_rows > 0){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username']; 
      header("Location: index.php");
   }else{
    echo "<script>alert('Username or Password is  Wrong')</script>";
   }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--MAIN CSS-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>Login Now</h1>
            <p>Please fill in this form to login.</p>
            <hr>
        
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="" name="email" value="<?php echo $email; ?>" required>

        
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="" name="password" value="<?php echo $_POST['password']; ?>" required>
                          
           <button type="submit" name="submit" class="signupbtn">Login</button>
            </div>

           <div class="signin">
                <p>Don't have an account? <a href="Register.php">Register</a>.</p>
              </div>
    </form> 
</body>
</html>