<?php
session_start();
if (!isset($_SESSION['awardData']) || !is_array($_SESSION['awardData'])) {
  http_response_code(500);
  echo json_encode(['error' => 'Session awardData is not initialized or not an array.']);
  exit;
}

if (isset($_POST['delete'])) {
  $index = $_POST['delete'];

  if (array_key_exists($index, $_SESSION['awardData'])) {
    unset($_SESSION['awardData'][$index]);
  } else {
    http_response_code(404);
    echo json_encode(['error' => "Index {$index} does not exist in awardData."]);
    exit;
  }
}

$_SESSION['awardData'] = array_values($_SESSION['awardData']);

header('Content-Type: application/json');

echo json_encode(['success' => true, 'deletedIndex' => $index]);
