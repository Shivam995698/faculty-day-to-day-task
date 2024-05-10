
<?php
/*
require("userConnect.php");

if(isset($_GET['email']) && isset($_GET['v_code'])){
    $email = $_GET['email'];
    $query="select * from faculties where 'email'='$_GET[email]' and 'verification_code' = '$_GET[v_code]'";
    $result = mysqli_query($connection , $query);
    if($result){
        if(mysqli_num_rows( $result )==1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0){
                $update = "UPDATE faculties SET 'is_verified' ='1' where $email  ='$result_fetch[Email]' ";
                if(mysqli_query($connection,$update)) {
                    echo "<script>alert('Account Verified Successfully');
                    window.location.href='user_login.php';</script>";
            }
        }
            else{
                echo "<script>alert('This account is already verified');
                window.location.href='loginFaculty.html';</script>";
            }
            
        }
    }
    else{
        echo "<script>alert('Error , Please Try Again.');
                window.location.href='loginFaculty.html';</script>";


    }
}
*/
require("userConnect.php");

if(isset($_GET['email']) && isset($_GET['v_code'])){
    $email = $_GET['email'];
    $v_code = $_GET['v_code'];
    
    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM faculties WHERE email=? AND verification_code=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $v_code);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if($result){
        if(mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['is_verified'] == 0){
                // Use backticks and correct variable for comparison
                $update = "UPDATE faculties SET `is_verified` = '1' WHERE email = ?";
                $stmt_update = mysqli_prepare($connection, $update);
                mysqli_stmt_bind_param($stmt_update, 's', $email);
                if(mysqli_stmt_execute($stmt_update)) {
                    echo "<script>alert('Account Verified Successfully');
                    window.location.href='user_login.php';</script>";
                }
            } else {
                echo "<script>alert('This account is already verified');
                window.location.href='loginFaculty.html';</script>";
            }
        }
    } else {
        echo "<script>alert('Error, Please Try Again.');
                window.location.href='loginFaculty.html';</script>";
    }
}
?>

