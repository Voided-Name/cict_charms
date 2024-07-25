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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vacanciesAdmin.php">Job Vacancies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="announcementsAdmin.php">Announcements</a>
          </li>
        </ul>
        <div class="dropdown">
          <img class="btn btn-secondary dropdown-toggle img-responsive" role="button" type="button" data-bs-toggle="dropdown" aria-expanded="false" alt="Profile">
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item text-danger" href="../index.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container adminBg rounded d-flex align-items-start justify-content-center">
    <div class="container row m-0 gap-4 p-3">
      <div class="border border-primary-subtle border-3 container col p-4 bg-light shadow-lg rounded">
        <div class="">
          <h2 class="">Job Vacancies</h2>
          <h1>167</h1>
        </div>
      </div>
      <div class="border border-success-subtle border-3 container col p-4 bg-light shadow-lg rounded">
        <div class="">
          <h2 class="">Total no. Alumni</h2>
          <h1>198</h1>
        </div>
      </div>
      <div class="border border-danger-subtle border-3 container col p-4 bg-light shadow-lg rounded">
        <div class="">
          <h2 class="">Applicants</h2>
          <h1>135</h1>
        </div>
      </div>
    </div>
  </div>
  <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
    <li class="nav-item" role="presentation"><button class="nav-link active" id="admin-alumni-validate" data-bs-toggle="tab" data-bs-target="#admin-alumni-validate-pane" type="button" role="tab" aria-controls="admin-alumni-validate-pane" aria-selected="true">Validate</button></li>
    <li class="nav-item" role="presentation"><button class="nav-link" id="admin-alumni-list" data-bs-toggle="tab" data-bs-target="#admin-alumni-list-pane" type="button" role="tab" aria-controls="admin-alumni-list-pane" aria-selected="false">List</button></li>
    <li class="nav-item" role="presentation"><button class="nav-link" id="admin-genreport" data-bs-toggle="tab" data-bs-target="#admin-genreport-pane" type="button" role="tab" aria-controls="admin-genreport" aria-selected="false">Generate Report</button></li>
    <li class="nav-item" role="presentation"><button class="nav-link" id="admin-survey" data-bs-toggle="tab" data-bs-target="#admin-survey-pane" type="button" role="tab" aria-controls="admin-survey" aria-selected="false">Surveys</button></li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane show active fade" id="admin-alumni-validate-pane" role="tabpanel" aria-labelledby="admin-alumni-validate" tabindex="0">
      <div class="container h-500 bluePaintBg d-flex align-items-center justify-content-center rounded mt-5 m-auto">
        <div class="container  overflow-scroll mt-4">
          <table id="" class="table table-hover table-striped shadow rounded-3">
            <thead>
              <tr>
                <th scope=" col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="">
              <tr class="bg-secondary">
                <td>Nash Andre</td>
                <td>09215218528</td>
                <td>andre@gmail.com</td>
                <td class=""><span class="bg-warning text-light rounded p-1">Pending</span></td>
                <td>
                  <button type="button" class="btn btn-success text-light">Approve</button>
                  <button type="button" class="btn btn-danger text-light">Decline</button>
                </td>
              </tr>
              <tr>
                <td>Yno Reyes</td>
                <td>09215218528</td>
                <td>yno@gmail.com</td>
                <td class=""><span class="bg-warning text-light rounded p-1">Pending</span></td>
                <td>
                  <button type="button" class="btn btn-success text-light">Approve</button>
                  <button type="button" class="btn btn-danger text-light">Decline</button>
                </td>
              </tr>
              <tr>
                <td>Leon Laborina</td>
                <td>09215218528</td>
                <td>lie@gmail.com</td>
                <td class=""><span class="bg-warning text-light rounded p-1">Pending</span></td>
                <td>
                  <button type="button" class="btn btn-success text-light">Approve</button>
                  <button type="button" class="btn btn-danger text-light">Decline</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="admin-alumni-list-pane" role="tabpanel" aria-labelledby="admin-alumni-list" tabindex="0">
      <div class="container h-500 blueWaterColorBg d-flex align-items-center justify-content-center rounded mt-5 m-auto">
        <div class="container  overflow-scroll mt-4">
          <table id="" class="table table-hover table-striped shadow rounded-3">
            <thead>
              <tr>
                <th scope=" col">Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="">
              <tr class="bg-secondary">
                <td>Nash Andre</td>
                <td>09215218528</td>
                <td>andre@gmail.com</td>
                <td class=""><span class="bg-warning text-light rounded p-1">Pending</span></td>
                <td>
                  <button type="button" class="btn btn-success text-light">Edit</button>
                  <button type="button" class="btn btn-danger text-light">Delete</button>
                </td>
              </tr>
              <tr>
                <td>Yno Reyes</td>
                <td>09215218528</td>
                <td>yno@gmail.com</td>
                <td class=""><span class="bg-warning text-light rounded p-1">Pending</span></td>
                <td>
                  <button type="button" class="btn btn-success text-light">Edit</button>
                  <button type="button" class="btn btn-danger text-light">Delete</button>
                </td>
              </tr>
              <tr>
                <td>Leon Laborina</td>
                <td>09215218528</td>
                <td>lie@gmail.com</td>
                <td class=""><span class="bg-warning text-light rounded p-1">Pending</span></td>
                <td>
                  <button type="button" class="btn btn-success text-light">Edit</button>
                  <button type="button" class="btn btn-danger text-light">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="admin-genreport-pane" role="tabpanel" aria-labelledby="admin-genreport" tabindex="0">
      <div class="container m-auto mt-5 d-flex justify-content-center featherBg p-3 rounded">
        <form class="container w-50 border border-dark-subtle rounded p-4 shadow-lg bg-light" style="--bs-bg-opacity: .7;">
          <h1>Report Type</h1>
          <select class="form-select" aria-label="Default select example">
            <option value="1">Report Type 1</option>
            <option value="2">Report Type 2</option>
            <option value="3">Report Type 3</option>
          </select>
          <hr>
          <h1>Filters</h1>
          <div class="container row gap-2">
            <select class="form-select col" aria-label="Default select example">
              <option value="1">Filter 1</option>
              <option value="2">Filter 2</option>
              <option value="3">Filter 3</option>
            </select>
            <select class="form-select col" aria-label="Default select example">
              <option value="1">Filter 1</option>
              <option value="2">Filter 2</option>
              <option value="3">Filter 3</option>
            </select>
            <select class="form-select col" aria-label="Default select example">
              <option value="1">Filter 1</option>
              <option value="2">Filter 2</option>
              <option value="3">Filter 3</option>
            </select>
          </div>
          <hr>
          <h1>Date</h1>
          <select id="rGenDateSel" class="form-select mb-3" aria-label="Default select example">
            <option value="1">Date After</option>
            <option value="2">Date Before</option>
            <option value="3">Date Between</option>
          </select>
          <input id="rGenDate" class="form-control mb-3" type="date" />
          <input id="rGenDate2" class="form-control" type="date" style="display:none;" />
          <button type="submit" class="btn btn-primary w-100">Print</Button>
        </form>
      </div>
    </div>
    <div class="tab-pane fade" id="admin-survey-pane" role="tabpanel" aria-labelledby="admin-survey" tabindex="0">
      <div class="container h-500 mossBg d-flex align-items-center justify-content-center rounded mt-5 m-auto">
        <div class="container  overflow-scroll mt-4 ">
          <table id="" class="table table-hover table-striped shadow rounded-3">
            <thead>
              <tr>
                <th class="d-flex justify-content-between" scope=" ">
                  <h4>Survey List</h4>
                  <button type="button" class="btn btn-primary">Add Survey</button>
                </th>
              </tr>
            </thead>
            <tbody id="">
              <tr>
                <td class="d-flex justify-content-between">
                  Job Survey
                  <div>
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="d-flex justify-content-between">
                  Membership Survey
                  <div>
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="d-flex justify-content-between">
                  Cencus
                  <div>
                    <button type="button" class="btn btn-success text-light">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    const rGenDateSel = document.getElementById("rGenDateSel");
    const rGenDate2 = document.getElementById("rGenDate2");

    rGenDateSel.addEventListener('change', () => {
      if (rGenDateSel.value == "3") {
        rGenDate2.style.display = "block";
      } else {
        rGenDate2.style.display = "none";
      }
    })
  </script>
</body>

</html>
