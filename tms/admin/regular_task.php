

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <h3>Assign New Lecture</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label>Select Faculty</label>
                    <select class = "form-control" name = "faculty_name">
                        <option value="1">-Select-</option>
                        
                         <?php
                        include('../includes/userConnect.php');
                        $query = "select Faculty_Id , Faculty_Name from faculties";
                        $query_run = mysqli_query($connection,$query);
                        if(mysqli_num_rows($query_run)){
                            while ($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <option value="<?php echo $row['Faculty_Name']; ?>"
                                ><?php echo $row['Faculty_Name']; ?></option>
                            <?php
                             }
                        }
                        ?> 
                    </select>
                    <input type="hidden" name="hidden_faculty_id" id="hidden_faculty_id">
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
    <input type="submit" class="btn btn-warning" name="regular_task"value="regular_task">
    </div>
    </form>
    </div>
                    </div>
</body>
</html> 
