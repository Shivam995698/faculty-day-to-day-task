<?php 
session_start();
include('userConnect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regular work Description page</title>
    <script src="includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <center><h3>Your Reglar work</h3><br></center>
    <table class="table" style="background-color:mediumturquoise; color: aqua; width:75vw; font-style:italic;color:black;">
        <tr>
            <th>Id</th>
            <th>Faculty Id</th>
            <th>Day</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Subject</th>
            <th>Class Description</th>
            <!-- <th>status</th>
            <th>Update Status</th> -->
                        
        </tr>
        <?php 
        
        $query ="select * from  regular_work where Faculty_Id= '$_SESSION[Faculty_Id]'";
        $query_run=mysqli_query($connection,$query);

        //  $facultyid= mysqli_real_escape_string($connection, $_SESSION['Faculty_Id']);

// Construct the SQL query with the escaped session value
// $query = "SELECT * FROM tasks WHERE Faculty_Name = '$facultyName'";
// $query_run = mysqli_query($connection, $query);
if($query_run){
        while($row=mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
            <!-- <form method="POST" action="">     -->
            <td><?php echo $row['task_id']; ?></td>
                <td><?php echo $row['Faculty_Id']; ?></td>
                <td><?php echo $row['Day']; ?></td>
                <td><?php echo $row['Start_time']; ?></td>
                <td><?php echo $row['End_time']; ?></td>
                <td><?php echo $row['Subject']; ?></td>
                <td><?php echo $row['class']; ?></td>
                
                

                
            </tr>
        
        <?php
        }
    }
        ?>
    </table>
    

    
</body>
</html>