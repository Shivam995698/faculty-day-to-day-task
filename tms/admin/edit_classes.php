<?php 
session_start();
    include("../includes/userConnect.php");

    if(isset($_POST['edit_class'])){
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
        $query ="update regular_work set Faculty_Id='$id' ,Faculty_Name='$_POST[faculty_name]',class='$_POST[description]',Start_time='$_POST[stime]',
        End_time='$_POST[endtime]' where task_id= '$_GET[id]'";

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
    <title>FTMS_LECTURE_EDIT_PAGE</title>
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
        <h3 style="color: white;">Edit Assigned Lecture</h3><br>
        <?php 
            
            $query = "select * from regular_work where task_id = $_GET[id]";
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
                <label for="day">Select Day:</label>
        <select name="day" id="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
        </select><br>
                </div class="form-group">
                <div>
                <label for="time" >Lecture Starting Time:</label>
                <input type="time" id="class_time" name="stime">
                </div>
                <div>
                <label for="time">Lecture End Time:</label>
                <input type="time" id="class_time" name="endtime">
                </div>
    <div class="form-group">
        <label>Subject:</label>
        <textarea class="form-control"rows="2" cols="50" name="subject" placeholder="Enter Subject Name"></textarea>
    </div>        
    <div class="form-group">
        <label>Class description:</label>
        <textarea class="form-control"rows="2" cols="50" name="description" placeholder="Enter branch , semester and section "></textarea>
    </div>
    
    <div>
    <input type="submit" class="btn btn-warning" name="edit_class"value="edit">
    </div>
        <?php
            }
        ?>

</div>
    </div>
    
</body>
</html>