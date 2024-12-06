<?php
session_start();

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

    $sortOption = $_GET['sort'] ?? 'newest';

    switch ($sortOption) {
        case 'oldest':
            $order = 'ASC';
            break;
        case 'newest':
            $order = 'DESC';
            break;
        case 'date':
            $order = 'ASC';
            break;
        default:
            $order = 'DESC';
            break;
    }

    $stmt = $pdo->prepare("SELECT appointment_date, appointment_time, message FROM appointments WHERE user_id = :user_id ORDER BY appointment_date $order");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Header.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Home.css" type="text/css">
    <link rel="stylesheet" href="../CSS/appointment.css" type="text/css">
    <title>Your Appointment History</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="BG5">

<header>
    <div class="icon">
        <img src="../images/Icon.png" alt="logo" width="120" height="120">
    </div>
    <nav>
        <ul>
            <li><a href="../Home.php">Home</a></li>
            <li><a href="../HTML/About_us.php">About us</a></li>
            <li class="dropdown">
                <a href="#">Services</a>
                <ul class="dropdown-menu">
                    <li><a href="../Counseling/Counseling.php">Counseling</a></li>
                    <li><a href="../Counseling/History.php">View History</a></li>
                    <li><a href="../Counseling/EditAppointment.php">Edit Appointments</a></li>
                </ul>
            <li><a href="../Feedback.php">Feedback</a></li>
            <li><a href="../Account/Accounts.php">Account</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="appointment-history">
        <h2>Your Appointment History</h2>

        <div class="sorting-options">
            <form id="sortForm">
                <label for="sort">Sort By:</label>
                <select name="sort" id="sort">
                    <option value="newest" <?= $sortOption === 'newest' ? 'selected' : '' ?>>Newest</option>
                    <option value="oldest" <?= $sortOption === 'oldest' ? 'selected' : '' ?>>Oldest</option>
                    <option value="date" <?= $sortOption === 'date' ? 'selected' : '' ?>>By Date</option>
                </select>
            </form>
        </div>

        <div id="appointmentTable">
            <?php if (count($appointments) > 0): ?>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                    </tr>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                            <td><?= htmlspecialchars($appointment['appointment_time']) ?></td>
                            <td><?= htmlspecialchars($appointment['message']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No appointment history found.</p>
            <?php endif; ?>
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

<script>
$(document).ready(function() {
    $('#sort').change(function() {
        const sortValue = $(this).val();
        $.ajax({
            type: "GET",
            url: "",
            data: { sort: sortValue },
            success: function(response) {
                $('#appointmentTable').html($(response).find('#appointmentTable').html());
            }
        });
    });
});
</script>

</body>
</html>
