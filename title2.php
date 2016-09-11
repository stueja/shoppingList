<?php
	require_once "functions.php";

	$newTitle = $_POST['title'];
	$list_id = $_POST['list_id'];

	$user_id = $_SESSION['user']['user_id'];

	$query = "UPDATE `lists` SET `name` = '$newTitle' WHERE `list_id` = '$list_id' AND `user_id` = '$user_id'";

	$db->query($query);

	$query1 = "SELECT * FROM `ytercero_groceries`.`users` WHERE `user_id` = '$user_id'";

	$result1 = $db->query($query1);

	$row1 = $result1->fetch_array();

	$_SESSION['user'] = $row1; 

	header("location:index.php?list_id=" . $list_id);



