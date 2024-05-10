

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <h3>Create a New Task</h3>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label>Select Faculty</label>
                    <select class = "form-control" name = "faculty_name">
                        <option value="1">-Select-</option>
                        <!-- <option value="2"></option> -->
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
        <label>Description:</label>
        <textarea class="form-control"rows="3" cols="50" name="description" placeholder="Assign Task"></textarea>
    </div>
    <div class="form-group">
        <label>Upload File:</label>
        <input type="file" name="image"  id= "image" placeholder = "Upload image/file" accept=".jpg , .jpeg , .png">

    </div>
    <div class="form-group">
        <label>Start Date:</label>
        <input  type="date" class="form-control" id="startDate" name="start_date" required/>
    
    </div>
    <div class="form-group">
        <label>End Date:</label>
        <input  type="date" class="form-control" id="endDate" name="end_date" required/>

    
    </div>
    <div>
    <input type="submit" class="btn btn-warning" name="create_task"value="Create">
    </div>
    </form>
    </div>
                    </div>
</body>
</html>