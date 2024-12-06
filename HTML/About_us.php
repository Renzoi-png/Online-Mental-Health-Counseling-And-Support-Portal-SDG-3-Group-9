<?php
session_start();


$is_logged_in = isset($_SESSION['user_id']);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/Header.css">
    <link rel="stylesheet" href="../CSS/Home.css">
    <title>Main</title>
</head>
<body class="BG1">
<?php include '../Account/Registration.php'; ?>

<header>
    <div class="icon">
        <img src="../images/Icon.png" alt="logo" width="120" height="120">
    </div>

    <nav>
        <ul>
            <li><a href="../Home.php">Home</a></li>
            <li><a href="About_us.php">About us</a></li>
            <li class="dropdown">
                <a href="#">Services</a>
                <ul class="dropdown-menu">
                    <li><a href="../Counseling/Counseling.php">Counseling</a></li>
                    <li><a href="../Counseling/History.php">View History</a></li>
                    <li><a href="../Counseling/EditAppointment.php">Edit Appointments</a></li>
                </ul>

          
            <?php if (!$is_logged_in): ?>
            <?php endif; ?>

            <li><a href="../Feedback.php">Feedback</a></li>


            <li><a href="../Account/Accounts.php">Account</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="about-us">
        <h1>About Us</h1>
        <div class="about-us-container">
            <div class="team-member">
                <img src="../images/RENZ.jpg" alt="Team Member 1" class="team-image">
                <p class ="info">Renz R. Lopez</p>
                <p class="info">
                    Leader
                </p>
            </div>
            <div class="team-member">
                <img src="../images/JANNA.jpg" alt="Team Member 2" class="team-image">
                <p class ="info">Janna D. Baluyot</p>
                <p class="info">
                    Member
                </p>
            </div>
            <div class="team-member">
                <img src="../images/howard.jpg" alt="Team Member 3" class="team-image">
                <p class ="info">Howard C. Guieb</p>
                <p class="info">
                    Member
                </p>
            </div>
        </div>
    </section>
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

