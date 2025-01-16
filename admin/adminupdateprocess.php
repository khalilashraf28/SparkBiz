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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input to prevent SQL Injection
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    // Update user information in the database
    $updateQuery = "UPDATE login SET fname='$fname', lname='$lname', username='$username', password='$hashed_password', phone='$phone', gender='$gender' WHERE id='$id'";

    $result = mysqli_query($con, $updateQuery);

    if ($result) {
        header('Location: updatesuccess.html');
        // You can redirect the user to another page or display a success message here.
    } else {
        echo 'Error updating user information: ' . mysqli_error($con);
    }
}

mysqli_close($con);
?>
