<?php 
    include("../includes/userConnect.php");
    $query="delete from regular_work where task_id = $_GET[id]";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task deleted successfully');
        window.location.href = 'admin_dashboard.php';
        </script>
        ";
    }

    else{
        echo "<script type='text/javascript'>
        alert ('Unable to delete task please try again');
        window.location.href = 'admin_dashboard.php';
        </script>
        ";
    }
?>