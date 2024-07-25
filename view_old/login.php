<?php
session_start();
include 'src/init.php';

if (isset($_POST['loginBtn'])) {


  $username= $strip->strip($_POST['inputUsernameLog']);
  $passin= $strip->strip($_POST['inputPasswordLog']);

  // echo '<script>alert("'.$username.'");</script>';

  // echo '<script>alert("'.$passin.'");</script>';

  $passhash = md5($passin);

  //echo '<script>alert("'.$passhash.'");</script>';


  $userl = $func->select_logic('users',array('username','=',$username),'AND',array('password','=',$passhash));

  $personID = $userl[0]['person_id'];
  $userRole = $userl[0]['role'];

  if (count($userl)==1){

      $verified = $userl[0]['is_verified'];

   if ($verified ==1){

      $_SESSION['userid'] = $userl[0]['user_id'];
      $_SESSION['personid'] = $userl[0]['person_id'];
      $_SESSION['role'] = $userl[0]['role'];


      if($_SESSION['role'] == 4){
            header("location: admin.php");
          } else if($_SESSION['role'] == 3){
            header("location: faculty.php");
          } else if($_SESSION['role'] == 2){
            header("location: employer.php");
          } else if($_SESSION['role'] == 1){
            header("location: alumni.php");
          }


   } else {
      header("location: announcementsNotVerified.php");
   }

  }
}

?>
<!doctype html>

<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CHARMS</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      background-image: url("../img/loginImageBlur.jpg");
      background-size: cover;
    }

    .logForm {
      width: 100%;
    }

    .signLogo {
      max-width: 500px;
    }

    .custom-shape-divider-top-1716877928 {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
      z-index: -1;
      transform: rotate(180deg);
    }

    .custom-shape-divider-top-1716877928 svg {
      position: relative;
      display: block;
      width: calc(159% + 1.3px);
      height: 148px;
    }

    .custom-shape-divider-top-1716877928 .shape-fill {
      fill: #5174db;
    }

    .animate__animated .animate__pulse {
      --animate-duration: 0.25;
    }

    .loginFormContainer {
      max-width: 500px;
      height: 100%;
      background: rgb(35, 46, 209);
      background: linear-gradient(0deg, rgba(35, 46, 209, 0.5) 0%, rgba(225, 226, 254, 0.5842669831604517) 17%, rgba(255, 255, 255, 1) 64%);
    }

    .loginWholeContainer {
      width: 90%;
      height: 80%;
    }

    .loginFormImageContainer {
      height: 50%
    }

    .loginFormImage {
      max-width: 300px;
      width: 100%;
    }

    .loginGlobalImageContainer {
      width: 60%;
      height: 100%;
      overflow: hidden;
    }

    .loginGlobalImage {
      height: 100%;
    }

    #loginBtn {
      width: 80%;
    }
  </style>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
</head>

<body class="d-flex row align-items-center justify-content-center">
  <div class="container loginWholeContainer d-flex m-auto align-items-center justify-content-center">
    <div class="container loginFormContainer d-flex flex-column border-dark-subtle rounded-start border-3 m-0 align-items-center justify-content-evenly shadow-lg p-2 p-lg-3">
      <div class="loginFormImageContainer d-flex align-items-center justify-content-center">
        <img class="loginFormImage" src="../img/logoCharmsComplete.png">
      </div>
      <form id="loginForm" method="post" class="logForm row g-3 rounded col d-flex flex-column align-items-center">
        <input type="text" class="form-control" id="inputUsernameLog" name="inputUsernameLog" placeholder="Username" required>
        <input type="password" class="form-control" id="inputPasswordLog" name="inputPasswordLog" placeholder="Password" required>
        <div id="loginAlert" class="alert alert-danger alert-dismissible d-none" role="alert">
        </div>
        <div class="text-center col-12">
          <div id="loginLoading" class="spinner-border text-secondary text-center m-auto" role="status" style="display: none">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <button type="submit" id="loginBtn" name="loginBtn" class="btn btn-primary" >Login</button>
        <a href="register.php" class="link-underline-opacity-10 link-dark link-underline-opacity-50-hover text-center">Sign Up Instead</a>
      </form>
    </div>
    <div class="container loginGlobalImageContainer m-0 p-0 rounded-end d-none d-lg-block">
      <img class="loginGlobalImage" src="../img/loginImage.jpg">
    </div>
  </div>
  <!--
  <div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="loginModalTitle">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="loginModalBody" class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  -->
  <script defer src="app.js"></script>
  <script>
    async function loginNext() {
      let username = document.getElementById("inputUsernameLog").value;
      let password = document.getElementById("inputPasswordLog").value;
      let logged = false;
      let role = 0;
      let errors = [];

      if (!password || !username) {
        if (!username) {
          addDanger("inputUsernameLog");
        }
        if (!password) {
          addDanger("inputPasswordLog");
        }
        errors.push("Fill-up all fields");
      }

      let login_request = {
        "username": username,
        "password": password,
        "context": "login",
      };

      await fetch("../controller/auth.php", {
        "method": "POST",
        "headers": {
          "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(login_request),
      }).then(function(response) {
        return response.json();
      }).then(function(data) {
        if (data[0] == false) {
          addDanger("inputUsernameLog");
          addDanger("inputPasswordLog");
        } else {
          logged = true;
          role = data[1];
        }
      }).catch(error => {
        console.error("Err", error);
      })

      if (errors.length > 0) {
        shakeForm(document.getElementById("loginForm"));
        showErrors(errors, "loginAlert");
      } else if (logged == false) {
        shakeForm(document.getElementById("loginForm"));
      } else {
        switch (role) {
          case (1):
            window.location.href = "employer.php";
            break;
          case (2):
            window.location.href = "alumni.php";
            break;
          case (3):
            window.location.href = "admin/dashboard/app/alumni-workhistory.html";
            break;
          case (4):
            window.location.href = "admin/dashboard/index.html";
            break;
        }
      }
    }
  </script>
</body>

</html>
