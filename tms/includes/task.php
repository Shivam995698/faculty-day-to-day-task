<?php 
session_start();
include('userConnect.php');
if (isset($_POST['task_id']) && isset($_POST['selected_option'])) {
    $task_id = $_POST['task_id'];
    $selected_option = $_POST['selected_option'];
   // $row_id = $_POST['row_id'];
   // $selected_option = $_POST['selected_option'];
    $query = "update tasks set status = '$selected_option' where task_id = $task_id";
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

        $color = '';
    switch ($selected_option) {
        case 'Not Started':
            $color = 'red';
            break;
        case 'In-Progress':
            $color = 'blue';
            break;
        case 'Completed':
            $color = 'green';
            break;
        default:
            $color = 'black'; 
            break;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Update page</title>
    <script src="includes/jquery_latest.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <center><h3>Your Task</h3><br></center>
    <table class="table" style="background-color:whitesmoke; width:75vw; font-style:italic;color:black;">
        <tr>
            <th>Task Id</th>
            <th>Faculty Id</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>File</th>
            <th>Status</th>
            <th>Action</th>
                        
        </tr>
        <?php 
        $query ="select * from  tasks where Faculty_Id= '$_SESSION[Faculty_Id]'";
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
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['image']; ?></td>
                <!-- <td ><?php echo $row['status']; ?></td> -->
                <td style="color: <?php
$status = $row['status'];
if ($status == 'Completed') {
    echo 'green';
} elseif ($status == 'In-Progress') {
    echo 'blue';
} elseif ($status == 'Not Started') {
    echo 'red';
} else {
    echo 'black'; 
}
?>">
    <?php echo $status; ?>
</td>

                <td>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="task_id" value="<?php echo $row['task_id']; ?>">
                <select name="selected_option" onchange="this.form.submit()">
                        <option value="">Update</option>
                        <option value="Not Started">Not Started</option>
                        <option value="In-Progress">In-Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </form>
                </td>
                <!-- <td><a href="update_status.php?id=<?php echo $row['task_id']; ?>">Update</a></td> -->
            </tr>
        
        <?php
        }
    }else {
        // Query execution failed
        echo "Error: " ;
    }
        ?>
    </table>
    

    
</body>
</html>