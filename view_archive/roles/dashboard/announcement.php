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

    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link rel="stylesheet" href="../assets/css/core/libs.min.css">
    <link rel="stylesheet" href="../assets/vendor/aos/dist/aos.css">
    <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=4.0.0">
    <link rel="stylesheet" href="../assets/css/custom.min.css?v=4.0.0">
    <link rel="stylesheet" href="../assets/css/dark.min.css">
    <link rel="stylesheet" href="../assets/css/customizer.min.css">
    <link rel="stylesheet" href="../assets/css/rtl.min.css">


</head>

<body class="  ">
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
