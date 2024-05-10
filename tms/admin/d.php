<?php
include("../includes//userConnect.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS</title>
</head>
<body>
    <center> <h3>All assigned Tasks</h3></center><br>
    <table class="table" style="background-color:whitesmoke; width:75vw; font-style:italic;color:black;" >
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
$query="select * from tasks";
$query_run = mysqli_query($connection,$query);
while($row= mysqli_fetch_assoc($query_run)){
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
<table class="table2" style="background-color:black; width:75vw; font-style:bold;color:blue;">

</table>

    
</body>
</html>