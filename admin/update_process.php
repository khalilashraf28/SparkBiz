<?php
// process_update.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $productN = $_POST['productN'];
    $productT = $_POST['productT'];
    $phone = $_POST['phone'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $tableName = '';
    if ($productT == 'webD') {
        $tableName = 'web';
    } elseif ($productT == 'logoD') {
        $tableName = 'logo';
    } else {
        $tableName = 'brand';
    }

    require_once("../db.php");
    // Database connection
    // $db_user = 'root';
    // $db_pass = '';
    // $db = 'admin';

    // $con = mysqli_connect('localhost', $db_user, $db_pass, $db);

    // if (!$con) {
    //     die('Connection failed: ' . mysqli_connect_error());
    // }

    // Update the record in the database
    $query = "UPDATE $tableName  SET
                name = '$name',
                email = '$email',
                productN = '$productN',
                productT = '$productT',
                phone = '$phone',
                quantity = '$quantity',
                date = '$date'
              WHERE id = $id";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    // Redirect back to the page displaying the data or another appropriate page
    header("Location: updatesuccess.html");
    exit();

    mysqli_close($con);
} else {
    // Handle the case where the form was not submitted properly
    echo "Invalid request.";
}
?>
