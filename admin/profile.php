<?php
session_start();

require_once("../db.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    echo "<script>alert('id not received!');</script>";
    exit;
}

// Fetch user data from the database
$id = $_SESSION['id'];
$sql = "SELECT * FROM login WHERE id=?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Display user profile information
        $fullname = $row['fname'] . ' ' . $row['lname'];
        $username = $row['username'];
        $password = $row['password'];
        $phone = $row['phone'];
        $gender = $row['gender'];
    } else {
        echo 'Error fetching user data';
    }

    mysqli_stmt_close($stmt);
} else {
    echo 'Error preparing statement';
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbs5XaO/94Q6qMlZQQ9VaA/eCjFjoUwo5SM6r5z9FO2aWprSlBZL6pMvYB4QamZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: linear-gradient(to right, #FFA500, #FFC966);
            color: #000; /* Set text color to black for better readability */
        }

        .container {
            margin-top: 50px;
        }

        .profile-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }
        nav.navbar {
            background-color: #fff;
        }

        nav.navbar img {
            max-height: 80px;
        }

        h2 {
            color: #fff;
        }
        .eye-icon:hover{
            background-image: linear-gradient(to right, #FFA500, #FFC966);
            color: white;
        } 
        
    </style>
</head>

<body>

    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../SPARKBIZ-LOGO4_iwlmer4s.png" alt="Bootstrap" width="auto" height="80px">
            </a>
        </div>
    </nav>

    <div class="container profile-container">
        <h2>User Profile</h2>
        <form>
            <div class="form-group">
                <label for='fullname'>Full Name:</label>
                <input type='text' class='form-control' id='fullname' value="<?php echo $fullname; ?>" readonly>
            </div>

            <div class="form-group">
                <label for='username'>Username:</label>
                <input type='text' class='form-control' id='username' value="<?php echo $username; ?>" readonly>
            </div>

            <div class="form-group password-container">
                <label for='password'>Password:</label>
                <div class="input-group">
                    <input type='password' class='form-control' id='password' name='password' value="<?php echo $row['password']; ?>" readonly>
                    <span class="input-group-text eye-icon" onclick="togglePasswordVisibility('password')">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label for='phone'>Phone:</label>
                <input type='text' class='form-control' id='phone' value="<?php echo $phone; ?>" readonly>
            </div>

            <div class="form-group">
                <label for='gender'>Gender:</label>
                <input type='text' class='form-control' id='gender' value="<?php echo $gender; ?>" readonly>
            </div>
        </form>

        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudf
