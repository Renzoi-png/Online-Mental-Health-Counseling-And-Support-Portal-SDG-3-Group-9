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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['appointment_id'])) {
            if (isset($_POST['delete'])) {
                $appointmentId = $_POST['appointment_id'];

                $deleteStmt = $pdo->prepare("DELETE FROM appointments WHERE id = :id AND user_id = :user_id");
                $deleteStmt->bindParam(':id', $appointmentId);
                $deleteStmt->bindParam(':user_id', $_SESSION['user_id']);
                if ($deleteStmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Appointment deleted successfully!"]);
                    exit();
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to delete appointment."]);
                    exit();
                }
            } else {
                $appointmentId = $_POST['appointment_id'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $message = $_POST['message'];

                $updateStmt = $pdo->prepare("UPDATE appointments SET appointment_date = :date, appointment_time = :time, message = :message WHERE id = :id AND user_id = :user_id");
                $updateStmt->bindParam(':date', $date);
                $updateStmt->bindParam(':time', $time);
                $updateStmt->bindParam(':message', $message);
                $updateStmt->bindParam(':id', $appointmentId);
                $updateStmt->bindParam(':user_id', $_SESSION['user_id']);

                if ($updateStmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Appointment updated successfully!"]);
                    exit();
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to update appointment."]);
                    exit();
                }
            }
        }
    }

    $stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id = :user_id");
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
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/Header.css">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/appointment.css" type="text/css">
    <title>Edit Appointments</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            </li>
            <li><a href="../Feedback.php">Feedback</a></li>
            <li><a href="../Account/Accounts.php">Account</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="edit-appointments">
        <h2>Edit Your Appointments</h2>
        <div id="responseMessage"></div>

        <?php if (count($appointments) > 0): ?>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($appointments as $appointment): ?>
                    <tr data-id="<?= $appointment['id'] ?>">
                        <td>
                            <input type="date" class="date" value="<?= htmlspecialchars($appointment['appointment_date']) ?>" required>
                        </td>
                        <td>
                            <input type="time" class="time" value="<?= htmlspecialchars($appointment['appointment_time']) ?>" required>
                        </td>
                        <td>
                            <textarea class="message" rows="2"><?= htmlspecialchars($appointment['message']) ?></textarea>
                        </td>
                        <td>
                            <button class="update" data-id="<?= $appointment['id'] ?>">Update</button>
                            <button class="delete" data-id="<?= $appointment['id'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No appointments found to edit.</p>
        <?php endif; ?>
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
    $('.update').click(function() {
        const row = $(this).closest('tr');
        const appointmentId = $(this).data('id');
        const date = row.find('.date').val();
        const time = row.find('.time').val();
        const message = row.find('.message').val();

        $.ajax({
            type: "POST",
            url: "",
            data: {
                appointment_id: appointmentId,
                date: date,
                time: time,
                message: message
            },
            success: function(response) {
                const result = JSON.parse(response);
                Swal.fire({
                    icon: result.status === 'success' ? 'success' : 'error',
                    title: result.status === 'success' ? 'Success!' : 'Error!',
                    text: result.message
                });
            }
        });
    });

    $('.delete').click(function() {
        const appointmentId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "",
                    data: {
                        appointment_id: appointmentId,
                        delete: true
                    },
                    success: function(response) {
                        const result = JSON.parse(response);
                        Swal.fire({
                            icon: result.status === 'success' ? 'success' : 'error',
                            title: result.status === 'success' ? 'Deleted!' : 'Error!',
                            text: result.message
                        });
                        if (result.status === 'success') {
                            $('tr[data-id="' + appointmentId + '"]').remove();
                        }
                    }
                });
            }
        });
    });
});
</script>

</body>
</html>
