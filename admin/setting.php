<?php
session_start();

require_once("../db.php");
// $db_user = 'root';
// $db_pass = '';
// $db = 'admin';

// $con = mysqli_connect('localhost', $db_user, $db_pass, $db);

// if (!$con) {
//     die('Connection failed: ' . mysqli_connect_error());
// }

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

// Fetch user data based on the user ID
$id = $_SESSION['id'];

$sql = "SELECT * FROM login WHERE id='" . $id . "' LIMIT 1";

$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Display user data for updating
} else {
    echo 'Error fetching user data';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbs5XaO/94Q6qMlZQQ9VaA/eCjFjoUwo5SM6r5z9FO2aWprSlBZL6pMvYB4QamZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(to right, #FFA500, #FFC966);
        }

        .container {
            margin-top: 50px;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
        .password-container { 
            position: relative;
        }

       .eye-icon:hover{
            background-image: linear-gradient(to right, #FFA500, #FFC966);
            color: white;
        } 

    </style>
</head>

<body>
    <nav class="navbar" style="background-color: #fff;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../SPARKBIZ-LOGO4_iwlmer4s.png" alt="Bootstrap" width="auto" height="80px">
            </a>
        </div>
    </nav>
    <div class="container">
        <form action='adminupdateprocess.php' method='post'>
            <div class="form-group">
                <label for='fname'>First Name:</label>
                <input type='text' class='form-control' id='fname' name='fname' value="<?php echo $row['fname']; ?>"
                    required>
            </div>

            <div class="form-group">
                <label for='lname'>Last Name:</label>
                <input type='text' class='form-control' id='lname' name='lname' value="<?php echo $row['lname']; ?>"
                    required>
            </div>

            <div class="form-group">
                <label for='username'>Username:</label>
                <input type='text' class='form-control' id='username' name='username'
                    value="<?php echo $row['username']; ?>" required>
            </div>

            <!-- <div class="form-group">
                <label for='password'>Password:</label>
                <input type='password' class='form-control' id='password' name='password'
                    value="<?php echo $row['password']; ?>" required>
            </div> -->
            <div class="form-group password-container">
                <label for='password'>Password:</label>
                <div class="input-group">
                    <input type='password' class='form-control' id='password' name='password' value="<?php echo $row['password']; ?>" required>
                    <span class="input-group-text eye-icon" onclick="togglePasswordVisibility('password')">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>


            <div class="form-group">
                <label for='phone'>Phone:</label>
                <input type='text' class='form-control' id='phone' name='phone' value="<?php echo $row['phone']; ?>"
                    required>
            </div>

            <div class="form-group">
                <label for='gender'>Gender:</label>
                <select class='form-control' id='gender' name='gender' required>
                    <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($row['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                </select>
            </div>

            <input type='hidden' name='id' value="<?php echo $row['id']; ?>">

            <button type='submit' class='btn btn-primary center'>Update</button>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.querySelector(`#${inputId} + .input-group-text i`);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>
