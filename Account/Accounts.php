<?php
session_start();
include 'Registration.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$dbHost = 'localhost';
$dbName = 'finalsphp';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $pdo->prepare("SELECT username, email, created_at FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/account.css">
    <title>Your Account</title>
</head>
<body class="BG1">

<header>
    <div class="icon">
        <img src="../images/Icon.png" alt="logo" width="120" height="120">
    </div>  

    <nav>
        <ul>
            <li><a href="../Home.php">Home</a></li>
            <li><a href="../HTML/About_us.php">About us</a></li>
            <li><a href="#">Services</a></li>

            <?php if (!isset($_SESSION['user_id'])):  ?>
                <li><a href="Main.php">Register</a></li>
                <li><a href="Login.php">Login</a></li>
            <?php else:  ?>
                <li><a href="Logout.php">Logout</a></li>
            <?php endif; ?>

            <li><a href="../Feedback.php">Feedback</a></li>

            <?php if (isset($_SESSION['user_id'])):  ?>
                <li><a href="Accounts.php">Account</a></li> 
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <div class="account-info">
        <h2>Your Account Information</h2>
        <div class="account-details">
            <p><strong>Name:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <p><strong>Account Created:</strong> <?= htmlspecialchars($user['created_at']) ?></p>
        </div>
        
        <a href="EditAccount.php" class="edit-button">Edit Account</a>

      
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





