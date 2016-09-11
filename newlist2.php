<?php
	require_once "functions.php";

	$name = $db->escape_string($_POST['name']);
	
	$user_id = $_SESSION['user']['user_id'];

	$query = "INSERT INTO `ytercero_groceries`.`lists`(`name`, `user_id`) VALUES ('$name', '$user_id')";

	$db->query($query);

		$query2 = "SELECT * FROM `ytercero_groceries`.`lists`WHERE `name`= '$name' AND `user_id` = '$user_id'";

		$result2 = $db->query($query2);

		$row2 = $result2->fetch_array();

	header("location:index.php?list_id=" . $row2['list_id']);
