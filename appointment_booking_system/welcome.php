<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(120deg, blue 0%, #8fd3f4 100%);
        }

        .welcome-message {
            text-align: center;
        }

        .logout-button {
            margin-top: 20px;
            text-align: center;
        }

        .logout-button a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        <h2>Welcome!, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
    </div>
    <div class="logout-button">
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
