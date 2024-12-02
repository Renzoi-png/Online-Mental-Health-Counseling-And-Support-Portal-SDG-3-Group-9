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
        echo "<div class='error-message'>Invalid email format.</div>";
        return;
    }

    if (strlen($feedback) < 10) {
        echo "<div class='error-message'>Feedback must be at least 10 characters long.</div>";
        return;          
    }

    $sql = "INSERT INTO feedback (name, email, feedback_type, feedback) VALUES ('$name', '$email', '$feedback_type', '$feedback')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>Feedback submitted successfully!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
