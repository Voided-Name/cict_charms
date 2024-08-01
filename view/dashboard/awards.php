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
      <!--Nav Start-->
      <?php include 'header.php' ?>
      <!-- Nav Header Component Start -->
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
