<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Footer.css">
    <link rel="stylesheet" href="Header.css">
    <link rel="stylesheet" href="Registration.css">
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

<main>
    <div class="registration-form">
        <h2>Registration Form</h2>
        <form action="submit_form.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>

            <label for="dob">Date of Birth</label>
            <select id="month" name="month" required>
                <option value="">Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            <select id="day" name="day" required>
                <option value="">Day</option>
                <script>
                    for (let i = 1; i <= 31; i++) {
                        document.write(`<option value="${i}">${i}</option>`);
                    }
                </script>
            </select>
            <select id="year" name="year" required>
                <option value="">Year</option>
                <script>
                    const currentYear = new Date().getFullYear();
                    for (let i = currentYear; i >= 1900; i--) {
                        document.write(`<option value="${i}">${i}</option>`);
                    }
                </script>
            </select>

            <button type="submit">Register</button>
        </form>
    </div>
</main>

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
        <p>&copy; 2024 MyWebsite. All Rights Reserved.</p>
    </div>
</footer>
    
</body>
</html>
