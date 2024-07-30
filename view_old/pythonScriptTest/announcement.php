<?php
session_start();
$_SESSION['facultyPage'] = "announcement";
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CICT CHARM</title>


  <link rel="shortcut icon" href="../../img/favicon.ico">
  <link rel="stylesheet" href="../../css/theme_1_vendor/aos/dist/aos.css">
  <link rel="stylesheet" href="../../css/theme_1/core/libs.min.css">
  <link rel="stylesheet" href="../../css/theme_1/hope-ui.min.css">
  <link rel="stylesheet" href="../../css/theme_1/custom.css">
  <link rel="stylesheet" href="../../css/theme_1/dark.css">
  <link rel="stylesheet" href="../../css/theme_1/rtl.min.css">
  <link rel="stylesheet" href="../../css/theme_1/customizer.min.css">

</head>

<body class="  ">
<!-- loader Start -->
<div id="loading">
    <div class="loader simple-loader">
      <div class="loader-body"></div>
    </div>
</div>
<!-- loader END -->
  <!-- Sidebar Menu Start -->
  <?php include "facultySidebar.php" ?>
  </div>
  </div>
  <!-- Sidebar Menu End -->
  </aside>
  <main class="main-content">
    <div class="position-relative iq-banner">
      <!--Nav Start-->
      <?php include "header.php" ?>
    </div>
    <div class="container p-5">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                <h4 class="card-title">Annnouncement</h4>
              </div>
            </div>
            <div class="card-body px-0">
              <div class="table-responsive ">
                <table id="user-list-table " class="table table-hover" role="grid" data-bs-toggle="data-table">
                  <thead>
                    <tr class="ligth">
                      <th>Title</th>
                      <th>Author</th>

                      <th style="min-width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Midterm Examination</td>

                      <td>Arnold Dela Cruz</td>
                      <td>
                        <div class="flex align-items-center list-user-action">
                          <!-- Edit Button -->
                          <a class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-placement="top" title="Add" href="#">
                            <div class="bd-example">
                              <button type="button" class="btn btn-primary btn-sm">View</button>
                            </div>
                          </a>
                          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#">
                            <span class="btn-inner">
                              <div class="bd-example">
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                              </div>
                            </span>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>ALAY SA FIRST YEAR</td>

                      <td>Arnold Dela Cruz</td>
                      <td>
                        <div class="flex align-items-center list-user-action">
                          <!-- Edit Button -->
                          <a class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-placement="top" title="Add" href="#">
                            <div class="bd-example">
                              <button type="button" class="btn btn-primary btn-sm">View</button>
                            </div>
                          </a>
                          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#">
                            <span class="btn-inner">
                              <div class="bd-example">
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                              </div>
                            </span>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Publication of gym</td>

                      <td>Arnold Dela Cruz</td>
                      <td>
                        <div class="flex align-items-center list-user-action">
                          <!-- Edit Button -->
                          <a class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-placement="top" title="Add" href="#">
                            <div class="bd-example">
                              <button type="button" class="btn btn-primary btn-sm">View</button>
                            </div>
                          </a>
                          <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#">
                            <span class="btn-inner">
                              <div class="bd-example">
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                              </div>
                            </span>
                          </a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
    <script src="../../css/theme_1_vendor/aos/dist/aos.js"></script>
    <script src="../../js/plugins/setting.js"></script>
    <script src="../../js/plugins/slider-tabs.js"></script>
    <script src="../../js/plugins/form-wizard.js"></script>
    <script src="../../js/hope-ui.js" defer></script>
</body>

</html>
