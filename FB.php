<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .redirect-button {
            background-color: #4CAF50; 
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .redirect-button:hover {
            background-color: #45a049; 
        }
    </style>
    <script>
        
        function redirectToFeedback() {
            window.location.href = 'Feedback.php';
        }

        
        function redirectToHome() {
            window.location.href = 'Home.php';
        }
    </script>
</head>
<body>
    <?php
    function generateFeedbackTypes($selectedType = '') {
        $types = ["Suggestion", "Complaint", "Inquiry", "Others"];
        $options = "";
        foreach ($types as $type) {
            $selected = ($type === $selectedType) ? 'selected' : '';
            $options .= "<option value='$type' $selected>$type</option>";
        }
        return $options;
    }

    $host = 'localhost';
    $db = 'finalsphp';
    $user = 'root'; 
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($conn->real_escape_string($_POST['name']));
        $email = trim($conn->real_escape_string($_POST['email']));
        $feedback_type = trim($conn->real_escape_string($_POST['type']));
        $feedback = trim($conn->real_escape_string($_POST['feedback']));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Invalid email format.'
                    }).then(() => {
                        redirectToFeedback(); // Redirect to Feedback.php
                    });
                  </script>";
            return;
        }

        if (strlen($feedback) < 10) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Feedback must be at least 10 characters long.'
                    }).then(() => {
                        redirectToFeedback(); // Redirect to Feedback.php
                    });
                  </script>";
            return;          
        }

        $sql = "INSERT INTO feedback (name, email, feedback_type, feedback) VALUES ('$name', '$email', '$feedback_type', '$feedback')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank you!',
                        text: 'Feedback submitted successfully!'
                    }).then(() => {
                        redirectToHome(); // Redirect to Home.php
                    });
                  </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'There was a problem submitting your feedback.'
                    }).then(() => {
                        redirectToFeedback(); // Redirect to Feedback.php
                    });
                  </script>";
        }
    }

    $conn->close();
    ?>
</body>
</html>