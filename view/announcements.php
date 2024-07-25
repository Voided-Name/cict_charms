</div>
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

    .newsHeader {
      background-image: url("../img/announcementsBg.jpg");
      background-size: cover;
      background-position: center;
      height: 150px;
    }

    .newsText {
      font-size: 100px;
    }

    .newsBody {
      text-align: justify;
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
            <a class="nav-link" href="employer.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vacancies.php">Job Vacancies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="announcements.php">Announcements</a>
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
  <div class="container">
    <div class="container m-auto text-center mt-4 newsHeader d-flex align-items-center justify-content-center ">
      <h1 class="text-light newsText">News</h1>
    </div>
    <hr>
    <div class="container m-auto my-0 text-center d-flex align-items-center justify-content-center">
      <h1 class="fw-italic text-dark">UI Changes and Recent Bug Fixes</h1>
    </div>
    <hr>
    <div class="container newsBody">
      <h1>UI Changes</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ultricies, nunc ut rhoncus consequat, dui lectus varius mi, et cursus dui nibh nec urna. Aliquam erat volutpat. Etiam porttitor euismod porta. Sed iaculis vulputate elit, ac vulputate lorem consectetur ac. Integer suscipit elementum augue, vitae egestas tortor sagittis ac. Sed sit amet nunc commodo, fringilla dolor at, aliquam lorem. Duis in sem elementum, placerat nulla efficitur, pellentesque nisi. Vestibulum vitae nisl convallis, euismod quam eu, pulvinar turpis. </p>
      <img src="../img/newsImg.jpg">
      <p>Cras ut turpis eu orci commodo volutpat id sed augue. Sed sed velit cursus, eleifend velit id, dictum nisi. Donec vitae risus id ipsum pretium varius non vel nisl. In nec nibh magna. Nam vehicula turpis massa. Etiam lacus dui, semper ac dapibus non, faucibus sed erat. Sed bibendum urna turpis. </p>
      <h1>Bug Fixes</h1>
      <ul>
        <li>Lorem ipsum dolor sit amet</li>
        <li>consectetur adipiscing elit</li>
        <li>Nulla ultricies</li>
      </ul>
    </div>
    <script type="module">
      import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
    </script>
</body>

</html>
