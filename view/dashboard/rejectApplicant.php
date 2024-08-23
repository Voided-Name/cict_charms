<?php
session_start();
include '../src/init.php';

$alumniId = $strip->strip($_POST['alumniId']);
$postId = $strip->strip($_POST['postId']);
$status = $strip->strip($_POST['statusId']);

$statusId = $func->selectall_where2('alumni_employment_status', array('status_post_id', '=', $postId), array('status_alumni_id', '=', $alumniId));

$func->update('alumni_employment_status', 'status_id', $statusId[0]['status_id'], array(
  'status' => 2,
));
