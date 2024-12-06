<<<<<<< Updated upstream:Registration.php
<?php
function generateMonths($selectedMonth = '') {
    $months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];
    $options = "";
    foreach ($months as $value) {
        $selected = ($value === $selectedMonth) ? 'selected' : '';
        $options .= "<option value='$value' $selected>$value</option>";
    }
    return $options;
}
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
>>>>>>> Stashed changes:Account/Registration.php

    <!-- SweetAlert2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });

        function showSuccessAlert(message) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
                confirmButtonText: 'OK'
            });
        }

<<<<<<< Updated upstream:Registration.php
function getInputValue($key) {
    return htmlspecialchars($_POST[$key] ?? '');
}


?>
=======
        function showErrorAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
                confirmButtonText: 'OK'
            });
        }
    </script>
</head>
<body>
    <h2>Create User</h2>
    <form method="POST" action="create.php" onsubmit="return showSuccessAlert('User created successfully!')">
        Name: <input type="text" name="name" required>
        <br><br>
        Email: <input type="email" name="email" required>
        <br><br>
        <input type="submit" value="Create">
    </form>
>>>>>>> Stashed changes:Account/Registration.php

    <h2>Users List</h2>
    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once 'dbConnection.php';
            require_once 'crudOperation.php';

            $database = new Database();
            $db = $database->getConnect();

            $user = new User($db);
            $stmt = $user->read();
            $num = $stmt->rowCount();

            if($num > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>" .(isset($row['Id']) ? htmlspecialchars($row['Id']) : ''). "</td>";
                    echo "<td>" .(isset($row['Name']) ? htmlspecialchars($row['Name']) : ''). "</td>";
                    echo "<td>" .(isset($row['Email']) ? htmlspecialchars($row['Email']) : ''). "</td>";
                    echo "<td><button onclick='showSuccessAlert(\"User deleted successfully!\")'>Delete</button> | <button onclick='showSuccessAlert(\"User edited successfully!\")'>Edit</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>