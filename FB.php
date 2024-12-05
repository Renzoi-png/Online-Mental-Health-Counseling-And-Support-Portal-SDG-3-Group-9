<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$dbHost = 'localhost';
$dbName = 'finalsphp';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

function generateFeedbackTypes() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM feedback_types");
    $options = '';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $options .= "<option value='{$row['id']}'>{$row['type_name']}</option>";
    }
    return $options;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('You must be logged in to submit feedback.'); window.location.href = 'Login.php';</script>";
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $type = $_POST['type'];
    $feedback = trim($_POST['feedback']);

    if (empty($type) || empty($feedback)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO feedback (user_id, type, feedback) VALUES (:user_id, :type, :feedback)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':feedback', $feedback);
            $stmt->execute();

            echo "<script>alert('Feedback submitted successfully!'); window.location.href = 'Feedback.php';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Feedback submission failed: " . $e->getMessage() . "');</script>";
        }
    }
}
?>
