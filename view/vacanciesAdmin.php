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
    .jobListItem {
      cursor: pointer;
    }
  </style>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<body class="m-0" onload="">
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
            <a class="nav-link" href="admin.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Job Vacancies</a>
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
  <div class="container row m-auto mt-5">
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
      <div class="container jobListItem p-3 mt-3 border border-light-subtle">
        <div class="container row m-0">
          <div class="col-2">
            <img src="" width="100" height="100" class="border radius">
          </div>
          <div class="container col-12 col-lg-8 m-0">
            <h4>UI/UX Designer</h4>
            <div class="row mt-4">
              <h6 class="col">Creative Agency</h6>
              <h6 class="col">Cabanatuan City</h6>
              <h6 class="col">Php 20,000 - 30,000</h6>
            </div>
          </div>
          <div class="col-lg-2 h-100">
            <button type="button" class="btn btn-dark mb-3">Apply Now</button>
            <h6 class="text-secondary">7 hours ago</h6>
          </div>
        </div>
      </div>
      <div class="container jobListItem p-3 mt-3 border border-light-subtle">
        <div class="container row m-0">
          <div class="col-2">
            <img src="" width="100" height="100" class="border radius">
          </div>
          <div class="container col-12 col-lg-8 m-0">
            <h4>IT Staff</h4>
            <div class="row mt-4">
              <h6 class="col">Creative Agency</h6>
              <h6 class="col">Cabanatuan City</h6>
              <h6 class="col">Php 20,000 - 30,000</h6>
            </div>
          </div>
          <div class="col-lg-2 h-100">
            <button type="button" class="btn btn-dark mb-3">Apply Now</button>
            <h6 class="text-secondary">7 hours ago</h6>
          </div>
        </div>
      </div>
      <div class="container jobListItem p-3 mt-3 border border-light-subtle">
        <div class="container row m-0">
          <div class="col-2">
            <img src="" width="100" height="100" class="border radius">
          </div>
          <div class="container col-12 col-lg-8 m-0">
            <h4>Mobile App Developer</h4>
            <div class="row mt-4">
              <h6 class="col">Creative Agency</h6>
              <h6 class="col">Cabanatuan City</h6>
              <h6 class="col">Php 20,000 - 30,000</h6>
            </div>
          </div>
          <div class="col-lg-2 h-100">
            <button type="button" class="btn btn-dark mb-3">Apply Now</button>
            <h6 class="text-secondary">7 hours ago</h6>
          </div>
        </div>
      </div>
      <div class="container jobListItem p-3 mt-3 border border-light-subtle">
        <div class="container row m-0">
          <div class="col-2">
            <img src="" width="100" height="100" class="border radius">
          </div>
          <div class="container col-12 col-lg-8 m-0">
            <h4>Web Developer</h4>
            <div class="row mt-4">
              <h6 class="col">Creative Agency</h6>
              <h6 class="col">Cabanatuan City</h6>
              <h6 class="col">Php 20,000 - 30,000</h6>
            </div>
          </div>
          <div class="col-lg-2 h-100">
            <button type="button" class="btn btn-dark mb-3">Apply Now</button>
            <h6 class="text-secondary">7 hours ago</h6>
          </div>
        </div>
      </div>
      <div class="container jobListItem p-3 mt-3 border border-light-subtle">
        <div class="container row m-0">
          <div class="col-2">
            <img src="" width="100" height="100" class="border radius">
          </div>
          <div class="container col-12 col-lg-8 m-0">
            <h4>Digital Marketer</h4>
            <div class="row mt-4">
              <h6 class="col">Creative Agency</h6>
              <h6 class="col">Cabanatuan City</h6>
              <h6 class="col">Php 20,000 - 30,000</h6>
            </div>
          </div>
          <div class="col-lg-2 h-100">
            <button type="button" class="btn btn-dark mb-3">Apply Now</button>
            <h6 class="text-secondary">7 hours ago</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
  <script>
    const jobListItems = document.querySelectorAll('.jobListItem');

    jobListItems.forEach(el => el.addEventListener('mouseover', () => {
      el.classList.add("shadow-sm");
    }));

    jobListItems.forEach(el => el.addEventListener('mouseout', () => {
      el.classList.remove("shadow-sm");
    }));
  </script>
</body>

</html>
