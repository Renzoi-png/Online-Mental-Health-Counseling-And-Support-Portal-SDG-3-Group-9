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
$db = 'feedback_db';  
$user = 'User1';      
$pass = 'password';         


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $feedback_type = $conn->real_escape_string($_POST['type']);
    $feedback = $conn->real_escape_string($_POST['feedback']);


    $sql = "INSERT INTO feedback (name, email, feedback_type, feedback) VALUES ('$name', '$email', '$feedback_type', '$feedback')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>Feedback submitted successfully!</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

