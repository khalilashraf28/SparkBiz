<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
        background-image: linear-gradient(to right,
          #FFA500,
          #FFC966);
    }

    .container {
      margin-top: 50px;
    }

    form {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .btn-primary:focus {
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }
  </style>
</head>

<body>
<nav class="navbar" style="background-color: #fff;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../SPARKBIZ-LOGO4_iwlmer4s.png" alt="Bootstrap" width="auto" height="80px">
    </a>
  </div>
</nav>
  <div class="container">
    <?php
    // Include your database connection code here
    require_once("../db.php");
    // Check if ID and productT are set in the URL
    if (isset($_GET['id']) && isset($_GET['productT'])) {
      $id = $_GET['id'];
      $productT = $_GET['productT'];

      // Connect to your database ( replace these values with your database credentials )
      // $db_user = 'root';
      // $db_pass = '';
      // $db = 'admin';

      // $con = mysqli_connect('localhost', $db_user, $db_pass, $db);

      // if (!$con) {
      //   die('Connection failed: ' . mysqli_connect_error());
      // } 
    //   else {
    //     echo "<script>alert('Successfully Connected!');</script>";
    //   }

      // Determine the table based on productT
      $tableName = '';
      if ($productT == 'webD') {
        $tableName = 'web';
      } elseif ($productT == 'logoD') {
        $tableName = 'logo';
      } else {
        $tableName = 'brand';
      }

      // Fetch data from the appropriate table
      $sql = "SELECT * FROM $tableName WHERE id = $id";
      $result = $con->query($sql);

      if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the form for editing with the retrieved data
    ?>
        <form action='update_process.php' method='post'>
        <div class="form-group">
          <label for='name'>Name:</label>
          <input type='text' class='form-control' id='name' name='name' value="<?php echo $row['name']; ?>" required>
        </div>

        <div class="form-group">
          <label for='email'>Email:</label>
          <input type='email' class='form-control' id='email' name='email' value="<?php echo $row['email']; ?>" required>
        </div>

        <div class="form-group">
          <label for='productN'>Product Name:</label>
          <input type='text' class='form-control' id='productN' name='productN' value="<?php echo $row['productN']; ?>" required>
        </div>
        <div class="form-group">
          <label for='phone'>Phone:</label>
          <input type='text' class='form-control'id='phone' name='phone' value="<?php echo $row['phone']; ?>" required>
        </div>

        <div class="form-group">
          <label for='quantity'>Quantity:</label>
          <input type='number' class='form-control'id='quantity' name='quantity' value="<?php echo $row['quantity']; ?>"min="1" required>
        </div>

        <div class="form-group">
          <label for='date'>Date:</label>
          <input type='date' class='form-control' id='date' name='date' value="<?php echo $row['date']; ?>" required>
        </div>
        <div class="form-group">
                <label for="total"><i class="fas fa-dollar-sign"></i> Total Price</label>
                <input type="text" class="form-control" id="total" name="total">
              </div>
            
        <input type='hidden' name='id' value="<?php echo $row['id']; ?>">
        <input type='hidden' name='productT' value="<?php echo $productT; ?>">

        <button type='submit' class='btn btn-primary center'>Update</button>
        
      </form>
      </div>
    <?php
      } else {
        echo 'Record not found.';
      }

      // Close the database connection
      if ($con !== null) {
        $con->close();
      }
    } else {
      echo 'Invalid parameters.';
    }
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script>
  function calculateTotal() {
    var quantity = $("#quantity").val();
    
    // Fetch the price based on the selected product type
    var productType = "<?php echo $row['productT']; ?>";
    var price;
    
    // Determine the price based on the product type
    if (productType === 'brand') {
      price = 7000;
    } else if (productType === 'webD') {
      price = 20000;
    } else if (productType === 'logoD') {
      price = 10000;
    } else {
      price = 0; // Default to 0 if product type is not recognized
    }
    
    // Calculate the total price
    var total = price * quantity;
    
    // Display the total price in the input field
    $("#total").val(total);
  }

  // Attach the calculateTotal function to the input event of quantity
  $("#quantity").on("input", calculateTotal);

  // Trigger initial calculation on page load
  calculateTotal();
</script>

</body>

</html>
