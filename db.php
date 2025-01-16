<?php
$db_user = 'root';
$db_pass = '';
$db = 'admin';

$con = mysqli_connect( 'localhost', $db_user, $db_pass, $db );

if ( !$con ) {
    die( 'Connection failed: ' . mysqli_connect_error() );
} 
// else {
//     echo "<script>alert('Successfully Connected!');</script>";
// }
?>