<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS</title>
    <script src="includes/jquery_latest.js"></script>
    <link rel="stylesheet" type='text/css' href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-image: url('niet3.jpg'); /* Specify the URL of your image */
            background-size: cover;; /* Cover the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
        }
        #home_page{
    background-color: black;
    margin-top: 25px;
    border-radius: 30px;
    height:27vh;
    width: 7vh;
    
}
#login{
    display: flex;
    /* flex-direction: top; */
    width: 25px;
padding-top: 480px;
padding-left: 70px;
padding-right: 40px;
padding-bottom: 40px;
}
    </style>
</head>
<body>
    <div class="row" id="login">
        <div class = "col-md-4 m-auto"id="home_page" >
            <left><h3>Choose Login </h3></left></br>
            <a href = "user_login.php" class = "btn btn-success" style="text-align: center; margin-bottom:2px;">User Login</a></br>
            <a href = "../admin/admin_login.php" class = "btn btn-info" style="margin-right:15px;margin-bottom:2px;">Admin Login</a></br>
            <a href="register.php" class = "btn btn-warning" >User registration</a>
            
        </div>

    </div>
    
</body>
</html>