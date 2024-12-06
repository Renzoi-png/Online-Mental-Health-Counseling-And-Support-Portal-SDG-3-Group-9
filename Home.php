<?php
session_start();


$isLoggedIn = isset($_SESSION['user_id']);  


$registerUrl = "Account/Main.php";  
$servicesUrl = "Services.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="stylesheet" href="CSS/home.css">
    <title>Main</title>
</head>
<body class="BG2">

<header>
    <div class="icon">
        <img src="images/Icon.png" alt="logo" width="120" height="120">
    </div>

    <nav>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="HTML/About_us.php">About us</a></li>
            <li class="dropdown">
                <a href="#">Services</a>
                <ul class="dropdown-menu">
                    <li><a href="Counseling/Counseling.php">Counseling</a></li>
                    <li><a href="Counseling/History.php">View History</a></li>
                    <li><a href="Counseling/EditAppointment.php">Edit Appointments</a></li>
                </ul>
            </li>
            <li><a href="Feedback.php">Feedback</a></li>
            <li><a href="Account/Accounts.php">Account</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="main-content">
        <div class="text-and-button">
            <div class="text">
                <h1>Welcome to E-Mind Care!</h1>
                <p>
                    Your mental well-being matters, and we’re here to support you every step of the way. At E-Mind Care, we provide a safe, confidential, and compassionate space where you can access professional counseling and mental health resources. 
                    Whether you're seeking guidance, need someone to talk to, or want to explore tools for self-care and growth, our platform is designed to empower and uplift you. Together, we can navigate life's challenges and help you thrive. 
                    Explore our resources, connect with licensed counselors, and take the first step toward a healthier mind today.
                </p>
                <h4>Your journey to mental wellness begins here.</h4>
            </div>

            <div class="Button-move">
                <div class="button-container">
                    <a href="<?php echo $isLoggedIn ? $servicesUrl : $registerUrl; ?>" class="start-now-button">
                        <?php echo $isLoggedIn ? "Click to Start" : "Register to Start"; ?>
                    </a>
                    <div class="arrow"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="additional-info">
    <h2>Why Choose Online Counseling?</h2>
    <p>
        Mental health is essential to overall well-being, and seeking support is the first step towards recovery and growth. E-Mind Care offers online counseling that allows you to access professional mental health services from the comfort of your home. 
        Whether you’re dealing with stress, anxiety, depression, relationship challenges, or simply need someone to talk to, our counselors are here to help you navigate life’s challenges.
    </p>
                
    <h2>How E-Mind Care Works</h2>
    <p>
        Our platform is user-friendly and simple to navigate. Here’s how it works:
    </p>
    <ol>
        <li><strong>Sign Up:</strong> Create a free account to get started on your mental wellness journey.</li>
        <li><strong>Choose a Counselor:</strong> Browse through our licensed mental health professionals to find the right match for your needs.</li>
        <li><strong>Book a Session:</strong> Schedule your session at a time that works best for you. We offer flexible timings to accommodate different schedules.</li>
        <li><strong>Attend Your Session:</strong> Join your session through our secure online platform. You can attend your session via video, phone, or text chat.</li>
    </ol>

    <h2>Benefits of Online Counseling</h2>
    <ul>
        <li><strong>Convenience:</strong> Receive professional counseling from the comfort of your home, without the need to commute.</li>
        <li><strong>Confidentiality:</strong> Our platform is secure and your information is kept private. Your conversations with your counselor are completely confidential.</li>
        <li><strong>Expert Support:</strong> Our counselors are licensed professionals with years of experience in various mental health fields.</li>
        <li><strong>Accessibility:</strong> No matter where you are, you can access our services from any device with an internet connection.</li>
    </ul>

    <h2>Your Path to Wellness Starts Now</h2>
    <p>
        At E-Mind Care, we believe in empowering individuals to take control of their mental health. Our online counseling services are designed to make mental health support easily accessible, affordable, and effective. 
        Don't wait to seek the help you deserve. Take the first step towards healing and growth by scheduling your session today.
    </p>
</div>

<div class="container">
    <div class="box">
        <img src="images/img4.jpg">
        <span>E-Mind Care</span>
    </div>
    <div class="box">
        <img src="images/img3.jpg">
        <span>Attend Your Session</span>
    </div>
    <div class="box">
        <img src="images/img2.jpg">
        <span>Book a Session</span>
    </div>
    <div class="box">
        <img src="images/img1.jpg">
        <span>Choose a Counselor</span>
    </div>
</div>

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