<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/acc.css">
    <title>Main</title>
</head>
<body class="BG1">
<?php include 'Registration.php'; ?>

<header>
<div class="icon">
    <img src="images/Icon.png" alt="logo" width="120" height="120">
</div>  

    <nav>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="About_us.php">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="Main.php">Register</a></li>
            <li><a href="Login.php">Login</a></li>
            <li><a href="Feedback.php">Feedback</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="account-info">
        <h2>Your Account Information</h2>
        <div class="account-details">
            <p><strong>Name:</strong> Renz Lopez</p>
            <p><strong>Email:</strong> renzLopez@.com</p>
            <p><strong>Username:</strong> itlog123</p>
            <p><strong>Account Created:</strong> January 11, 2005</p>
        </div>
        <a href="EditAccount.php" class="edit-button">Edit Account</a>
    </div>
</main>



<footer>
    <div class="footer-content">
        <nav class="footer-nav">
            <ul>
                <li><a href="Privacy.php">Privacy Policy</a></li>
                <li><a href="ToS.php">Terms of Service</a></li>
            </ul>
        </nav>
    </div>
    <div class="copyright">
        <p>&copy; Group 9</p>
    </div>
</footer>
</body>
</html>
