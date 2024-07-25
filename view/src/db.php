

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "CICTCharms_db";


date_default_timezone_set('Asia/Manila');
// Create connection
$con = new mysqli($servername, $username, $password, $database);
$con->set_charset("utf8mb4");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
error_reporting(0);
?>
