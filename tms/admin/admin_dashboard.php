

<?php
session_start();
include("../includes/userConnect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email($email,  $Faculty_Name){

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
    $mail->Subject = "New Task from FTMS";
    $mail->Body    = "<p><b>You are assigned a new task. Please visit the site for more details.";
         
    
    $mail->send();
   // echo 'Message has been sent';
   //return true;
}
function send_email_class($email,  $Faculty_Name){

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
    $mail->Subject = "New Lecture from FTMS";
    $mail->Body    = "<p><b>You have assigned a new lecture. Please visit the site for more details.";
         
    
    $mail->send();
    return true;
}





    include('../includes/userConnect.php');
    if (isset($_POST['adminLogin'])){
        $query = "Select * from admin where AdminEmail = '$_POST[AdminEmail]' AND AdminPassword = '$_POST[AdminPassword]'";
        
        $query_run = mysqli_query($connection,$query);
        if (mysqli_num_rows($query_run)){
            while($row=mysqli_fetch_assoc( $query_run )) {
                $_SESSION['AdminName'] = $row['AdminName'];
                $_SESSION['AdminId']=$row['AdminId'];
                $_SESSION['AdminEmail'] = $row['AdminEmail'];
    
    
    
            }
            echo"<script type='text/javascript'>
            window.location.href='admin_dashboard.php';
                </script>";
        }
        else{
            echo "<script type = 'text/javascript'>
                alert('Invalid Details , Please enter correct information.');
                window.location.href = 'admin_login.php';
            </script>";
        }
    }
    error_reporting(E_ALL);
ini_set('display_errors', 1);

    if (isset($_POST['create_task'])){
        session_start();
       
        
       // else{
            // $fname = $_FILES['image']['name'];
            // $fsize = $_FILES['image']['size'];
            // $tname = $_FILES['image']['tmp_name'];

            // $validexten = ['jpg' , 'jpeg' , 'png'];
            // $imageexten = explode('.',$fname);

           // echo"$imageexten";
        // $imageexten = strtolower(end($imageexten));
            
            // if(! in_array($imageexten, $validexten)){
            //     echo " <script>alert('Sorry ! Only jpg / png / jpeg files are allowed $imageexten') ;window.history.back() ;</script>" ;
            //     //echo " <script>alert('Sorry! Invalid Image File')</script>";
            // }
            //  if ($fsize > 1000000){
            //     echo " <script>alert('File size too large!')</script>";

            // }
            
                // $newimagename = uniqid();
                // $newimagename = '.'.$imageexten;
                // move_uploaded_file($tname,'img/'.$newimagename);
        $query1= "select * from faculties  where Faculty_Name= '$_POST[faculty_name]'";
        $result1=mysqli_query($connection, $query1);
        if (mysqli_num_rows($result1)){
            while($row1=mysqli_fetch_assoc( $result1 )) {
                // $_SESSION['AdminName'] = $row['Name'];
                $_SESSION['Faculty_Id']=$row1['Faculty_Id'];
                $_SESSION['Fculty_Name'] = $row1['Faculty_Name'];
                $_SESSION['Email'] = $row1['Email'];
                $id = $_SESSION['Faculty_Id'];
            }
        }
        $query = "INSERT INTO tasks VALUES ('$id', '$_POST[faculty_name]', '$_POST[description]',
         ' $_POST[start_date]','$_POST[end_date]','Not Started','abcd',null)";
    $query_run = mysqli_query($connection, $query);
   
    if ($query_run){
        send_email($_SESSION['Email'],$_SESSION['Faculty_Name']);

        echo "<script type='text/javascript'>
        alert ('Task created successfully');
        window.location.href = 'admin_dashboard.php';
        </script>";
    }
        
    else{
        echo "<script type='text/javascript'>
           alert ('Unable  to assign task , please try again.');
           window.location.href = 'admin_dashboard.php';
          </script>";
}
}
        
    

if (isset($_POST['regular_task'])){
    //session_start();
    $query2= "select * from faculties  where Faculty_Name= '$_POST[faculty_name]'";
    $result2=mysqli_query($connection, $query2);
    if (mysqli_num_rows($result2)){
        while($row2=mysqli_fetch_assoc( $result2 )) {
            // $_SESSION['AdminName'] = $row['Name'];
            $_SESSION['Faculty_Id']=$row2['Faculty_Id'];
            $_SESSION['Email'] = $row2['Email'];
            $id = $_SESSION['Faculty_Id'];
        }
    }
    $query = "INSERT INTO regular_work VALUES (null, '$_POST[faculty_name]','$id', '$_POST[day]','$_POST[stime]',
    '$_POST[endtime]','$_POST[subject]','$_POST[description]')";
$query_run = mysqli_query($connection, $query);

if ($query_run){
    send_email_class($_SESSION['Email'],$_SESSION['Faculty_Name']);

    echo "<script type='text/javascript'>
    alert ('Lecture Details added successfully');
    window.location.href = 'admin_dashboard.php';
    </script>";
}
    
else{
    echo "<script type='text/javascript'>
       alert ('Unable  to add Lecture Details , please try again.');
       window.location.href = 'admin_dashboard.php';
      </script>";
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="../includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
            })
        })

    
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
            })
        })
        $(document).ready(function(){
            $("#edit").click(function(){
                $("#right_sidebar").load("edit_task.php");
            })
        })

        $(document).ready(function(){
            $("#regular_task").click(function(){
                $("#right_sidebar").load("regular_task.php");
            })
        })

        $(document).ready(function(){
            $("#regular_classes").click(function(){
                $("#right_sidebar").load("regulartask.php");
            })
        })
        $(document).ready(function(){
            $("#search").click(function(){
                $("#right_sidebar").load("regulartaskd.php");
            })
        })
        $(document).ready(function(){
            $("#searchtask").click(function(){
                $("#right_sidebar").load("displaytask.php");
            })
        })

        </script>
</head>
<body>
    <div class="row" id = "header" style="background-color:tomato;">
        <div class="col-md-12"  >
            <div class="col-md-4" style="display: inline-block; ">
            <h3 style="color: white; font-style: italic; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Admin</h3>
            </div>
            <div class="col-md-6" style="display:inline-block; text-align: right;">
            <b>Email : </b><?php echo $_SESSION['AdminEmail'];?>
             <span style="margin-left: 50px;"><b>Name: </b><?php echo $_SESSION['AdminName'];?> </span>
        </div>
        </div>
    </div>

    <div class="row" >
        <div class="col-md-2" id = "left_sidebar" >
            <table class="table">
        
            <tr>
                <td style="text-align: center;";>
                <a href = "admin_dashboard.php" type ="button" class="logout_link">Dashboard</a><br/>
            </td>
            </tr>
<tr>
    <td style = "text-align : center;">
    <a type="button" class="logout_link" id ="create_task">Create task</a>
    </td>
</tr>
<tr>
    <td style = "text-align : center;">
    <a type="button" class="logout_link" id="manage_task">Manage Task</a>
    </td>
</tr>
<tr>
    <td style = "text-align : center;">
    <a type="button" class="logout_link" id="regular_task">Regular Work</a>
    </td>
</tr>
<tr>
    <td style = "text-align : center;">
    <a type="button" class="logout_link" id="regular_classes">Classes</a>
    </td>
</tr>
<tr>
    <td style = "text-align : center;">
    <a href="logout.php" type="button" id="logout_link">LogOut</a>
    </td>
</tr>
            </table>


        </div>
        
     <div class = "col-md-15" id="right_sidebar"  > 
<!-- <h4>Instructions For Respected Faculties</h4> -->
 <ul style="Line-height :3em;font: size 1.2em;list-style-type:none;">
 <h4>Instructions For Respected Faculties</h4>
    <li>1. All faculties should update the student's attendence on the ERP daily.</li>
    <li>2. All faculties should make use of PPTs and SmartBoard</li>
    <li>3. Kindly complete the assigned task on time</li>
</ul>
    </div> 
    </div>
</body>
</html>