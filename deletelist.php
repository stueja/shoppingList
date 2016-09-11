<?php
	require_once "functions.php";

	$user_id = $_SESSION['user']['user_id'];
	
	deleteList();

	$query3 = "SELECT * FROM `ytercero_groceries`.`lists` WHERE `user_id` = '$user_id'";

		$result3 = $db->query($query3);

		$row3 = $result3->fetch_array();

	   header("location:index.php?list_id=" . $row3['list_id']);