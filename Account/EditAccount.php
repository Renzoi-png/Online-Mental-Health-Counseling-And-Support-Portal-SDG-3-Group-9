<?php 
session_start();
include 'Registration.php'; // Include your Registration script

// Check if user is logged in, otherwise redirect to Login page
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

    // Retrieve user information
    $stmt = $pdo->prepare("SELECT username, email, password FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user_id']);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle account update request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get posted form data
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $password = $_POST['password']; // Get the entered password

    // Verify entered password against the stored password hash
    if (!password_verify($password, $user['password'])) {
        $error = "Incorrect password. Please try again.";
    } else {
        // Update the username and email in the database
        $updateStmt = $pdo->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id");
        $updateStmt->bindParam(':username', $newUsername);
        $updateStmt->bindParam(':email', $newEmail);
        $updateStmt->bindParam(':id', $_SESSION['user_id']);

        if ($updateStmt->execute()) {
            // Redirect to Account page after successful update
            header("Location: Accounts.php");
            exit();
        } else {
            $error = "Failed to update account information.";
        }
    }
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
    <link rel="stylesheet" href="../CSS/edit.css">
    <title>Edit Account</title>
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

            <!-- Only show Register and Login if the user is NOT logged in -->
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a href="Main.php">Register</a></li>
                <li><a href="Login.php">Login</a></li>
            <?php endif; ?>

            <li><a href="../Feedback.php">Feedback</a></li>

            <!-- Show Account link if the user is logged in -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="Accounts.php">Account</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <div class="edit-account">
        <h2>Edit Account Information</h2>
        
        <!-- Display error if there's any -->
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <!-- Password input field -->
            <label for="password">Confirm Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Update</button>
        </form>
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

