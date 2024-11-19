<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet" href="Header.css">
    <link rel="stylesheet" href="Registration.css">
    <title>Main</title>
</head>
<body>
<?php include 'Registration.php'; ?>
    
<header>
        <div class="logo">
            <a href="#">LOGO</a>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li> 
            </ul>
        </nav>
    </header>

<main>
    <div class="registration-form">
        <h2>Registration Form</h2>
        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required value="<?= getInputValue('username') ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?= getInputValue('email') ?>">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>

            <label for="dob">Date of Birth</label>
            <select id="month" name="month" required>
                <option value="">Month</option>
                <?= generateMonths($_POST['month'] ?? '') ?>
            </select>
            <select id="day" name="day" required>
                <option value="">Day</option>
                <?= generateDays($_POST['day'] ?? '') ?>
            </select>
            <select id="year" name="year" required>
                <option value="">Year</option>
                <?= generateYears($_POST['year'] ?? '') ?>
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
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </nav>
    </div>
    <div class="copyright">
        <p>&copy; Group 9 </p>
    </div>
</footer>
    
</body>
</html>
