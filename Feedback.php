<?php  
session_start(); 

$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/feedbacks.css">
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
            <li><a href="Feedback.php">Feedback</a></li>

            <?php if ($is_logged_in): ?>
                <li><a href="Account/Accounts.php">Account</a></li>
            <?php else: ?>
                <li><a href="Account/Login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>

    <?php if (!$is_logged_in): ?>
        <div class="login-message">
            <h2>💬 You need to log in to submit feedback!</h2>
            <p>Please <a href="Account/Login.php">log in</a> to provide feedback. We’d love to hear your thoughts!</p>
        </div>
    <?php else: ?>

        <div class="feedback-form">
            <h1>We value your feedback!</h1>
            <p>Your feedback helps us improve our services. Please share your thoughts below:</p>
            <form action="FB.php" method="POST">
                <label for="type">Type of Feedback:</label>
                <select id="type" name="type" required>
                    <option value="" disabled selected>Select feedback type</option>
                    <?php echo generateFeedbackTypes(); ?>
                </select>

                <label for="feedback">Your Feedback:</label>
                <textarea id="feedback" name="feedback" rows="5" required placeholder="Share your thoughts here..."></textarea>

                <button type="submit" class="submit-btn">Submit Feedback</button>
            </form>
        </div>
    <?php endif; ?>
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


