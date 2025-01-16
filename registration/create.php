<?php
if (!empty($_POST)) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['txtEmpPhone'];
    $security_question = $_POST['security_question'];
    $answer = $_POST['answer'];

    // Validate password match
    if ($password !== $con_password) {
        echo "<script>alert('Password and Confirm Password do not match.');</script>"; 
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Database connection
    $db_user = 'root';
    $db_pass = "";
    $db_name = 'admin';

    $con = mysqli_connect('localhost', $db_user, $db_pass, $db_name) or die('Unable to connect to the database');

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO customer (fname, lname, username, password, phone, gender, sques, sans) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $email, $hashed_password, $phone, $gender, $security_question, $answer);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('Account created successfully!');</script>";
            // Redirect to index.html after the alert is dismissed
            echo "<script>window.location.href = '../index.html';</script>";
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
