<?php 
session_start();
    include("../includes/userConnect.php");

    if(isset($_POST['edit_task'])){
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
        $query ="update tasks set Faculty_Id='$id' ,Faculty_Name='$_POST[faculty_name]', description='$_POST[description]',start_date='$_POST[start_date]',
        end_date='$_POST[end_date]',image='nad' where task_id= '$_GET[id]'";

        $query_run=mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('Task updated successfully');
            window.location.href='admin_dashboard.php';
            </script>";
        }

        else{
            echo "<script type='text/javascript'>
            alert('Unable to update task please try again.');
            window.location.href='admin_dashboard.php';
            </script>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS_TASK_EDIT_PAGE</title>
    <script src="../includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-12">
            <h3><i class="fa fa-solid fa-list" style="padding-right:15px;"></i>Faculty Task Managemnet  System (FTMS) - Edit Task Details</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="color:white;"><br>
        <h3 style="color: white;">Edit Assigned Task</h3><br>
        <?php 
            
            $query = "select * from tasks where task_id = $_GET[id]";
            $query_run = mysqli_query($connection,$query);
            while($row= mysqli_fetch_assoc($query_run)){
                ?>
        
        <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="" required>
            </div>
            <div class="form-group">
            <label>Select Faculty</label>
                    <select class = "form-control" name = "faculty_name">
                        <option>-Select-</option>
                        <?php
                        include('../includes/userConnect.php');
                        $query1 = "select Faculty_Id , Faculty_Name from faculties";
                        $query_run1 = mysqli_query($connection,$query1);
                        if(mysqli_num_rows($query_run1)){
                            while ($row1 = mysqli_fetch_assoc($query_run1)){
                                ?>
                                <option value="<?php echo $row1['Faculty_Name']; ?>"
                                ><?php echo $row1['Faculty_Name']; ?></option>
                            <?php
                             }
                        }
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
        <label>Description:</label>
        <textarea class="form-control"rows="3" cols="50" name="description" required><?php echo $row['description']; ?></textarea>
    </div>
    <!-- <div class="form-group">
        <label>Upload File:</label>
        <input type="file" name="image"  accept="image/*" value="<?php echo $row['image_data']; ?>" required>

    </div> -->

    <div class="form-group">
        <label>Start Date:</label>
        <input  type="date" class="form-control"  name="start_date"  value="<?php echo $row['start_date']; ?>" required>

    </div>
    <div class="form-group">
        <label>End Date:</label>
        <input  type="date" class="form-control" id="endDate" name="end_date"  value= "<?php echo $row['end_date']; ?>" required>

    
    </div>
    <div>
    <input type="submit" class="btn btn-warning" name="edit_task" value-"Update">
                    </div>   
        </form>
        <?php
            }
        ?>

</div>
    </div>
    
</body>
</html>