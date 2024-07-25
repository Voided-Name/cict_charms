<?php
session_start();
include "vacanciesDemoDataSet.php";
if (!isset($_POST['page'])) {
  $_SESSION['pagination'] = 1;
  $_SESSION['paginationNum'] = 0;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $page = $_POST['page'];

  if ($page === "next") {
    if (isset($_SESSION['paginationNum'])) {
      $_SESSION['paginationNum'] += 1;
      $_SESSION['pagination'] = 3 * $_SESSION['paginationNum'] + 1;
    }
  } else if ($page === "previous") {
    if (isset($_SESSION['paginationNum'])) {
      $_SESSION['paginationNum'] -= 1;
      if ($_SESSION['paginationNum'] < 0) {
        $_SESSION['paginationNum'] = 0;
      }
      $_SESSION['pagination'] = 3 * $_SESSION['paginationNum'] + 1;
    }
  } else {
    $_SESSION['pagination'] = (int) $page;
  }
}
$_SESSION['alumniPage'] = "vacancies";

function maxPagination($demoData)
{
  return round(sizeof($demoData) / 15);
}

if (sizeof($demoData) > (($_SESSION['paginationNum'] + 1) * 15)) {
  $nextState = true;
} else {
  $nextState = false;
  if ($_SESSION['paginationNum'] > maxPagination($demoData)) {
    $_SESSION['paginationNum'] = maxPagination($demoData);
  }
}
?>

<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CICT CHARM</title>


  <link rel="shortcut icon" href="../assets/images/favicon.ico">
  <link rel="stylesheet" href="../assets/css/core/libs.min.css">
  <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=4.0.0">
  <link rel="stylesheet" href="../assets/css/custom.min.css?v=4.0.0">
  <link rel="stylesheet" href="../assets/css/dark.min.css">
  <link rel="stylesheet" href="../assets/css/customizer.min.css">
  <link rel="stylesheet" href="../assets/css/rtl.min.css">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css" rel="stylesheet">

  <style>
    .jobListItem {
      cursor: pointer;
    }
  </style>

</head>

<body class="  ">
  <!-- Sidebar Menu Start -->
  <?php include 'alumniSidebar.php' ?>
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
                  <h1>Job Vacancies</h1>
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
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body px-0 m-0">
                <div class="container row m-auto shadow-lg p-5">
                  <div class="col-12 col-lg-3 container">
                    <h3 class="text-primary">Filter Jobs</h3>
                    <div class="container border border-dark-subtle rounded p-3">
                      <label for="" class="form-label">
                        <h3>Job Category</h3>
                      </label>
                      <select id="" class="form-select">
                        <option value="1">All Category</option>
                        <option value="2">Category 1</option>
                        <option value="3">Category 2</option>
                      </select>
                      <hr>
                      <h3>Job Type</h3>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                          Full Time
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                          Part Time
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                          Remote
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="">
                        <label class="form-check-label" for="">
                          Freelance
                        </label>
                      </div>
                      <hr>
                      <label for="" class="form-label">
                        <h3>Job Location</h3>
                      </label>
                      <select id="" class="form-select">
                        <option value="1">Anywhere</option>
                        <option value="2">Category 1</option>
                        <option value="3">Category 2</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-lg-9 container ">
                    <div class="container row justify-content-between">
                      <div class="container col-4 m-0">
                        <h5>XX, XXX Jobs Found</h4>
                      </div>
                      <div class="container row col-4 m-0">
                        <h5 class="col">Sort By</h5>
                        <select id="" class="form-select col">
                          <option value="1">None</option>
                          <option value="2">Category 1</option>
                          <option value="3">Category 2</option>
                        </select>
                      </div>
                    </div>
                    <?php include "vacanciesCard.php" ?>
                  </div>
                  <?php include "vacanciesPagination.php" ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        function showDeleteAlert() {
          Swal.fire({
            title: 'Deleted!',
            text: 'The job is successfully deleted.',
            icon: 'success',
            confirmButtonText: 'OK'
          });
        }

        function showEditAlert() {
          Swal.fire({
            title: 'Edited!',
            text: 'The job is successfully edited.',
            icon: 'success',
            confirmButtonText: 'OK'
          });
        }
      </script>

      <script src="../assets/js/core/libs.min.js"></script>
      <script src="../assets/js/core/external.min.js"></script>
      <script src="../assets/js/charts/widgetcharts.js"></script>
      <script src="../assets/js/charts/vectore-chart.js"></script>
      <script src="../assets/js/charts/dashboard.js"></script>
      <script src="../assets/js/plugins/fslightbox.js"></script>
      <script src="../assets/js/plugins/setting.js"></script>
      <script src="../assets/js/plugins/slider-tabs.js"></script>
      <script src="../assets/js/plugins/form-wizard.js"></script>
      <script src="../assets/js/hope-ui.js" defer></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>



</body>

</html>
