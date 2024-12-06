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
<body class="BG2">
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
            </li>
            <li><a href="../Feedback.php">Feedback</a></li>
            <li><a href="../Account/Accounts.php">Account</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="main-content">
            <div class="Privacy-content">
                <h1>Privacy Policy</h1>
                <p>
                <h3>Introduction:</h3>

                Your privacy is important to us. This policy explains how we collect, use, and protect your information when you use our portal.
                <br>
                <br>
                <h3>Information We Collect:</h3>
                    
                Personal Information: We collect information such as your name, email address, and any health information you choose to share for counseling purposes.
                Usage Data: We may collect data about how you use our portal, including your IP address and pages visited.
                <br>
                <br>
                <h3>How We Use Your Information:</h3>
                    
                We use your information to:
                Provide and improve our services.
                Communicate with you about your account and services.
                <br>
                <br>
                <h3>Data Security:</h3>
                    
                We take steps to protect your information, but no method of transmission over the internet is completely secure.
                <br>
                <br>
                <h3>Your Rights:</h3>
                    
                You have the right to access, correct, or delete your personal information.
                <br>
                <br>
                <h3>Changes to This Policy:</h3>
                    
                We may update this policy occasionally. We will notify you of any changes by posting the new policy on our site.
                </p>
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