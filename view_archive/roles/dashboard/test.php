<?php
session_start();
$_SESSION['verifyMe'] = "valid";
echo json_encode($_SESSION['verifyMe']);
