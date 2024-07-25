<?php

	session_start();
	include 'src/init.php';
	// $newlog = $func->insert('all_logs',array(
	// 					'personID' => $_SESSION['personid'],
	// 					'activity' => 'logout'
	// 					));


	
	session_destroy();
	header('location:../');
?>