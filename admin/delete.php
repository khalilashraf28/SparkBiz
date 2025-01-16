<?php
// delete.php

// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productT = $_GET['productT']; // Change this line to use GET

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

    // Delete the record from the database
    $query = "DELETE FROM $tableName WHERE id = $id";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    // Redirect back to the page displaying the data or another appropriate page
    header("Location: deletesuccess.html");
    exit();

    mysqli_close($con);
} else {
    // Handle the case where the ID is not set in the URL
    echo "Invalid request.";
}
?>
