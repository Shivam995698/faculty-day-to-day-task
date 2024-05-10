
<?php
include("../includes//userConnect.php");

//include("../includes/userConnect.php");

session_start();

if (isset($_POST['query']) && !empty($_POST['query'])) {
    $facultyName = $_POST['query']; // Get the selected faculty name from the form

    // Query to fetch details of the selected faculty
    $query1 = "SELECT * FROM regular_work WHERE Faculty_Name = '$facultyName'";
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
            <center>
                <h3 style="color: red";>All Classes for <?php echo $facultyName; ?></h3>
            </center>
          <center><table class="table" style="background-color:whitesmoke; width:75vw; font-style:italic;color:black;" ></center>  
                <tr>
                    <th>S.No</th>
                    <th>Task Id</th>
                    <th>Faculty Name</th>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php
                $sno = 1;
                while ($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $row1['Faculty_Id']; ?></td>
                        <td><?php echo $row1['Faculty_Name']; ?></td>
                        <td><?php echo $row1['Day']; ?></td>
                        <td><?php echo $row1['Start_time']; ?></td>
                        <td><?php echo $row1['End_time']; ?></td>
                        <td><?php echo $row1['Subject']; ?></td>
                        <td><?php echo $row1['class']; ?></td>
                        <td>
                            <a href="edit_classes.php?id=<?php echo $row1['task_id']; ?>">Edit</a> |
                            <a href="delete_classes.php?id=<?php echo $row1['task_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                    $sno++;
                }
                ?>
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