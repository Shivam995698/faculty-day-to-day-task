<?php 
session_start();

    include('userConnect.php');
    if(isset($_POST['update'])){
        $query = "update tasks set status = '$_POST[status]' where task_id = $_GET[id]";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task Updated Successfully');
            window.location.href = 'userDashboard.php';
            </script> ";
        }

        else{
            echo "<script type='text/javascript'>
            alert('Unable to  Update task');
            window.location.href = 'userDashboard.php';
            </script> ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS_TASK_STATUS_UPDATE_PAGE</title>
    <script src="includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-12">
            <h3><i class="fa fa-solid fa-list" style="padding-right:15px;"></i>FTMS - Update Task Status</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white;"><br>
        <h3 style="color: white;">Edit Assigned Task</h3><br>
        <?php 
            
            $query = "select * from tasks where task_id = '$_GET[id]'";
        $result = mysqli_query($connection ,$query);
        while ($row = mysqli_fetch_assoc($result)) { ?>
        
    <form action="" method="post">
        <div class="form-group">
            <input type="hidden" name="id" class="form-control" value="" required>

        </div>
        <div class="form-group">
            <select class="form-control" name="status">
                <option>-Select-</option>
                <option style="color:yellow;">In-Progress</option>
                <option style="color:green;">Completed</option>
            </select>
        </div>
        <center><input type="submit" class="btn btn-warning" name="update" value="update"required></center>
        </form>
        <?php
            }
        ?>

</div>
    </div>
    
</body>
</html>