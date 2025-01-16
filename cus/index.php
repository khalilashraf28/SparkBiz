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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="layout.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


  <!-- counter -->

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/mdbootstrap@4.19.2/js/mdb.min.js"></script>

  <!-- counter-end -->

  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->


</head>

<body>

  <!-- loader tab -->

  <!-- <div class="loading-slider" id="loadingSlider">
    <div class="spinner"></div>
  </div>
 -->

  <!-- End Loader -->


  <div class="navs ">

    <div class="row">
      <div class="col-md-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
          <!-- Container wrapper -->
          <div class="container-fluid">
            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button"
              data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse ok" id="navbarSupportedContent">
              <!-- Navbar brand -->
              <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
                <img src="../SPARKBIZ-LOGO4_iwlmer4s.png" height="60" alt="MDB Logo" />
              </a>
              <!-- Left links -->
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link hvr-underline-from-left" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link hvr-underline-from-left" href="index.php">customer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link hvr-underline-from-left" href="index.php">Project</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link hvr-underline-from-left" href="form.html">Form</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link hvr-underline-from-left" href="Contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link hvr-underline-from-left" href="../logout.php">Logut</a>
                </li>
              </ul>
              <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
              <!-- Icon -->
              <a class="text-reset me-3" href="#">
                <i class="fa fa-shopping-cart"></i>
              </a>

              <!-- Notifications -->
              <div class="dropdown">
                <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#"
                  id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                  <i class="fas fa-bell"></i>
                  <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a><?php echo $fullname; ?>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                  <li>
                    <a class="dropdown-item" href="#">Some news</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Another news</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- Right elements -->
          </div>

          <!-- Container wrapper -->
        </nav>
      </div>
    </div>
  </div>

  <!-- Navbar -->
  <div class="bgimg">
    <div class="heading">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h1 class="main">
              Transform Your Business With Our Digital Expertise⚡
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- project -->

  <div class="projects">
    <div class="container-fluid">
      <section class="text-center">
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5 mb-lg-0 position-relative">
            <i class="fas fa-cubes my fa-3x  mb-4"></i>
            <h5 class="my fw-bold mb-3">5000+</h5>
            <h6 class="fw-normal mb-0">Components</h6>
            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
          </div>

          <div class="col-lg-3 col-md-6 mb-5 mb-md-5 mb-lg-0 position-relative">
            <i class="fas fa-layer-group my fa-3x  mb-4"></i>
            <h5 class="my fw-bold mb-3">490+</h5>
            <h6 class="fw-normal mb-0">Design blocks</h6>
            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
          </div>

          <div class="col-lg-3 col-md-6 mb-5 mb-md-0 position-relative">
            <i class="fas fa-image fa-3x my  mb-4"></i>
            <h5 class="my fw-bold mb-3">100+</h5>
            <h6 class="fw-normal mb-0">Templates</h6>
            <div class="vr vr-blurry position-absolute my-0 h-100 d-none d-md-block top-0 end-0"></div>
          </div>

          <div class="col-lg-3 col-md-6 mb-5 mb-md-0 position-relative">
            <i class="fas fa-plug fa-3x my  mb-4"></i>
            <h5 class="my fw-bold mb-3">28</h5>
            <h6 class="fw-normal mb-0">Plugins</h6>
          </div>
        </div>
      </section>

    </div>
  </div>


  <!-- alpha -->
  <div class="call">
    <div class="container">
      <div class="row">
        <div class="col-md-4 maaz  d-flex flex-column align-items-center">
          <img src="WhatsApp Image 2024-01-11 at 14.06.26_635d69a3.jpg" class="img-thumbnail" alt="...">
        </div>
        <div class="col-md-4" align="left">
          <h1 class="left">Experience the difference. As a top digital agency, we bring expertise to every
            project - from business plans to pitch decks. Let us help you navigate the digital ecosystem and
            achieve success.</h1>
          <h1 class="bottom mt-auto">
            <i class="fas fa-arrow-left"></i>Maaz Farman(CEO SPARK⚡BIZ)
          </h1>
        </div>

        <div class="col-md-4 col-3 vertical-line">
          <h1 id="projectText"> 200+ ACTIVE PROJECTS⚡</h1>

        </div>

      </div>
    </div>
  </div>

  <!-- border -->
  <div class="border1">
    <div class="container-fluid">

      <div class="lines"></div>
    </div>
  </div>

  <!-- border-end -->
  <!-- images     -->



  <div class="livepages">
    <div class="container-fluid">
      <div class="row mx-auto">

        <div class="col-12 col-md-4">

          <div class="card  ime d-flex flex-column h-100">
            <div class="card-body ima">
              <h5 class="card-title" style="text-align: center;"><u>BRANDING</u></h5>
              <p class="card-text">
                <li>4 Days Delivery (Unlimited Revisions)</li>
                <li>Up to 5 pages with a clean and user-friendly layout.</li>
                <li>Standard color scheme and basic typography.</li>
                <li>Mobile responsiveness.</li>
                <li>Basic navigation menu and footer.</li>
                <li>Basic contact form.</li>
                <li>Integration with a simple Content Management System (CMS).</li>
              </p>
              <button type="button" class="btn btn-primary" data-mdb-ripple-init>Button</button>
            </div>
          </div>

        </div>

        <div class="col-12 col-md-4">
          <div class="card d-flex flex-column h-100">
            <div class="card-body ima">
              <h5 class="card-title" style="text-align: center;"><u>WEB DESIGNING</u></h5>
              <p class="card-text">
                <li>7 Days Delivery (Unlimited Revisions)</li>
                <li>Up to 10 pages with refined and customized design.</li>
                <li>Enhanced color scheme and typography.</li>
                <li>Responsive design with attention to detail.</li>
                <li>Intuitive navigation.</li>
                <li>Integration with a popular CMS.</li>
                <li>Basic SEO optimization.</li>
                <li>Contact forms with additional fields.</li>
                <li>Social media integration.</li>
              </p>
              <button type="button" class="btn btn-primary" data-mdb-ripple-init>Button</button>
            </div>
          </div>

        </div>

        <div class="col-12 col-md-4">

          <div class="card d-flex flex-column h-100">
            <div class="card-body ima">
              <h5 class="card-title" style="text-align: center;"><u>LOGO DESIGNING</u></h5>
              <p class="card-text">
                <li>14 Days Delivery (Unlimited Revisions)</li>
                <li>Custom design with unique graphics and animations.</li>
                <li>Unlimited pages for a comprehensive online presence.</li>
                <li>Expert-level responsive design.</li>
                <li>Custom iconography and visual elements.</li>
                <li>Integration with a robust CMS or custom solution.</li>
                <li>Comprehensive SEO strategy.</li>
                <li>E-commerce functionality.</li>
                <li>Advanced forms and interactive elements.</li>
                <li>Ongoing maintenance and support.</li>
              </p>
              <button type="button" class="btn btn-primary" data-mdb-ripple-init>Button</button>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <!-- border -->
  <div class="border2">


    <div class="lines1"></div>
  </div>

  <!-- border-end -->

  <!-- services heading -->
  <div class="self">
    <div class="serve">
      <div class="container-fluid">

        <div class="ser">
          <h1 class="hvr-sweep-to-top">Our Services.</h1>
        </div>
        <div class="pers">
          <p>
            At SPARK⚡BIZ, we're passionate about helping businesses thrive in the digital age. Let us be your partner in
            success.


          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- services -->
  <div class="services">
    <div class="container-fluid">
      <div class="pip">
        <div class="card-group">
          <div class="card">
            <img src="assets/images/pin3.jpeg" class="card-img-top" alt="Hollywood Sign on The Hill" />
            <div class="card-body">
              <h5 class="card-title " align="center">BRANDING </h5>
              <p class="card-text" align="center">
                Your brand is your business's identity - let us help you make it unforgettable. Our tailored branding
                solutions will define your brand and help you stand out in a crowded market.
              </p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
          <div class="card">
            <img src="assets/images/pin2.jpeg" class="card-img-top" alt="Palm Springs Road" />
            <div class="card-body">
              <h5 class="card-title" align="center">WEB DESIGN</h5>
              <p class="card-text" align="center"> Your website is your digital storefront - let us help you make a
                lasting impression. We design websites that are beautiful, functional, and effective in driving results
                for your business.</p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
          <div class="card">
            <img src="assets/images/pin1.jpeg" class="card-img-top" alt="Los Angeles Skyscrapers" />
            <div class="card-body">
              <h5 class="card-title" align="center">MARKETING</h5>
              <p class="card-text   " align="center">
                Stand out from the crowd. Our marketing solutions are designed to help your business shine, with
                strategies that connect you to your audience and drive results. Trust us to help you achieve your
                marketing goals.
              </p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Start WOWSlider.com BODY section -->
  <div class="slider">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="wowslider-container1">
            <div class="ws_images">
              <ul>
                <li><img src="data1/images/1.jpg" alt="1" title="1" id="wows1_0" /></li>
                <li><a href="http://wowslider.net"><img src="data1/images/2.jpg" alt="jquery carousel" title="2"
                      id="wows1_1" /></a></li>
                <li><img src="data1/images/3.png" alt="3" title="3" id="wows1_2" /></li>
              </ul>
            </div>
            <div class="ws_bullets">
              <div>
                <a href="#" title="1"><span><img src="data1/tooltips/1.jpg" alt="1" />1</span></a>
                <a href="#" title="2"><span><img src="data1/tooltips/2.jpg" alt="2" />2</span></a>
                <a href="#" title="3"><span><img src="data1/tooltips/3.png" alt="3" />3</span></a>
              </div>
            </div>
            <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">jquery carousel
                slider</a> by WOWSlider.com v9.0</div>
            <div class="ws_shadow"></div>
          </div>
          <script type="text/javascript" src="engine1/wowslider.js"></script>
          <script type="text/javascript" src="engine1/script.js"></script>
          <!-- End WOWSlider.com BODY section -->
        </div>
      </div>
    </div>
  </div>


  <!-- testimonial -->


  <div class="testi">
    <br>
    <div class="container-fluid">
      <section>
        <div class="row d-flex justify-content-center">
          <div class="col-md-10 col-xl-8 text-center">
            <h3 class="mb-4 hvr-sweep-to-top">Testimonials</h3>
            <p class="mb-4 pb-2 mb-md-5 pb-md-0">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
              numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
              quisquam eum porro a pariatur veniam.
            </p>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="d-flex justify-content-center mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                class="rounded-circle shadow-1-strong" width="150" height="150" />
            </div>
            <h5 class="mb-3">Maria Smantha</h5>
            <h6 class="text-primary mb-3">Web Developer</h6>
            <p class="px-xl-3">
              <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet, consectetur
              adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab hic
              tenetur.
            </p>
            <ul class="list-unstyled d-flex justify-content-center mb-0">
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star-half-alt fa-sm text-warning"></i>
              </li>
            </ul>
          </div>
          <div class="col-md-4 mb-5 mb-md-0">
            <div class="d-flex justify-content-center mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                class="rounded-circle shadow-1-strong" width="150" height="150" />
            </div>
            <h5 class="mb-3">Lisa Cudrow</h5>
            <h6 class="text-primary mb-3">Graphic Designer</h6>
            <p class="px-xl-3">
              <i class="fas fa-quote-left pe-2"></i>Ut enim ad minima veniam, quis nostrum
              exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid commodi.
            </p>
            <ul class="list-unstyled d-flex justify-content-center mb-0">
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
            </ul>
          </div>
          <div class="col-md-4 mb-0">
            <div class="d-flex justify-content-center mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                class="rounded-circle shadow-1-strong" width="150" height="150" />
            </div>
            <h5 class="mb-3">John Smith</h5>
            <h6 class="text-primary mb-3">Marketing Specialist</h6>
            <p class="px-xl-3">
              <i class="fas fa-quote-left pe-2"></i>At vero eos et accusamus et iusto odio
              dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.
            </p>
            <ul class="list-unstyled d-flex justify-content-center mb-0">
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-warning"></i>
              </li>
              <li>
                <i class="far fa-star fa-sm text-warning"></i>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- testimonial-end -->

  <!-- counter-tab -->
  <div class="yellow-box">
    <div class="countab">
      <div class="comtainer-fluid">
        <div class="container mt-5 cue">
          <div class="row">
            <div class="col-md-4">
              <div class="counter">
                <h2 class="count" id="happyClientsCount">100</h2>
                <p>Happy Clients</p>
                <div class="progress-bar" id="happyClientsProgressBar">
                  <div class="progress-bar-inner" style="--progress: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="counter">
                <h2 class="count" id="projectsCompletedCount">50</h2>
                <p>Projects Completed</p>
                <div class="progress-bar" id="projectsCompletedProgressBar">
                  <div class="progress-bar-inner" style="--progress: 50%;"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="counter">
                <h2 class="count" id="projectsRemainingCount">20</h2>
                <p>Projects Remaining</p>
                <div class="progress-bar" id="projectsRemainingProgressBar">
                  <div class="progress-bar-inner" style="--progress: 20%;"></div>
                </div>
              </div><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>



  <!-- footer-tab -->

  <div class="foot">

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="pop">
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>SPARK⚡BIZ
              </h6>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam rem, praesentium iure quas natus
                unde dolorem cum laborum! Placeat possimus magni voluptatum a.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Products
              </h6>
              <p>
                <a href="#!" class="text-reset">Canva</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Figma</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Vix</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Illustrator</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Useful links
              </h6>
              <p>
                <a href="#!" class="text-reset">Pricing</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Settings</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Orders</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Help</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 loop">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@example.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">SPARK⚡BIZ</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <script>
    $(document).ready(function () {
      $('[data-mdb-collapse-init]').on('click', function () {
        $($(this).data('mdb-target')).toggleClass('show');
      });

      $(document).on('click', function (e) {
        if (!$(e.target).closest('.navbar').length && !$(e.target).is('[data-mdb-collapse-init]')) {
          $('.navbar-collapse').removeClass('show');
        }
      }).on('click', '.navbar-collapse', function (e) {
        e.stopPropagation();
      });
    });
  </script>



  <script src="script.js"></script>

</body>

</html>