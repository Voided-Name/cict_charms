<?php
session_start();
include '../src/init.php';
$_SESSION['alumniPage'] = "genResume";

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

$alumniDetails = $func->select_one('userdetails', array('user_id', '=', $_SESSION['userid']));
$alumniCourseDetails = $func->select_one('alumni_graduated_course', array('user_id', '=', $_SESSION['userid']));
$alumniAwards = $func->select_one('alumni_awards', array('alumni_userID', '=', $_SESSION['userid']));
$alumniWorkExperience = $func->select_one('alumni_work_experience', array('owner_id', '=', $_SESSION['userid']));

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
      <?php include 'header.php' ?>
    </div>
    <!--Nav Start-->
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
              <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">Generate Resume</h4>
                </div>
              </div>
              <div class="card-body px-0">
                <form method="POST" action="generate-pdf.php">
                  <div class="container">
                    <hr class="border border-dark border-1">
                    <h4 class="ms-3 my-3">Awards</h4>
                    <ul class="list-group">
                      <?php
                      if ($alumniAwards) {
                        foreach ($alumniAwards as $alumniAward) {
                      ?>
                          <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="<?php echo $alumniAward['id'] ?>" id="awardCheckbox" name="awardCheckbox[]">
                            <label class="form-check-label" for="awardCheckbox"><?php echo $alumniAward['award_name'] . " | " . $alumniAward['given_by'] . " | " . $alumniAward['award_date'] ?></label>
                          </li>
                      <?php
                        }
                      } ?>

                    </ul>
                    <h4 class="ms-3 my-3">Work Experience</h4>
                    <ul class="list-group">
                      <?php
                      if ($alumniWorkExperience) {
                        foreach ($alumniWorkExperience as $alumniExperience) {
                      ?>
                          <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="<?php echo $alumniExperience['id'] ?>" id="experienceCheckbox" name="experienceCheckbox[]">
                            <label class="form-check-label" for="experienceCheckbox"><?php echo $alumniExperience['work_position'] . " | " . $alumniExperience['work_name'] . " | " . $alumniExperience['date_started'] . " - " . $alumniExperience['date_end'] ?></label>
                          </li>
                      <?php
                        }
                      } ?>
                    </ul>
                    <button type="submit" class="btn btn-primary m-2" name="genRes">Generate PDF</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function showDeleteAlert() {
        Swal.fire({
          title: 'Deleted!',
          text: 'The job is successfully deleted.',
          icon: 'success',
          confirmButtonText: 'OK'
        });
      }

      function showEditAlert() {
        Swal.fire({
          title: 'Edited!',
          text: 'The job is successfully edited.',
          icon: 'success',
          confirmButtonText: 'OK'
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
