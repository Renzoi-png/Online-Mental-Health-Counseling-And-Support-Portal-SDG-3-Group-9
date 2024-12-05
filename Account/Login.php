<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css" type="text/css">
    <link rel="stylesheet" href="../CSS/header.css" type="text/css">
    <link rel="stylesheet" href="../CSS/login.css" type="text/css">
    <link rel="stylesheet" href="../CSS/home.css" type="text/css">
    <title>Main</title>
</head>
<body class="BG3">   
<?php include 'Registration.php'; ?>

<header>   
    <div class="icon">
        <img src="../images/Icon.png" alt="logo" width="120" height="120">
    </div>
    <nav> 
        <ul>
            <li><a href="../Home.php">Home</a></li>
            <li><a href="../HTML/About_us.php">About us</a></li>
            <li><a href="Main.php">Register</a></li>
        </ul>
    </nav>
</header>

<div class="login-form-container">
    <h2>Login</h2>

    <!-- Display error message if login failed -->
    <?php if (isset($_GET['error'])): ?>
        <div class="error-message">
            <?php
                if ($_GET['error'] == 'empty') {
                    echo "Please enter both email and password.";
                } elseif ($_GET['error'] == 'invalid') {
                    echo "Invalid email or password.";
                }
            ?>
        </div>
    <?php endif; ?>

    <form action="logindata.php" method="POST">
        <div class="input-group">
            <label for="email">Email</label>
            <!-- Retain the email value if login failed -->
            <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?= isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '' ?>">
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
                <li><a href="../HTML/Privacy.php">Privacy Policy</a></li>
                <li><a href="../HTML/ToS.php">Terms of Service</a></li>
            </ul>
        </nav>
    </div>
    <div class="copyright">
        <p>&copy; Group 9</p>
    </div>
</footer>
    
</body>
</html>
