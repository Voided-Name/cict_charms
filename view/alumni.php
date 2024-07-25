<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
  <style type="text/css">
    .awardsBg {
      background-image: url("../img/awardsBg.jpg");
      background-size: cover;
      background-position: center;
    }

    .featherBg {
      background-image: url("../img/featherBgTransparent.png");
      background-size: cover;
      background-position: center;
    }

    .mossBg {
      background-image: url("../img/mossAbstractBg.jpg");
      background-size: cover;
      background-position: center;
    }

    .bluePaintBg {
      background-image: url("../img/bluePaintBackdrop.jpg");
      background-size: cover;
      background-position: center;
    }

    .blueWaterColorBg {
      background-image: url("../img/blueWaterColorBg.jpg");
      background-size: cover;
      background-position: center;
    }

    .h-500 {
      min-height: 400px;
    }

    html {
      height: 100%;
    }

    .adminBg {
      background-image: url("../img/blueWaveBackdrop.jpg");
      background-size: cover;
      background-position: center;
    }

    .table-responsive {
      max-height: 300px;
      overflow: hidden;
    }
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
</head>

<body class="h-100" onload="">
  <nav class="navbar navbar-expand-lg bg-body-tertiary py-2 px-4 m-auto">
    <div class="container-fluid row w-100 p-0">
      <a class="navbar-brand col-4" href="#">
        <img src="../img/logoCharms.png" width="30" height="30">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-8" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vacanciesAlumni.php">Job Vacancies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="announcementsAlumni.php">Announcements</a>
          </li>
        </ul>
        <div class="dropdown">
          <img class="btn btn-secondary dropdown-toggle img-responsive" role="button" type="button" data-bs-toggle="dropdown" aria-expanded="false" alt="Profile">
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item text-danger" href="login.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
    <li class="nav-item" role="presentation"><button class="nav-link active" id="awards-tab" data-bs-toggle="tab" data-bs-target="#awards-pane" type="button" role="tab" aria-controls="awards-pane" aria-selected="true">Awards and Recognition</button></li>
    <li class="nav-item" role="presentation"><button class="nav-link" id="work-experience-tab" data-bs-toggle="tab" data-bs-target="#work-experience-pane" type="button" role="tab" aria-controls="work-experience-pane" aria-selected="false">Work Experience</button></li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane show active fade" id="awards-pane" role="tabpanel" aria-labelledby="awards-tab" tabindex="0">
      <div class="container">
        <h1 class="fw-bold mt-3">Manage Accolades</h1>
        <hr class="border-3">
      </div>
      <div class="container h-500 bluePaintBg d-flex align-items-center justify-content-center rounded m-auto">
        <div class="container  overflow-scroll mt-4">
          <table id="" class="table table-hover table-striped shadow rounded-3">
            <thead>
              <tr>
                <th scope="col" class="" style="vertical-align:top">
                  <span>Name</span>
                </th>
                <th scope="col" class="d-flex justify-content-between">
                  Date
                  <button type="button" class="btn btn-info text-light">Add</Button>
                </th>
              </tr>
            </thead>
            <tbody id="">
              <tr class="bg-secondary">
                <td>Excellence in Software Development</td>
                <td class="d-flex justify-content-between">
                  <span class="">January 21, 2024</span>
                  <div class="">
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger text-light">Delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Academic Excellence Award</td>
                <td class="d-flex justify-content-between">
                  <span class="">February 14, 2024</span>
                  <div class="">
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger text-light">Delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Outstanding Capstone Project</td>
                <td class="d-flex justify-content-between">
                  <span class="">December 24, 2023</span>
                  <div class="">
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger text-light">Delete</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="work-experience-pane" role="tabpanel" aria-labelledby="work-expereience-tab" tabindex="0">
      <div class="container">
        <h1 class="fw-bold mt-3">Manage Experience</h1>
        <hr class="border-3">
      </div>
      <div class="container h-500 blueWaterColorBg d-flex align-items-center justify-content-center rounded m-auto">
        <div class="container  overflow-scroll mt-4">
          <table id="" class="table table-hover table-striped shadow rounded-3">
            <thead>
              <tr>
                <th scope="col" class="" style="vertical-align:top">
                  <span>Name</span>
                </th>
                <th scope="col" class="" style="vertical-align:top">
                  <span>Position</span>
                </th>
                <th scope="col" class="" style="vertical-align:top">
                  <span>Date Start</span>
                </th>
                <th scope="col" class="d-flex justify-content-between">
                  Date End
                  <button type="button" class="btn btn-info text-light">Add</Button>
                </th>
              </tr>
            </thead>
            <tbody id="">
              <tr class="bg-secondary">
                <td>Acme Corporation</td>
                <td>Software Developer</td>
                <td>February 1, 2024</td>
                <td class="d-flex justify-content-between">
                  <span class="">Present</span>
                  <div class="">
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger text-light">Delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Gamma Softworks</td>
                <td>System Analyst</td>
                <td>January 15, 2022</td>
                <td class="d-flex justify-content-between">
                  <span class="">December 10, 2023</span>
                  <div class="">
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger text-light">Delete</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
