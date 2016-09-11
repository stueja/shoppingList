<?php 

	require_once "functions.php";

	$username = $db->escape_string($_POST['username']);
	$password = $db->escape_string($_POST['password']);


	$query = "SELECT * FROM `ytercero_groceries`.`users` WHERE `username` = '$username'";

	$result = $db->query($query);

	$row = $result->fetch_array();
	
	if (password_verify($password, $row['password'])) {
		$_SESSION['user'] = $row; 
		$user_id = $_SESSION['user']['user_id'];
		$query1 = "SELECT * FROM `ytercero_groceries`.`lists` WHERE `user_id` = '$user_id'";

		$result1 = $db->query($query1);

		$row1 = $result1->fetch_array();

		header("location:index.php?list_id=".$row1['list_id']);
	}
	else{
		header("location:index.php?error=5");
	}

