<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $awardName = $_POST['award-name'];
  $awardDate = $_POST['award-date'];
  $awardInstitution = $_POST['award-institution'];
  $awardDescription = $_POST['award-description'];
  $index = $_POST['index'];

  $_SESSION['awardData'][$index][0] = $awardName;
  $_SESSION['awardData'][$index][1] = $awardDate;
  $_SESSION['awardData'][$index][2] = $awardInstitution;
  $_SESSION['awardData'][$index][3] = $awardDescription;
}

header("location: awards.php");
