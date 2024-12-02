<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "finalsphp";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $confirm_password = sanitizeInput($_POST['confirm_password']);
    $dob = sanitizeInput($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);

    
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
    } else {
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username or Email already exists!";
        } else {
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, dob) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $dob);

            if ($stmt->execute()) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}
$conn->close();
?>
