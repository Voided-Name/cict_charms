<?php
session_start();
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CICT CHARM</title>

  <link rel="shortcut icon" href="../../../img/favicon.ico">
  <link rel="stylesheet" href="../../../css/theme_1/libs.min.css">
  <link rel="stylesheet" href="../../../css/theme_1_vendor/aos/dist/aos.css">
  <link rel="stylesheet" href="../../../css/theme_1/hope-ui.min.css">
  <link rel="stylesheet" href="../../../css/theme_1/custom.css">
  <link rel="stylesheet" href="../../../css/theme_1/dark.css">
  <link rel="stylesheet" href="../../../css/theme_1/rtl.min.css">
  <link rel="stylesheet" href="../../../css/theme_1/customizer.min.css">

</head>

<body class="  ">
  <!-- Sidebar Menu Start -->
  <?php
  if ($_SESSION["role"] == 1) {
    include 'alumniSidebar.php';
    $_SESSION['alumniPage'] = "dashboard";
  } else if ($_SESSION["role"] == 2) {
    $_SESSION['employerPage'] = "dashboard";
    include 'employerSidebar.php';
  } else if ($_SESSION["role"] == 3) {
    $_SESSION['facultyPage'] = "dashboard";
    include 'facultySidebar.php';
  } else if ($_SESSION["role"] == 4) {
    $_SESSION['adminPage'] = "dashboard";
    include 'adminSidebar.php';
  }
  ?>
  </div>
  </div>
  <!-- Sidebar Menu End -->
  </aside>
  <main class="main-content">
    <div class="position-relative iq-banner">
      <!--Nav Start-->
      <?php include 'header.php' ?>
      <!-- Nav Header Component Start -->
      <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
          <div class="row">
            <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                <div>
                  <h1>Welcome Back!</h1>
                </div>
                <div>
                  <a href="" class="btn btn-link btn-soft-light">
                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                      <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                    </svg>
                    Announcements
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="iq-header-img">
          <img src="../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        </div>
      </div>
      <!-- Nav Header Component End -->
      <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
              <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                    <div class="progress-widget">
                      <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                        <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                        </svg>
                      </div>
                      <div class="progress-detail">
                        <p class="mb-2">Job Vacancies</p>
                        <h4 class="counter">167</h4>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                    <div class="progress-widget">
                      <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                        <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                        </svg>
                      </div>
                      <div class="progress-detail">
                        <p class="mb-2">Total of Alumni</p>
                        <h4 class="counter">198</h4>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                    <div class="progress-widget">
                      <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                        <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                        </svg>
                      </div>
                      <div class="progress-detail">
                        <p class="mb-2">Applicants</p>
                        <h4 class="counter">135</h4>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>

            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-12">
          <div class="row">
            <div class="col-md-12">
              <div class="card" data-aos="fade-up" data-aos-delay="800">
                <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                  <div class="header-title">
                    <p class="mb-0">Ratio</p>
                  </div>
                  <div class="d-flex align-items-center align-self-center">
                    <div class="d-flex align-items-center text-primary">
                      <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                        <g>
                          <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                        </g>
                      </svg>
                      <div class="ms-2">
                        <span class="text-gray">Total Vacancies</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center ms-3 text-info">
                      <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                        <g>
                          <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                        </g>
                      </svg>
                      <div class="ms-2">
                        <span class="text-gray">Application Received</span>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown">
                    <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton22" data-bs-toggle="dropdown" aria-expanded="false">
                      Select Month
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton22">
                      <li><a class="dropdown-item" href="#">Jan</a></li>
                      <li><a class="dropdown-item" href="#">Feb</a></li>
                      <li><a class="dropdown-item" href="#">March</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div id="d-main" class="d-main"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      console.log("<?php echo $_SESSION['verifyMe'] ?>")
    </script>

    <!-- Library Bundle Script -->
    <script src="../assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="../assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="../assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="../assets/js/charts/vectore-chart.js"></script>
    <script src="../assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="../assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="../assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="../assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="../assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->
    <script src="../assets/vendor/aos/dist/aos.js"></script>

    <!-- App Script -->
    <script src="../assets/js/hope-ui.js" defer></script>


</body>

</html>
