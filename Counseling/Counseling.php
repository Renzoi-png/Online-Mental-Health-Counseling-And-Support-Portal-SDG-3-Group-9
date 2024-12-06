<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Header.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Home.css" type="text/css">
    <link rel="stylesheet" href="../CSS/appointment.css" type="text/css">
    <title>Counseling Appointment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#appointment-form').on('submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'appointmentdata.php',
                    data: formData,
                    success: function(response) {
                        $('#response-message').html(response);
                        $('#appointment-form')[0].reset();
                    },
                    error: function() {
                        $('#response-message').html('<p style="color:red;">There was an error processing your request.</p>');
                    }
                });
            });
        });
    </script>
</head>
<body class="BG5">
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
        $stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = :id");
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    ?>

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
        <div class="appointment-form">
            <h2>Set Counseling Appointment</h2>
            <div id="response-message"></div>
            <form id="appointment-form" action="" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required value="<?= htmlspecialchars($user['username']) ?>" readonly>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?= htmlspecialchars($user['email']) ?>" readonly>
                <label for="date">Appointment Date</label>
                <input type="date" id="date" name="date" required>
                <label for="time">Appointment Time</label>
                <input type="time" id="time" name="time" required>
                <label for="message">Message (optional)</label>
                <textarea id="message" name="message" placeholder="Any specific concerns?" rows="4"></textarea>
                <button type="submit">Set Appointment</button>
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
