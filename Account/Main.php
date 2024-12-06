<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$postData = $_SESSION['post_data'] ?? [];
unset($_SESSION['errors'], $_SESSION['post_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Header.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Registration.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Home.css" type="text/css">
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
            <li><a href="Login.php">Login</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="registration-form">
        <h2>Registration Form</h2>
        <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="registrationdata.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required value="<?= htmlspecialchars($postData['username'] ?? '') ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?= htmlspecialchars($postData['email'] ?? '') ?>">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>

            <label for="dob">Date of Birth</label>
            <select id="month" name="month" required>
                <option value="">Month</option>
                <?= generateMonths($postData['month'] ?? '') ?>
            </select>
            <select id="day" name="day" required>
                <option value="">Day</option>
                <?= generateDays($postData['day'] ?? '') ?>
            </select>
            <select id="year" name="year" required>
                <option value="">Year</option>
                <?= generateYears($postData['year'] ?? '') ?>
            </select>

            <button type="submit">Register</button>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="Login.php">Login here</a></p>
        </div>
    </div>
</main>

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
