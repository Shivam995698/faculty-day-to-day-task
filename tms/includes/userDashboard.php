<?php
session_start();
include('userConnect.php');
if (isset($_POST['userLogin'])){
    $query = "Select * from faculties where Email = '$_POST[Email]' AND Password = '$_POST[Password]'";
    
    $query_run = mysqli_query($connection,$query);
    if (mysqli_num_rows($query_run)){
        
        $query_run2 = mysqli_fetch_assoc( $query_run );
        if($query_run2['is_verified']==1){
           // while( $row=mysqli_fetch_assoc( $query_run )) {
           // while( $query_run2) {
                $_SESSION['Faculty_Name'] = $query_run2['Faculty_Name'];
                $_SESSION['Faculty_Id'] = $query_run2['Faculty_Id'];
                $_SESSION['Email'] = $query_run2['Email'];
        
                echo"<script type='text/javascript'>
        
                window.location.href='userDashboard.php';
                    </script>";
        
    
             }
      
        // echo"<script type='text/javascript'>
        
        // window.location.href='userDashboard.php';
        //     </script>";

        
        else{
            echo"<script type='text/javascript'>
        alert('Email is not verified');
        window.location.href='user_login.php';
            </script>";
        }
    }
    else{
        echo "<script type = 'text/javascript'>
            alert('Invalid Details , Please enter correct information.');
            window.location.href = 'user_login.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#update_task").click(function(){
                $("#right_sidebar").load("task.php");
            })
        })

        $(document).ready(function(){
            $("#regularwork").click(function(){
                $("#right_sidebar").load("regular_task.php");
            })
        })
        </script>
</head>
<body>
    <div class="row" id = "header">
        <div class="col-md-12">
            <div class="col-md-4" style="display : inline-block;">
            <h3>Task Management System</h3>
            </div>
            <div class="col-md-6" style="display:inline-block; text-align: right;">
            <b>Email : </b> <?php echo $_SESSION['Email']; ?>
             <span style="margin-left: 25px;"><b>Name: </b><?php echo $_SESSION['Faculty_Name']; ?> </span>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2" id = "left_sidebar">
            <table class="table">
            <tr>
            <td style = "text-align : center;">
                <a href="userDashboard.php" type="button" style="text-decoration:none; style="color:blue;"" class="logout_link">Dashboard</a><br/>
                </td>
            </tr>
<tr>
    <td style = "text-align : center;">
    <a  id="update_task" class="logout_link" style="color:blue;">Assigned Tasks</a>
    </td>
</tr>
<tr>
    <td style = "text-align : center;">
    <a id="regularwork" type="button"  class="logout_link" style="color:blue;">Regular work</a>
    </td>
</tr>
<!-- <tr>
    <td style = "text-align : center;">
    <a href="view_leave.php" type="button"  id="link"></a>
    </td>
</tr> -->
<tr>
    <td style = "text-align : center;">
    <a href="../admin/logout.php" type="button" class="logout_link">LogOut</a>
    </td>
</tr>
</table>


        </div>
   
    <div class="col-md-15" id="right_sidebar" >
<!-- <h6>Instructions For Respected Faculties</h4> -->
<ul style="Line-height:3em; font-size:1.2em;List-style-type:none;">
<h6>Instructions For Respected Faculties</h6>    
<li>1. All faculties should update the student's attendence on the ERP daily.</li>
    <li>2. All faculties should make use of PPTs and SmartBoard.</li>
    <li>3. Kindly complete the assigned task on time.</li>
</ul>
    </div>
    </div>
</body>
</html>