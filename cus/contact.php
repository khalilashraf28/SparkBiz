<?php
if (!empty($_POST)) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $question = $_POST['question'];
    $phone = $_POST['phone'];
    require_once("../db.php");
    // Database connection
    // $db_user = 'root';
    // $db_pass = "";
    // $db = 'admin';

    // $con = mysqli_connect('localhost', $db_user, $db_pass) or die('Unable to connect to the database');

    // mysqli_select_db($con, $db) or die("Cannot connect to the database");

    $sql = "INSERT INTO contact (name, email, question, phone, date) 
            VALUES (?, ?, ?, ?, CURDATE())";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $question, $phone);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header('Location: contact.html');
            exit();
        } else {
            echo "<script>alert('Operation Failure. Please re-attempt.');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Operation Failure. Please re-attempt.');</script>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>
