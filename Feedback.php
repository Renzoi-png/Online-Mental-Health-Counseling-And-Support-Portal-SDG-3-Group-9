<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/feedback.css">
    <title>Feedback</title>
</head>
<body class="BG2">
<?php include 'FB.php'; ?>

<header>
    <div class="icon">
        <img src="images/Icon.png" alt="logo" width="120" height="120">
    </div>
    <nav>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="HTML/About_us.php">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="Account/Main.php">Register</a></li>
            <li><a href="Account/Login.php">Login</a></li>
            <li><a href="Feedback.php">Feedback</a></li>
            <li><a href="Account/Accounts.php">Account</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="feedback-form">
        <h1>We value your feedback!</h1>
        <form action="FB.php" method="POST">
            <label for="type">Type of Feedback:</label>
            <select id="type" name="type" required>
                <option value="" disabled selected>Select feedback type</option>
                <?php echo generateFeedbackTypes(); ?>
            </select>

            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" rows="5" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</main>

<footer>
    <div class="footer-content">
        <nav class="footer-nav">
            <ul>
            <li><a href="HTML/Privacy.php">Privacy Policy</a></li>
            <li><a href="HTML/ToS.php">Terms of Service</a></li>
            </ul>
        </nav>
    </div>
    <div class="copyright">
        <p>&copy; Group 9</p>
    </div>
</footer>
</body>
</html>
