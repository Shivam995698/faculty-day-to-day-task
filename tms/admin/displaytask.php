<?php
include("../includes//userConnect.php");

//include("../includes/userConnect.php");

session_start();

if (isset($_POST['querytask']) && !empty($_POST['querytask'])) {
    $facultyName = $_POST['querytask']; // Get the selected faculty name from the form

    // Query to fetch details of the selected faculty
    $query1 = "SELECT * FROM tasks WHERE Faculty_Name = '$facultyName'";
    $result1 = mysqli_query($connection, $query1);

    if (mysqli_num_rows($result1) > 0) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>FTMS</title>
            <style>
                .table {
                    background-color: whitesmoke;
                    width: 75vw;
                    font-style: italic;
                    color: black;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                .table th,
                .table td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }

                .table th {
                    background-color: #f2f2f2;
                }
            </style>
        </head>
        <body>
    
                <!-- <h3 style="color: red";>All Classes for <?php echo $facultyName; ?></h3> -->
                <center> <h3>All assigned Tasks of <?php echo $facultyName; ?></h3></center><br>
   <center> <table class="table" style="background-color:whitesmoke; width:75vw; font-style:italic;color:black;" ></center>
    <tr>
        <th>S.No</th>
        <th>Task Id</th>
        <th>Faculty Name</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Action</th>
</tr>
<?php
$sno=1;
//$query="select * from tasks";
//$query_run = mysqli_query($connection,$query);
while($row= mysqli_fetch_assoc($result1)){
    ?>
    <tr >
    <td><?php echo $sno; ?></td>
    <td><?php echo $row['task_id']; ?></td>
    <td><?php echo $row['Faculty_Name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['start_date']; ?></td>
    <td><?php echo $row['end_date']; ?></td>
   <b> <td style="color: <?php
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
</td></b>
    <td >
    <a href="edit_task.php?id=<?php echo $row['task_id']; ?>">Edit</a> |
     <a href="delete_task.php?id=<?php echo $row['task_id']; ?>">Delete</a>
    </td>
</tr>
    <?php
    $sno=$sno +1;
}
?>
    </table>
            </table>
        </body>
        </html>
    <?php
    } else {
        echo "No data found for the selected faculty.";
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

        </script>

</body>
</html>