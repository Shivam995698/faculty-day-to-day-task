
<?php

include("userConnect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email($email, $v_code, $Faculty_Name){

    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shivamverma7522075220@gmail.com';
    $mail->Password   = 'zyhc vxyx gjcs tnyb';
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom("shivamverma7522075220@gmail.com", "Admin");
    $mail->addAddress($email,$Faculty_Name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Verify Email for registering into FTMS";
    $mail->Body    = "We have received a registration request from $email, $Faculty_Name,
         
       <P> <b>please click the below link to verify the email for processing the request.</b></p>
        <a href='http://localhost/tms/includes/verify.php?email=$email && v_code=$v_code'>Verify</a>";

    $mail->send();
        return true;
    
 //catch Exception($se){
    return false;
 //}
}


if (isset($_POST['userRegistration'])){
    $name = $_POST['Faculty_Name'];
  


    $user_exist_query="SELECT * FROM faculties WHERE Email='$_POST[Email]' OR Faculty_Id='$_POST[Faculty_Id]'";
    $result  = mysqli_query($connection, $user_exist_query);
    if ($result) 
        {
            if(mysqli_num_rows($result) >0){
                $result_fetch=mysqli_fetch_assoc( $result );
                if($result_fetch['Email']==$_POST['Email'])
                {
                    echo"
                    <script>
                     alert('$result_fetch[Email] is already registered');
                     window.location.href='user_login.php';
                     </script>";
                }
                else{
                    echo"
                    <script>
                    alert('$result_fetch[Faculty_Id] is already registered');
                    window.location.href='user_login.php';
                    </script>";
                }
            }
            else{
                // $password=password_hash($_POST["Password"],PASSWORD_BCRYPT);
                $v_code=bin2hex(random_bytes(16));
                if($_POST['Password'] === $_POST['cpassword']) {
                
                $query = "insert into faculties values('$_POST[Faculty_Name]' , '$_POST[Faculty_Id]','$_POST[Contact]','$_POST[Email]','$_POST[Password]','$v_code','0')";
    
                $query_run = mysqli_query($connection,$query);
                if($query_run && send_email($_POST['Email'],$v_code,$_POST['Faculty_Name']) ){ // 
                    echo"<script type='text/javascript'>alert('Email sent Successfully!');
                    window.location.href='index.php';
                        </script>";
                }
                else{
                    echo"<script type='text/javascript'>alert('Email  not sent !');
                    window.location.href='index.php';
                        </script>";

                }
            }else{
                    echo "<script type = 'text/javascript'>
                        alert('Error ... Please try again.');
                        window.location.href = 'register.php';
                    </script>";
                }
            }
        
            
       }
    
    
 }
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS_REGISTER</title>
    <script src="includes/jquery_latest.js"></script>
    <link rel="stylesheet"type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body>
    <!-- <div class="row">
        <div class="col-md-3 m-auto" id="register_home_page"> -->
        <div class="container">
        <div class="box form-box">
            <!-- <center><h3 style="background-color:#5A8F7B; padding:5px; width:15vw;">User Registration</h3></center> -->
            <!-- <form action=""method='post'>
            <div class='form-group'> -->
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <input type='text' name="Faculty_Name" class="form-control"  placeholder="Enter your name" autocomplete="off" required><br/>
                </div>
                <div class='field input'>
                    <input type='text' name="Faculty_Id" class="form-control"  placeholder="Enter your id number" autocomplete="off"  required><br/>
                </div>
                <div class='field input'>
                
                    <input type='text' name="Contact" class="form-control"  placeholder="Enter contact no." autocomplete="off"  required><br/>
                </div>
                <div class='field input'>
                    <input type='email' name="Email" class="form-control"  placeholder="Enter your email id" autocomplete="off"  required><br/>
                </div>
                <div class='field input'>
                    <input type='password' name="Password" class="form-control"  placeholder="Enter your password"  autocomplete="off"  required><br/>
                </div>
                <div class='field input'>
                    <input type='password' name="cpassword" class="form-control"  placeholder="Confirm password"  autocomplete="off"  required><br/>
                </div>
                <div class="field">
                    <input type='submit' name="userRegistration" value='Register' class='btn btn-warning'>
                </div>

                <div class="links">
                    Already a User ? <a href="user_login.php">Sign In</a>
                </div>
</form>
<a href="index.php" class="btn btn-danger">Go to the home page</a>
    </div>
        </div>
</body>
</html>