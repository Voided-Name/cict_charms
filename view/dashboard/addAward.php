<?php
session_start();
if (isset($_POST['award-name']) && isset($_POST['award-date']) && isset($_POST['award-institution'])) {
  array_push($_SESSION['awardData'], array($_POST['award-name'], $_POST['award-date'], $_POST['award-institution']));
}
header("Location: awards.php");
