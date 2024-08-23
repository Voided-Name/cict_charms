<?php
session_start();
include '../src/init.php';
$_SESSION['facultyPage'] = "announcement";

$dataTesting = $func->selectallorderby('announcements', 'announcement_date', 'DESC');

if (isset($_POST['editAnnouncementBtn'])) {
  $title = $strip->strip($_POST['announcement-title']);
  $body = $strip->strip($_POST['announcement-details']);

  $updateAnnouncement = $func->update('announcements', 'announcement_id', $_POST['editAnnouncementBtn'], array(
    'announcement_title' => $title,
    'announcement_body' => $body,
  ));

  header("location: announcement.php");
}
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CICT CHARM</title>


  <link rel="shortcut icon" href="../../img/favicon.ico">
  <link rel="stylesheet" href="../../css/theme_1_vendor/aos/dist/aos.css">
  <link rel="stylesheet" href="../../css/theme_1/core/libs.min.css">
  <link rel="stylesheet" href="../../css/theme_1/hope-ui.min.css">
  <link rel="stylesheet" href="../../css/theme_1/custom.css">
  <link rel="stylesheet" href="../../css/theme_1/dark.css">
  <link rel="stylesheet" href="../../css/theme_1/rtl.min.css">
  <link rel="stylesheet" href="../../css/theme_1/customizer.min.css">

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
                    <?php
                    $x = 0;
                    foreach ($dataTesting as $dataTestingInstance) {
                      $authorData = $func->select_one('userdetails', array('user_id', '=', $dataTestingInstance['announcement_author']));
                      $author = $authorData[0]['first_name'] . " " . $authorData[0]['last_name'];
                    ?>
                      <tr>
                        <td><?php echo $dataTestingInstance['announcement_title'] ?></td>
                        <td><?php echo $author ?></td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo $x ?>">
                              Edit
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?php echo $x ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" class="glassmorphism-form">
                                      <div class="mb-3">
                                        <label for="announcement-title" class="form-label">Announcement Title</label>
                                        <input type="text" class="form-control" id="announcement-title" name="announcement-title" value="<?php echo $dataTestingInstance['announcement_title'] ?>" required>
                                      </div>
                                      <div class="mb-3">
                                        <label for="announcement-details" class="form-label">Details</label>
                                        <textarea class="form-control" id="announcement-details" name="announcement-details" required rows="10"><?php echo $dataTestingInstance['announcement_body'] ?></textarea>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="editAnnouncementBtn" value="<?php echo $dataTestingInstance['announcement_id'] ?>">Save changes</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
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
                    <?php
                      $x++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
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
    <script src="../../css/theme_1_vendor/aos/dist/aos.js"></script>
    <script src="../../js/plugins/setting.js"></script>
    <script src="../../js/plugins/slider-tabs.js"></script>
    <script src="../../js/plugins/form-wizard.js"></script>
    <script src="../../js/hope-ui.js" defer></script>
</body>

</html>
