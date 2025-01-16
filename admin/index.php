<?php
    require_once("../db.php");
    
    // $db_user = 'root';
    // $db_pass = '';
    // $db = 'admin';

    // $con = mysqli_connect('localhost', $db_user, $db_pass, $db);

    // if (!$con) {
    //     die('Connection failed: ' . mysqli_connect_error());
    // } 

    $comProject = "SELECT * FROM project_completed ORDER BY date DESC;";  
    $contact = "SELECT * FROM contact ORDER BY date DESC;";  
    $query = "SELECT * FROM (SELECT * FROM logo UNION ALL SELECT * FROM web UNION ALL SELECT * FROM brand) AS combined_tables ORDER BY date DESC;";
    $query1 = "SELECT SUM(total_count) AS overall_count FROM (
                    SELECT COUNT(quantity) AS total_count FROM logo
                    UNION ALL
                    SELECT COUNT(quantity) FROM web
                    UNION ALL
                    SELECT COUNT(quantity) FROM brand
                ) AS counts;";
    $query2 = "SELECT SUM(total_count) AS overall_count FROM (
                    SELECT SUM(quantity) AS total_count FROM logo
                    UNION ALL
                    SELECT SUM(quantity) FROM web
                    UNION ALL
                    SELECT SUM(quantity) FROM brand
                ) AS counts;";
    $query3 = "SELECT
    ROUND((current_month.total_count - previous_month.total_count) / previous_month.total_count * 100) AS rounded_percentage_difference
FROM (
    SELECT SUM(total_count) AS total_count
    FROM (
        SELECT COUNT(*) AS total_count
        FROM logo
        WHERE MONTH(date) = MONTH(CURDATE())
        UNION ALL
        SELECT COUNT(*) AS total_count
        FROM web
        WHERE MONTH(date) = MONTH(CURDATE())
        UNION ALL
        SELECT COUNT(*) AS total_count
        FROM brand
        WHERE MONTH(date) = MONTH(CURDATE())
    ) AS combined_data
) AS current_month
CROSS JOIN (
    SELECT SUM(total_count) AS total_count
    FROM (
        SELECT COUNT(*) AS total_count
        FROM logo
        WHERE MONTH(date) = MONTH(CURDATE() - INTERVAL 1 MONTH)
        UNION ALL
        SELECT COUNT(*) AS total_count
        FROM web
        WHERE MONTH(date) = MONTH(CURDATE() - INTERVAL 1 MONTH)
        UNION ALL
        SELECT COUNT(*) AS total_count
        FROM brand
        WHERE MONTH(date) = MONTH(CURDATE() - INTERVAL 1 MONTH)
    ) AS combined_data
) AS previous_month;";

     $query4 = "SELECT SUM(total_price) AS total_sale FROM (
        SELECT SUM(price) AS total_price FROM logo
        UNION ALL
        SELECT SUM(price) FROM web
        UNION ALL
        SELECT SUM(price) FROM brand
    ) AS counts;";
    $query5 = "SELECT COUNT(*) AS count_sale FROM project_completed;";
    $query6 = "SELECT COUNT(*) AS Total_Contact FROM contact;"; 
    $t1="SELECT COUNT(*) AS logo_count FROM logo;";
    $t2="SELECT COUNT(*) AS web_count FROM web;";
    $t3="SELECT COUNT(*) AS brand_count FROM brand;";    
    $t4="SELECT COUNT(*) AS count_this_month FROM project_completed WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";
    $t5 = "SELECT COUNT(*) AS current_month_count
        FROM (
            SELECT * FROM logo WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
            UNION ALL
            SELECT * FROM web WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
            UNION ALL
            SELECT * FROM brand WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
        ) AS combined_tables;";
    $t_logo = "SELECT SUM(price) AS logo_total_price
    FROM logo
    WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";
    $t_web = "SELECT SUM(price) AS web_total_price
    FROM web
    WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";
    $t_brand = "SELECT SUM(price) AS brand_total_price
    FROM brand
    WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";

    $resultcom = mysqli_query($con, $comProject);
    $resultcotact = mysqli_query($con, $contact);
    $result = mysqli_query($con, $query);
    $result1 = mysqli_query($con, $query1);
    $result2 = mysqli_query($con, $query2);
    $result3 = mysqli_query($con, $query3);
    $result4 = mysqli_query($con, $query4);
    $result5 = mysqli_query($con, $query5);
    $result6 = mysqli_query($con, $query6);
    $r1 = mysqli_query($con, $t1);
    $r2 = mysqli_query($con, $t2);
    $r3 = mysqli_query($con, $t3);
    $r4 = mysqli_query($con, $t4);
    $r5 = mysqli_query($con, $t5);
    $r_logo = mysqli_query($con, $t_logo);
    $r_web = mysqli_query($con, $t_web);
    $r_brand = mysqli_query($con, $t_brand);

    if (!$resultcom || !$resultcotact || !$result || !$result1 || !$result2 || !$result3 || !$result4 || !$result5|| !$result6 ||!$r1|| !$r2 || !$r3 || !$r4 || !$r5){
        die("Query failed: " . mysqli_error($con));
    }

    $count_row = mysqli_fetch_assoc($result1);
    $overall_count1 = $count_row['overall_count'];

    $count_row2 = mysqli_fetch_assoc($result2);
    $overall_count2 = $count_row2['overall_count'];

    $count_row3 = mysqli_fetch_assoc($result3);
    $overall_count3 = $count_row3['rounded_percentage_difference'];

    $count_row4 = mysqli_fetch_assoc($result4);
    $overall_count4 = $count_row4['total_sale'];

    $count_row5 = mysqli_fetch_assoc($result5);
    $overall_count5 = $count_row5['count_sale'];

    $count_row6 = mysqli_fetch_assoc($result6);
    $overall_count6 = $count_row6['Total_Contact'];

    $cr = mysqli_fetch_assoc($r1);
    $logo_count = $cr['logo_count'];

    $cr2 = mysqli_fetch_assoc($r2);
    $web_count = $cr2['web_count'];

    $cr3 = mysqli_fetch_assoc($r3);
    $brand_count = $cr3['brand_count'];

    $cr4 = mysqli_fetch_assoc($r4);
    $done_count = $cr4['count_this_month'];

    $cr5 = mysqli_fetch_assoc($r5);
    $current_month_count = $cr5['current_month_count'];

    $cr_web = mysqli_fetch_assoc($r_web);
    $web_total_price = $cr_web['web_total_price'];

    $cr_logo = mysqli_fetch_assoc($r_logo);
    $logo_total_price = $cr_logo['logo_total_price'];

    $cr_brand = mysqli_fetch_assoc($r_brand);
    $brand_total_price = $cr_brand['brand_total_price'];
?>



<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['fullname'])) {
    // Redirect to the login page if not logged in
    header('Location:index.html');
    exit();
}

// Retrieve user information from the session

$fullname = $_SESSION['fullname'];

// Now you can use $user_id and $fullname in your page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex toggled" id="wrapper">
        <!--Sldebar starts here-->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="logo">
                <a href="" onclick="showTab('home','homelink');">
                    <img src="SPARKBIZ-LOGO4_iwlmer4s.png" alt="">
                </a>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="#" id="homelink"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    onclick="showTab('home','homelink');">
                    <i class="fa-solid fa-house-user"></i> Home
                </a>
                <a href="#" id="dashlink"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    onclick="showTab('dashboard','dashlink');">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="#" id="prolink"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    onclick="showTab('project','prolink');">
                    <i class="fas fa-project-diagram me-2"></i> Projects
                </a>
                <a href="#" id="anallink"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    onclick="showTab('Analytics','anallink');">
                    <i class="fas fa-chart-line me-2"></i> Analytics
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    onclick="showTab('reports');">
                    <i class="fas fa-paperclip me-2"></i> Reports
                </a>

            
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                    onclick="showTab('chat');">
                    <i class="fa-solid fa-comment me-2"></i> Chat
                </a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-right-from-bracket me-2"></i> Logout
                </a>
            </div>
        </div>
        <!--Sidebar ends here-->

        <div id="page-content-wrapper">
            <!-- Home -->
            <div class="tab-content active-tab" id="hometab">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-4 m-0">Home</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-circle-user"></i> <?php echo $fullname; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                                    <li><a class="dropdown-item" href="../adminreg/registration.html">Registration</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container px-6 bg-white rounded">
                    <div class="home-img">
                        <img src="../SPARKBIZ-LOGO4_iwlmer4s.png">
                    </div>
                </div>
            </div>

            <!-- Home End here -->

            <!-- Dashboard -->
            <div class="tab-content" id="dashboardtab">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle-dash"></i>
                        <h2 class="fs-4 m-0">Dashboard</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-circle-user"></i> <?php echo $fullname; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid px-4">
                    <div class="row g-3 my-2">
                        <div class="col-md-3">
                            <div
                                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2"><?php echo $overall_count1 ?></h3>
                                    <p class="fs-5">Products</p>
                                </div>
                                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div
                                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                <h3 class="fs-2"><?php echo $overall_count4  ?></h3>
                                    <p class="fs-5">Sales</p>
                                </div>
                                <i
                                    class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div
                                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2"><?php echo $overall_count2  ?></h3>
                                    <p class="fs-5">Total Quantity</p>
                                </div>
                                <i class="fas fa-list fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div
                                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2"><?php echo $overall_count3  ?>%</h3>
                                    <p class="fs-5">Increase</p>
                                </div>
                                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <h3 class="fs-4 mb-3">Recent Orders
                        </h3>
                        <div class="col">
                        <div class="table-responsive" style="max-height: 360px; overflow-y: auto;">
                                <table class="table table-light table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Handle</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Type</th>
                                            <th scope="col">Phone no</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                $a=1;
                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                    
                                        ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['productN']; ?></td>
                                                    <td><?php echo $row['productT']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td><a href="update.php?id=<?php echo $row['id']; ?>&productT=<?php echo $row['productT']; ?>" class="btn btn-primary">Edit</a></td>
                                                    <td><a href="delete.php?id=<?php echo $row['id']; ?>&productT=<?php echo $row['productT']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Complete</a></td>
                                                </tr>        
                                        <?php 
                                                $a++;
                                                }
                                                mysqli_free_result($result);
                                        ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard End here -->

            <!-- Project -->
            <div class="tab-content" id="projecttab">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle-proj"></i>
                        <h2 class="fs-4 m-0">Project</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-circle-user"></i> <?php echo $fullname; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid px-4">
                    <div class="row g-3 my-2">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $overall_count5  ?></h3>
                                <p class="fs-5">Total Complete Projects</p>
                            </div>
                            <i class="fa fa-tasks fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="row my-5">
                        <h3 class="fs-4 mb-3">Completed Projects</h3>
                        <div class="col">
                            <div class="table-responsive" style="max-height: 360px; overflow-y: auto;">
                                <table class="table table-light table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Type</th>
                                            <th scope="col">Phone no</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Date</th>
                                            <!-- <th scope="col">Edit</th>
                                            <th scope="col">Delete</th> -->
                                        </tr>
                                    </thead>
                        <tbody>
                            <?php 
                                $a = 1;
                                while ($row1 = mysqli_fetch_assoc($resultcom)) {
                            ?>
                                <tr>
                                    <td><?php echo $a; ?></td>
                                    <td><?php echo $row1['name']; ?></td>
                                    <td><?php echo $row1['email']; ?></td>
                                    <td><?php echo $row1['productN']; ?></td>
                                    <td><?php echo $row1['productT']; ?></td>
                                    <td><?php echo $row1['phone']; ?></td>
                                    <td><?php echo $row1['quantity']; ?></td>
                                    <td><?php echo $row1['price']; ?></td>
                                    <td><?php echo $row1['date']; ?></td>
                                </tr>
                            <?php 
                                $a++;
                                }
                                mysqli_free_result($resultcom);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- Project End here -->

            <!-- Analytics -->
            <div class="tab-content" id="Analyticstab">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle-anal"></i>
                        <h2 class="fs-4 m-0">Analytics</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-circle-user"></i> <?php echo $fullname; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid px-4">
                    <div class="row g-3 my-2">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2 text-center">Spark Analysis</h3>
                                <!-- <p class="fs-5">Spark Analysis</p> -->
                            </div>
                            <i class="fa fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>

                    </div>
                    <div class="container">
                        <div class="row my-5">
                            <!-- <h3 class="fs-4 mb-3">Spark Analysis</h3> -->
                            <div class="col">
                            <h3>Remaining Projects</h3>
                                <div class="visual">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div><br>
                            <div class="col">
                            <h3>This Month Working</h3>
                                <div class="visual">
                                    <canvas id="myChart1" width="50" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5 center">
                            <!-- <h3 class="fs-4 mb-3">Spark Analysis</h3> -->
                            <div class="col">
                            <h3>Count of data</h3>
                                <div class="visual">
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                            <!-- <br>
                            <div class="col">
                                <div class="visual">
                                    <canvas id="myChart1" width="50" height="50"></canvas>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Analytics End here -->

            <!-- Reports -->
            <div class="tab-content" id="reportstab">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle-report"></i>
                        <h2 class="fs-4 m-0">Report</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-circle-user"></i> <?php echo $fullname; ?>
                                                                               
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav>
                <div class="container-fluid px-4" style="height: 100%;"> <!-- Adjust the height as needed -->
                    <div class="row g-3 my-2">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded" style="border-radius: 25px;"> <!-- Adjust the border-radius as needed -->
                            <i class="fa-solid fa-receipt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            <h3>Generate Monthly Report</h3>
                            <div>
                                <form action="fpdf186\pdf.php" method="post">
                                    <button class="btn btn-danger btn-lg" type="submit">Report</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Reports End here -->

            <!-- Chat -->
            <div class="tab-content" id="chattab">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle-chat"></i>
                        <h2 class="fs-4 m-0">Chat</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-circle-user"></i> <?php echo $fullname; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                                    <li><a class="dropdown-item" href="setting.php">new Admin</a></li>
                                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid px-4">
                    <div class="row g-3 my-2">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $overall_count6 ?></h3></h3>
                                <p class="fs-5">Chats</p>
                            </div>
                            <i class="fa fa-tasks fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="row my-5">
                        <h3 class="fs-4 mb-3">Customer Chat</h3>
                        <div class="col">
                            <div class="table-responsive" style="max-height: 360px; overflow-y: auto;">
                                <table class="table table-light table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone no</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                        <tbody>
                            <?php 
                                $a = 1;
                                while ($row2 = mysqli_fetch_assoc($resultcotact)) {
                            ?>
                                <tr>
                                    <td><?php echo $a; ?></td>
                                    <td><?php echo $row2['name']; ?></td>
                                    <td><?php echo $row2['email']; ?></td>
                                    <td><?php echo $row2['phone']; ?></td>
                                    <td><?php echo $row2['date']; ?></td>
                                    <td><?php echo $row2['question']; ?></td>
                                    <td><a href="deletechat.php?id=<?php echo $row2['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td>
                                </tr>
                            <?php 
                                $a++;
                                }
                                mysqli_free_result($resultcotact);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- Chat End here -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-iuZRJztdf5SMBYEd2zz/mWvBQIlj1vkmAVDwZd8lP84V2ArJ04xKyVx6Ae4l"
        crossorigin="anonymous"></script>


    <script>
        const el = document.getElementById("wrapper");
        const buttons = ["menu-toggle", "menu-toggle-dash", "menu-toggle-proj", "menu-toggle-anal", "menu-toggle-report", "menu-toggle-chat"];

        function toggleMenu() {
            el.classList.toggle("toggled");
        }

        buttons.forEach(buttonId => document.getElementById(buttonId).onclick = toggleMenu);
    </script>


    <script>
        function showTab(tabName, linkId) {
            el.classList.toggle("toggled");
            var tabs = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active-tab');
            }

            var selectedTab = document.getElementById(tabName + 'tab');
            selectedTab.classList.add('active-tab');

            var links = document.getElementsByClassName('list-group-item');
            for (var i = 0; i < links.length; i++) {
                links[i].classList.remove('active-link');
            }


            var clickedLink = document.getElementById(linkId);
            clickedLink.classList.add('active-link');

            return false;
        }
    </script>
    <script>
        const ctx = document.getElementById('myChart');
        const ctx1 = document.getElementById('myChart1');
        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['Logo Sales', 'Web Sales', 'Brand Sales'],
                datasets: [{
                    label: 'Remaining Projects',
                    data: [
                        <?php echo $logo_count; ?>,
                        <?php echo $web_count; ?>,
                        <?php echo $brand_count; ?>
                    ],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)',
                    ],
                    borderColor: [
                        'rgb(0, 0, 0)',
                        'rgb(0, 0, 0)',
                        'rgb(0, 0, 0)',,
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Remaining Project', 'Complete Project'],
                datasets: [{
                    label: 'Project Work This Month',
                    data: [
                        <?php echo $current_month_count; ?>,
                        <?php echo $done_count ?>
                    ],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        // 'rgba(255, 99, 132, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)',
                        // 'rgba(255, 205, 86, 0.2)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(201, 203, 207, 1)'
                    ],
                    borderColor: [
                        'rgb(0, 0, 0)',
                        'rgb(0, 0, 0)',
                    ]

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['web_total_price', 'brand_total_price', 'logo_total_price'],
                datasets: [{
                    label: 'Project Work This Month',
                    data: [
                        <?php echo $web_total_price; ?>,
                        <?php echo $brand_total_price; ?>,
                        <?php echo $logo_total_price; ?>
                    ],
                    borderWidth: 1,
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 1)',
                        // 'rgba(255, 159, 64, 1)',
                        // 'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 1)',
                        // 'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 1)',
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Remaining Project', 'Complete Project'],
                datasets: [{
                    label: 'Project Work This Month',
                    data: [
                        <?php echo $web_total_price; ?>,
                        <?php echo $brand_total_price; ?>,
                        <?php echo $logo_total_price; ?>
                    ],
                    borderWidth: 1,
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 1)',
                        // 'rgba(255, 159, 64, 1)',
                        // 'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 1)',
                        // 'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 1)',
                        // 'rgba(54, 162, 235, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>
