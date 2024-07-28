<?php
session_start();
include '../src/init.php';
$_SESSION['adminPage'] = "validateAlumni";

if ($_SESSION['role'] != 4) {
  header("location: ../../");
  exit();
}


// Function to handle approval
function approveAction($id, $func)
{
  // Your logic to approve the action
  // For example:


  // $findone = $func->select_one('users',array('id','=',$id));
  // $findone9 = $findone[0]['username'];


  //   echo '<script>alert("'.$findone9.'");</script>';


  // echo '<script>alert("'.$id.'");</script>';

  $verifyID = 0;


  global $con;


  $verifyInsert = $func->insert('verificationstatus', array(
    'user_id' => $id,

    'status' => 1,
    'verified_by' => $_SESSION['personid'],
  ));


  if ($verifyInsert) {

    $verifyID = mysqli_insert_id($con);

    $userApprove = $func->update('users', 'id', $id, array(

      'is_verified' => '1',
      'verificationDetails' => $verifyID

    ));
  }
}

function deleteAction($id, $func, $reason)
{


  //  echo '<script>alert("'.$reason.'");</script>';

  //    echo '<script>alert("'.$id.'");</script>';


  $verifyID = 0;

  global $con;

  $verifyInsert = $func->insert('verificationstatus', array(

    'user_id' => $id,
    'status' => 2,
    'verified_by' => $_SESSION['personid'],
    'decline_reason' => $reason
  ));

  if ($verifyInsert) {


    $verifyID = mysqli_insert_id($con);

    //    echo '<script>alert("'.$verifyID.'");</script>';

    $userApprove = $func->update('users', 'id', $id, array(
      'is_verified' => '2',
      'verificationDetails' => $verifyID
    ));
  }
}



function reconAction($id, $func, $reason)
{


  //  echo '<script>alert("'.$reason.'");</script>';

  //  echo '<script>alert("'.$id.'");</script>';

  $verifyID = 0;

  global $con;

  $verifyInsert = $func->insert('verificationstatus', array(
    'user_id' => $id,
    'status' => 3,
    'verified_by' => $_SESSION['personid'],
    'decline_reason' => "Reconsidered due " . $reason
  ));


  if ($verifyInsert) {


    $verifyID = mysqli_insert_id($con);


    //     echo '<script>alert("'.$verifyID.'");</script>';


    $userApprove = $func->update('users', 'id', $id, array(
      'is_verified' => '1',
      'verificationDetails' => $verifyID
    ));
  }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['approve_id'])) {
    approveAction($_POST['approve_id'], $func);
  }
  if (isset($_POST['delete_id']) && isset($_POST['reason'])) {

    deleteAction($_POST['delete_id'], $func, $_POST['reason']);
  }


  if (isset($_POST['recon_id']) && isset($_POST['reason'])) {
    reconAction($_POST['recon_id'], $func, $_POST['reason']);
  }
}


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
  <!-- Sidebar Menu Start -->
  <aside>
    <?php include 'adminSidebar.php'; ?>
    </div>
    </div>
    <!-- Sidebar Menu End -->
  </aside>
  <main class="main-content">

    <div class="position-relative iq-banner">

      <!--Nav Start-->
      <?php include 'header.php'; ?>
      <!-- Nav Header Component Start -->
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
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Rejected</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="alumni" role="tabpanel" aria-labelledby="alumni-tab">
                  <?php include 'validate-alumni-tabs.php' ?>
                </div>
                <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                  <?php include 'validate-employer-tabs.php' ?>
                </div>
                <div class="tab-pane fade" id="faculty" role="tabpanel" aria-labelledby="faculty-tab">

                  <?php include 'validate-faculty-tabs.php' ?>
                </div>
                <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                  <?php include 'rejected-tabs.php' ?>
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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        document.querySelectorAll('.accButton').forEach(function(button) {
          button.addEventListener('click', function() {
            var id = this.dataset.id;
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to approve this action!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, approve it!'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Approved!',
                  'The action has been approved.',
                  'success'
                ).then(() => {

                  var form = document.createElement('form');
                  form.method = 'POST';
                  form.style.display = 'none';
                  var input = document.createElement('input');
                  input.name = 'approve_id';
                  input.value = id;
                  form.appendChild(input);
                  document.body.appendChild(form);
                  form.submit();
                });
              }
            });
          });
        });


        document.querySelectorAll('.delButton').forEach(function(button) {

          button.addEventListener('click', function() {
            var id = this.dataset.id;
            var reason = this.dataset.reason || '';

            Swal.fire({
              title: 'Are you sure?',
              text: "You want to decline this action!",
              input: 'textarea',
              inputPlaceholder: 'Enter your reason here...',
              inputValue: reason,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Yes, decline it!'
            }).then((result) => {
              if (result.isConfirmed && result.value) {
                Swal.fire(
                  'Declined!',
                  'The action has been declined.',
                  'success'
                ).then(() => {
                  var form = document.createElement('form');
                  form.method = 'POST';
                  form.style.display = 'none';
                  var inputId = document.createElement('input');
                  inputId.name = 'delete_id';
                  inputId.value = id;
                  form.appendChild(inputId);
                  var inputReason = document.createElement('input');
                  inputReason.name = 'reason';
                  inputReason.value = result.value;

                  form.appendChild(inputReason);
                  document.body.appendChild(form);

                  alert(inputId.name + "\n" + inputId.value);
                  form.submit();
                });
              } else {
                Swal.fire(
                  'Cancelled',
                  'Your action has not been declined.',
                  'error'
                );
              }
            });
          });
        });




        document.querySelectorAll('.recButton').forEach(function(button) {
          button.addEventListener('click', function() {
            var id = this.dataset.id;
            var reason = this.dataset.reason || '';


            Swal.fire({
              title: 'Are you sure?',
              text: "You want to Reconsider this acccount!",
              input: 'textarea',
              inputPlaceholder: 'Enter your reason here...',
              inputValue: reason,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Yes, reconsider it!'
            }).then((result) => {
              if (result.isConfirmed && result.value) {
                Swal.fire(
                  'Reconsider!',
                  'The account has been reconsidered.',
                  'success'
                ).then(() => {
                  var form = document.createElement('form');
                  form.method = 'POST';
                  form.style.display = 'none';
                  var inputId = document.createElement('input');
                  inputId.name = 'recon_id';

                  inputId.value = id;
                  form.appendChild(inputId);
                  var inputReason = document.createElement('input');
                  inputReason.name = 'reason';
                  inputReason.value = result.value;
                  form.appendChild(inputReason);
                  document.body.appendChild(form);
                  form.submit();
                });
              }
            });
          });
        });
      </script>

</body>


</html>
