<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/footer.css" type="text/css">
    <link rel="stylesheet" href="CSS/header.css" type="text/css">
    <link rel="stylesheet" href="CSS/login.css" type="text/css">
    <link rel="stylesheet" href="CSS/home.css" type="text/css">
    <title>Main</title>
</head>
<body class="BG3">
<?php include 'Registration.php'; ?>

<header>   

<div class="icon">
    <img src="images/Icon.png" alt="logo" width="120" height="120">
</div>

        <nav> 
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="About us.php">About us</a></li>
            </ul>
        </nav>
    </header>

    <div class="login-form-container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?= getInputValue('email') ?>">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="submit-btn">Login</button>
    </form>
    <div class="register-link">
        <p>Don't have an account? <a href="Main.php">Register here</a></p>
    </div>
</div>


    <footer>
    <div class="footer-content">
        <nav class="footer-nav">
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </nav>
    </div>

    <div class="copyright">
        <p>&copy; Group 9</p>
    </div>
</footer>
    
</body>
</html>