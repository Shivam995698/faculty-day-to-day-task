


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS_LOGIN</title>
    <script src="includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body>
    <!-- <center><div class="row"></center>
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3 style="background-color:#5A8F7B; padding:5px; width:15vw;">User Login</h3></center>
            <form action="" method="post">
                <div class='form-group'>
                   <center> <input type='email' name="Email" class="form-control"  placeholder="Enter your email id" style="margin: bottom 3px;; width:28vh; height:4vh" required></center><br/>
                </div>
                <div class='form-group'>
                    <center><input type='password' name="Password" class="form-control"  placeholder="Enter your password" style="margin: bottom 4px;; width:28vh ;height:4vh" required><br/></center>
                </div>
                <div class="form-group">
                   <center><input type='submit' name="userLogin" value='Login' class='btn btn-warning' style=" width:13vh; height:3vh"></center>
                </div>
</form> -->
<!-- <a href="index.html" class="btn btn-danger" style="margin-top: 2vh;">Go to the home page</a>
    </div>
</div> -->

<div class="container">
        <div class="box form-box">
            <!-- <?php 
             
              include("../php/config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
              }else{

            
            ?> -->
            <header>Login</header>
            <form action="userDashboard.php" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="Email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="Password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="userLogin" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
                <div class="links">
                   <i>Forgot Password? </i> <a href="forgot.php">click here to get password.</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>