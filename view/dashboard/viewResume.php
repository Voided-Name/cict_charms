<?php
session_start();

if (isset($_GET['viewResumeBtn'])) {
  // Store the value directly from GET
  $resumeFile = $_GET['viewResumeBtn'];

  // Redirect to avoid resubmission if needed (you can skip this if you want to display directly)
  $_SESSION['viewResumeValue'] = $resumeFile;
  header("Location: viewResume.php?file=$resumeFile");
  exit();
}

if (isset($_GET['file'])) {
  echo "<iframe src=\"" . htmlspecialchars($_GET['file']) . "\" width=\"100%\" style=\"height:100%\"></iframe>";
}
