




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS</title>
</head>
<body>
    <center> <h3>All Classes</h3></center><br>
    <div class="form-group">
    <form method="POST" action="regulartaskd.php">
                    <label>Select Faculty</label>
                    <select class = "form-control" name = "query">
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
                    <center><button type="submit"  class="btn btn-primary" id="search" value="Search" name = "submitw" style="margin-top: 5px;">Search</button></center>
                    </form>
                    <!-- <input type="hidden" name="hidden_faculty_id" id="hidden_faculty_id"> -->
                </div>
     
    
</body>
</html>