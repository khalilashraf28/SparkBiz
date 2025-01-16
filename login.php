<?php
session_start();

require_once('db.php'); // Assuming db.php contains the database connection

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customer WHERE username=? LIMIT 1";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['fullname'] = $row['fname'] . ' ' . $row['lname'];

                header('Location: cus/index.php');
                exit();
            } else {
                echo 'Invalid username or password';
            }
        } else {
            echo 'Invalid username or password';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'Invalid username or password';
    }
}
?>
