<?php
session_start();
include '../src/init.php';

if ($_SESSION['role'] != 4) {
  header("location: ../../");
  exit();
}

$_SESSION['adminPage'] = "listUsers";

$regionInformation = array();
$regionInformation['01'] = 'Region I';
$regionInformation['02'] = 'Region II';
$regionInformation['03'] = 'Region III';
$regionInformation['4A'] = 'Region IV-A';
$regionInformation['4B'] = 'Region IV-B';
$regionInformation['05'] = 'Region V';
$regionInformation['06'] = 'Region VI';
$regionInformation['07'] = 'Region VII';
$regionInformation['08'] = 'Region VII';
$regionInformation['09'] = 'Region XI';
$regionInformation['10'] = 'Region X';
$regionInformation['11'] = 'Region XI';
$regionInformation['12'] = 'Region XII';
$regionInformation['13'] = 'Region XIII';
$regionInformation['BARMM'] = 'BARMM';
$regionInformation['CAR'] = 'CAR';
$regionInformation['NCR'] = 'NCR';
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CICT CHARM</title>

  <link rel="shortcut icon" href="../../img/favicon.ico">
  <link rel="stylesheet" href="../../css/theme_1/core/libs.min.css">
  <link rel="stylesheet" href="../../css/theme_1/hope-ui.min.css">
  <link rel="stylesheet" href="../../css/theme_1/custom.css">
  <link rel="stylesheet" href="../../css/theme_1/dark.css">
  <link rel="stylesheet" href="../../css/theme_1/rtl.min.css">
  <link rel="stylesheet" href="../../css/theme_1/customizer.min.css">


</head>

<body class="  ">
  <div id="loading">
    <div class="loader simple-loader">
      <div class="loader-body"></div>
    </div>
  </div>
  <!-- Sidebar Menu Start -->
  <?php include 'adminSidebar.php' ?>
  </div>
  </div>
  <!-- Sidebar Menu End -->
  </aside>
  <main class="main-content">
    <div class="position-relative iq-banner">
      <!--Nav Start-->
      <?php include 'header.php' ?>
      <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
          <div class="row">
            <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
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
          <img src="../../img/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        </div>
      </div>
      <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <ul class="nav nav-tabs p-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="alumni-tab" data-bs-toggle="tab" data-bs-target="#alumni" type="button" role="tab" aria-controls="alumni" aria-selected="true">Alumni</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="employer-tab" data-bs-toggle="tab" data-bs-target="#employer" type="button" role="tab" aria-controls="employer" aria-selected="false">Employer</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty" type="button" role="tab" aria-controls="faculty" aria-selected="false">Faculty</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="alumni" role="tabpanel" aria-labelledby="alumni-tab">
                  <?php include 'list-alumni-tabs.php' ?>
                </div>
                <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                  <?php include 'list-employer-tabs.php' ?>
                </div>
                <div class="tab-pane fade" id="faculty" role="tabpanel" aria-labelledby="faculty-tab">
                  <?php include 'list-faculty-tabs.php' ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="../../js/core/libs.min.js"></script>
      <script src="../../js/core/external.min.js"></script>
      <script src="../../js/charts/widgetcharts.js"></script>
      <script src="../../js/charts/vectore-chart.js"></script>
      <script src="../../js/charts/dashboard.js"></script>
      <script src="../../js/plugins/fslightbox.js"></script>
      <script src="../../js/plugins/setting.js"></script>
      <script src="../../js/plugins/slider-tabs.js"></script>
      <script src="../../js/plugins/form-wizard.js"></script>
      <script src="../../js/hope-ui.js" defer></script>
</body>

</html>
