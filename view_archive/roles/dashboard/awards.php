<?php
session_start();
$_SESSION['alumniPage'] = "awards";
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
              <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">Manage Awards</h4>
                </div>
                <div class="">
                  <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="btn-inner">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                      </svg>
                    </i>
                    <span>Add New Award</span>
                  </a>
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Add Award</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="addAward.php" method="post">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="award-name" class="form-label">Name</label>
                              <input type="text" class="form-control" name="award-name" id="award-name" placeholder="Award Name">
                              <label for="award-date" class="form-label">Award Date</label>
                              <input type="date" class="form-control" name="award-date" id="award-date">
                              <label for="award-institution" class="form-label">Institution</label>
                              <input type="text" class="form-control" name="award-institution" id="award-institution" placeholder="">
                              <label for="award-description" class="form-label">Description</label>
                              <input type="textarea" class="form-control" name="award-description" id="award-description">
                            </div>
                            <div class="text-start">
                              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
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
                      <th>Name</th>
                      <th>Date</th>
                      <th>Institution</th>
                      <th style="min-width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php include "awardRows.php" ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      async function showDeleteAlert(event) {
        Swal.fire({
          title: 'Deleted!',
          text: 'The job is successfully deleted.',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          deleteAward(event.target.value);
          if (result.value) {
            location.replace("awards.php");
          }
        });
      }

      async function deleteAward(index) {
        console.log("Index: " + index);
        let formData = new FormData();
        formData.append("delete", index);

        await fetch("deleteAward.php", {
            method: 'POST',
            body: formData,
            headers: {},
          })
          .then(response => response.json())
          .then(data => {
            console.log(data);
          }).catch(error => console.error("Error: ", error));
      }

      function showEditAlert() {
        Swal.fire({
          title: 'Edited!',
          text: 'The job is successfully edited.',
          icon: 'success',
          showConfirmButton: false
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
