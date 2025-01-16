<?php

// Include the FPDF library
require('fpdf.php');

// Database connection details
$db_user = 'root';
$db_pass = '';
$db = 'admin';

// Create a MySQLi connection
$conn = mysqli_connect('localhost', $db_user, $db_pass, $db);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// MySQL query
$query = "
    SELECT * FROM (
        SELECT * FROM logo WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())
        UNION ALL
        SELECT * FROM web WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())
        UNION ALL
        SELECT * FROM brand WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())
    ) AS combined_tables
    ORDER BY date DESC;
";

// Execute the query
$result = $conn->query($query);


// Create PDF in landscape orientation
$pdf = new FPDF('L');
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','B', 12);

// Header with logo and current date
$pdf->Image('../../SPARKBIZ-LOGO4_iwlmer4s.png', 15, 10, 50); // Adjust the path and dimensions
$pdf->Cell(220);
$pdf->Cell(0, 10, 'Monthly Report', 0, 1, 'C');
$pdf->Cell(220);
$pdf->Cell(0, 10, 'Date: ' . date('Y-m-d'), 0, 1, 'C');
$pdf->Ln(20);

// Set column headers
$pdf->Cell(20, 10, '#', 1);
$pdf->Cell(40, 10, 'Name', 1);
$pdf->Cell(40, 10, 'Email', 1);
$pdf->Cell(30, 10, 'Product Name', 1);
$pdf->Cell(20, 10, 'Phone', 1);
$pdf->Cell(30, 10, 'Product Type', 1);
$pdf->Cell(20, 10, 'Quantity', 1);
$pdf->Cell(25, 10, 'Date', 1);
$pdf->Cell(20, 10, 'Price', 1);

$pdf->Ln();

// Set font for data
$pdf->SetFont('Arial', '', 8);
$a=1;
// Loop through the result set
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(20, 10, $a, 1);
    $pdf->Cell(40, 10, $row['name'], 1);
    $pdf->Cell(40, 10, $row['email'], 1);
    $pdf->Cell(30, 10, $row['productN'], 1);
    $pdf->Cell(20, 10, $row['phone'], 1);
    $pdf->Cell(30, 10, $row['productT'], 1);
    $pdf->Cell(20, 10, $row['quantity'], 1);
    $pdf->Cell(25, 10, $row['date'], 1);
    $pdf->Cell(20, 10, $row['price'], 1);

    $pdf->Ln();
    $a++;
}
$filename = 'SparkBiz Monthly.pdf';

// Output PDF with specified filename
$pdf->Output($filename, 'D');


// Close MySQL connection
$conn->close();

?>
