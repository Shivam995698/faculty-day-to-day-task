<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTMS | ADMIN Login page</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        body {
            background-color: #5A8F7B; /* Change the background color to a shade of green */
            font-family: Arial, sans-serif; /* Set a generic font-family */
            color: #fff; /* Set text color to white */
        }
        #login_home_page {
            background-color: #fff; /* Set background color of login container to white */
            padding: 20px; /* Add some padding */
            border-radius: 10px; /* Add rounded corners */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }
        h3 {
            background-color: #2C3E50; /* Change the background color of the header */
            padding: 10px 0; /* Add padding to the header */
            border-radius: 5px; /* Add rounded corners */
        }
        form {
            margin-top: 20px; /* Add some space between header and form */
        }
        .form-control {
            border-color: #2C3E50; /* Change input border color */
        }
        .btn-warning {
            background-color: #F39C12; /* Change button color to orange */
            border-color: #F39C12; /* Change button border color */
        }
        .btn-danger {
            margin-top: 20px; /* Add some space between buttons */
            background-color: #E74C3C; /* Change button color to red */
            border-color: #E74C3C; /* Change button border color */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" id="login_home_page">
                <h3 class="text-center">Admin Login</h3>
                <form action="admin_dashboard.php" method="post">
                    <div class="form-group">
                        <input type="email" name="AdminEmail" class="form-control" placeholder="Enter your email id" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="AdminPassword" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="adminLogin" value="Login" class="btn btn-warning">
                    </div>
                </form>
                <div class="text-center">
                    <a href="../includes/index.html" class="btn btn-danger">Go to the home page</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
