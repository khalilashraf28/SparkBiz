<?php
if (!empty($_POST)) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $phone = $_POST['phoneno'];
    $productType = $_POST['productType'];
    $quantity = $_POST['quantity'];
    $total =$_POST['total'];
    $addinfo = $_POST['message'];
    require_once("../db.php");
    // Database connection
    // $db_user = 'root';
    // $db_pass = "";
    // $db = 'admin';

    // $con = mysqli_connect('localhost', $db_user, $db_pass) or die('Unable to connect to the database');

    // mysqli_select_db($con, $db) or die("Cannot connect to the database");

    // Prepare the SQL statement based on the product type
    if ($productType == "branding") {
        $sql = "INSERT INTO brand (name, email, productN, phone, productT, quantity, addinfo, date,price) 
                VALUES (?, ?, ?, ?, ?, ?, ?,CURDATE(),?)";
    } elseif ($productType == "webD") {
        $sql = "INSERT INTO web (name, email, productN, phone, productT, quantity, addinfo,date,price) 
                VALUES (?, ?, ?, ?, ?, ?, ?,CURDATE(),?)";
    } else {
        $sql = "INSERT INTO logo (name, email, productN, phone, productT, quantity, addinfo,date,price) 
                VALUES (?, ?, ?, ?, ?, ?, ?,CURDATE(),?)";
    }

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $name, $email, $product, $phone, $productType, $quantity, $addinfo,$total);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header( 'Location: thank.html' );
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
