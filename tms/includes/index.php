<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login and Registration</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('college.webp');
            background-size: cover;
            background-position: center;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
            text-align: center;
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        header {
            margin-bottom: 30px;
        }

        header h1 {
            color: #333;
            font-size: 32px;
            margin: 0;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .cta-button {
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(to right, #FF7E5F, #feb47b);
            transition: background-color 0.3s;
            font-size: 16px;
            border: none;
            cursor: pointer;
            outline: none;
            font-weight: 500;
            text-transform: uppercase;
        }

        .cta-button:hover {
            background: linear-gradient(to right, #FF6C3F, #fdaf5b);
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>NIET SCSIT</h1>
        </header>
        <div class="cta-buttons">
            <a href="../admin/admin_login.php" class="cta-button">Admin Login</a>
            <a href="user_login.php" class="cta-button">User Login</a>
            <a href="register.php" class="cta-button">Register User</a>
        </div>
    </div>
</body>
</html>
