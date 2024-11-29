<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/home.css">
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
    <section class="about-us">
        <h1>About Us</h1>
        <div class="about-us-container">
            <div class="team-member">
                <img src="images/RENZ.jpg" alt="Team Member 1" class="team-image">
                <p>TEST</p>
            </div>
            <div class="team-member">
                <img src="JANNA.jpg" alt="Team Member 2" class="team-image">
                <p>TEST</p>
            </div>
            <div class="team-member">
                <img src="HOWARD.jpg" alt="Team Member 3" class="team-image">
                <p>TEST</p>
            </div>
        </div>
    </section>
</main>



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
