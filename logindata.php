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
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome " . $user['username'];
            
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that email!";
    }
    $stmt->close();
}
$conn->close();
?>
