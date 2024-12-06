<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to set an appointment.";
    exit();
}

$dbHost = 'localhost';
$dbName = 'finalsphp';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];
    $stmt = $pdo->prepare("INSERT INTO appointments (user_id, appointment_date, appointment_time, message) VALUES (:user_id, :date, :time, :message)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
        echo "Your appointment has been set successfully!";
    } else {
        echo "There was an error setting your appointment. Please try again.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
