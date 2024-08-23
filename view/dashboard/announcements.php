<?php
session_start();
include '../src/init.php';

$dataTesting = $func->selectallorderby('announcements', 'announcement_date', 'DESC');

?>

<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CICT CHARM</title>

  <link rel="shortcut icon" href="../../img/favicon.ico">
  <link rel="stylesheet" href="../../css/theme_1/core/libs.min.css">
  <link rel="stylesheet" href="../../css/theme_1_vendor/aos/dist/aos.css">
  <link rel="stylesheet" href="../../css/theme_1/hope-ui.min.css">
  <link rel="stylesheet" href="../../css/theme_1/custom.css">
  <link rel="stylesheet" href="../../css/theme_1/dark.css">
  <link rel="stylesheet" href="../../css/theme_1/rtl.min.css">
  <link rel="stylesheet" href="../../css/theme_1/customizer.min.css">
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="  ">
  <!-- loader Start -->
  <div id="loading">
    <div class="loader simple-loader">
      <div class="loader-body"></div>
    </div>
  </div>
  <!-- Sidebar Menu End -->
  </aside>
  <main class="main-content">
    <div class="conatiner-fluid content-inner mt-3 py-0">
      <div class="container">
        <h1 class=" text-center" style="font-family: Georgia, 'Times New Roman', Times, serif;">Announcements</h1>
        <hr style="border: 2px solid black;">
        <?php
        foreach ($dataTesting as $announcementInstance) {
        ?>
          <div class="container m-3 p-3 shadow-lg">
            <h2><?php echo $announcementInstance['announcement_title'] ?></h2>
            <p class="ms-3"><?php echo nl2br($announcementInstance['announcement_body']) ?></p>
            <p><?php echo (new DateTime($announcementInstance['announcement_date']))->format('F j, Y g:i A') ?></p>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </main>

  <!-- Library Bundle Script -->
  <script src="../../js/core/libs.min.js"></script>
  <!-- External Library Bundle Script -->
  <script src="../../js/core/external.min.js"></script>
  <!-- Widgetchart Script -->
  <script src="../../js/charts/widgetcharts.js"></script>
  <!-- mapchart Script -->
  <script src="../../js/charts/vectore-chart.js"></script>
  <script src="../../js/charts/dashboard.js"></script>
  <!-- fslightbox Script -->
  <script src="../../js/plugins/fslightbox.js"></script>
  <!-- Settings Script -->
  <script src="../../js/plugins/setting.js"></script>
  <!-- Slider-tab Script -->
  <script src="../../js/plugins/slider-tabs.js"></script>
  <!-- Form Wizard Script -->
  <script src="../../js/plugins/form-wizard.js"></script>
  <!-- AOS Animation Plugin-->
  <script src="../../css/theme_1_vendor/aos/dist/aos.js"></script>
  <!-- App Script -->
  <script src="../../js/hope-ui.js" defer></script>
</body>

</html>
