<?php
session_start();
$_SESSION['alumniPage'] = "workExp";
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
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css" rel="stylesheet">
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
  <?php include 'alumniSidebar.php' ?>
  </div>
  </div>
  <!-- Sidebar Menu End -->
  </aside>
  <main class="main-content">
    <div class="position-relative iq-banner">
      <?php include 'header.php' ?>
    </div>
    <!--Nav Start-->
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
              <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">Manage Experience</h4>
                </div>
                <div class="">
                  <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="btn-inner">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                      </svg>
                    </i>
                    <span>Add Work Experience</span>
                  </a>
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Add Experience</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="institution-name" class="form-label">Institution Name</label>
                            <input type="text" class="form-control" id="institution-name" placeholder="">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position" placeholder="">
                            <label for="start-date" class="form-label">Date Start</label>
                            <input type="date" class="form-control" id="start-date">
                            <label for="end-date" class="form-label">Date End</label>
                            <input type="date" class="form-control" id="end-date">
                            <label for="work-exp-description" class="form-label">Description</label>
                            <textarea class="form-control" id="work-exp-description"></textarea>
                          </div>
                          <div class="text-start">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0">
                <div class="table-responsive">
                  <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                    <thead>
                      <tr class="ligth">
                        <th>Institution Name</th>
                        <th>Position</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th style="min-width: 90px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Acme Corporation</td>
                        <td>Position</td>
                        <td>February 1, 2024</td>
                        <td>Present</td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <!-- Edit Button -->
                            <a class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-placement="top" title="Add" href="#">
                              <div class="bd-example">
                                <button type="button" class="btn btn-success btn-sm">Edit</button>
                              </div>
                            </a>

                            <!-- Modal Structure -->
                            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                      Job Details</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" placeholder="Enter position">
                                      </div>
                                      <div class="form-group">
                                        <label for="vacancy">Number of
                                          Vacancies</label>
                                        <input type="number" class="form-control" id="vacancy" placeholder="Enter number of vacancies">
                                      </div>
                                      <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter location">
                                      </div>
                                      <div class="form-group">
                                        <label for="workHours">Work
                                          Hours</label>
                                        <input type="text" class="form-control" id="workHours" placeholder="Enter work hours">
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="showEditAlert()">Save
                                      changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#">
                              <span class="btn-inner">
                                <div class="bd-example">
                                  <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteAlert()">Delete</button>
                                </div>
                              </span>
                            </a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Gamma Softworks</td>
                        <td>System Analyst</td>
                        <td>January 15, 2022</td>
                        <td>December 10, 2023</td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <!-- Edit Button -->
                            <a class="btn btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-placement="top" title="Add" href="#">
                              <div class="bd-example">
                                <button type="button" class="btn btn-success btn-sm">Edit</button>
                              </div>
                            </a>

                            <!-- Modal Structure -->
                            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                      Job Details</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form>
                                      <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" placeholder="Enter position">
                                      </div>
                                      <div class="form-group">
                                        <label for="vacancy">Number of
                                          Vacancies</label>
                                        <input type="number" class="form-control" id="vacancy" placeholder="Enter number of vacancies">
                                      </div>
                                      <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter location">
                                      </div>
                                      <div class="form-group">
                                        <label for="workHours">Work
                                          Hours</label>
                                        <input type="text" class="form-control" id="workHours" placeholder="Enter work hours">
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="showEditAlert()">Save
                                      changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <a class="btn btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="#">
                              <span class="btn-inner">
                                <div class="bd-example">
                                  <button type="button" class="btn btn-danger btn-sm" onclick="showDeleteAlert()">Delete</button>
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
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
</body>

</html>
