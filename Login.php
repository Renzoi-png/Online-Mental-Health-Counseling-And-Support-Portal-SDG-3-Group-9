<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet" href="Header.css">
    <link rel="stylesheet" href="Login.css">
    <title>Main</title>
</head>
<body>

<header>
        <div class="logo">
            <a href="#">LOGO</a>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li> 
            </ul>
        </nav>
    </header>

    <div class="login-form-container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="submit-btn">Login</button>
    </form>
    <div class="register-link">
        <p>Don't have an account? <a href="Main.php">Register here</a></p>
    </div>
</div>


    <footer>
    <div class="footer-content">
        <nav class="footer-nav">
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </nav>
    </div>

    <div class="copyright">
        <p>&copy; Group 9</p>
    </div>
</footer>
    
</body>
</html> 
