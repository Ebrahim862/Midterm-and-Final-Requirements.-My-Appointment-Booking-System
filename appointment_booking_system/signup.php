<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(120deg, green 0%, #8fd3f4 100%);
        }

        .form-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
        
        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        .success-message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
    <script>
        function validateEmail() {
            var email = document.getElementById("email").value;
            if (!email.endsWith("@yahoo.com") && !email.endsWith("@gmail.com") && !email.endsWith("@hotmail.com")) {
                alert("Invalid email address. Please use a Yahoo, Gmail, or Hotmail address.");
                return false;
            }
            return true;
        }


        function showSuccessMessage(event) {
            event.preventDefault(); 
            var successMessage = document.getElementById("success-message");
            successMessage.style.display = "block";
        }

        
        function redirectToLogin() {
            window.location.href = "login.php";
        }
    </script>
</head>
<body>

<div class="form-container">
    <h2>Sign Up</h2>
    <form id="signup-form" action="signup_process.php" method="post" onsubmit="return validateEmail(); showSuccessMessage(event);">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Sign Up">
    </form>
    <div class="login-link">
        Already have an account? <a href="login.php">Log in</a>
    </div>
</div>


<div id="success-message" class="success-message">
    Successfully signed up! <br> <br>
    <button onclick="redirectToLogin()">OK</button>
</div>

<a href="index.php" class="back-button">Back</a>

</body>
</html>