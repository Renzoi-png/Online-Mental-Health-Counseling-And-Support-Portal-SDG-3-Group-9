<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/footer.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Header.css" type="text/css">
    <link rel="stylesheet" href="../CSS/home.css" type="text/css">
    <link rel="stylesheet" href="../CSS/appointment.css" type="text/css">
    <title>Counseling Appointment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
    <script>
        $(document).ready(function() {
            // Handle appointment form submission
            $('#appointment-form').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Gather form data
                const formData = $(this).serialize();

                // Send data to the server using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'appointmentdata.php', // PHP script to handle data
                    data: formData,
                    success: function(response) {
                        // Display success message or handle response
                        $('#response-message').html(response);
                        $('#appointment-form')[0].reset(); // Reset the form
                    },
                    error: function() {
                        $('#response-message').html('<p style="color:red;">There was an error processing your request.</p>');
                    }
                });
            });
        });
    </script>
</head>
<body class="BG3">
    <?php 
    session_start(); 
    include 'Registration.php'; 

    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: Login.php");
        exit();
    }

    // Fetch user data from the database
    $dbHost = 'localhost';
    $dbName = 'finalsphp';
    $dbUser = 'root';
    $dbPass = '';

    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch user details
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
                <li><a href="Login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="appointment-form">
            <h2>Set Counseling Appointment</h2>
            <div id="response-message"></div> <!-- For displaying responses -->

            <form id="appointment-form" action="" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required value="<?= htmlspecialchars($user['username']) ?>" readonly>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required value="<?= htmlspecialchars($user['email']) ?>" readonly>

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
